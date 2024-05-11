<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		// User::factory()->count(2)->create();

		DB::table('users')->insert([
			'name' => "Admin",
			'email' => 'admin_em@example.com',
			'password' => Hash::make('password'),
			'role' => 1,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);

		DB::table('users')->insert([
			'name' => "Subadmin",
			'email' => 'subadmin_em@example.com',
			'password' => Hash::make('password'),
			'role' => 2,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);
	}
}
