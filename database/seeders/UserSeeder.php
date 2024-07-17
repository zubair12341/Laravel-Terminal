<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user1= User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $user1->assignRole('admin');

        // $user2=User::create([
        //     'name' => 'Rayan Harris',
        //     'email' => 'rayan@gmail.com',
        //     'password' => Hash::make('password'),
        
        // ]);
        // $user2->assignRole('user');

        // $user3=  User::create([
        //     'name' => 'Jordan Black',
        //     'email' => 'jordan@gmail.com',
        //     'password' => Hash::make('password'),
         
        // ]);

        // $user3->assignRole('user');

        // $user4= User::create([
        //     'name' => 'Luis Steven',
        //     'email' => 'luis@gmail.com',
        //     'password' => Hash::make('password'),
           
        // ]);
        // $user4->assignRole('user');
    }
}
