@extends('layout')
@section('content')
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<div class="app-content">
@if(session('success'))
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif
    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">Bank Form</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Bank</li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12" style="margin-top: 80px;">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="font-weight-bold">Add Bank</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ url('addbank/add') }}"
                    method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label font-weight-bold"> Bank Name </label>
                            <input class="form-control" type="text"
                                name="name" required>
                        </div>
                      

                    </div>


                 

                 
                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>

                </div>
            </div>
        </div>

            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card export-database">
                    <div class="card-header">
                        <h4>List of Banks</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
							<table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Bank Name</th>
                                        <th>Action</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($listofbanks as $index => $bank)
                                     <tr>
                                         <td>{{ $index + 1 }}</td>
                                         <td>{{ $bank->name }}</td>
                                         <td>
                                         <form action="{{ route('bank.delete', $bank->id) }}" method="POST">
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash">&nbsp;Delete</i></button>
                                         </form>
                                         </td>
                                     </tr>
                                 @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>


              
 @endsection
 