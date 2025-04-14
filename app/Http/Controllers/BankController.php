<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankModel;

class BankController extends Controller
{
    public function bankdetail()
    {
        
        $listofbanks = BankModel::all();
        return view('sitting.addbank', compact('listofbanks'));
    }

public function storebank(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        
    ]);
    BankModel::create([
        'name' => $request->name,

    ]);
    Session()->flash('success', 'Data Has Been Submitted Successfully');
    return redirect()->back();
}
public function deletebank($id)
{
    $deletebank = BankModel::find($id);
    if (!$deletebank) {
        return redirect()->back()->with('error', 'Record not found.');
    }
    $deletebank->delete();
    return redirect()->back()->with('success', 'Bank deleted successfully.');
}
}
