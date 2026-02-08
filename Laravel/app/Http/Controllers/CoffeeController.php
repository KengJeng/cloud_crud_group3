<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Coffee::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:255',
            'image_path' => 'nullable|string|max:255',
            'is_available' => 'boolean',
        ]);

        $coffee = Coffee::create($validatedData);

        return response()->json($coffee, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coffee = Coffee::find($id);

        if (!$coffee) {
            return response()->json(['message' => 'Coffee not found'], 404);
        }

        return response()->json($coffee);
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
        $coffee = Coffee::find($id);

        if (!$coffee) {
            return response()->json(['message' => 'Coffee not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
            'category' => 'nullable|string|max:255',
            'image_path' => 'nullable|string|max:255',
            'is_available' => 'boolean',
        ]);

        $coffee->update($validatedData);

        return response()->json($coffee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coffee = Coffee::find($id);

        if (!$coffee) {
            return response()->json(['message' => 'Coffee not found'], 404);
        }

        $coffee->delete();

        return response()->json(['message' => 'Coffee deleted successfully']);
    }
}
