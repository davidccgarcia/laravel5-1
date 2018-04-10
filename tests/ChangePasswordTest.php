<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChangePasswordTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_change_password()
    {
        $user = $this->createUser('admin');

        $this->actingAs($user)
            ->visit('/')
            ->see('Account')
            ->click('Account')
            ->seePageIs('account')
            ->see('My account')
            ->seeLink('Change password')
            ->click('Change password')
            ->seePageIs('account/password')
            ->type('secret', 'current_password')
            ->type('newpassword', 'password')
            ->type('newpassword', 'password_confirmation')
            ->press('Change password')
            ->seePageIs('account')
            ->see('Your password has been changed');

        $this->assertTrue(
            Hash::check('newpassword', $user->magic_words),
            'The user password was not changed'
        );
    }
}
