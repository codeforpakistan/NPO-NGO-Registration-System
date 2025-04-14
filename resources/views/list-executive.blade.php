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
            <h4 class="page-title font-weight-bold">Executive Member Details</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color"></a>Home</li>
                <li class="breadcrumb-item active" aria-current="page">Executive Members List</li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
          
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card export-database">
                    <div class="card-header">
                        <h4>Executive Members List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
							<table class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Father Name</th>
										<th>Address</th>
                                        <th>Contact</th>
                                        <th>Designation</th>
                                        <th>CV</th>
                                        <th>Police Verfication</th>
                                        <!--<th>CNIC</th> -->
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getexecutive as $detail)
                                    <tr>
                                        <td>{{ $detail->id }}</td>
                                        <td>{{ $detail->name }}</td>
                                        <td>{{ $detail->father_name }}</td>
                                        <td>{{ $detail->qualification }}</td>
                                        <td>{{ $detail->occupation }}</td>
                                        <td>{{ $detail->contact }}</td>
                                        <td>
                                            @if($detail->cv)
                                                <a href="{{ asset('storage/' . $detail->cv) }}" target="_blank">View File</a>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if($detail->police_verficaton)
                                                <a href="{{ asset('storage/' . $detail->police_verficaton) }}" target="_blank">View File</a>
                                            @else
                                            N/A
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
 