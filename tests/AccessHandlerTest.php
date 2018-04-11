<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AccessHandlerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_check()
    {
        $this->assertTrue(
            Access::check('admin', 'editor'), 
            "Admin users should have access to editor modules"
        );

        $this->assertTrue(
            Access::check('editor', 'user'), 
            "Editor users should have access to user modules"
        );

        $this->assertTrue(
            Access::check('admin', 'admin'), 
            "Admin users should have access to admin modules"
        );

        $this->assertFalse(
            Access::check('user', 'admin'), 
            "Users should not have access to admin modules"
        );

        $this->assertFalse(
            Access::check('user', 'editor'), 
            "The user users has access to editor modules"
        );
    }
}
