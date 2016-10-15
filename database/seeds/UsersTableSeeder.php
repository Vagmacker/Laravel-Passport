<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
           'email' => 'user@alphattec.com'
        ]);

        factory(User::class)->create([
            'email' => 'admin@alphattec.com'
        ]);
    }
}
