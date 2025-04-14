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
            <h4 class="page-title font-weight-bold">Founding Member Form</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color"></a>Home</li>
                <li class="breadcrumb-item active" aria-current="page">Founding Member</li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('add.founding') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                   
                    <input type="hidden" name="user_id" value="{{ session('id') }}">


                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold" for="id">Select Agency <span style="color:red;">*</span></label>
                            <select name="basic_info_id" id="basic_info_id" class="form-control" required>
                                @foreach($info as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold">Select Membership Type <span style="color:red;">*</span></label>
                            <select name="member_type_id" class="form-control" required>
                             
                                @foreach($membershipTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>



                    <!-- First Row (Name and CNIC) -->
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold">Name <span style="color:red;">*</span></label>
                            <input class="form-control" type="text"
                                name="name" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold">Occupation <span style="color:red;">*</span></label>
                            <input class="form-control" type="text"
                                name="occupation" required>
                        </div>
                        
                    </div>


                 

                  
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold">Upload CNIC<span style="color:red;">*</span></label>
                            <input class="form-control" type="file"
                                name="cnic" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold">Address <span style="color:red;">*</span></label>
                            <input class="form-control" type="text"
                                name="address" required>
                        </div>

                    </div>
                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-12">
                            <button type="submit"
                                class="btn btn-primary">Submit</button>
                        </div>

                    </div>

                </form>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card export-database">
                    <div class="card-header">
                        <h4>Founding Member List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
							<table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Occupation</th>
										<th>Address</th>
                                        <th>CNIC</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                @foreach($getfounding as $detail)
                                <tr>
                                    <td>{{ $detail->id }}</td>
                                    <td>{{ $detail->name }}</td>
                                    <td>{{ $detail->occupation }}</td>
                                    <td>{{ $detail->address }}</td>
                                  
                                    <td>
                                        @if($detail->cnic)
                                            <a href="{{ asset('storage/' . $detail->cnic) }}" target="_blank">View CNIC</a>
                                        @else
                                            No CNIC
                                        @endif
                                    </td>
                                    <td>
                                   
                                <form
                                action=""
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this irrigator?');"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-primary"
                                    type="submit">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                            <a href="" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i> Edit</a> 
                            </td>
                                </tr>
                            @endforeach
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div
    </section>
</div>


              
 @endsection
 