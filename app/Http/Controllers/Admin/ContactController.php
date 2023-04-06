<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //Index Page
    public function index(){
        $contacts = Contact::all();

        return view('admin.contacts.index',compact('contacts'));
    }

    // Delete
    public function delete($id){
        $contact = Contact::find($id);
        if($contact){
            $contact->delete();
            return back()->with('message','Deleted Successfully!');
        }
        else{
            return back()->with('error','Something Went Wrong!');
        }
    }
}
