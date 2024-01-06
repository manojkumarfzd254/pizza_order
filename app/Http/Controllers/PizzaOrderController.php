<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Topping;
use App\Models\Order;
use Illuminate\Http\Request;

class PizzaOrderController extends Controller
{
    public function showOrderForm(Request $request)
    {
        $pizzas = Pizza::all();
        $toppings = Topping::all();

        return view('order', compact('pizzas', 'toppings'));
    }

    public function placeOrder(Request $request)
    {
        $validatedData = $request->validate([
            'pizza_type' => 'required|exists:pizzas,id',
            'pizza_size' => 'required|in:large,medium,small',
            'selected_toppings' => 'array'
        ]);

        $pizza = Pizza::find($validatedData['pizza_type']);
        $pizzaSize = $validatedData['pizza_size'];
        $selectedToppings = $validatedData['selected_toppings'] ?? [];

        $totalAmount = $pizza['price_' . $pizzaSize];

        foreach ($selectedToppings as $toppingId) {
            $topping = Topping::find($toppingId);
            $totalAmount += $topping['price_' . $pizzaSize];
        }

        $order = new Order();
        $order->pizza_id = $pizza->id;
        $order->pizza_size = $pizzaSize;
        $order->toppings = implode(',', $selectedToppings);
        $order->save();

        return view('order_summary', compact('order', 'totalAmount','pizza'));
    }
}

