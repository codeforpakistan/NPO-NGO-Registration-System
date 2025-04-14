<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginModel;
use App\Models\Operationarea;
use App\Models\District;
use App\Models\role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
{
    return view('login');
}
public function register()
{
    $listofdistricts = District::all();
    return view('register', compact('listofdistricts'));
}
 
public function storeregister(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'phone_number' => 'required',
        'password' => 'required|min:6',
        'district_id' => 'required',
    ]);

    LoginModel::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'password' => Hash::make($request->password),
        'district_id' => $request->district_id,
    ]);

    Session::flash('success', 'Registration Successfully.');
    
    return redirect('register')->with('success', 'Registration Successful.');
}

public function make_login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Find user by email
    $user = LoginModel::where('email', $request->email)->first();

    // Check if user exists and password matches
    if (!$user || !Hash::check($request->password, $user->password)) {
        return redirect('/login')->with('error', 'Invalid credentials.');
    }

    // Store user data in session
    session([
        'email' => $user->email,
        'id' => $user->id,
        'name' => $user->name,
        'role_id' => $user->role_id, 
        'district_id' => $user->district_id,  
    ]);
    if($user->role_id == 1) {
        return redirect('/operation_area')->with('success', 'Login successful.');
    }elseif($user->role_id == 2) {
        return redirect('/app_summary_district')->with('success', 'Login successful.');
    }elseif($user->role_id == 3) {
        return redirect('/app_summary_ad')->with('success', 'Login successful.');
    }elseif($user->role_id == 4) {
        return redirect('/app_summary_dd')->with('success', 'Login successful.');
    }elseif($user->role_id == 5){
        return redirect('/app_summary_directorate')->with('success', 'Login successful.');
    }else{
        return redirect('summary')->with('success', 'Login successful.');
    }
  
}

public function adduser()
{
    $area = District::All();
    $Role = role::All();
    $users = LoginModel::with('district')
    ->whereNotNull('role_id')
    ->where('role_id', '!=', '')
    ->get();

    return view('sitting.add-user',compact('area','Role','users'));
}
public function storeUser(Request $request)
{
    // Validate incoming data


    // Create a new user record with hashed password
    LoginModel::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')), // Hash the password
        'phone_number' => $request->input('phone_number'),
        'role_id' => $request->input('role_id'),
        'district_id' => $request->input('district_id'),
     
    ]);

    return redirect()->back()->with('success', 'User added successfully.');
}
public function logout()
{
    // Logout the user
    Auth::logout();
    // Redirect to login page with a success message
    return redirect('/login')->with('success', 'Logged out successfully!');
}
}
