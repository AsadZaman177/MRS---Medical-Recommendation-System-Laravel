<?php

namespace App\Http\Controllers\User;

use App\Checkout;
use App\Http\Controllers\Controller;
use App\User;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //Dashboard page
    public function index()
    {
        $user = Auth::user();
        $total_orders = Checkout::where('user_id',$user->id)->count();
        $processing = Checkout::where('user_id',$user->id)->where('status','processing')->count(); 
        $delivered = Checkout::where('user_id',$user->id)->where('status','delivered')->count(); 
        $onhold = Checkout::where('user_id',$user->id)->where('status','on hold')->count(); 
        $completed = Checkout::where('user_id',$user->id)->where('status','completed')->count(); 
        
        return view('user.dashboard',compact('total_orders','processing','delivered','onhold','completed'));
    }

    //Dashboard page
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile',compact('user'));
    }

    //Update Profile
    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$request->user_id,
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $user = User::find($request->user_id);

        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
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
        
        return back()->with('message','Updated Succesfully!');
    }

    // Orders
    public function orders(){
        $user = Auth::user();

        $orders = Checkout::where('user_id',$user->id)->get()->sortByDesc('created_at');

        return view('user.orders.index',compact('orders'));
    }

    // View Order
    public function viewOrder($id){
       
        $order = Checkout::find($id);

        return view('user.orders.view',compact('order'));
    }

    // processing Orders
    public function processingOrders(){
        $user = Auth::user();

        $orders = Checkout::where('user_id',$user->id)->where('status','processing')->get()->sortByDesc('created_at');

        return view('user.orders.processing',compact('orders'));
    }

    // processing Orders
    public function deliveredOrders(){
        $user = Auth::user();

        $orders = Checkout::where('user_id',$user->id)->where('status','delivered')->get()->sortByDesc('created_at');

        return view('user.orders.delivered',compact('orders'));
    }

    // OnHold Orders
    public function onholdOrders(){
        $user = Auth::user();

        $orders = Checkout::where('user_id',$user->id)->where('status','on hold')->get()->sortByDesc('created_at');

        return view('user.orders.onhold',compact('orders'));
    }

    // Completed Orders
    public function completedOrders(){
        $user = Auth::user();

        $orders = Checkout::where('user_id',$user->id)->where('status','completed')->get()->sortByDesc('created_at');

        return view('user.orders.completed',compact('orders'));
    }
}
