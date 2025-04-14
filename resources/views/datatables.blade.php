@extends('layout')

@section('content')
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>

    
    
<div class="app-content">
  
    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">Founding Form</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color"></a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12" style="margin-top: 80px;">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="font-weight-bold">Founding  Members</h4>
                </div>
                <div class="card-body">
@extends('layout')

@section('content')
<div class="container">
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Agency Logo">
    </div>
    <h2>Application</h2>
    <p><strong>Name of the Agency:</strong> {{ $later['name'] }} </p>
    <p><strong>Aims and Objectives:</strong> 
        @if($later->aims->isNotEmpty())
            @foreach($later->aims as $aim)
                {{ $aim->name }}<br>
            @endforeach
        @else
            N/A
        @endif
    </p>
    <p><strong>Area of Operation:</strong> District Peshawar</p>
    <p><strong>Address:</strong> {{ $later['address'] }} </p>
    <p><strong>Contact No.:</strong> {{ $later['contact'] }} </p>
    <p><strong>How proposed to be financed:</strong> Through donation, aid, subscription & grants etc.</p>

    <h3>Names, Occupations & Addresses of the Founding Members</h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Occupation</th>
                <th>CNIC</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Abdullah Jan</td>
                <td>Businessman</td>
                <td>31304-2940023-8</td>
                <td>Peshawar</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Zubair Anwar</td>
                <td>Engineer</td>
                <td>31304-2940023-9</td>
                <td>Peshawar</td>
            </tr>
        </tbody>
    </table>

    <h3>Names, CNIC & Addresses</h3>
    <table>
        <tr>
            <th>Sr</th>
            <th>Name</th>
            <th>CNIC</th>
            <th>Address</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Abdullah Jan</td>
            <td>31304-2940023-8</td>
            <td>Peshawar</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Zubair Anwar</td>
            <td>31304-2940023-8</td>
            <td>Peshawar</td>
        </tr>
    </table>

    <button class="submit-btn">Submit</button>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7f6;
        margin: 0;
        padding: 20px;
    }
    .container {
        width: 80%;
        margin: auto;
        background: white;
        padding: 20px;
        border: 5px solid #27ae60;
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
        padding: 12px;
        text-align: left;
    }
    th {
        background-color: #27ae60;
        color: white;
    }
    .submit-btn {
        display: block;
        width: 100%;
        padding: 12px;
        background-color: #27ae60;
        color: white;
        border: none;
        cursor: pointer;
        margin-top: 20px;
        font-size: 18px;
        border-radius: 5px;
        transition: 0.3s;
    }
    .submit-btn:hover {
        background-color: #219150;
    }
</style>
@endsection


                </div>
            </div>
        </div>
   


              
 @endsection
 