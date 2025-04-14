<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CityModel;
class CityController extends Controller
{
    public function city()
    {
        $listofcities = CityModel::all();
        return view('sitting.city', compact('listofcities'));
    }
    public function storecity(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'city_name' => 'required|string|max:255',
            
        ]);
    
        // Store in the database
        CityModel::create([
            'city_name' => $request->city_name,
    
        ]);
        // Flash success message
        Session()->flash('success', 'Data Has Been Submitted Successfully');
        return redirect()->back();
    }

public function deletecity($id)
{
    $deletecity = CityModel::find($id);
    if (!$deletecity) {
        return redirect()->back()->with('error', 'Record not found.');
    }
    $deletecity->delete();
    return redirect()->back()->with('success', 'City deleted successfully.');
}
}
