<?php

namespace App\Http\Controllers;

use App\Enums\FoodType;
use App\Enums\QuantityUnit;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grouped = Order::query()
            ->select('id', 'name', 'event_date', 'event_time', 'people_count')
            ->orderBy('event_date')
            ->orderBy('event_time')
            ->get()
            ->groupBy('event_date');

        $days = $grouped->map(function ($dayOrders, $date) {
            return [
                'date_key' => $date, // napr. 2026-01-21 (ak by si chcel)
                'date_label' => Carbon::parse($date)->format('d.m.Y'),
                'count' => $dayOrders->count(),
                'orders' => $dayOrders->values(),
            ];
        })->values();

        return view('order.index', compact('days'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'phone' => 'required|string|max:20|regex:/^\+?[0-9]{7,15}$/',
            'location' => 'nullable|string|max:255',
            'event_date' => 'required|date',
            'event_time' => ['required','regex:/^(?:[01]\d|2[0-3]):[0-5]\d$/'],
            'people_count' => 'required|integer|min:1',
            'pickup' => 'sometimes|boolean',
        ]);

        $validated['pickup'] = $request->has('pickup') ? 1 : 0;

        $order = Order::create([
            'name' => $validated['name'],
            'contact_name' => $validated['contact_name'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'],
            'location' => $validated['location'] ?? null,
            'event_date' => $validated['event_date'],
            'event_time' => $validated['event_time'],
            'people_count' => $validated['people_count'],
            'pickup' => $validated['pickup'],
        ]);

        return redirect()->route('orders.items.edit', $order->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('order.edit', compact('order'));

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'phone' => 'required|string|max:20|regex:/^\+?[0-9]{7,15}$/',
            'location' => 'nullable|string|max:255',
            'event_date' => 'required|date',
            'event_time' => ['required','regex:/^(?:[01]\d|2[0-3]):[0-5]\d$/'],
            'people_count' => 'required|integer|min:1',
            'pickup' => 'sometimes|boolean',
        ]);

        $validated['pickup'] = $request->has('pickup') ? 1 : 0;

        $order->update([
            'name' => $validated['name'],
            'contact_name' => $validated['contact_name'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'],
            'location' => $validated['location'] ?? null,
            'event_date' => $validated['event_date'],
            'event_time' => $validated['event_time'],
            'people_count' => $validated['people_count'],
            'pickup' => $validated['pickup'],
        ]);
        return redirect()->route('orders.edit', $order->id);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->route('orders.index');
    }
}
