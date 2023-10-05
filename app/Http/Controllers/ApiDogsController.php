<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\Request;

class ApiDogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Dog::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Dog::create($request->only(['name', 'breed']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Dog::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dog = Dog::findOrFail($id);
        $dog->update($request->only(['name', 'breed']));
        return $dog;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Dog::finddOrFail($id)->delete();
    }
}
