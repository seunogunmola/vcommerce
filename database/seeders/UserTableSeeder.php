<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //SEED ADMIN USER
        $adminData = [
            'name'=>'Administrator',
            'username'=>'admin',
            'email'=>'admin@vcommerce.com',
            'role'=>'admin',
            'status'=>'active',
            'password'=> Hash::make('admin'),
            'photo'=>fake()->imageUrl('60','60')
        ];
        DB::table('users')->insert($adminData);

        //SEED VENDOR USER 
        $vendorData = [
            'name'=>'Vendor',
            'username'=>'vendor',
            'email'=>'vendor@vcommerce.com',
            'role'=>'vendor',
            'status'=>'active',
            'password'=> Hash::make('vendor'),
            'photo'=>fake()->imageUrl('60','60')        
        ];
        DB::table('users')->insert($vendorData);


        $userData = [
            'name'=>'User',
            'username'=>'user',
            'email'=>'user@vcommerce.com',
            'role'=>'user',
            'status'=>'active',
            'password'=> Hash::make('user'),
            'photo'=>fake()->imageUrl('60','60') 
        ];
        DB::table('users')->insert($userData);
    }
}
