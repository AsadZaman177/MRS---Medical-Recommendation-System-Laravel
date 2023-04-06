@extends('user.layouts.master')

@section('title', 'All Orders')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Orders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">All Orders</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header align-content-center d-flex">
                            <h3 class="card-title mr-auto p-2"><i class="fas fa-edit"></i> All Orders</h3>
                        </div>
                        <div class="card-body">
                            <table id="medicines_type" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Order Number</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Total</th>
                                        <th>Order Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>
                                                @if ($order->payment_status == 'unpaid')
                                                    <span class="badge badge-danger badge-pill">{{ $order->payment_status}}</span>
                                                @else
                                                    <span class="badge badge-success badge-pill">{{ $order->payment_status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $order->total }}</td>
                                            <td>
                                                @if ($order->status == 'processing')
                                                    <span class="badge badge-primary badge-pill">{{ $order->status }}</span>
                                                @elseif ($order->status == 'on hold')
                                                    <span class="badge badge-danger badge-pill">{{ $order->status }}</span>
                                                @elseif ($order->status == 'delivered')
                                                    <span class="badge badge-warning badge-pill">{{ $order->status }}</span>
                                                @else
                                                    <span class="badge badge-success badge-pill">{{ $order->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>
                                                <a class="dropdown-item" href="{{ url('user/orders/view/'. $order->id )}}"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('javscript')
    <script>
        $(document).ready(function(){
            $('#medicines_type').DataTable();
        });
    </script>
@endsection
