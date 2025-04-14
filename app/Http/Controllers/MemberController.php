<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use App\Models\Member;
use App\Models\MemberModel;
use App\Models\MembershipType;
use App\Models\CityModel;
use App\Models\BasicInformationModel;
use App\Models\Detail;
use App\Models\AimObjective;
use App\Models\OperationModel;
use App\Models\Operationarea;
use App\Models\FinancialModel;
use App\Models\ProposedModel;
use App\Models\ApplicationWorkflow;
use App\Models\ApplicationTimeline;
use App\Models\Certificate;
use DB;
class MemberController extends Controller
{
public function membership()
{
    $userId = session('id'); 
    $info = BasicInformationModel::where('user_id', $userId)->get(); 
    
    $cities=CityModel::All();
    $membershipTypes = MembershipType::where('id', 5)->get();
    $getmember = Detail::join('members', 'details.id', '=', 'members.details_id')
    ->join('cities', 'details.city_id', '=', 'cities.city_id')
    ->where('members.member_type_id', 5)
    ->where('user_id', $userId) 
    ->select('details.*', 'cities.city_name', 'members.member_type_id')
    ->get();


    return view('membership', compact('cities', 'membershipTypes','getmember','info'));
    
}
public function store(Request $request)
{
   
    $userId = session('id');


    // Validate the input data
 
    // Insert into details table
    $detail = Detail::create([
        'name' => $request->name,
        'date_of_birth' => $request->date_of_birth,
        'gender' => $request->gender,
        'user_id' => $userId, 
        'city_id' => $request->city_id,
        'basic_info_id' => $request->basic_info_id,
        'contact' => $request->contact,
        'email' => $request->email,
        'address' => $request->address,
        'cnic' => $request->cnic,
        
    ]);

    // Insert into members table
    Member::create([
        'details_id' => $detail->id,
        'member_type_id' => $request->member_type_id,
    ]);

    return redirect()->back()->with('success', 'Member added successfully');
}
public function general()
{
    $userId = session('id'); 
    $info = BasicInformationModel::where('user_id', $userId)->get(); 
    
    $membershipTypes = MembershipType::where('id', 6)->get();
    $getgernal = Detail::join('members', 'details.id', '=', 'members.details_id')
    ->where('members.member_type_id', 6)
    ->where('user_id', $userId) 
    ->select('details.*')
    ->get();

    return view('general-member',compact('membershipTypes','getgernal','info'));
}

public function storegeneral(Request $request)
{
    $userId = session('id');
    $expenditureFilePath = null;
    if ($request->hasFile('cnic')) {
        $expenditureFilePath = $request->file('cnic')->store('uploads', 'public');
    }

    // Insert into details table
    $detail = Detail::create([
        'name' => $request->name,
    
        'father_name' => $request->father_name,
        'user_id' => $userId, 
        'qualification' => $request->qualification,
        'basic_info_id' => $request->basic_info_id,
        'contact' => $request->contact,
        'email' => $request->email,
        'cnic' => $expenditureFilePath,
        'occupation' => $request->occupation,
    
    
    ]);

    // Insert into members table
    Member::create([
        'details_id' => $detail->id,
        'member_type_id' => $request->member_type_id,
    ]);

    return redirect()->back()->with('success', 'General Member added successfully');
}
public function executive($id)
{
    $userId = session('id'); 
    $info = BasicInformationModel::where('user_id', $userId)->get(); 
    
    $membershipTypes = MembershipType::where('id', 7)->get();
    $executive = Detail::find($id);

    if (!$executive) {
        return redirect()->back()->with('error', 'Member not found.');
    }
    $getexecutive = Detail::join('members', 'details.id', '=', 'members.details_id')
    ->where('members.member_type_id', 7)
    ->where('user_id', $userId) 
    ->select('details.*')
    ->get();

    return view('executive-member', compact('executive', 'membershipTypes', 'getexecutive', 'info'))
    ->with('success', 'Shifted to Executive Member');
}
public function saveExecutive(Request $request)
{
    // Validation rules
    $request->validate([
        'address' => 'nullable|string|max:255',
        'designation' => 'nullable|string|max:255',
        'member_type_id' => 'required|exists:membership_types,id',
        'basic_info_id' => 'required|exists:basic_information,id',
        'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'police_verficaton' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
    ]);

    // Check if ID is provided (update existing record) or create a new one
    $executive = Detail::find($request->id) ?? new Detail();

    // Handle file uploads and store paths if files are provided
    if ($request->hasFile('cv')) {
        if ($executive->cv) {
            Storage::delete('public/' . $executive->cv);
        }
        $executive->cv = $request->file('cv')->store('uploads', 'public');
    }

    if ($request->hasFile('police_verficaton')) {
        if ($executive->police_verification) {
            Storage::delete('public/' . $executive->police_verficaton);
        }
        $executive->police_verficaton = $request->file('police_verficaton')->store('uploads', 'public');
    }

    // Get the logged-in user ID
    $userId = session('id');  

    // Fill the data for the executive
    $executive->fill([
        'user_id' => $userId, // Store the logged-in user ID
        'address' => $request->address ?? $executive->address,
        'designation' => $request->designation ?? $executive->designation,
        'member_type_id' => $request->member_type_id,
        'basic_info_id' => $request->basic_info_id,
    ]);

    // Save the executive data
    $executive->save();

    // Insert into the Member table
    Member::create([
        'details_id' => $executive->id,
        'member_type_id' => $request->member_type_id,
    ]);

    // Redirect with success message
    return redirect()->route('executive.save')->with('success', 'Executive Member details saved successfully');
}

public function listexecutive()
{
    $userId = session('id'); 
 
  
    $getexecutive = Detail::join('members', 'details.id', '=', 'members.details_id')
    ->where('members.member_type_id', 7)
    ->where('user_id', $userId) 
    ->select('details.*')
    ->get();

    return view('list-executive',compact('getexecutive',));
}

public function foundingmember()
{
    $userId = session('id'); 
    $info = BasicInformationModel::where('user_id', $userId)->get(); 
    
    $membershipTypes = MembershipType::where('id', 8)->get();
    $getfounding = Detail::join('members', 'details.id', '=', 'members.details_id')
    ->where('members.member_type_id', 8)
    ->select('details.*')
    ->get();

    return view('founding-body-member',compact('membershipTypes','info','getfounding'));
}
public function storefounding(Request $request)
{
    $userId = session('id'); 

    // Handle CNIC file upload
    $cnicFilePath = null;
    if ($request->hasFile('cnic')) {
        $cnicFilePath = $request->file('cnic')->store('uploads/cnic', 'public');
    }

    // Insert into the Detail table
    $founding = new Detail();
    $founding->name = $request->name;
    $founding->user_id = $userId; // Corrected assignment
    $founding->basic_info_id = $request->basic_info_id;
    $founding->occupation = $request->occupation;
    $founding->cnic = $cnicFilePath; // Save file path
    $founding->address = $request->address;
    $founding->save();

    // Insert into the Member table
    Member::create([
        'details_id' => $founding->id, // Use the ID of the newly created record
        'member_type_id' => $request->member_type_id, // Store the selected member type ID
    ]);

    // Redirect with a success message
    return redirect()->back()->with('success', 'Foundaing Member added successfully');
}

public function Summery()
{
    $userId = session('id'); 
    $records = BasicInformationModel::where('user_id', $userId)
        ->where(function ($query) {
            $query->whereNull('status')
                  ->orWhere('status', '');
        })
        ->get();
    return view('summary', compact('records'));
}

public function ngo_forwarded_apps_list()
{
    $userId = session('id'); 
    $records = BasicInformationModel::where('user_id', $userId)
    ->whereNotNull('status')
    ->where('status', '!=', '')
    ->get();
    return view('ngo_forwarded_apps', compact('records'));
}

public function Summery_district()
{
    $userId = session('id');
    $district_id = session('district_id');
    $records = BasicInformationModel::whereIn('status', [1])
    ->where('district_id', $district_id)
    ->get();

    return view('summary_district', compact('records',));
    
}
public function ad_apps_list()
{
    $userId = session('id');
    $district_id = session('district_id');
    $records = BasicInformationModel::whereIn('status', [2])
    ->where('district_id', $district_id)
    ->get();

    return view('app_summary_ad', compact('records',));
}

public function dd_apps_list()
{
    $userId = session('id');
    $district_id = session('district_id');
    $records = BasicInformationModel::whereIn('status', [3])
    ->where('district_id', $district_id)
    ->get();

    return view('app_summary_dd', compact('records',));
}

public function Summery_directorate()
{
    $userId = session('id'); 
    $records = BasicInformationModel::whereIn('status', [4])
    ->whereNull('reject')
    ->get();
     
    return view('summary_directorate', compact('records',));
    
}

public function AddLater($id, Request $request)
{
    $later = BasicInformationModel::find($id);
    
    $areas = OperationModel::where('basic_info_id', $id)->with('areaOfOperation')->get();
    $financial = FinancialModel::where('basic_info_id', $id)->with('proposedFinance')->get();
    $details = Detail::where('basic_info_id', $id)->with(['members.membershipType'])->get();
    if ($areas->isEmpty() || $financial->isEmpty() || $details->isEmpty()) {
        return redirect()->back()->with('error', 'Required data is missing. Please ensure all sections are completed.');
    }
    $groupedDetails = [];
    foreach ($details as $detail) {
        foreach ($detail->members as $member) {
            $membershipType = $member->membershipType->name ?? 'No Membership Type';
            $groupedDetails[$membershipType][] = $detail;
        }
    }

    $comments_attachments = ApplicationWorkflow::where('basic_info_id', $id)
    ->orderBy('created_at', 'desc')
    ->get();
    return view('application', compact('later', 'areas', 'financial', 'groupedDetails','comments_attachments'));
}

public function AddLater_district($id, Request $request)
{
    $later = BasicInformationModel::find($id);
    $areas = OperationModel::where('basic_info_id', $id)->with('areaOfOperation')->get();
    $financial = FinancialModel::where('basic_info_id', $id)->with('proposedFinance')->get();

    $details = Detail::where('basic_info_id', $id)
        ->with(['members.membershipType'])
        ->get();
    $groupedDetails = [];
    foreach ($details as $detail) {
        foreach ($detail->members as $member) {
            $membershipType = $member->membershipType->name ?? 'No Membership Type';
            $groupedDetails[$membershipType][] = $detail;
        }
    }
    $comments_attachments = ApplicationWorkflow::where('basic_info_id', $id)
    ->orderBy('created_at', 'desc')
    ->get();
    return view('application_district', compact('later', 'areas', 'financial', 'groupedDetails','comments_attachments'));
}

public function view_app_ad($id, Request $request)
{
    $later = BasicInformationModel::find($id);
    $areas = OperationModel::where('basic_info_id', $id)->with('areaOfOperation')->get();
    $financial = FinancialModel::where('basic_info_id', $id)->with('proposedFinance')->get();

    $details = Detail::where('basic_info_id', $id)
        ->with(['members.membershipType'])
        ->get();
    $groupedDetails = [];
    foreach ($details as $detail) {
        foreach ($detail->members as $member) {
            $membershipType = $member->membershipType->name ?? 'No Membership Type';
            $groupedDetails[$membershipType][] = $detail;
        }
    }
    $comments_attachments = ApplicationWorkflow::where('basic_info_id', $id)
    ->orderBy('created_at', 'desc')
    ->get();
    return view('application_ad', compact('later', 'areas', 'financial', 'groupedDetails','comments_attachments'));
}

public function view_app_dd($id, Request $request)
{
    $later = BasicInformationModel::find($id);
    $areas = OperationModel::where('basic_info_id', $id)->with('areaOfOperation')->get();
    $financial = FinancialModel::where('basic_info_id', $id)->with('proposedFinance')->get();

    $details = Detail::where('basic_info_id', $id)
        ->with(['members.membershipType'])
        ->get();
    $groupedDetails = [];
    foreach ($details as $detail) {
        foreach ($detail->members as $member) {
            $membershipType = $member->membershipType->name ?? 'No Membership Type';
            $groupedDetails[$membershipType][] = $detail;
        }
    }
    $comments_attachments = ApplicationWorkflow::where('basic_info_id', $id)
    ->orderBy('created_at', 'desc')
    ->get();
    return view('application_dd', compact('later', 'areas', 'financial', 'groupedDetails','comments_attachments'));
}

public function AddLater_directorate($id, Request $request)
{
    $later = BasicInformationModel::find($id);
    $areas = OperationModel::where('basic_info_id', $id)->with('areaOfOperation')->get();
    $financial = FinancialModel::where('basic_info_id', $id)->with('proposedFinance')->get();


    $details = Detail::where('basic_info_id', $id)
        ->with(['members.membershipType'])
        ->get();
    $groupedDetails = [];
    foreach ($details as $detail) {
        foreach ($detail->members as $member) {
            $membershipType = $member->membershipType->name ?? 'No Membership Type';
            $groupedDetails[$membershipType][] = $detail;
        }
    }
    $comments_attachments = ApplicationWorkflow::where('basic_info_id', $id)
    ->orderBy('created_at', 'desc')
    ->get();
    return view('application_directorate', compact('later', 'areas', 'financial', 'groupedDetails','comments_attachments'));
}

public function summaryfounding($id)
{
       $userId = session('id'); 
       $basicInfo = BasicInformationModel::find($id);
   
       if (!$basicInfo) {
           return redirect()->back()->with('error', 'Basic Information not found');
       }
       $getfounding = Detail::join('members', 'details.id', '=', 'members.details_id')
           ->join('basic_information', 'basic_information.id', '=', 'details.basic_info_id')
           ->where('basic_information.id', $id)
           ->where('members.member_type_id', 8)
           ->select('details.*', 'members.name as member_name', 'members.occupation', 'members.cnic', 'members.address')
           ->get();
   
       return view('application', compact('basicInfo', 'getfounding'));
   }

