<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		//
		DB::table('users')->insert([
			'name' => "Admin",
			'email' => 'admin_uye@example.com',
			'password' => Hash::make('password'),
			'role' => 1,
		]);

		DB::table('users')->insert([
			'name' => "Subadmin",
			'email' => 'subadmin_uye@example.com',
			'password' => Hash::make('password'),
			'role' => 2,
		]);
	}
}
