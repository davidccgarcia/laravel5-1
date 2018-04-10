<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

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

    public function createUser($role)
    {
        return factory(App\User::class)->create([
            'name' => 'David García', 
            'username' => 'davidccgarcia', 
            'email' => 'ccristhiangarcia@gmail.com', 
            'role' => $role, 
            'active' => true, 
            'magic_words' => bcrypt('secret'), 
            'remember_token' => str_random(10),
        ]);
    }
}
