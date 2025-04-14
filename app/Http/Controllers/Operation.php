<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operationarea;
use App\Models\OperationModel;
use App\Models\BasicInformationModel;
class Operation extends Controller
{



    public function Operation()
    {
        $area = Operationarea::all();
        $userId = session('id'); 
        $info = BasicInformationModel::where('user_id', $userId)->get();
        $userRole = session('role_id');  // Get role_id from session
        $userDistrict = session('district_id'); // Get district_id from session
        
        // Check role and apply query conditions
        if ($userRole == 1 && $userDistrict) {
            // District Officer: Show only own district data
            $operations = OperationModel::with('areaOfOperation')
                ->where('district_id', $userDistrict)
                ->get();
        } elseif ($userRole == 2 || $userRole == 3) {
            // Admin & Directorate Officer: Show all data
            $operations = OperationModel::with('areaOfOperation')->get();
        } else {
            // If no district & role assigned, show only the data where user_id matches session id
            $operations = OperationModel::with('areaOfOperation')
                ->where('user_id', $userId) // Fixed: Use 'user_id' instead of 'id'
                ->get();
        }
        
        return view('operation', compact('area', 'operations', 'info'));
    }
    

public function storeOperation(Request $request)
{
    $userId = session('id');

    // Ensure the user ID exists
    if (!$userId) {
        return redirect()->back()->with('error', 'User not authenticated!');
    }

    $validated = $request->validate([
        'area_of_operation_id' => 'required|exists:area_of_operations,id',
        'basic_info_id' => 'required|exists:basic_information,id',
        'future_plan_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'plan_operation_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'progress_report_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'first_meeting_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'last_meeting_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
    ]);

    // Handle file uploads
    $files = [
        'future_plan_file',
        'plan_operation_file',
        'progress_report_file',
        'first_meeting_file',
        'last_meeting_file',
    ];

    foreach ($files as $file) {
        if ($request->hasFile($file)) {
            $validated[$file] = $request->file($file)->store('uploads', 'public');
        }
    }

    // Add session user_id to the data before inserting
    $validated['user_id'] = $userId;

    // Insert data into the database
    $operation = OperationModel::create($validated);

    // Flash success message
    session()->flash('success', 'Data Has Been Submitted Successfully');

    // Redirect back
    return redirect()->back();
}



}
