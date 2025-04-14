@extends('layout')

@section('content')
    <!--app-content open-->
    <div class="app-content">
        <section class="section">

            <!--page-header open-->
            <div class="page-header pt-0">
                <h4 class="page-title">Form Wizard</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-light-color">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form Wizard</li>
                </ol>
            </div>
            <!--page-header closed-->


            <!--row open-->
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-10">
                    <div class="card ">
                        <div class="card-header">
                            <h4>Online test</h4>
                        </div>
                        <div class="card-body">
                            <div id="smartwizard">
                                <ul class="nav">
                                    <li>
                                        <a class="nav-link" href="#step-1">
                                            Step 1<br><small>Personal Information</small>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#step-2">
                                            Step 2<br><small>Account Details</small>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#step-3">
                                            Step 3<br><small>Confirmation</small>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#step-4">
                                            Step 4<br><small>Confirmation</small>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!-- Step 1 -->
                                    <div id="step-1" class="tab-pane" role="tabpanel">
                                         <form class="form-horizontal" action="{{ url('AddDivsion/add') }}" method="POST">
                                            @csrf

                                            <!-- First Row (Name and CNIC) -->
                                            <div class="row">
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label font-weight-bold">Name Of The Agency</label>
                                                    <input class="form-control form-control-lg" type="text"
                                                        name="divsion_name" required>
                                                </div>


                                            </div>

                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label class="form-label font-weight-bold">Contact No</label>
                                                    <input class="form-control form-control-lg" type="text"
                                                        name="divsion_name" required>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="form-label font-weight-bold">Address</label>
                                                    <input class="form-control form-control-lg" type="text"
                                                        name="divsion_name" required>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label class="form-label font-weight-bold">CNIC</label>
                                                    <input class="form-control form-control-lg" type="text"
                                                        name="divsion_name" required>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="form-label font-weight-bold">Constitution</label>
                                                    <input class="form-control form-control-lg" type="text"
                                                        name="divsion_name" required>
                                                </div>

                                            </div>
                                            <!-- Second Row (Skills) -->


                                            <!-- Submit Button -->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                                </div>
                                            </div>

                                            </form>
                                    </div>
                                    <!-- Step 2 -->
                                    <div id="step-2" class="tab-pane" role="tabpanel">
                                        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12" style="margin-top: 80px;">
                                            <div class="card shadow-sm">
                                                <div class="card-header bg-primary text-white">
                                                    <h4 class="font-weight-bold">Membership Form</h4>
                                                </div>
                                                <div class="card-body">
                                                    <form class="form-horizontal" action="{{ url('AddDivsion/add') }}"
                                                        method="POST">
                                                        @csrf

                                                        <!-- First Row (Name and CNIC) -->
                                                        <div class="row">
                                                            <div class="form-group col-lg-12">
                                                                <label class="form-label font-weight-bold">Name Of The
                                                                    Agency</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="divsion_name" required>
                                                            </div>


                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-lg-6">
                                                                <label class="form-label font-weight-bold">Contact
                                                                    No</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="divsion_name" required>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label class="form-label font-weight-bold">Address</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="divsion_name" required>
                                                            </div>

                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-lg-6">
                                                                <label class="form-label font-weight-bold">CNIC</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="divsion_name" required>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label
                                                                    class="form-label font-weight-bold">Constitution</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="divsion_name" required>
                                                            </div>

                                                        </div>
                                                        <!-- Second Row (Skills) -->


                                                        <!-- Submit Button -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-lg">Submit</button>
                                                            </div>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- Step 3 -->
                                    <div id="step-3" class="tab-pane" role="tabpanel">
                                        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12" style="margin-top: 80px;">
                                            <div class="card shadow-sm">
                                                <div class="card-header bg-primary text-white">
                                                    <h4 class="font-weight-bold">Founding Members</h4>
                                                </div>
                                                <div class="card-body">
                                                    <form class="form-horizontal" action="{{ url('AddDivsion/add') }}"
                                                        method="POST">
                                                        @csrf

                                                        <!-- First Row (Name and CNIC) -->
                                                        <div class="row">
                                                            <div class="form-group col-lg-6">
                                                                <label class="form-label font-weight-bold">Name </label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="divsion_name" required>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label class="form-label font-weight-bold">Father Name
                                                                </label>
                                                                <input class="form-control form-control-lg" type="date"
                                                                    name="divsion_name" required>
                                                            </div>

                                                        </div>


                                                        <div class="row">
                                                            <div class="form-group col-lg-6">
                                                                <label
                                                                    class="form-label font-weight-bold">Qualification</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="divsion_name" required>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label class="form-label font-weight-bold">Address</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="divsion_name" required>
                                                            </div>

                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-lg-6">
                                                                <label class="form-label font-weight-bold">Contact
                                                                    No</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="divsion_name" required>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label
                                                                    class="form-label font-weight-bold">Designation</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="divsion_name" required>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-lg-6">
                                                                <label class="form-label font-weight-bold">CNIC
                                                                    Uploud</label>
                                                                <input class="form-control form-control-lg" type="file"
                                                                    name="divsion_name" required>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label class="form-label font-weight-bold">CVs Of Executive
                                                                    Members</label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    name="divsion_name" required>
                                                            </div>

                                                        </div>
                                                        <!-- Submit Button -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-lg">Submit</button>
                                                            </div>
                                                        </div>

                                                    </form>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card export-database">
                                                            <div class="card-header">
                                                                <h4>Basic Information</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table id="example"
                                                                        class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>Name Of The Agency</th>
                                                                                <th>Address</th>
                                                                                <th>CNIC</th>
                                                                                <th>Constitution</th>
                                                                                <th>Action</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div </div>
                                            </div>

                                        </div>
                                    </div>

									{{-- step 4 --}}
									<div id="step-4" class="tab-pane" role="tabpanel">
										<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12" style="margin-top: 80px;">
											<div class="card shadow-sm">
												<div class="card-header bg-primary text-white">
													<h4 class="font-weight-bold">Founding Members</h4>
												</div>
												<div class="card-body">
	
	
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="card export-database">
															<div class="card-header">
																<h4>Basic Information</h4>
															</div>
															<div class="card-body">
																<div class="table-responsive">
																	<table id="example"
																		class="table table-bordered border-t0 key-buttons text-nowrap w-100">
																		<thead>
																			<tr>
																				<th>#</th>
																				<th>Name Of The Agency</th>
																				<th>Address</th>
																				<th>CNIC</th>
																				<th>Constitution</th>
																				<th>Action</th>
	
																			</tr>
																		</thead>
																		<tbody>
	
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div </div>
											</div>
	
										</div>
									</div>
                                </div>
                                <div id="step-4" class="tab-pane" role="tabpanel">
                                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12" style="margin-top: 80px;">
                                        <div class="card shadow-sm">
                                            <div class="card-header bg-primary text-white">
                                                <h4 class="font-weight-bold">Founding Members</h4>
                                            </div>
                                            <div class="card-body">


                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card export-database">
                                                        <div class="card-header">
                                                            <h4>Basic Information</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table id="example"
                                                                    class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Name Of The Agency</th>
                                                                            <th>Address</th>
                                                                            <th>CNIC</th>
                                                                            <th>Constitution</th>
                                                                            <th>Action</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row closed-->


        </section>
    </div>
    <!--app-content closed-->
    <section class="section">

        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title">

                <body>
                  
                </body>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-light-color">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form Elements</li>
                </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="row">
            <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>

                        </h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label class="col-md-3 form-label">Text</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="Typing.....">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-label" for="example-email">Email</label>
                                <div class="col-md-9">
                                    <input type="email" id="example-email" name="example-email" class="form-control"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-label">Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" value="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-label">Placeholder</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-label">Readonly</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" readonly="" value="Readonly value">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-label">Disabled</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" disabled="" value="Disabled value">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label class="col-md-3 form-label">Number</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="number" name="number">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>General Elements</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label class="col-md-3 form-label">Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-label">Text area</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="3">Hiiiii.....</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-label">URL</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="url" name="url">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-label">Search</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="search" name="search">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-label">Tel</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="tel" name="tel">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label class="col-md-3 form-label">Input Select</label>
                                <div class="col-md-9">
                                    <select class="form-control select2">
                                        <option>Apple</option>
                                        <option>Orange</option>
                                        <option>Mango</option>
                                        <option>Grapes</option>
                                        <option>Banana</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--row closed-->

        <!--row open-->
        <div class="row">
            <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Vertical Form</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                                <div class="checkbox">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                            id="checkbox-1">
                                        <label for="checkbox-1" class="custom-control-label">Check me Out</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-1 mb-0">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Horizontal Form</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label for="inputName" class="col-md-3 col-form-label">User Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-3 col-form-label">Email</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-md-3 col-form-label">Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" id="inputPassword3"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group mb-0 row justify-content-end">
                                <div class="col-md-9">
                                    <div class="checkbox">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                                id="checkbox-2">
                                            <label for="checkbox-2" class="custom-control-label">Check me Out</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0 mt-2 row justify-content-end">
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-info">Sign in</button>
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--row closed-->

        <!--row open-->
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4>Different Height</h4>
                    </div>
                    <div class="card-body">
                        <input class="form-control input-lg" type="text" placeholder=".input-lg">
                        <br>
                        <input class="form-control" type="text" placeholder="Default input">
                        <br>
                        <input class="form-control input-sm" type="text" placeholder=".input-sm">
                    </div>
                </div>
            </div>
        </div>
        <!--row close-->

        <!--row open-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Different Width</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 m-t-5 m-b-5">
                                <input type="text" class="form-control" placeholder=".col-xs-3">
                            </div>
                            <div class="col-md-4 m-t-5 m-b-5">
                                <input type="text" class="form-control" placeholder=".col-xs-4">
                            </div>
                            <div class="col-md-5 m-t-5 m-b-5">
                                <input type="text" class="form-control" placeholder=".col-xs-5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--row close-->

        <!--row open-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Input Grid</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder=".col-md-12" class="form-control">
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder=".col-md-6" class="form-control">
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder=".col-md-6" class="form-control">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder=".col-md-4" class="form-control">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder=".col-md-4" class="form-control">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder=".col-md-4" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder=".col-md-3" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder=".col-md-3" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder=".col-md-3" class="form-control">
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder=".col-md-3" class="form-control">
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder=".col-md-2" class="form-control">
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder=".col-md-2" class="form-control">
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder=".col-md-2" class="form-control">
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder=".col-md-2" class="form-control">
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder=".col-md-2" class="form-control">
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder=".col-md-2" class="form-control">
                            </div>
                            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder="col-1" class="form-control">
                            </div>
                            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder="col-1" class="form-control">
                            </div>
                            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder="col-1" class="form-control">
                            </div>
                            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder="col-1" class="form-control">
                            </div>
                            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder="col-1" class="form-control">
                            </div>
                            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder="col-1" class="form-control">
                            </div>
                            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder="col-1" class="form-control">
                            </div>
                            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder="col-1" class="form-control">
                            </div>
                            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder="col-1" class="form-control">
                            </div>
                            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder="col-1" class="form-control">
                            </div>
                            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder="col-1" class="form-control">
                            </div>
                            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                                <input type="text" placeholder="col-1" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--row close-->

    </section>
    </div>
@endsection
