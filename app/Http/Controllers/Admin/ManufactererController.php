<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Manufacterer;

class ManufactererController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $manufacterers = Manufacterer::all();
        return view('admin.manufacterers.index', compact('manufacterers'));
    }

    public function create()
    {
        return view('admin.manufacterers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:manufacterers',
        ]);

        Manufacterer::create([
            'name' => $request->name,
            'phone' => $request->phone
        ]);

        return redirect(route('manufacterers.index'));
    }

    public function edit(Manufacterer $manufacterer) {
        return view('admin.manufacterers.edit', compact('manufacterer'));
    }


    public function update(Request $request, Manufacterer $manufacterer)
    {
        $manufacterer->update([
            'name' => $request->name,
            'phone' => $request->phone
        ]);

        return redirect(route('manufacterers.index'));
    }

    public function delete(Manufacterer $manufacterer) {
        $manufacterer->delete();
        return redirect(route('manufacterers.index'));
    }
}
