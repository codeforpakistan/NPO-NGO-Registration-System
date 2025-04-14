<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   
public function dashboard()
{
    return view('dashboard');
}
public function index()
{
    return view('login');
}



public function farm2()
{
    $currentStep = 4; // Current step number
    $totalSteps = 5; // Total number of steps
    $name = "John Doe"; // Replace with your name

    return view('form2', compact('currentStep', 'totalSteps', 'name'));
}
public function farm3()
{
    $currentStep = 5; // Current step number
    $totalSteps = 5; // Total number of steps
    $name = "John Doe"; // Replace with your name

    return view('form3', compact('currentStep', 'totalSteps', 'name'));
}
public function information()
{
    return view('basic-information');
}


public function executive()
{
    return view('executive-member');
}
public function general()
{
    return view('general-member');
}

}
