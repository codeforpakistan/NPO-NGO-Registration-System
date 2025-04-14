@extends('layout')

@section('content')
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

    
    
<div class="app-content">
  
    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">Application List</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home<a href="#" class="text-light-color"></a></li>
                <li class="breadcrumb-item active" aria-current="page">Applications</li>
            </ol>
        </div>
        <!--page-header closed-->
        <div class="row">
            <div class="col-md-12">
                <div class="card export-database">
                    <div class="card-header">
                        <h4>Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Agency Name</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                       <!-- <th>Aim Objective</th>-->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    @foreach($records as $record)  
                                    <tr>
                                        <td class="text-center align-middle"><strong>{{ $record->id }}</strong></td>
                                        <td class="text-center align-middle">{{ $record->name }}</td>
                                        <td class="text-center align-middle">{{ $record->contact }}</td>
                                        <td class="text-center align-middle">{{ $record->address }}</td>
                            
                                       <!-- <td>
                                            @if($record->aims->isNotEmpty())
                                                @foreach($record->aims as $aim)
                                                <button class="btn btn-sm btn-primary mb-1">{{ $aim->name }}</button><br>
                                                @endforeach
                                            @else
                                                N/A
                                            @endif
                                        </td> -->
                            
                                        <td class="text-center align-middle">
                                            @if($record->status==3)
                                            <a href="{{ url('application/dd/view') }}/{{ $record->id }}"><button
                                                class="btn btn-primary"
                                                data-target="#user-form-modal" data-toggle="modal"
                                                type="button">View</button>
                                            </a>
                                            @else
                                            <strong>Forwarded</strong>
                                            @endif
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
 