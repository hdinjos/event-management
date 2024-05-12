<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;

class EventContoller extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		//
		$events = Event::get();
		return view('dashboard/event', ["events" => $events]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(Request $request)
	{
		//
		$validator = Validator::make($request->all(), [
			"name" => "required",
			"date" => "required",
			"place" => "required",
			"note" => "required",
		]);

		if ($validator->fails()) {
			$this->index();
		}
		var_dump($request->is_active);
		Event::create([
			"name" => $request->name,
			"date" => "2024-05-12",
			"place" => $request->place,
			"note" => $request->note,
			"is_active" => $request->is_active === "NO",
		]);
		$this->index();
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
