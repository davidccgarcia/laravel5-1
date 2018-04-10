<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MenuTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_menu()
    {
        // Guest users
        $this->visit('/')->dontSee('Account');

        $user = $this->createUser('admin');

        $this->actingAs($user)
            ->visit('/')
            ->see('Account');

        $this->click('Account')
            ->seePageIs('account')
            ->see('My account');
    }

}
