<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\role;
class RolesController extends Controller
{
public function addrole()
    {
        $roles= role::All();
        return view('sitting.roles',compact('roles'));
    }
public function StoreRoles(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        
    ]);
    role::create($validated);
    Session()->flash('success', 'Role Added Successfully');
    return redirect()->back();
}
}
