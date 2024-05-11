<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoleSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		//
		DB::table('roles')->insert([
			'name' => "admin",
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);

		DB::table('roles')->insert([
			'name' => "subadmin",
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);
	}
}
