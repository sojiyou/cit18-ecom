<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderManager extends Controller
{
    function showCheckout (){
        return view('checkout');
    }

    function checkoutPost (Request $request) {
        $request->validate([
            'address' => 'required',
            'pincode' => 'required',
            'phone' => 'required',
        ]);

        $cartItems = DB::table('cart')
        ->join('products', 'cart.product_id',
        '=', 'products.id')
        ->select('cart.product_id', 
        DB::raw('count(*) as quantity'),
        'products.price')
        ->where('cart.user_id', Auth::user()->id)
        ->groupBy('cart.product_id', 
        'products.price')
        ->get();

        if($cartItems->isEmpty()) {
            return redirect(route('cart.show'))->with('error', 'Cart is empty');
        }

        $productIds = [];
        $quantities = [];
        $totalPrice = 0;

        foreach($cartItems as $item) {
            $productIds[] = $item->product_id;
            $quantities[] = $item->quantity;
            $totalPrice += $item->price * $item->quantity;
        }

        $order = new Orders();
        $order->user_id = Auth::user()->id;
        $order->address = $request->address;
        $order->pincode = $request->pincode;
        $order->phone = $request->phone;
        $order->product_id = json_encode($productIds);
        $order->total_price = $totalPrice;
        $order->quantity = json_encode($quantities);
        $order->status = 'pending';
        if($order->save()) {
            DB::table('cart')->where('user_id', Auth::user()->id)->delete();
            return redirect(route('cart.show'))->with('success', 'Order Added Successfully');
        }
        return redirect(route('cart.show'))->with('error', 'Error while processing order');
    }

    function orderHistory() {
        $history = Orders::paginate(10);

        return view('history', compact('history'));
    }

}
