<?php

use App\User;
use Illuminate\Support\Facades\Hash;

class ProfileControllerTest extends TestCase
{
    public function testProfilePageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/profile')
             ->see('My Profile')
             ->see('Test User')
             ->see('test@example.com');
    }

    public function testProfileShowsPosition()
    {
        $this->loginAs('bod');
        $this->visit('/profile')
             ->see('Bod');
    }

    public function testUpdateProfileName()
    {
        $user = $this->loginAs('admin');

        $this->post('/profile', [
            '_token' => csrf_token(),
            'name' => 'Updated Name',
            'email' => 'test@example.com',
        ]);

        $this->assertRedirectedTo('profile');
        $this->seeInDatabase('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
        ]);
    }

    public function testUpdateProfileEmail()
    {
        $user = $this->loginAs('admin');

        $this->post('/profile', [
            '_token' => csrf_token(),
            'name' => 'Test User',
            'email' => 'newemail@example.com',
        ]);

        $this->assertRedirectedTo('profile');
        $this->seeInDatabase('users', [
            'id' => $user->id,
            'email' => 'newemail@example.com',
        ]);
    }

    public function testUpdateProfileValidatesEmail()
    {
        $this->loginAs('admin');

        User::create([
            'name' => 'Other',
            'email' => 'taken@example.com',
            'password' => bcrypt('password'),
            'position' => 'fac',
        ]);

        $this->post('/profile', [
            '_token' => csrf_token(),
            'name' => 'Test User',
            'email' => 'taken@example.com',
        ]);

        $this->assertSessionHasErrors(['email']);
    }

    public function testChangePasswordPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/profile/change-password')
             ->see('Change Password');
    }

    public function testChangePasswordSuccess()
    {
        $user = $this->loginAs('admin');

        $this->post('/profile/change-password', [
            '_token' => csrf_token(),
            'current_password' => 'password',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ]);

        $this->assertRedirectedTo('profile');
        $user = $user->fresh();
        $this->assertTrue(Hash::check('newpassword', $user->password));
    }

    public function testChangePasswordWrongCurrentPassword()
    {
        $this->loginAs('admin');

        $this->post('/profile/change-password', [
            '_token' => csrf_token(),
            'current_password' => 'wrongpassword',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ]);

        $this->assertRedirectedTo('profile/change-password');
    }

    public function testChangePasswordConfirmationMismatch()
    {
        $this->loginAs('admin');

        $this->post('/profile/change-password', [
            '_token' => csrf_token(),
            'current_password' => 'password',
            'password' => 'newpassword',
            'password_confirmation' => 'differentpassword',
        ]);

        $this->assertSessionHasErrors(['password']);
    }

    public function testChangePasswordMinLength()
    {
        $this->loginAs('admin');

        $this->post('/profile/change-password', [
            '_token' => csrf_token(),
            'current_password' => 'password',
            'password' => '123',
            'password_confirmation' => '123',
        ]);

        $this->assertSessionHasErrors(['password']);
    }

    public function testProfileRequiresAuth()
    {
        $this->visit('/profile')
             ->seePageIs('/login');
    }
}
