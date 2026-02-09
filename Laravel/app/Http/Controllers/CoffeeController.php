<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;
use Illuminate\Support\Facades\File;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coffees = Coffee::all();
        return view('coffees.index', compact('coffees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ADDED: show the create form page
        return view('coffees.create');
    }

  
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_available' => 'boolean',
        ]);

        $validatedData['is_available'] = $request->has('is_available');

        if ($request->hasFile('image')) {
            $file = $request->file('image');

     
            $filename = time() . '_' . $file->getClientOriginalName();

      
            $destinationPath = public_path('storage/coffees');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

       
            $file->move($destinationPath, $filename);

            
            $validatedData['image_path'] = 'storage/coffees/' . $filename;
        }

        unset($validatedData['image']);

        $coffee = Coffee::create($validatedData);

    
        if ($request->wantsJson()) {
            return response()->json($coffee, 201);
        }

        return redirect()
            ->route('coffees.index')
            ->with('success', 'Coffee created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coffee = Coffee::find($id);

        if (!$coffee) {
            return redirect()->route('coffees.index')->with('error', 'Coffee not found');
        }

        return view('coffees.show', compact('coffee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coffee = Coffee::find($id);

        if (!$coffee) {
            return redirect()->route('coffees.index')->with('error', 'Coffee not found');
        }

        return view('coffees.edit', compact('coffee'));
    }

    
    public function update(Request $request, string $id)
    {
        $coffee = Coffee::find($id);

        if (!$coffee) {
            if ($request->wantsJson()) {
                return response()->json(['message' => 'Coffee not found'], 404);
            }
            return redirect()->route('coffees.index')->with('error', 'Coffee not found');
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
            'category' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_available' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
      
            if ($coffee->image_path && File::exists(public_path($coffee->image_path))) {
                File::delete(public_path($coffee->image_path));
            }

          
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();

         
            $destinationPath = public_path('storage/coffees');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            $validatedData['image_path'] = 'storage/coffees/' . $filename;
        }

        unset($validatedData['image']);

        $coffee->update($validatedData);

        if ($request->wantsJson()) {
            return response()->json($coffee);
        }

        return redirect()
            ->route('coffees.index')
            ->with('success', 'Coffee updated successfully!');
    }

    
    public function destroy(string $id)
    {
        $coffee = Coffee::find($id);

        if (!$coffee) {
            return response()->json(['message' => 'Coffee not found'], 404);
        }

 
        if ($coffee->image_path && File::exists(public_path($coffee->image_path))) {
            File::delete(public_path($coffee->image_path));
        }

        $coffee->delete();

        return response()->json(['message' => 'Coffee deleted successfully']);
    }
}
