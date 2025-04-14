<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankModel;
use App\Models\ProposedModel;
use App\Models\FinancialModel;
use App\Models\BasicInformationModel;
class FinancialDetail extends Controller
{
    public function financial()
{
    $bank=BankModel::All();
    $userId = session('id'); 
    $info = BasicInformationModel::where('user_id', $userId)->get(); 
    $financial = FinancialModel::with(['bank', 'proposedFinance'])
    ->where('user_id', $userId) 
    ->get();

    $proposed=ProposedModel::All();
    return view('financial-detail',compact('bank','proposed','financial','info'));
}


public function storeFinancial(Request $request)
{
    // Validate the incoming request data
    $userId = session('id');

    // Handle file uploads
    $expenditureFilePath = null;
    if ($request->hasFile('income_expenditure_file')) {
        $expenditureFilePath = $request->file('income_expenditure_file')->store('uploads', 'public');
    }
    if ($request->hasFile('income_expenditure_file1')) {
        $expenditureFilePath = $request->file('income_expenditure_file1')->store('uploads', 'public');
    }

    


    // Save the data to the database
    FinancialModel::create([
        'has_bank_account' => $request->details_option === 'yes' ? 0 : 1,
        'bank_id' => $request->bank_id,
        'basic_info_id' => $request->basic_info_id,
        'branch_name' => $request->branch_name,
        'branch_code' => $request->branch_code,
        'user_id' => $userId, 
        'income_expenditure_file' => $expenditureFilePath,
        'prop_finan_id' => $request->prop_finan_id,
    ]);

    // Redirect or return response
    return redirect()->back()->with('success', 'Financial Details Add!');
}

}
