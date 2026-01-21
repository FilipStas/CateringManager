<?php

namespace App\Http\Controllers;

use App\Enums\QuantityUnit;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Enums\FoodType;
use Illuminate\Validation\Rules\Enum;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Food::all();
        $foodTypes = FoodType::cases();
        $units = QuantityUnit::cases();
        return view('food.index', compact(['foods', 'foodTypes', 'units']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('foods.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'food_type' => ['required', new Enum(FoodType::class)],
            'unit' => ['required', new Enum(QuantityUnit::class)],
        ]);

        Food::create($validated);

        return redirect()->route('foods.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('foods.index');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('foods.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return redirect()->route('foods.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        $food = Food::findOrFail($id);
        $food->delete();

        return redirect()->route('foods.index');
    }
}
