<?php

use Illuminate\Database\Seeder,
    Illuminate\Support\Facades\Hash,
    Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    private $users = [
        [
            'id'                => 1,
            'name'              => 'Sergey Soloviov',
            'email'             => 'soloviov@bigmir.net',
            'password'          => '12345'
        ],[
            'id'                => 2,
            'name'              => 'Test User',
            'email'             => 'test@test.com',
            'password'          => '12345'
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->users as $user) {
            $user['password'] = Hash::make($user['password']);
            $user['created_at'] = now();
            $user['updated_at'] = now();
            DB::table('users')->insert($user);
        }
    }
}
