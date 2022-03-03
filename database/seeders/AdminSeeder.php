<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
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
        $user = 
            [
                'name'       => 'Administator',
                'email'      => 'testing@testing.com',
                'password'   => Hash::make('admin'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

        User::create($user);
    }
}
