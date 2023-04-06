<?php

namespace App\Http\Controllers;

use App\MedicineReview;
use Illuminate\Http\Request;

class MedicineReviewController extends Controller
{

    //Admin Index Page
    public function index(){
        $reviews = MedicineReview::all();
        return view('admin.reviews.index',compact('reviews'));
    }

    //store reviews
    public function store(Request $request){
        
        $request->validate([ 
            'comment' => 'required',
            'name' => 'required',
            'email' => 'required',
        ]);

        $review = MedicineReview::create([
            'medicine_id' => $request->medicine_id,
            'comment' => $request->comment,
            'name' => $request->name,
            'rating' => $request->rating ?? '0',
            'email' => $request->email,
        ]);

        if($review){
            return back()->with('message','Review Added Successfully!');
        }
        else{
            return back()->with('errror','Something Weng Wrong!');
        }
    }

    // Delete
    public function delete($id){
        $review = MedicineReview::find($id);
        
        if($review){
            $review->delete();
            return back()->with('message','Review Deleted Successfully!');
        }
        else{
            return back()->with('errror','Something Weng Wrong!');
        }
    }
}
