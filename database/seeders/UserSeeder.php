<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Stuart Harrison',
            'email' => 'stuart@itecassist.co.za',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@demo.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@demo.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'mobile_number'=>'0826512384',
            'date_of_birth'=>'1970-06-15',
            'id_number'=>'7006155050081',
            'delivery_address'=>"844 Haarhoff street\nRietfontein\nPretoria\n0084",
            'gender'=>1,
            'team_id'=>1
        ]);
    }
}