   public function submitfirstapp(Request $request)
   {
       $basicInfoId = $request->input('basic_info_id');
       $user_id = $request->input('user_id');
       DB::beginTransaction();
   
       try {
           $basicInfo = BasicInformationModel::where('id', $basicInfoId)->first();
           if ($basicInfo) {
               $basicInfo->status = 1;
               $basicInfo->save();
           }
           Detail::where('basic_info_id', $basicInfoId)->update(['status_id' => 1]);
           ApplicationTimeline::create([
            'basic_info_id' => $basicInfoId,
            'user_id' => $user_id,
            'stage' => 'NGO Submission',
            'status' => 'Submitted',
            ]);
            ApplicationWorkflow::create([
                'basic_info_id' => $basicInfoId,
                'from_user_id' => '0',
                'to_user_id' => '2',
                'action' => 'Submitted',
                'comments'=> 'NGO Submitted the Application',
            ]);
           DB::commit();
           return response()->json(['success' => true]);
       } catch (\Exception $e) {
           DB::rollBack();
           return response()->json(['success' => false, 'message' => $e->getMessage()]);
       }
   }

   public function forwardappdistrict(Request $request)
   {
       $userId = session('id'); 
       $basicInfoId = $request->input('basic_info_id');
       $comment = $request->input('do_comment');
       $filePath = null;
       DB::beginTransaction();
   
       try {
         // Handle file upload 111
         if ($request->hasFile('do_attachment')) {
            $file = $request->file('do_attachment');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
        }
           $basicInfo = BasicInformationModel::where('id', $basicInfoId)->first();
           if ($basicInfo) {
               $basicInfo->status = 2;
               $basicInfo->save();
           }
           Detail::where('basic_info_id', $basicInfoId)->update(['status_id' => 2]);
           ApplicationWorkflow::create([
            'basic_info_id' => $basicInfoId,
            'from_user_id' => '2',
            'to_user_id' => '3',
            'action' => 'Forwarded',
            'comments' => $comment,
            'attachment' => $filePath ?? null,
           ]);
           ApplicationTimeline::create([
            'basic_info_id' => $basicInfoId,
            'user_id' => $userId,
            'stage' => 'DO Review',
            'status' => 'Forwarded',
            ]);
           DB::commit();
           return response()->json(['success' => true]);
       } catch (\Exception $e) {
           DB::rollBack();
           return response()->json(['success' => false, 'message' => $e->getMessage()]);
       }
   }
   public function forwardapp_ad(Request $request)
   {
       $userId = session('id'); 
       $basicInfoId = $request->input('basic_info_id');
       $comment = $request->input('do_comment');
       $filePath = null;
       DB::beginTransaction();
   
       try {
         // Handle file upload 111
         if ($request->hasFile('do_attachment')) {
            $file = $request->file('do_attachment');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
        }
           $basicInfo = BasicInformationModel::where('id', $basicInfoId)->first();
           if ($basicInfo) {
               $basicInfo->status = 3;
               $basicInfo->save();
           }
           Detail::where('basic_info_id', $basicInfoId)->update(['status_id' => 3]);
           ApplicationWorkflow::create([
            'basic_info_id' => $basicInfoId,
            'from_user_id' => '3',
            'to_user_id' => '4',
            'action' => 'Forwarded',
            'comments' => $comment,
            'attachment' => $filePath ?? null,
           ]);
           ApplicationTimeline::create([
            'basic_info_id' => $basicInfoId,
            'user_id' => $userId,
            'stage' => 'AD Review',
            'status' => 'Forwarded',
            ]);
           DB::commit();
           return response()->json(['success' => true]);
       } catch (\Exception $e) {
           DB::rollBack();
           return response()->json(['success' => false, 'message' => $e->getMessage()]);
       }
   }

   public function reverseappdistrict(Request $request)
   {
       $userId = session('id'); 
       $basicInfoId = $request->input('basic_info_id');
       $comment = $request->input('do_comment');
       $filePath = null;
       DB::beginTransaction();
   
       try {
        if ($request->hasFile('do_attachment')) {
            $file = $request->file('do_attachment');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
        }
           $basicInfo = BasicInformationModel::where('id', $basicInfoId)->first();
           if ($basicInfo) {
               $basicInfo->status = null;
               $basicInfo->save();
           }
           Detail::where('basic_info_id', $basicInfoId)->update(['status_id' => null]);
           ApplicationWorkflow::create([
            'basic_info_id' => $basicInfoId,
            'from_user_id' => '2',
            'to_user_id' => '0',
            'action' => 'Reversed',
            'comments' => $comment,
            'attachment' => $filePath ?? null,
           ]);
           ApplicationTimeline::create([
            'basic_info_id' => $basicInfoId,
            'user_id' => $userId,
            'stage' => 'DO Review',
            'status' => 'Reversed',
            ]);
           DB::commit();
           return response()->json(['success' => true]);
       } catch (\Exception $e) {
           DB::rollBack();
           return response()->json(['success' => false, 'message' => $e->getMessage()]);
       }
   }

   
   public function reverseapp_ad(Request $request)
   {
       $userId = session('id'); 
       $basicInfoId = $request->input('basic_info_id');
       $comment = $request->input('do_comment');
       $filePath = null;
       DB::beginTransaction();
   
       try {
        if ($request->hasFile('do_attachment')) {
            $file = $request->file('do_attachment');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
        }
           $basicInfo = BasicInformationModel::where('id', $basicInfoId)->first();
           if ($basicInfo) {
               $basicInfo->status = 1;
               $basicInfo->save();
           }
           Detail::where('basic_info_id', $basicInfoId)->update(['status_id' => 1]);
           ApplicationWorkflow::create([
            'basic_info_id' => $basicInfoId,
            'from_user_id' => '3',
            'to_user_id' => '2',
            'action' => 'Reversed',
            'comments' => $comment,
            'attachment' => $filePath ?? null,
           ]);
           ApplicationTimeline::create([
            'basic_info_id' => $basicInfoId,
            'user_id' => $userId,
            'stage' => 'AD Review',
            'status' => 'Reversed',
            ]);
           DB::commit();
           return response()->json(['success' => true]);
       } catch (\Exception $e) {
           DB::rollBack();
           return response()->json(['success' => false, 'message' => $e->getMessage()]);
       }
   }

   public function approvedappdirectorate(Request $request)
   {
    $userId = session('id'); 
    $basicInfoId = $request->input('basic_info_id');
    $comment = $request->input('do_comment');
    $filePath = null;
       DB::beginTransaction();
   
       try {
        if ($request->hasFile('do_attachment')) {
            $file = $request->file('do_attachment');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
        }
           $basicInfo = BasicInformationModel::where('id', $basicInfoId)->first();
           if ($basicInfo) {
               $basicInfo->status = 5;
               $basicInfo->save();
           }
           Detail::where('basic_info_id', $basicInfoId)->update(['status_id' => 5]);
           ApplicationWorkflow::create([
            'basic_info_id' => $basicInfoId,
            'from_user_id' => '5',
            'to_user_id' => '768',
            'action' => 'Accepted',
            'comments' => $comment,
            'attachment' => $filePath ?? null,
           ]);
           ApplicationTimeline::create([
            'basic_info_id' => $basicInfoId,
            'user_id' => $userId,
            'stage' => 'DG Review',
            'status' => 'Accepted',
            ]);
           DB::commit();
           return response()->json(['success' => true]);
       } catch (\Exception $e) {
           DB::rollBack();
           return response()->json(['success' => false, 'message' => $e->getMessage()]);
       }
   }

   public function reverseappdirectorate(Request $request)
   {
    $userId = session('id'); 
    $basicInfoId = $request->input('basic_info_id');
    $comment = $request->input('do_comment');
    $filePath = null;
       DB::beginTransaction();
   
       try {
        if ($request->hasFile('do_attachment')) {
            $file = $request->file('do_attachment');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
        }
           $basicInfo = BasicInformationModel::where('id', $basicInfoId)->first();
           if ($basicInfo) {
               $basicInfo->status = 3;
               $basicInfo->save();
           }
           Detail::where('basic_info_id', $basicInfoId)->update(['status_id' => 3]);
           ApplicationWorkflow::create([
            'basic_info_id' => $basicInfoId,
            'from_user_id' => '5',
            'to_user_id' => '4',
            'action' => 'Reversed',
            'comments' => $comment,
            'attachment' => $filePath ?? null,
           ]);
           ApplicationTimeline::create([
            'basic_info_id' => $basicInfoId,
            'user_id' => $userId,
            'stage' => 'DG Review',
            'status' => 'Reversed',
            ]);
           DB::commit();
           return response()->json(['success' => true]);
       } catch (\Exception $e) {
           DB::rollBack();
           return response()->json(['success' => false, 'message' => $e->getMessage()]);
       }
   }

   
   public function rejectappdirectorate(Request $request)
   {
    $userId = session('id'); 
    $basicInfoId = $request->input('basic_info_id');
    $comment = $request->input('do_comment');
    $filePath = null;
       DB::beginTransaction();
   
       try {
        if ($request->hasFile('do_attachment')) {
            $file = $request->file('do_attachment');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
        }
           $basicInfo = BasicInformationModel::where('id', $basicInfoId)->first();
           if ($basicInfo) {
               $basicInfo->reject = 1;
               $basicInfo->save();
           }
           Detail::where('basic_info_id', $basicInfoId)->update(['reject' => 1]);
           ApplicationWorkflow::create([
            'basic_info_id' => $basicInfoId,
            'from_user_id' => '5',
            'to_user_id' => '000',
            'action' => 'Rejected',
            'comments' => $comment,
            'attachment' => $filePath ?? null,
           ]);
           ApplicationTimeline::create([
            'basic_info_id' => $basicInfoId,
            'user_id' => $userId,
            'stage' => 'DG Review',
            'status' => 'Rejected',
            ]);
           DB::commit();
           return response()->json(['success' => true]);
       } catch (\Exception $e) {
           DB::rollBack();
           return response()->json(['success' => false, 'message' => $e->getMessage()]);
       }
   }

   public function loadNGOtimeline(Request $request)
   {
       $id = $request->input('basic_info_id');
       $user_id = $request->input('user_id');

       $records = ApplicationTimeline::where('basic_info_id', $id)
       ->orderBy('created_at', 'asc')
       ->get();

       return response()->json(['data' => $records]);
   }
   
public function do_forwarded_apps_list()
{
    $userId = session('id');
    $district_id = session('district_id');
    $records = BasicInformationModel::whereIn('status', [2])
    ->where('district_id', $district_id)
    ->get();

    return view('do_forwarded_apps', compact('records',));
    
}

public function ad_accepted_apps_list()
{
    $userId = session('id');
    $district_id = session('district_id');
    $records = BasicInformationModel::whereIn('status', [5])->get();

    return view('ad_accepted_apps_list', compact('records',));
    
}

public function dg_accepted_apps_list()
{
    $userId = session('id');
    $district_id = session('district_id');
    $records = BasicInformationModel::whereIn('status', [5])->get();

    return view('dg_accepted_apps_list', compact('records',));
    
}
public function dg_rejected_apps_list()
{
    $userId = session('id');
    $district_id = session('district_id');
    $records = BasicInformationModel::whereIn('reject', [1])->get();

    return view('dg_rejected_apps_list', compact('records',));
    
}

public function ad_forwarded_apps_list()
{
    $userId = session('id');
    $district_id = session('district_id');
    $records = BasicInformationModel::whereIn('status', [3])->get();

    return view('ad_forwarded_apps', compact('records',));
    
}

public function dd_forwarded_apps_list()
{
    $userId = session('id');
    $district_id = session('district_id');
    $records = BasicInformationModel::whereIn('status', [4])->get();

    return view('dd_forwarded_apps', compact('records',));
    
}

public function forwardapp_dd(Request $request)
{
    $userId = session('id'); 
    $basicInfoId = $request->input('basic_info_id');
    $comment = $request->input('do_comment');
    $filePath = null;
    DB::beginTransaction();

    try {
      // Handle file upload 111
      if ($request->hasFile('do_attachment')) {
         $file = $request->file('do_attachment');
         $fileName = time().'_'.$file->getClientOriginalName();
         $filePath = $file->storeAs('uploads', $fileName, 'public');
     }
        $basicInfo = BasicInformationModel::where('id', $basicInfoId)->first();
        if ($basicInfo) {
            $basicInfo->status = 4;
            $basicInfo->save();
        }
        Detail::where('basic_info_id', $basicInfoId)->update(['status_id' => 4]);
        ApplicationWorkflow::create([
         'basic_info_id' => $basicInfoId,
         'from_user_id' => '4',
         'to_user_id' => '5',
         'action' => 'Forwarded',
         'comments' => $comment,
         'attachment' => $filePath ?? null,
        ]);
        ApplicationTimeline::create([
         'basic_info_id' => $basicInfoId,
         'user_id' => $userId,
         'stage' => 'DD Review',
         'status' => 'Forwarded',
         ]);
        DB::commit();
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
}

public function reverseapp_dd(Request $request)
   {
       $userId = session('id'); 
       $basicInfoId = $request->input('basic_info_id');
       $comment = $request->input('do_comment');
       $filePath = null;
       DB::beginTransaction();
   
       try {
        if ($request->hasFile('do_attachment')) {
            $file = $request->file('do_attachment');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
        }
           $basicInfo = BasicInformationModel::where('id', $basicInfoId)->first();
           if ($basicInfo) {
               $basicInfo->status = 2;
               $basicInfo->save();
           }
           Detail::where('basic_info_id', $basicInfoId)->update(['status_id' => 2]);
           ApplicationWorkflow::create([
            'basic_info_id' => $basicInfoId,
            'from_user_id' => '4',
            'to_user_id' => '3',
            'action' => 'Reversed',
            'comments' => $comment,
            'attachment' => $filePath ?? null,
           ]);
           ApplicationTimeline::create([
            'basic_info_id' => $basicInfoId,
            'user_id' => $userId,
            'stage' => 'DD Review',
            'status' => 'Reversed',
            ]);
           DB::commit();
           return response()->json(['success' => true]);
       } catch (\Exception $e) {
           DB::rollBack();
           return response()->json(['success' => false, 'message' => $e->getMessage()]);
       }
   }
}
