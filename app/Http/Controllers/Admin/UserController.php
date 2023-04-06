<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Index Page
    public function index(){
        $users = User::all();

        return view('admin.users.index',compact('users'));
    }

    // Create New User 
    public function create(){
        return view('admin.users.create');
    }

    // store
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);

        $is_admin = $request->is_admin == 'on' ? '1' : '0';
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $is_admin,
        ]);

        if($user){
            $userDetail = new UserDetail();
            $userDetail->phone = $request->phone;
            $userDetail->country = $request->country;
            $userDetail->state = $request->state;
            $userDetail->city = $request->city;
            $userDetail->zip_code = $request->zip_code;
            $userDetail->address = $request->address;

            $user->userDetail()->save($userDetail);

            return redirect('/users')->with('message','User Added Succesfully!');
        }
        else{
            return redirect('/users')->with('error','Something Went Wrong!');
        }
    }

    // Edit
    public function edit($id){
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$request->user_id,
        ]);

        $is_admin = $request->is_admin == 'on' ? '1' : '0';

        $user = User::find($request->user_id);

        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->is_admin = $is_admin;
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
        
        return redirect('/users')->with('message','User Updated Succesfully!');
    }

    // Delete 
    public function delete($id){
        $user = User::find($id);
        if($user){
            $user->delete();
            return back()->with('message','Deleted Successfully!');
        }
        else{
            return back()->with('error','Something went wrong,try again!');
        }
    }

}
