<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\StatusUpdate;
use App\Models\Score;
use Mail;
use DB;
use Auth;

class AdminController extends Controller
{
    protected $settings;

    public function __construct(){
        $this->settings = DB::table('settings')->find(1);
    }

    public function company($id){
        $company = Company::find($id);
        $qualifications = DB::table('company_projects')->where('company_id', $id)->get();
        if(Auth::User()->user_type == 'admin'):
            $status = DB::table('status')->pluck('name', 'id')->all();
        elseif(Auth::User()->user_type == 'staff'):
            $status = DB::table('status')->whereIn('id', [1,2,3,4])->pluck('name', 'id')->all();
        else:
            $status = DB::table('status')->where('id', 0)->pluck('name', 'id')->all();
        endif;
        return view('admin.company', compact('company', 'qualifications', 'status'));
    }

    public function evaluate($id){
        $company = Company::find($id);
        $score = Score::where('company_id', $id)->first();
        return view('admin.evaluate', compact('company', 'score'));
    }

    public function update(Request $request){
        $this->validate($request, [
            'comments' => 'required',
            'status_id' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = $request->user()->id;

        $status = DB::table('status')->where('id', $request->status_id)->pluck('name')->first();
        $dept = StatusUpdate::create($input);
        $upd = Company::where('id', $request->company_id)->update(['status' => $request->status_id, 'doc_1_status' => $request->doc_1_status, 'doc_2_status' => $request->doc_2_status, 'doc_3_status' => $request->doc_3_status, 'doc_4_status' => $request->doc_4_status, 'doc_5_status' => $request->doc_5_status, 'doc_6_status' => $request->doc_6_status, 'doc_7_status' => $request->doc_7_status, 'doc_8_status' => $request->doc_8_status, 'doc_9_status' => $request->doc_9_status, 'doc_10_status' => $request->doc_10_status]);

        Mail::send('email.company-status-update-email', ['comments' => $request->comments, 'status' => $status], function($message) use($request){
            $message->to($request->user_email);
            $message->subject('Suchitwa Mission - Application Status Updates');
        });

        return redirect()->route('admin.dash')->with('success','Record updated successfully');
    }

    public function updateScore(Request $request, $id){
        $input = $request->all();
        $input['created_by'] = $request->user()->id;
        $score = Score::upsert($input, ['company_id']);
        $upd = Company::where('id', $request->company_id)->update(['score' => $request->total]);
        return redirect()->route('admin.dash')->with('success','Record updated successfully');
    }
}
