<?php

use App\User;

class AuthTest extends TestCase
{
    public function testLoginPageLoads()
    {
        $this->visit('/login')
             ->see('Login');
    }

    public function testUserCanLogin()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'position' => 'admin',
        ]);

        $this->visit('/login')
             ->type('admin@test.com', 'email')
             ->type('password', 'password')
             ->press('Login')
             ->seePageIs('/');
    }

    public function testUserCannotLoginWithWrongPassword()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'position' => 'admin',
        ]);

        $this->visit('/login')
             ->type('admin@test.com', 'email')
             ->type('wrongpassword', 'password')
             ->press('Login')
             ->seePageIs('/login');
    }

    public function testUserCanLogout()
    {
        $user = $this->loginAs('admin');

        $this->post('/logout')
             ->assertRedirectedTo('/');
    }

    public function testUnauthenticatedUserRedirectedToLogin()
    {
        $this->visit('/user')
             ->seePageIs('/login');
    }
}
