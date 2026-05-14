<?php

use App\User;

class UserControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/user')
             ->see('User Management');
    }

    public function testIndexShowsUsers()
    {
        $this->loginAs('admin');

        User::create([
            'name' => 'John Doe',
            'email' => 'john@test.com',
            'password' => bcrypt('password'),
            'position' => 'fac',
        ]);

        $this->visit('/user')
             ->see('John Doe')
             ->see('john@test.com')
             ->see('fac');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/user/create')
             ->see('Create User');
    }

    public function testStoreCreatesUser()
    {
        $this->loginAs('admin');

        $this->post('/user/create', [
            '_token' => csrf_token(),
            'name' => 'New User',
            'email' => 'newuser@test.com',
            'password' => 'password123',
            'position' => 'bod',
        ]);

        $this->assertRedirectedTo('user');
        $this->seeInDatabase('users', [
            'name' => 'New User',
            'email' => 'newuser@test.com',
            'position' => 'bod',
        ]);
    }

    public function testStoreValidatesRequiredFields()
    {
        $this->loginAs('admin');

        $this->post('/user/create', [
            '_token' => csrf_token(),
            'name' => '',
            'email' => '',
            'password' => '',
            'position' => '',
        ]);

        $this->assertSessionHasErrors(['name', 'email', 'password', 'position']);
    }

    public function testStoreValidatesUniqueEmail()
    {
        $this->loginAs('admin');

        User::create([
            'name' => 'Existing',
            'email' => 'existing@test.com',
            'password' => bcrypt('password'),
            'position' => 'fac',
        ]);

        $this->post('/user/create', [
            '_token' => csrf_token(),
            'name' => 'Another',
            'email' => 'existing@test.com',
            'password' => 'password123',
            'position' => 'bod',
        ]);

        $this->assertSessionHasErrors(['email']);
    }

    public function testStoreValidatesMinPassword()
    {
        $this->loginAs('admin');

        $this->post('/user/create', [
            '_token' => csrf_token(),
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => '123',
            'position' => 'admin',
        ]);

        $this->assertSessionHasErrors(['password']);
    }

    public function testEditPageLoads()
    {
        $this->loginAs('admin');

        $user = User::create([
            'name' => 'Edit Me',
            'email' => 'editme@test.com',
            'password' => bcrypt('password'),
            'position' => 'fac',
        ]);

        $this->visit('/user/edit/' . $user->id)
             ->see('Edit User')
             ->see('Edit Me')
             ->see('editme@test.com');
    }

    public function testUpdateModifiesUser()
    {
        $this->loginAs('admin');

        $user = User::create([
            'name' => 'Old Name',
            'email' => 'old@test.com',
            'password' => bcrypt('password'),
            'position' => 'fac',
        ]);

        $this->post('/user/edit/' . $user->id, [
            '_token' => csrf_token(),
            'name' => 'New Name',
            'email' => 'new@test.com',
            'position' => 'bod',
        ]);

        $this->assertRedirectedTo('user');
        $this->seeInDatabase('users', [
            'id' => $user->id,
            'name' => 'New Name',
            'email' => 'new@test.com',
            'position' => 'bod',
        ]);
    }

    public function testUpdatePasswordOptional()
    {
        $this->loginAs('admin');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => bcrypt('oldpassword'),
            'position' => 'fac',
        ]);

        $oldPassword = $user->password;

        $this->post('/user/edit/' . $user->id, [
            '_token' => csrf_token(),
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => '',
            'position' => 'fac',
        ]);

        $user = $user->fresh();
        $this->assertEquals($oldPassword, $user->password);
    }

    public function testUpdateChangesPassword()
    {
        $this->loginAs('admin');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => bcrypt('oldpassword'),
            'position' => 'fac',
        ]);

        $oldPassword = $user->password;

        $this->post('/user/edit/' . $user->id, [
            '_token' => csrf_token(),
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => 'newpassword',
            'position' => 'fac',
        ]);

        $user = $user->fresh();
        $this->assertNotEquals($oldPassword, $user->password);
    }

    public function testDeleteRemovesUser()
    {
        $this->loginAs('admin');

        $user = User::create([
            'name' => 'Delete Me',
            'email' => 'deleteme@test.com',
            'password' => bcrypt('password'),
            'position' => 'fac',
        ]);

        $this->get('/user/delete/' . $user->id);

        $this->assertRedirectedTo('user');
        $this->notSeeInDatabase('users', ['id' => $user->id]);
    }

    public function testCannotDeleteSelf()
    {
        $user = $this->loginAs('admin');

        $this->get('/user/delete/' . $user->id);

        $this->assertRedirectedTo('user');
        $this->seeInDatabase('users', ['id' => $user->id]);
    }
}
