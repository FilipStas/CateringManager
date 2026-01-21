<?php

namespace App\Http\Controllers;

use App\Enums\FoodType;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $foods = Food::all();
        $foodTypes = FoodType::cases();
        return view('order.create', compact('foods', 'foodTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'contact_name' => 'required|string|max:255',
            'email' => 'string|email|max:255',
            'name' => 'required|string|max:255',
            'phone' =>'required|string|max:20|regex:/^\+?[0-9]{7,15}$/',
            'location' => 'string|max:255',
            'event_time' => 'required|string|max:20',
            'event_date' => 'required|date',
        ]);
        $order = Order::create($validated);
        return redirect()->route('orders.index');
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
