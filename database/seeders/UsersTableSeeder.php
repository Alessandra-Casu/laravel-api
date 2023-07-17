<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'      => 'asfd',
                'email'     =>'asfd@asfd.asfd',
                'password'  => Hash::make('asfd'),
            ],
            [
                'name'      => 'qwer',
                'email'     =>'qwer@qwer.qwer',
                'password'  => Hash::make('qwer'),
            ],
            [
                'name'      => 'zxcv',
                'email'     =>'zxcv@zxcv.zxcv',
                'password'  => Hash::make('zxcv'),
            ],
        ];
        
        foreach ($users as $user_data){
            User::create($user_data);
        }
        
    }
}
