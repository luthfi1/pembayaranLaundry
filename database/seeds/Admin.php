<?php

use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new\App\User;
        $user->name = "Fahmi Nuradi";
        $user->username = "admin";
        $user->email = "admin@test.com";
        $user->level = "admin";
        $user->password = \Hash::make("admin123");
        $user->save();
        $this->command->info("User ditambahkan");
    }
}
