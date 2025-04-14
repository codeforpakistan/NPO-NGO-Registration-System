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
            <h4 class="page-title font-weight-bold">Financial Details Form</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color"></a>Home</li>
                <li class="breadcrumb-item active" aria-current="page">Financial Details</li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('financial-detail.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ session('id') }}">
     
                        <!-- Checkbox for Yes/No -->
                        <div class="form-group col-lg-12">
                            <label class="form-label font-weight-bold">Do you want to provide all details? <span style="color:red;">*</span></label>
                            <div>
                                <input type="radio" name="details_option" checked id="details_yes" value="yes" onchange="toggleForm('yes')" required>
                                <label for="details_yes">Yes</label>
                                
                                <input type="radio" name="details_option" id="details_no" value="no" onchange="toggleForm('no')">
                                <label for="details_no">No</label>
                            </div>
                        </div>
                    





                        
                        <!-- Agency Name (Always Visible) -->
                        <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold" for="basic_info_id">Select Agency <span style="color:red;">*</span></label>
                            <select name="basic_info_id" id="basic_info_id" class="form-control" required>
                                <option value="">Choose Name Agency</option>
                                @foreach($info as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <!-- Form Section (Hidden when No is selected) -->
                        <div id="full-form">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="form-label font-weight-bold" for="bank_id">Select Bank</label>
                                    <select name="bank_id" id="bank_id" class="form-control">
                                        <option value="">Choose Bank</option>
                                        @foreach($bank as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="form-label font-weight-bold">Bank Branch Name</label>
                                    <input class="form-control" type="text" name="branch_name">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-label font-weight-bold">Bank Branch Code</label>
                                    <input class="form-control" type="text" name="branch_code">
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="form-label font-weight-bold">Income & Expenditure Statement <span style="color:red;">*</span></label>
                                    <input class="form-control" type="file" name="income_expenditure_file">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-label font-weight-bold" for="prop_finan_id">Select Financing Method</label>
                                    <select name="prop_finan_id" id="prop_finan_id" class="form-control">
                                        <option value="">Choose Financing Method</option>
                                        @foreach($proposed as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Last File Section -->
                        <div id="last-file-section" style="display: none;">
                            <div class="form-group col-lg-12">
                                <label class="form-label font-weight-bold">Income & Expenditure Statement <span style="color:red;">*</span></label>
                                <input class="form-control" type="file" name="income_expenditure_file1">
                            </div>
                        </div>
                    
                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    
                    <script>
                        function toggleForm(option) {
                            if (option === 'no') {
                                document.getElementById('full-form').style.display = 'none';
                                document.getElementById('last-file-section').style.display = 'block';
                            } else if (option === 'yes') {
                                document.getElementById('full-form').style.display = 'block';
                                document.getElementById('last-file-section').style.display = 'none';
                            }
                        }
                    </script>
                    

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card export-database">
                    <div class="card-header">
                        <h4>Financial Details List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
							<table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Bank Branch Name</th>
                                        <th>Bank  Name</th>
                                        <th>Bank Branch Code</th>
										<th>Income & Expenditure</th>
                                        <th>Finance Method</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                
                                    <tbody>
                                        @foreach($financial as $financial)
                                        <tr>
                                            <td>{{ $financial->id }}</td>
                                      
                                        <td>{{ $financial->bank ? $financial->bank->name : 'N/A' }}</td>
                                      
                                 
                                            <td>{{ $financial->branch_name }}</td>
                                            <td>{{ $financial->branch_code}}</td>
                                            <td>
                                                @if($financial->income_expenditure_file)
                                                    <a href="{{ asset('storage/' . $financial->income_expenditure_file) }}" target="_blank" rel="noopener noreferrer">View File</a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $financial->proposedFinance ? $financial->proposedFinance->name : 'N/A' }}</td>

                                            <td>
                                                <button class="btn btn-sm btn-primary" type="submit">
                                                    <i class="fa fa-trash">&nbsp; Delete</i>
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
        </div>
    </section>
</div>


              
 @endsection
 