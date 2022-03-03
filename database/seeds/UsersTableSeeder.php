<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\User;
use App\Task;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'first_name' => ('Trịnh'),
            'last_name' => ('Xuân Thống'),
            'username' => ('admin'),
            'isAdmin' => (1),
            'isActive' => (1),
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
        ]);

        factory(User::class, 10)->create()->each(function ($user) {
            $user->tasks()->saveMany(factory(Task::class, 5)->make());
        });
    }
}
