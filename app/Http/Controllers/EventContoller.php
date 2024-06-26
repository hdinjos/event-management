<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

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

		$validator = Validator::make($request->all(), [
			"name" => "required",
			"date" => "required",
			"place" => "required",
			"note" => "required",
		]);

		if ($validator->fails()) {
			return redirect("/events")->with("alert-error", "Form belum lengkap");;
		}
		Event::create([
			"name" => $request->name,
			"date" => Carbon::parse(str_replace("/", "-", $request->date))->format("Y-m-d"),
			"place" => $request->place,
			"note" => $request->note,
			"is_active" => $request->is_active === "on" ? true : false,
		]);
		return redirect("/events")->with("alert", "Kegiatan baru telah tersimpan");
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
		if (!$id) {
			return redirect("/events")->with("alert-error", "Data tidak ditemukan");
		}
		$foundEvent = Event::find($id);
		if ($foundEvent == NULL) {
			return redirect("/events")->with("alert-error", "Data tidak ditemukan");
		}

		$validator = Validator::make($request->all(), [
			"name" => "required",
			"date" => "required",
			"place" => "required",
			"note" => "required",
		]);

		if ($validator->fails()) {
			return redirect("/events")->with("alert-error", "Form belum lengkap");;
		}
		var_dump($request->is_active);
		$foundEvent->update([
			"name" => $request->name,
			"date" => Carbon::parse(str_replace("/", "-", $request->date))->format("Y-m-d"),
			"place" => $request->place,
			"note" => $request->note,
			"is_active" => $request->is_active === "on" ? true : false,
		]);
		return redirect("/events")->with("alert", "Edit kegiatan berhasil");
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
		if (!$id) {
			return redirect("/events")->with("alert-error", "Data tidak ditemukan");
		}
		$event = Event::find($id);
		if ($event == NULL) {
			return redirect("/events")->with("alert-error", "Data tidak ditemukan");;
		}
		$event->delete();
		return redirect("/events")->with("alert", "Data berhasil dihapus");;
	}
}
