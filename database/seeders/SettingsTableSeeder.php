<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = Setting::create([
            'site_name' => 'Laravel Blog',
            'address' => 'Babulla, Sri Lanka',
            'contact_number' => '0791234567',
            'contact_email' => 'info@laravel_blog.com'
        ]);
    }
}
