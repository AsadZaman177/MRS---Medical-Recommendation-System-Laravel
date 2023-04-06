@extends('user.layouts.master')

@section('title', 'Edit Medicine Type')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Order Details</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->checkoutDetails as $details)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('images/medicines/'.$details->medicine->image1 ) }}" height="80px" width="80px">
                                            </td>
                                            <td>
                                                {{ $details->medicine_name }}
                                            </td>
                                            <td>Rs {{ $details->price }}</td>
                                            <td>
                                                {{ $details->quantity }}
                                            </td>
                                            <td>Rs {{ $details->sub_total }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Total:</strong></td>
                                        <td><strong>Rs. {{ $order->total }}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-3">
                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Order # {{ $order->order_number }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-user mr-1"></i> Customer</strong>
                            <p class="text-primary">
                                {{ $order->user->name }} <br>
                                {{ $order->user->email }} <br>
                                {{ $order->user->userDetail->phone }} 
                            </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Shipping Address</strong>
                            <p class="text-primary">
                                {{ $order->user->userDetail->address }}, {{ $order->user->userDetail->zip_code }}, {{ $order->user->userDetail->country }}, {{ $order->user->userDetail->state }}, {{ $order->user->userDetail->city }}
                            </p>
                            <hr>
                            <strong><i class="fas fa-money-bill mr-1"></i> Payment Method</strong>
                            <p class="text-primary">{{ $order->payment_method }}</p>
                            <hr>

                            <strong><i class="fas fa-shopping-cart mr-1"></i>Order Status</strong>
                            <p class="text-primary">{{ $order->status }}</p>
                            <hr>

                            <strong><i class="fas fa-money-bill mr-1"></i>Payment Status</strong>
                            <p class="text-primary">{{ $order->payment_status }}</p>
                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i>Order Notes</strong>
                            <p class="text-muted">{{ $order->notes }}</p>
                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('javscript')

@endsection
