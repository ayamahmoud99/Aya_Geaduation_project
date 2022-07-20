<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'oshi',
            'email' => 'oshi@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('123456789'),
        ]);
    }
}
