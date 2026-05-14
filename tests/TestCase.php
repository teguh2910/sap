<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    use DatabaseTransactions;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        parent::setUp();

        // Disable mass assignment protection for testing
        \Illuminate\Database\Eloquent\Model::unguard();
    }

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Create and authenticate a user
     *
     * @param string $position
     * @return \App\User
     */
    protected function createUser($position = 'admin')
    {
        $user = \App\User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'position' => $position,
        ]);

        return $user;
    }

    /**
     * Create and login as user
     *
     * @param string $position
     * @return \App\User
     */
    protected function loginAs($position = 'admin')
    {
        $user = $this->createUser($position);
        $this->actingAs($user);
        return $user;
    }
}
