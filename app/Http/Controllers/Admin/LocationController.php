<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Location;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $locations = Location::all();
        return view('admin.locations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:locations',
        ]);

        Location::create([
            'name' => $request->name,
            'phone' => $request->phone
        ]);

        return redirect(route('locations.index'));
    }

    public function edit(Location $location) {
        return view('admin.locations.edit', compact('location'));
    }


    public function update(Request $request, Location $location)
    {
        $location->update([
            'name' => $request->name,
            'phone' => $request->phone
        ]);

        return redirect(route('locations.index'));
    }

    public function delete(Location $location) {
        $location->delete();
        return redirect(route('locations.index'));
    }
}
