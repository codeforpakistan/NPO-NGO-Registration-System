@extends('layout')
@section('content')
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f7f6;
			margin: 0;
			padding: 0;
		}
		.container {
			width: 100%;
			margin: auto;
			background: white;
			padding: 10px;
			border: 2px solid #27ae60;
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
			border-radius: 10px;
			margin-top: 20px;
		}
		.logo {
			text-align: center;
			margin-bottom: 20px;
		}
		.logo img {
			width: 120px;
			height: auto;
		}
		h2 {
			text-align: center;
			color: #2c3e50;
		}
		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}
		table, th, td {
			border: 1px solid #ddd;
		}
		th, td {
			padding: 10px;
			text-align: left;
		}
		th {
			background-color: #27ae60;
			color: white;
		}
	</style>
</head>

<div class="app-content">
    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">Application Summary</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Application Summary</li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-body">
				
					<div class="container">
						<!--<div class="logo">
							<img src="{{ asset('assets/img/avatar/KP-Logo.png') }}" alt="Agency Logo" style="width:50px; height:50px;">
						</div> -->
						<h2>Application</h2>
						<p><strong>Name of the Agency:</strong> {{ $later['name'] }} </p>
						<p><strong>Aims and Objectives:</strong>
						@if($later->aims->isNotEmpty())
								@foreach($later->aims as $aim)
								<span><i><u>{{ $aim->name }}</u></i>&nbsp;</span>
								@endforeach
							@else
							<span>N/A</span>
							@endif
					    </p> 		
						<p><strong>Address:</strong> {{ $later['address'] }} </p>
						<p><strong>Contact No.:</strong> {{ $later['contact'] }} </p>
					    <hr>
						<!--*************************************************************************** -->
						@foreach ($groupedDetails as $membershipType => $details)
    <h5><strong>Names, Occupations & Addresses of the {{ $membershipType }}</strong></h5>

    @if ($membershipType == 'General Body')
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>F Name</th>
                    <th>Qualification</th>
                    <th>Occupation</th>
                    <th>Contact</th>
					<th>CNIC</th>
                </tr>
            </thead>
            <tbody>
                @php $sr = 1; @endphp
                @foreach ($details as $detail)
                    <tr>
                        <td>{{ $sr++ }}</td>
                        <td>{{ $detail->name }}</td>
                        <td>{{ $detail->father_name }}</td>
                        <td>{{ $detail->qualification }}</td>
                        <td>{{ $detail->occupation }}</td>
                        <td>{{ $detail->contact }}</td>
						<td>
							@if($detail->cnic)
								<a href="{{ asset('storage/' . $detail->cnic) }}" target="_blank" rel="noopener noreferrer">View CNIC</a>
							@else
								No CNIC
							@endif
						</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>

    @elseif ($membershipType == 'Executive Member')
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>F Name</th>
				<th>Qualification</th>
				<th>Designation</th>
				<th>Contact</th>
				<th>Address</th>
				<th>CV</th>
				<th>CNIC</th>
				<th>Police Verification</th>
			</tr>
		</thead>
		<tbody>
			@php $sr = 1; @endphp
			@foreach ($details as $detail)
				<tr>
					<td>{{ $sr++ }}</td>
					<td>{{ $detail->name }}</td>
					<td>{{ $detail->father_name }}</td>
					<td>{{ $detail->qualification }}</td>
					<td>{{ $detail->designation }}</td>
					<td>{{ $detail->contact }}</td>
					<td>{{ $detail->address }}</td>
					<td>
						@if($detail->cv)
							<a href="{{ asset('storage/' . $detail->cv) }}" target="_blank" rel="noopener noreferrer">View CV</a>
						@else
							N/A
						@endif
					</td>
					<td>
						@if($detail->cnic)
							<a href="{{ asset('storage/' . $detail->cnic) }}" target="_blank" rel="noopener noreferrer">View CNIC</a>
						@else
							N/A
						@endif
					</td>
					<td>
						@if($detail->police_verficaton)
							<a href="{{ asset('storage/' . $detail->police_verficaton) }}" target="_blank" rel="noopener noreferrer">View File</a>
						@else
							N/A
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<hr>

	@elseif ($membershipType == 'Founding Member')
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Occupation</th>
				<th>Address</th>
				<th>CNIC</th>
			</tr>
		</thead>
		<tbody>
			@php $sr = 1; @endphp
			@foreach ($details as $detail)
				<tr>
					<td>{{ $sr++ }}</td>
					<td>{{ $detail->name }}</td>
					<td>{{ $detail->occupation }}</td>
					<td>{{ $detail->address }}</td>
					<td>
						@if($detail->cnic)
							<a href="{{ asset('storage/' . $detail->cnic) }}" target="_blank" rel="noopener noreferrer">View CNIC</a>
						@else
							N/A
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<hr>

    @elseif ($membershipType == 'Member')
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>DOB</th>
				<th>Gender</th>
				<th>Contact</th>
				<th>Email</th>
				<th>CNIC</th>
				<th>Address</th>
			</tr>
		</thead>
		<tbody>
			@php $sr = 1; @endphp
			@foreach ($details as $detail)
				<tr>
					<td>{{ $sr++ }}</td>
					<td>{{ $detail->name }}</td>
					<td>{{ $detail->date_of_birth }}</td>
					<td>{{ $detail->gender }}</td>
					<td>{{ $detail->contact }}</td>
					<td>{{ $detail->email }}</td>
					<td>{{ $detail->cnic }}</td>
					<td>{{ $detail->address }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<hr>

    @endif
@endforeach


<!-- *********************************************************-->
<h5><strong>Financial Details & List</strong></h5>
<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Bank</th>
			<th>Branch</th>
			<th>Br Code</th>
			<th>Income & Expenditure Statement</th>
			<th>Financing Method</th>
		</tr>
	</thead>
	<tbody>
		@php $sr = 1; @endphp
		@foreach($financial as $financial)
			<tr>
				<td>{{ $sr++ }}</td>
				<td>{{ $financial->bank->name ?? 'N/A' }}</td>
				<td>{{ $financial->branch_name ?? 'N/A' }}</td>
				<td>{{ $financial->branch_code ?? 'N/A' }}</td>
				<td>
					@if(!empty($financial->income_expenditure_file))
						<a href="{{ asset('storage/' . $financial->income_expenditure_file) }}" target="_blank" rel="noopener noreferrer">View File</a>
					@else
						N/A
					@endif
				</td>
				<td>{{ $financial->proposedFinance->name ?? 'N/A' }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<hr>
<h5><strong>List of Area of Operation & Details</strong></h5>
<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Area</th>
			<th>Future Plan</th>
			<th>Plan Of Operation</th>
			<th>Previous Activities Report</th>
			<th>1st Meeting Minutes</th>
			<th>Last Meeting Minutes</th>
		</tr>
	</thead>
	<tbody>
		@php $sr = 1; @endphp
		@foreach($areas as $operation)
			<tr>
				<td>{{ $sr++ }}</td>
				<td>{{ $operation->areaOfOperation->name ?? 'N/A' }}</td>
				<td>
					@if($operation->future_plan_file)
						<a href="{{ asset('storage/' . $operation->future_plan_file) }}" target="_blank" rel="noopener noreferrer">View File</a>
					@else
						N/A
					@endif
				</td>
				<td>
					@if($operation->plan_operation_file)
						<a href="{{ asset('storage/' . $operation->plan_operation_file) }}" target="_blank" rel="noopener noreferrer">View File</a>
					@else
						N/A
					@endif
				</td>
				<td>
					@if($operation->progress_report_file)
						<a href="{{ asset('storage/' . $operation->progress_report_file) }}" target="_blank" rel="noopener noreferrer">View File</a>
					@else
						N/A
					@endif
				</td>
				<td>
					@if($operation->first_meeting_file)
						<a href="{{ asset('storage/' . $operation->first_meeting_file) }}" target="_blank" rel="noopener noreferrer">View File</a>
					@else
						N/A
					@endif
				</td>
				<td>
					@if($operation->last_meeting_file)
						<a href="{{ asset('storage/' . $operation->last_meeting_file) }}" target="_blank" rel="noopener noreferrer">View File</a>
					@else
						N/A
					@endif
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
<hr>
                        <div class="row">
							<div class="col-8">
								<label>Comment</label>
								<textarea rows="4" name="do_comment" class="form-control do_comment"></textarea>
							</div>
							<div class="col-4">
							<label>Attachment</label>
							<input type="file" name="do_attachment" class="form-control do_attachment" accept="application/pdf" id="pdfInput"/>
							</div>
						</div>

					<div class="row">
						<div class="col-12 text-center mt-3">
							<button id="reverse_btn_dg" class="btn btn-danger" data-basic-info-id="{{ $detail->basic_info_id }}" data-user-id="{{ session('id')}}"><i class="fa fa-reply" aria-hidden="true"></i>&nbsp;Reverse Application</button>
							<button id="approve_btn_dg" class="btn btn-primary" data-basic-info-id="{{ $detail->basic_info_id }}" data-user-id="{{ session('id')}}"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Accept Application</button>
							<button id="reject_btn_dg" class="btn btn-danger" data-basic-info-id="{{ $detail->basic_info_id }}" data-user-id="{{ session('id')}}"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Reject Application</button>
					</div>
						
					</div>
				</div>
				<br>
				<div class="row">
                    @if($comments_attachments && $comments_attachments->count())
    @foreach($comments_attachments as $comment_attachment)
        <div class="col-12 border p-2 mb-2">
            <div class="row">
                <div class="col-8">
                    <h6>Comment</h6>
                    @if($comment_attachment->comments)
                        {{ $comment_attachment->comments }}
                    @else
                        N/A
                    @endif
                </div>
                <div class="col-4">
                    <h6>Attachment</h6>
                    @if($comment_attachment->attachment)
                        <a href="{{ asset('storage/' . $comment_attachment->attachment) }}" target="_blank">View File</a>
                    @else
                        N/A
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endif

					</div>
                </div>
            </div>
        </div>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script>
			document.getElementById('pdfInput').addEventListener('change', function() {
             const file = this.files[0];
             if (file) {
                 if (file.type !== 'application/pdf') {
                     alert('Only PDF files are allowed!');
                     this.value = '';
                     return;
                 }
                 if (file.size > 2 * 1024 * 1024) {
                     alert('File size must not exceed 2MB!');
                     this.value = '';
                     return;
                 }
             }
             });
		</script>
		<script>
			$(document).ready(function () {
				$('#approve_btn_dg').click(function (e) {
    e.preventDefault(); // Prevent the default form submission

    var formData = new FormData();
    var basicInfoId = $(this).data('basic-info-id');
    var comment = $('textarea[name="do_comment"]').val();
    var fileInput = $('#pdfInput')[0].files[0];

    formData.append('basic_info_id', basicInfoId);
    formData.append('do_comment', comment);
    formData.append('do_attachment', fileInput);
    formData.append('_token', '{{ csrf_token() }}');

    $.ajax({
        url: "{{ route('forward.app.directorate') }}",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    title: "Success!",
                    text: "Application has been approved successfully.",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = "{{ route('app_summary_directorate') }}";
                });
            } else {
                Swal.fire({
                    title: "Error!",
                    text: response.message || "Something went wrong! Try again.",
                    icon: "error",
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        },
        error: function () {
            Swal.fire({
                title: "Error!",
                text: "Error processing your request.",
                icon: "error",
                timer: 2000,
                showConfirmButton: false
            });
        }
    });
});

$("#reverse_btn_dg").click(function (e) {
    e.preventDefault();

    var formData = new FormData();
    var basicInfoId = $(this).data('basic-info-id');
    var comment = $('textarea[name="do_comment"]').val();
    var fileInput = $('#pdfInput')[0].files[0];

    formData.append('basic_info_id', basicInfoId);
    formData.append('do_comment', comment);
    formData.append('do_attachment', fileInput);
    formData.append('_token', '{{ csrf_token() }}');

    $.ajax({
        url: "{{ route('reverse.app.directorate') }}",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    title: "Success!",
                    text: "Application has been reversed successfully.",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = "{{ route('app_summary_directorate') }}";
                });
            } else {
                Swal.fire({
                    title: "Error!",
                    text: response.message || "Something went wrong! Try again.",
                    icon: "error",
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        },
        error: function () {
            Swal.fire({
                title: "Error!",
                text: "Error processing your request.",
                icon: "error",
                timer: 2000,
                showConfirmButton: false
            });
        }
    });
});

$("#reject_btn_dg").click(function (e) {
    e.preventDefault();

    var formData = new FormData();
    var basicInfoId = $(this).data('basic-info-id');
    var comment = $('textarea[name="do_comment"]').val();
    var fileInput = $('#pdfInput')[0].files[0];

    formData.append('basic_info_id', basicInfoId);
    formData.append('do_comment', comment);
    formData.append('do_attachment', fileInput);
    formData.append('_token', '{{ csrf_token() }}');

    $.ajax({
        url: "{{ route('reject.app.directorate') }}",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    title: "Success!",
                    text: "Application has been rejected!",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = "{{ route('app_summary_directorate') }}";
                });
            } else {
                Swal.fire({
                    title: "Error!",
                    text: response.message || "Something went wrong! Try again.",
                    icon: "error",
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        },
        error: function () {
            Swal.fire({
                title: "Error!",
                text: "Error processing your request.",
                icon: "error",
                timer: 2000,
                showConfirmButton: false
            });
        }
    });
});
			});
		</script>   
 @endsection
 