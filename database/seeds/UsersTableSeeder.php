<?php

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

        factory(App\User::class, 9)->create()->each(
            function ($user) {
                $profiles = factory(App\Profile::class, 1)->make();
                $user->profile()->save(...$profiles);
            }
        );
    }
}
