<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Lookup;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        return view('orders.list');
    }

    public function create()
    {
        // Get User
        $user = User::findOrFail(auth()->id());

        if(empty($user->delivery_address))
        {
            return redirect('/home')->with('status', 'Please complete your profile before placing an order');
        }else{
            // Create Order Number
            $order_number = Lookup::where('name', 'orders')->first();
            $on=$order_number->value;
            $order_number->value = $order_number->value+1;
            $order_number->save();
            // Create Order
            $order = Order::create([
                'order_number'=>$on,
                'user_id' => auth()->id(),
                'delivery_address'=>$user->delivery_address,
                'total_items'=>0,
                'total_excl'=>null,
                'total_delivery'=>null,
                'total_vat'=>null,
                'total_due'=>null,
                'status'=>1
            ]);
            return redirect()->route('orders.edit', ['id'=>$order->id]);
        }
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        if($order->user_id != auth()->id())
        {
            return redirect()->route('orders.list');
        }
        return view('orders.edit', ['id'=>$order->id]);
    }
}
