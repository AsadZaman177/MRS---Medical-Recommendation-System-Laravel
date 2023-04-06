@extends('admin.layouts.master')

@section('title', 'All Reviews')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Medicine Types</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">All Reviews</li>
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
                            <h3 class="card-title mr-auto p-2"><i class="fas fa-edit"></i> All Reviews</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="medicines_type" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Medicine</th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Comment</th>
                                            <th>Rating</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $review->medicine->name }}</td>
                                                <td>{{ $review->name }}</td>
                                                <td>{{ $review->email }}</td>
                                                <td>{{ $review->comment }}</td>
                                                <td>
                                                    <ul style="list-style: none; display:flex">
                                                        @if($review->rating)
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $review->rating)
                                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                @else
                                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                @endif
                                                            @endfor
                                                        @else
                                                            <li>No Review</li>
                                                        @endif
                                                    </ul>
                                                </td>
                                                <td>{{ $review->created_at }}</td>
                                                <td>
                                                    <a class="btn btn-danger btn-sm" href="{{ url('reviews/delete/'. $review->id )}}">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
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
