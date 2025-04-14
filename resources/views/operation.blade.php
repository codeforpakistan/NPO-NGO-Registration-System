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
            <h4 class="page-title font-weight-bold">Operation Form</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color"></a>Home</li>
                <li class="breadcrumb-item active" aria-current="page">Operation</li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-body">
<form class="form-horizontal" action="{{ route('addoperation.add') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ session('id') }}">

    <div class="row">
        <div class="form-group col-lg-6">
            <label class="form-label font-weight-bold" for="id">Select Operation Area <span style="color:red;">*</span></label>
            <select name="area_of_operation_id" id="area_of_operation_id" class="form-control" required>
                <option class="form-label font-weight-bold" value="">Choose Operation Area</option>
                @foreach($area as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
          
        </div>
        <div class="form-group col-lg-6">
            <label class="form-label font-weight-bold" for="id">Select Agency <span style="color:red;">*</span></label>
            <select name="basic_info_id" id="basic_info_id" class="form-control" required>
                @foreach($info as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- File Uploads -->
    <div class="row">
        <div class="form-group col-lg-6">
            <label class="form-label font-weight-bold">Future Plan <span style="color:red;">*</span></label>
            <input class="form-control" type="file" name="future_plan_file" required>
        </div>
        <div class="form-group col-lg-6">
            <label class="form-label font-weight-bold">Plan Of Operation <span style="color:red;">*</span></label>
            <input class="form-control" type="file" name="plan_operation_file" required>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-6">
            <label class="form-label font-weight-bold">Progress Report of Previous Activities <span style="color:red;">*</span></label>
            <input class="form-control" type="file" name="progress_report_file" required>
        </div>
        <div class="form-group col-lg-6">
            <label class="form-label font-weight-bold">1st Meeting Minutes <span style="color:red;">*</span></label>
            <input class="form-control" type="file" name="first_meeting_file" required>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-6">
            <label class="form-label font-weight-bold">Last Meeting Minutes <span style="color:red;">*</span></label>
            <input class="form-control" type="file" name="last_meeting_file" required>
        </div>
      
    </div>
   
    <!-- Submit Button -->
    <div class="row">
        <div class="col-lg-12">
            <button type="submit" class="btn btn-primary">Submit</button>
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
                        <h4>Operation Details List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
							<table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Area Operation</th>
                                        <th>Future Planess</th>
										<th>Plan Of Operation</th>
                                        <th>Progress Report</th>
                                        <th>1st meeting minutes Report</th>
                                        <th>Last meeting minutes Report</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($operations as $operation)
                                    <tr>
                                        <td>{{ $operation->id }}</td>
                                  
                                        <td>{{ optional($operation->areaOfOperation)->name ?? 'N/A' }}</td>

                                  
                                
                                        <td>
                                            @if($operation->future_plan_file)
                                                <a href="{{ asset('storage/' . $operation->future_plan_file) }}" target="_blank">View File</a>
                                            @else
                                                No file
                                            @endif
                                        </td>
                                       

                                        <td>
                                            @if($operation->plan_operation_file)
                                                <a href="{{ asset('storage/' . $operation->plan_operation_file) }}" target="_blank">View File</a>
                                            @else
                                                No file
                                            @endif
                                        </td>
                                        <td>
                                            @if($operation->progress_report_file)
                                                <a href="{{ asset('storage/' . $operation->progress_report_file) }}" target="_blank">View File</a>
                                            @else
                                                No file
                                            @endif
                                        </td>
                                    
                                        <td>
                                            @if($operation->first_meeting_file)
                                                <a href="{{ asset('storage/' . $operation->first_meeting_file) }}" target="_blank">View File</a>
                                            @else
                                                No file
                                            @endif
                                        </td>
                                    
                                        <td>
                                            @if($operation->last_meeting_file)
                                                <a href="{{ asset('storage/' . $operation->last_meeting_file) }}" target="_blank">View File</a>
                                            @else
                                                No file
                                            @endif
                                        </td>
                                    
                               
                                   
                                        <td>
                                            <button class="btn btn-sm btn-primary" type="submit">
                                                <i class="fa fa-trash">&nbsp;Delete</i>
                                            </button>
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
 