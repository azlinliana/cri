<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin_one = User::create([
            'title_user' => 'Miss',
            'fullname' => 'Nur Azlin Liana binti Mohd Adlan',
            'gender' => 'Female',
            'phone_number' => '+60 10-262 0507',
            'email' => 'azlinliana.adlan@gmail.com',
            'password' => Hash::make('criazlin'),
        ]);

        $superadmin_one->attachRole('superadmin');

        $superadmin_two = User::create([
            'title_user' => 'Mr.',
            'fullname' => 'Syed Ahmad Afiq Hasif bin Syed Ab. Rahman',
            'gender' => 'Male',
            'phone_number' => '09-7797788',
            'email' => 'afiq.h@umk.edu.my',
            'password' => Hash::make('criafiq'),
        ]);

        $superadmin_two->attachRole('superadmin');
    }
}
