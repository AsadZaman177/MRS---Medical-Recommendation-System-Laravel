<?php

namespace App\Http\Controllers;

use App\Medicine;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //Cart Page
    public function index(){
        return view('cart');
    }

    // Add To Cart
    public function addToCart($id){

        $medicine = Medicine::find($id);

        if(!$medicine) {
            abort(404);
        }

        if($medicine->sale_price){
            $price = $medicine->sale_price;
        }
        else{
            $price = $medicine->price;
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $id => [
                    "name" => $medicine->name,
                    "quantity" => 1,
                    "price" => $price,
                    "image" => $medicine->image1
                ]
            ];

            session()->put('cart', $cart);

            $htmlCart = view('layouts.header_cart')->render();

            return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart]);

        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            $htmlCart = view('layouts.header_cart')->render();

            return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart]);


        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $medicine->name,
            "quantity" => 1,
            "price" => $price,
            "image" => $medicine->image1
        ];

        session()->put('cart', $cart);

        $htmlCart = view('layouts.header_cart')->render();

        return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart]);

    }

    // Update Cart
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            $subTotal = $cart[$request->id]['quantity'] * $cart[$request->id]['price'];

            $total = $this->getCartTotal();

            $htmlCart = view('layouts.header_cart')->render();

            return response()->json(['msg' => 'Cart updated successfully', 'data' => $htmlCart, 'total' => $total, 'subTotal' => $subTotal]);

        }
    }

    // Delete From Cart
    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            $total = $this->getCartTotal();

            $htmlCart = view('layouts.header_cart')->render();

            return response()->json(['msg' => 'Product removed successfully', 'data' => $htmlCart, 'total' => $total]);

            //session()->flash('success', 'Product removed successfully');
        }
    }

    // calucalte total
    private function getCartTotal()
    {
        $total = 0;

        $cart = session()->get('cart');

        foreach($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return number_format($total, 2);
    }
}
