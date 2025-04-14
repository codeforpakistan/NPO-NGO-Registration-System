<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Operationarea;

class Operation_area extends Controller
{
public function operation_area()
{
    $operationAreas = Operationarea::all();
    return view('sitting.operation_area', compact('operationAreas'));
}

public function storeOperationarea(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
    ]);
    Operationarea::create([
        'name' => $request->name,

    ]);
    Session()->flash('success', 'Data Has Been Submitted Successfully');
    return redirect()->back();
}
public function deleteOperationarea($id)
{
    $operationArea = Operationarea::find($id);
    if (!$operationArea) {
        return redirect()->back()->with('error', 'Record not found.');
    }
    $operationArea->delete();
    return redirect()->back()->with('success', 'Operational Area deleted successfully.');
}
}
