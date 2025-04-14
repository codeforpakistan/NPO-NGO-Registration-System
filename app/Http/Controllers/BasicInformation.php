<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use App\Models\AimObjective;
use App\Models\BasicInformationModel;
use DB;

class BasicInformation extends Controller
{

public function information()
{
    $userId = session('id'); 
    $objective = AimObjective::all();
    $records = BasicInformationModel::with('aims')
        ->where('user_id', $userId)
        ->paginate(3);
    return view('basic-information', compact('objective', 'records'));
}

public function storeinformation(Request $request)
{
    $userId = session('id');
    if (!$userId) {
        return redirect()->back()->with('error', 'User not authenticated!');
    }
    $expenditureFilePath = null;
    if ($request->hasFile('constitution_file')){
        $expenditureFilePath = $request->file('constitution_file')->store('uploads', 'public');
    }

    $basicInfo = BasicInformationModel::create([
        'user_id' => $userId, 
        'name' => $request->name,
        'contact' => $request->contact,
        'address' => $request->address,
        'district_id' => $request->district_id,
        'constitution_file' => $expenditureFilePath
    ]);
    if ($request->has('objectives')) {
        $basicInfo->aims()->attach($request->objectives);
    }
    return redirect()->back()->with('success', 'Data inserted successfully!');
}
}
