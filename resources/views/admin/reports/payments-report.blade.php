@extends('admin.layouts.master')

@section('title', 'Payments Report')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Payments Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Payments Report</li>
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
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    @foreach ($paymentMethods as $paymentMethod)
                                        <li class="nav-item">
                                            <a class="nav-link{{ $loop->first ? ' active' : '' }}" data-toggle="tab" href="#{{ $paymentMethod }}">
                                                {{ $paymentMethod }} ({{ $payments[$paymentMethod] }})
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </ul>
                        </div>
                        <div class="card-body">
                            
                            <div class="tab-content">
                                @foreach ($paymentMethods as $paymentMethod)
                                    <div class="tab-pane fade{{ $loop->first ? ' show active' : '' }}" id="{{ $paymentMethod }}">
                                        <table id="" class="table table-bordered table-striped table-sm medicines_type" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Order Number</th>
                                                    <th>Payment Method</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($paymentDetails[$paymentMethod] as $payment)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $payment->order_number }}</td>
                                                        <td>{{ $payment->payment_method }}</td>
                                                        <td>{{ $payment->total }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3"><strong>Total</strong></td>
                                                    <td>{{$payments[$paymentMethod] }}</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
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
            $('.medicines_type').DataTable();
        });
    </script>
@endsection
