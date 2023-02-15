@extends('admin.layouts.master')

@section('title', 'Medicines')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Medicines</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">All Medicines</li>
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
                            <h3 class="card-title mr-auto p-2"><i class="fas fa-edit"></i> All Medicines</h3>
                            <a href="{{ url('medicines/create') }}" type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="medicines" class="table table-sm table-bordered table-striped table-responsive">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>sku</th>
                                            <th>gender</th>
                                            <th>Age</th>
                                            <th>Dosage</th>
                                            <th>Body Part</th>
                                            <th>Symptoms</th>
                                            <th>Medicine Type</th>
                                            <th>Medicine Formulae</th>
                                            <th>Medicine Brand</th>
                                            <th>Medicine Category</th>
                                            <th>Medicine Company</th>
                                            <th>Price</th>
                                            <th>Sale Price</th>
                                            <th>Featured</th>
                                            <th>Stock</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($medicines as $medicine)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @php
                                                        $img = asset('images/medicines/'.$medicine->image1);
                                                    @endphp
                                                    <img src="{{ $img }}" style="height: 80px; width: 80px;">
                                                </td>
                                                <td>{{ $medicine->name }}</td>
                                                <td>{{ $medicine->sku }}</td>
                                                <td>{{ $medicine->gender }}</td>
                                                <td>{{ $medicine->age->age }}</td>
                                                <td>
                                                    @foreach ($medicine->dosages as $dosage )
                                                        <span class="badge badge-dark badge-pill">{{ $dosage->dosage }}</span>
                                                    @endforeach
                                                </td>
                                                <td>{{ $medicine->BodyPart->body_part }}</td>
                                                <td>
                                                    @foreach ($medicine->symptoms as $symptom )
                                                        <span class="badge badge-dark badge-pill">{{ $symptom->symptom }}</span>
                                                    @endforeach
                                                </td>
                                                <td>{{ $medicine->medicine_type->type }}</td>
                                                <td>{{ $medicine->medicine_formulae->formulae }}</td>
                                                <td>{{ $medicine->medicine_brand->brand }}</td>
                                                <td>{{ $medicine->medicine_category->category }}</td>
                                                <td>{{ $medicine->medicine_company->company }}</td>
                                                <td>{{ $medicine->price }}</td>
                                                <td>{{ $medicine->sale_price }}</td>
                                                <td>
                                                    @if ($medicine->is_featured == '1' )
                                                        <span class="badge badge-success badge-pill">Yes</span>
                                                    @else
                                                    <span class="badge badge-danger badge-pill">No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($medicine->stock == '0' )
                                                        <span class="badge badge-danger badge-pill">Out Of Stock</span>
                                                    @else
                                                    <span class="badge badge-success badge-pill">{{ $medicine->stock }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $medicine->updated_at }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info btn-sm">Action</button>
                                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" href="{{ url('medicines/edit/'.$medicine->id) }}">Edit</a>
                                                        <a class="dropdown-item" href="{{ url('medicines/delete/'.$medicine->id) }}">Delete</a>
                                                        </div>
                                                    </div>
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
            // $('#medicines').DataTable();
            $('#medicines').DataTable({
                "autoWidth": true,
                "responsive": true,
                "scrollX": true,
                "columnDefs": [
                    { className: "dt-nowrap", "targets": [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,,14,15,16,17,18,19,20 ] }
                ],
            });
        });
    </script>
@endsection
