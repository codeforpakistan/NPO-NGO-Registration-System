<?php

namespace App\Http\Controllers;
use App\Models\AimObjective;

use Illuminate\Http\Request;

class AimObjectiveController extends Controller
{
    public function Aimobjective()
    {
        $listofaims = AimObjective::all();
        return view('sitting.aim-objective', compact('listofaims'));
    }
    public function storeobjective(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            
        ]);
    
        // Store in the database
        AimObjective::create([
            'name' => $request->name,
    
        ]);
        // Flash success message
        Session()->flash('success', 'Data Has Been Submitted Successfully');
    
    
        
        return redirect()->back();
    }
public function deleteobjective($id)
{
    $deleteaims = AimObjective::find($id);
    if (!$deleteaims) {
        return redirect()->back()->with('error', 'Record not found.');
    }
    $deleteaims->delete();
    return redirect()->back()->with('success', 'Aim & Objective deleted successfully.');
}
    
}
