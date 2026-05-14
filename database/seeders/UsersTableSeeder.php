<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin sandeepa',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('12345678'),
            'admin' => 1
        ]);

        $user->assignRole('admin');

        Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/836.jpg',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
