<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class EditProfileTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_edit_profile()
    {
        $user = $this->createUser();

        $this->actingAs($user)
            ->visit('account')
            ->click('Edit profile')
            ->seePageIs('account/profile')
            ->see('Edit profile')
            ->type('Cristhian García', 'name')
            ->press('Edit profile')
            ->seePageIs('account')
            ->see('Your name has been edited');

        $this->seeInDatabase('users', [
            'name' => 'Cristhian García'
        ]);
    }
}
