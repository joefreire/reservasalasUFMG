<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user = User::find(1);
        if(empty($user)){
            $user = User::create([
                'name' => 'admin',
                'user' => 'admin',
                'email' => 'admin@admin.com',
                'tipo' => 'admin',
                'password' => \Hash::make('123456'),
            ]);
        }	
    }
}
