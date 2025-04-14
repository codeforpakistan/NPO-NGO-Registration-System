@extends('layout')
@section('content')
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
.modal {
    z-index: 1050 !important;
}
.modal-backdrop {
    z-index: 1040 !important;
}
</style>
</head>
<div class="app-content">
<div class="modal fade" id="basicInfoModal" tabindex="-1" role="dialog" aria-labelledby="basicInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Application Timeline</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Stage</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody id="modal-data">
                        <!-- Data will be injected here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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
            <h4 class="page-title font-weight-bold">Forwarded Applications</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Forwarded Applications</li>
            </ol>
        </div>
        <!--page-header closed-->
        <div class="row">
            <div class="col-md-12">
                <div class="card export-database">
                    <div class="card-header">
                        <h4><strong>List of Forwarded Applications</strong></h4>
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
                                        <th class="text-center" >Status</th>
                                        <th class="text-center" >Timeline</th>
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
                                        @if(($record->status !== null && $record->status !== 0 && $record->status !== '') 
                                        && $record->status != 5 
                                        && ($record->reject === '' || $record->reject === null))
                                            <button class="btn btn-warning btn-sm" type="button">In-Progress</button>
                                            @elseif(($record->status==5) && ($record->reject === '' || $record->reject === null))
                                            <button class="btn btn-primary btn-sm" type="button">Accepted</button>
                                            <button class="btn btn-warning btn-sm" type="button">Certificate</button>
                                            @elseif($record->reject!= '' || $record->reject!= null)
                                            <button class="btn btn-danger btn-sm" type="button">Rejected</button>
                                            @endif
                                    </td>
                                    <td class="text-center">
                                    <button class="btn btn-outline-primary btn-sm view-basic-info" 
                                     data-user-id="{{ session('id') }}" 
                                     data-basic-info-id="{{ $record->id }}" 
                                     data-toggle="modal" 
                                     data-target="#basicInfoModal">
                                     View
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
<!-- jQuery AJAX Script -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".view-basic-info").forEach(function (button) {
        button.addEventListener("click", function () {
            var basic_info_id = this.getAttribute("data-basic-info-id");
            var user_id = this.getAttribute("data-user-id");

            fetch("{{ route('loadNGOtimeline') }}?basic_info_id=" + basic_info_id + "&user_id=" + user_id, {
                method: "GET",
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            })
            .then(response => response.json())
            .then(data => {
            if (data.data && data.data.length > 0) {
               var html = '';
               data.data.forEach(info => {
                   var createdAt = new Date(info.created_at).toLocaleString("en-US", {
                       year: "numeric",
                       month: "2-digit",
                       day: "2-digit",
                       hour: "2-digit",
                       minute: "2-digit",
                       hour12: true
                   });
       
                   html += `
                       <tr>
                           <td>${info.id}</td>
                           <td>${info.stage}</td>
                           <td><button class="btn btn-primary btn-sm">${info.status}</button></td>
                           <td>${createdAt}</td>
                       </tr>
                   `;
               });
       
               document.getElementById("modal-data").innerHTML = html;
           } else {
                    alert("No data found");
                }
            })
            .catch(error => {
                console.error("Error fetching data:", error);
                alert("Error fetching data");
            });
        });
    });
});
</script>
</div>            
 @endsection
 