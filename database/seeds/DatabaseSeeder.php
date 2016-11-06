<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'zhaohuan',
            'email' => 'zhaohuan@qq.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
