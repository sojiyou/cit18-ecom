<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderManager extends Controller
{
    function showCheckout()
    {
        return view('checkout');
    }

    function checkoutPost(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'pincode' => 'required',
            'phone' => 'required',
        ]);

        $cartItems = DB::table('cart')
            ->join(
                'products',
                'cart.product_id',
                '=',
                'products.id'
            )
            ->select(
                'cart.product_id',
                DB::raw('count(*) as quantity'),
                'products.price'
            )
            ->where('cart.user_id', Auth::user()->id)
            ->groupBy(
                'cart.product_id',
                'products.price'
            )
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect(route('cart.show'))->with('error', 'Cart is empty');
        }

        $productIds = [];
        $quantities = [];
        $totalPrice = 0;

        foreach ($cartItems as $item) {
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
        if ($order->save()) {
            return redirect(route('payment.show'))->with('success', 'Order Added Successfully');
        }
        return redirect(route('cart.show'))->with('error', 'Error while processing order');
    }

    public function orderHistory()
    {
        // Fetch orders for the authenticated user with pagination
        $orders = DB::table('orders')
            ->where('user_id', Auth::user()->id)
            ->paginate(5);
    
        $ordersWithItems = [];
    
        foreach ($orders as $order) {
            // Decode the JSON arrays of product IDs and quantities
            $productIds = json_decode($order->product_id);
            $quantities = json_decode($order->quantity); // Decode the quantity array
    
            // Fetch the associated product details for each product_id in the array
            $products = DB::table('products')
                ->whereIn('id', $productIds) // Fetch products whose IDs are in the array
                ->select('title', 'price') // Fetch the title and price of the products
                ->get(); // Get all matching products
    
            // Append the order details with products and quantities to the array
            $ordersWithItems[] = [
                'order' => $order,
                'products' => $products,
                'quantities' => $quantities, // Pass quantities as well
                'total_price' => $order->total_price
            ];
        }
    
        // Pass both orders and ordersWithItems to the view
        return view('history', compact('ordersWithItems', 'orders'));
    }
    

    function confirmPayment()
    {

        $cartItems = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->select(
                'cart.product_id',
                DB::raw('count(*) as quantity'),
                'products.title',
                'products.price'
            )
            ->where('cart.user_id', Auth::user()->id)
            ->groupBy(
                'cart.product_id',
                'products.title',
                'products.price'
            )
            ->get();

        $total = $total = Orders::latest()->first();

        return view('payment', compact('cartItems', 'total'));
    }
    public function paymentPost(Request $request)
    {

        DB::table('cart')->where('user_id', Auth::user()->id)->delete();
        // Step 1: Validate form data
        $request->validate([
            'email' => 'required|email',
            'card_number' => 'required',
            'expiry' => 'required',
            'cvc' => 'required',
            'card_name' => 'required',
            'country' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required',
        ]);

        Card::create([
            'email'       => $request->email,
            'card_number' => $request->card_number,
            'expiry'      => $request->expiry,
            'cvc'         => $request->cvc,
            'card_name'   => $request->card_name,
            'country'     => $request->country,
            'address'     => $request->address,
            'city'        => $request->city,
            'zip'         => $request->zip,
        ]);

        return redirect()->route('home')->with('success', 'Order placed successfully');
    }
}
