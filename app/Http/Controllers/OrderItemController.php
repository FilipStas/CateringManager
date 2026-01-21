<?php

namespace App\Http\Controllers;

use App\Enums\FoodType;
use App\Enums\QuantityUnit;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class OrderItemController extends Controller
{

    public function store(Request $request, Order $order)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'unit' => ['required', new Enum(QuantityUnit::class)],
        ]);

        $order->items()->create($validated);

        return redirect()->route('orders.edit', $order->id);
    }

    public function destroy(Order $order, OrderItem $item)
    {
        if ($item->order_id !== $order->id) {
            abort(404);
        }

        $item->delete();

        return redirect()
            ->route('orders.edit', $order->id)
            ->with('success_item', 'Položka zmazaná.');
    }

    public function edit(Order $order)
    {
        $order->load('items');
        $foodType = FoodType::cases();
        $foodsByType = Food::all()->groupBy(fn ($food) => $food->food_type->value);
        $units = QuantityUnit::cases();

        return view('order.items', compact('order', 'foodType', 'foodsByType', 'units'));
    }

}
