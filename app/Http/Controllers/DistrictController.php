<?php

namespace App\Http\Controllers;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function showdistricts()
    {
        $listofdistricts = District::all();
        return view('sitting.adddistrict', compact('listofdistricts'));
    }
    public function storedistrict(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            
        ]);
        District::create([
            'name' => $request->name,
    
        ]);
        Session()->flash('success', 'District Added Successfully');
        return redirect()->back();
    }
}
