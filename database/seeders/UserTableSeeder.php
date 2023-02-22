<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $data = [
            // super admin
            [
                'name'              => 'super admin',
                'email'             => 'superadmin@gmail.com',
                'password'          => Hash::make('superadmin123'),
                'email_verified_at' => Carbon::now(),
            ],
            // admin
            [
                'name'              => 'admin',
                'email'             => 'admin@gmail.com',
                'password'          => Hash::make('admin123'),
                'email_verified_at' => Carbon::now(),
            ],
        ];

        foreach( $data as $dataRow ){
            User::create($dataRow);
        }
    }
}
