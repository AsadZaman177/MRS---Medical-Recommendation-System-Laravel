<?php

namespace App\Http\Controllers;

use App\Checkout;
use App\CheckoutDetail;
use App\Medicine;
use App\User;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Index Page
    public function index(){

        $cart = session()->get('cart');

        if(!$cart) { 
            return redirect()->route('home');
        }

        return view('checkout');
    }

    // public function store
    public function store(Request $request){
        $user = Auth::user();

        $request->validate([ 
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'phone' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
            'paymentMethod' => 'required',
        ]);

        $user = User::findOrFail($user->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        if ($user->userDetail) {
            $userDetail = $user->userDetail;
        } else {
            $userDetail = new UserDetail();
        }

        $userDetail->phone = $request->phone;
        $userDetail->country = $request->country;
        $userDetail->state = $request->state;
        $userDetail->city = $request->city;
        $userDetail->zip_code = $request->zip_code;
        $userDetail->address = $request->address;
        $user->userDetail()->save($userDetail);

        

        $prefix = 'Ord-';
        $uniqueId = random_int(00001, 10000); // Generate a unique order number

        $orderNumber = $prefix . $uniqueId;
        
        // Create a new instance of Checkout and populate its fields
        $checkout = new Checkout();
        $checkout->order_number = $orderNumber; 
        $checkout->user_id = $user->id;
        $checkout->total = 0; // Initialize the cart total to zero
        $checkout->status ='processing';
        $checkout->payment_method = $request->paymentMethod;
        $checkout->payment_status = 'unpaid'; 
        $checkout->notes = $request->notes; 
        $checkout->save();

        // Loop through the cart items and create a new CheckDetail for each one
        foreach ((array) session('cart') as $id => $details) {
            $checkoutDetails = new CheckoutDetail();
            $checkoutDetails->checkout_id = $checkout->id; // Set the checkout ID
            $checkoutDetails->medicine_id = $id; // Set the medicine ID
            $checkoutDetails->medicine_name = $details['name']; // Set the medicine name
            $checkoutDetails->price = $details['price']; // Set the price
            $checkoutDetails->quantity = $details['quantity']; // Set the quantity
            $checkoutDetails->sub_total = $details['price'] * $details['quantity']; // Calculate the sub total

            // Add the sub total to the checkout total
            $checkout->total += $checkoutDetails->sub_total;

            $checkoutDetails->save();

            // Decrement Stock In Medicines
            $medicine = Medicine::find($id);
            $medicine->remaining_stock = ((int)$medicine->stock - (int)$details['quantity']);
            $medicine->save();
        }

        // Save the Checkout instance
        $checkout->save();

        // Empty Cart
        session()->forget('cart');

        return view('thank-you');


    }
}
