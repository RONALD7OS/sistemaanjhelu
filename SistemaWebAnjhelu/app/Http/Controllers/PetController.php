<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::with('owner')->get();
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        $owners = User::all();
        return view('pets.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'breed' => 'nullable',
            'birth_date' => 'nullable|date',
            'owner_id' => 'required|exists:users,id'
        ]);

        Pet::create($request->all());

        return redirect()->route('pets.index');
    }

    public function edit(Pet $pet)
    {
        $owners = User::all();
        return view('pets.edit', compact('pet', 'owners'));
    }

    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'breed' => 'nullable',
            'birth_date' => 'nullable|date',
            'owner_id' => 'required|exists:users,id'
        ]);

        $pet->update($request->all());

        return redirect()->route('pets.index');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('pets.index');
    }
}