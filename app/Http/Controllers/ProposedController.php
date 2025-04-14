<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProposedModel;

class ProposedController extends Controller
{
    public function ProposedBank()
    {
        $listofproposedfinances = ProposedModel::all();
        return view('sitting.proposed', compact('listofproposedfinances'));
    }
    public function storeproposed(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            
        ]);
    
        // Store in the database
        ProposedModel::create([
            'name' => $request->name,
    
        ]);
        // Flash success message
        Session()->flash('success', 'Data Has Been Submitted Successfully');
    
    
        
        return redirect()->back();
    }
public function deleteproposedfinances($id)
{
    $deleteproposedfinances = ProposedModel::find($id);
    if (!$deleteproposedfinances) {
        return redirect()->back()->with('error', 'Record not found.');
    }
    $deleteproposedfinances->delete();
    return redirect()->back()->with('success', 'Poposed Finance deleted successfully.');
}
}
