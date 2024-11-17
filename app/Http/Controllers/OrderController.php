<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;      // Make sure you have an Order model
use App\Models\Menu;       // Menu model for accessing menu items

class OrderController extends Controller
{
    /**
     * Store a new order.
     */
    public function store(Request $request, $id)
    {
        // Retrieve the menu item using the ID
        $menu = Menu::findOrFail($id);

        // Create a new order (or however you want to store it)
        $order = new Order();
        $order->menu_id = $menu->id;
        $order->user_id = auth()->id();  // assuming the user is logged in
        $order->quantity = 1;            // or retrieve quantity from $request
        $order->total_price = $menu->price;
        
        // Save the order to the database
        $order->save();

        // Redirect with a success message
        return redirect()->back()->with('success', 'Order placed successfully!');
    }
}
