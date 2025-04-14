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
            timer: 3000
        });
    </script>
@endif
@if(session('error'))
    <script>
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Error",
            text: "{{ session('error') }}",
            showConfirmButton: true
        });
    </script>
@endif
    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">Applications</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Applications</li>
            </ol>
        </div>
        <!--page-header closed-->
        <div class="row">
            <div class="col-md-12">
                <div class="card export-database">
                    <div class="card-header">
                        <h4><strong>List of Applications</strong></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th class="text-center" >ID</th>
                                        <th class="text-center" >Agency Name</th>
                                        <th class="text-center" >Contact #</th>
                                        <th class="text-center" >Address</th>
                                        <!--<th>Aim Objective</th> -->
                                        <th class="text-center" >Action</th>
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
                                            @if($record->status==null || $record->status==0 || $record->status=='')
                                            <a href="{{ url('application/') }}/{{ $record->id }}"><button
                                                class="btn btn-primary btn-sm" type="button">Move To Application</button>
                                            </a>
                                            @else
                                            <strong>Submitted</strong>
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
 