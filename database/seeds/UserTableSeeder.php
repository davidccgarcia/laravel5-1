<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name' => 'David García', 
            'username' => 'davidccgarcia', 
            'email' => 'ccristhiangarcia@gmail.com', 
            'role' => 'admin', 
            'active' => true, 
            'magic_words' => bcrypt('secret'), 
            'remember_token' => str_random(45)
        ]);

        factory(App\User::class)->times(49)->create();
    }
}
