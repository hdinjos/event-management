<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class Authentication extends Controller
{
	//
	function login_view()
	{
		return view("/auth/login");
	}

	function login(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'email' => 'required|email',
			'password' => 'required',
		], [
			'email.required' => 'Alamat email harus diisi',
			'password.required' => 'Kata sandi harus diisi',
		]);
		if ($validator->fails()) {
			return redirect("auth/login")
				->withErrors($validator)
				->withInput();
		}

		if ($validator->validate()) {
			$user = User::where("email", "=", $request->email)->first();
			if ($user == NULL) {
				return redirect("auth/login")->with('status', 'Email belum terdaftar')->withInput();;
			}

			if (Hash::check($request->password, $user->password)) {
				$request->session()->put("id", $user->id);
				$request->session()->put("name", $user->name);
				$request->session()->put("email", $user->email);
				return redirect("/")->with('status', 'Login success');
			}
			return redirect("/auth/login")->with("status", "Kredensial tidak valid")->withInput();;
		} else {
			return view("/auth/login");
		}
	}
}
