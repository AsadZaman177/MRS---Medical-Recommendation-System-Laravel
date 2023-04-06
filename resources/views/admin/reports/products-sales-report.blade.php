@extends('admin.layouts.master')

@section('title', 'Product Sales Report')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sales Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product Sales Report</li>
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
                            <h3 class="card-title mr-auto p-2"><i class="fas fa-edit"></i> Product Sales Report</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="medicines_type" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Total Quantity Sold</th>
                                            <th>Total Revenue (Rs)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product_sales as $sale)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sale->medicine_name }}</td>
                                                <td>{{ $sale->total_quantity_sold }}</td>
                                                <td>{{ $sale->total_revenue }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-center">
                                            <td colspan="3"><strong>Over All Total:</strong></td>
                                            <td>Rs. {{ $overallTotal }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
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
            $('#medicines_type').DataTable();
        });
    </script>
@endsection
