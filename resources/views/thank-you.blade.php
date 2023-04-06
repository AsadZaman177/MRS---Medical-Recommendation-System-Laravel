@extends('layouts.app')

@section('title','Thank You')

@section('css')
    
@endsection

@section('content')


<div class="ltn__about-us-area pt-25 pb-120 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="section-title">Thank For Your Order.</h1>
                <p>please check you email or visit your account to track your order.</p>
                <div class="btn-wrapper animated">
                    <a href="{{ url('/') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">Home</a>
                    <a href="{{ url('/dashboard') }}" class="theme-btn-2 btn btn-effect-1 text-uppercase">Go To My Account</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection