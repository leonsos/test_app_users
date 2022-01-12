<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Super admin',
            'role' =>'1',
            'email'=>'admin@admin.yahoo.com',
            'password'=> Hash::make('123456'),
            'phone'=>'+5422333213',
            'dni'=>'17446501',                        
            'date_of_birth'=>'1984-07-03',
            'code_of_city'=> '686',
        ]);
    }
}
