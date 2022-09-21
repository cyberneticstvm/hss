<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;
use Illuminate\Support\Str;
use Mail;
use DB;
use Auth;

class CompanyController extends Controller
{
    protected $attachments, $settings;

    public function __construct(){
        $this->attachments = array(1 => 'Scanned_Cover_Letter.pdf', 2 => 'Partneship_Deed.pdf', 3 => 'Certificate_of_Incorporation.pdf', 4 => 'Balance_Sheet.pdf', 5 => 'Certificate_of_turover.pdf', 6 => 'Certificate_of_Net_Worth.pdf', 7 => 'Work_Orders.pdf', 8 => 'Letter_of_Satisfaction.pdf', 9 => 'Copies_of_Project_Completion.pdf', 10 => 'Qualification_and_Experince.pdf');
        
        $this->settings = DB::table('settings')->selectRaw("YEAR(fyear_start) AS fyear_start, YEAR(fyear_end) AS fyear_end, CONCAT_WS('-', CONVERT(YEAR(fyear_start), UNSIGNED)-1, YEAR(fyear_start)) AS last_fyear, CONCAT_WS('-', CONVERT(YEAR(fyear_start), UNSIGNED)-2, CONVERT(YEAR(fyear_start), UNSIGNED)-1) AS second_last_fyear, CONCAT_WS('-', CONVERT(YEAR(fyear_start), UNSIGNED)-3, CONVERT(YEAR(fyear_start), UNSIGNED)-2) AS third_last_fyear, admin_email, admin_name")->get()->first();
    }

    public function index()
    {
        $utype = Auth::user()->user_type;
        $rcount = 0; $title = 'All';
        if($utype == 'user'):
            $companies = Company::leftJoin('company_types as ct', 'companies.type_id', '=', 'ct.id')->leftJoin('status as s', 's.id', '=', 'companies.status')->selectRaw("companies.id, companies.name, companies.score, ct.name as tname, DATE_FORMAT(companies.date_of_incorp, '%d/%b/%Y') AS idate, companies.registered_address, companies.contact_address, companies.contact_person, companies.contact_number, companies.email, s.name as status, companies.status as stat")->where('companies.user_id', Auth::user()->id)->get();
            $rcount = count($companies);
            return view('user.dash', compact('companies', 'rcount'));
        else:
            $companies = Company::leftJoin('company_types as ct', 'companies.type_id', '=', 'ct.id')->leftJoin('status as s', 's.id', '=', 'companies.status')->selectRaw("companies.id, companies.score, companies.name, ct.name as tname, DATE_FORMAT(companies.date_of_incorp, '%d/%b/%Y') AS idate, companies.registered_address, companies.contact_address, companies.contact_person, companies.contact_number, companies.email, s.name as status")->orderByDesc('id')->get();
            return view('admin.dash', compact('companies', 'rcount', 'title'));            
        endif;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ctypes = DB::table('company_types')->pluck('name', 'id')->all();
        $pstypes = DB::table('project_status')->pluck('name', 'id')->all();
        $settings = $this->settings;
        return view('user.create-company', compact('ctypes', 'pstypes', 'settings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $input['user_id'] = $request->user()->id;
        $input['status'] = 1;
        $folder = Str::random(9);
        $input['folder'] = $folder;
        try{
            foreach($this->attachments as $key => $value):
                if($request->hasFile('attachment_'.$key)):
                    $file = $request->file('attachment_'.$key);
                    $fname = 'uploads/'.$folder.'/'.$value;
                    Storage::disk('public')->putFileAs($fname, $file, ''); 
                    $input['attachment_'.$key] = $fname;
                endif;
            endforeach;

            DB::beginTransaction();
            $record = Company::create($input);

            foreach($request->project_name as $key => $value):
                if($input['project_status'][$key] > 0):
                    DB::table('company_projects')->insert([
                        'company_id' => $record->id,
                        'project_name' => $input['project_name'][$key],
                        'client_name' => $input['client_name'][$key],
                        'project_cost' => $input['project_cost'][$key],
                        'project_period' => $input['project_period'][$key],
                        'project_start_date' => $input['project_start_date'][$key],
                        'project_status' => $input['project_status'][$key],
                    ]);
                endif;
            endforeach;
        }catch(Exception $e){
            DB::rollback();
            throw $e;
        }
        DB::commit();

        Mail::send('email.new-company-notification-email', ['cid' => $record->id], function($message) use($request){
            $message->to($this->settings->admin_email);
            $message->subject('Suchitwa Mission - New Firm Has Been Submitted');
        });
        
        return redirect()->route('user.dash')->with('success','Record added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rcount = 0;
        $title = DB::table('status')->where('id', $id)->value('name');
        $companies = Company::leftJoin('company_types as ct', 'companies.type_id', '=', 'ct.id')->leftJoin('status as s', 's.id', '=', 'companies.status')->where('companies.status', $id)->selectRaw("companies.id, companies.score, companies.name, ct.name as tname, DATE_FORMAT(companies.date_of_incorp, '%d/%b/%Y') AS idate, companies.registered_address, companies.contact_address, companies.contact_person, companies.contact_number, companies.email, s.name as status")->orderByDesc('id')->get();
        return view('admin.dash', compact('companies', 'rcount', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        $projects = DB::table('company_projects')->where('company_id', $id)->get();
        $ctypes = DB::table('company_types')->pluck('name', 'id')->all();
        $pstypes = DB::table('project_status')->pluck('name', 'id')->all();
        $settings = $this->settings;
        return view('user.edit-company', compact('company', 'ctypes', 'pstypes', 'projects', 'settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $input['user_id'] = $request->user()->id;
        $input['status'] = 1;

        $company = Company::find($id);
        $folder = $company->getOriginal('folder');
        try{
            foreach($this->attachments as $key => $value):
                if($request->hasFile('attachment_'.$key)):
                    $file = $request->file('attachment_'.$key);
                    $fname = 'uploads/'.$folder.'/'.$value;
                    Storage::disk('public')->putFileAs($fname, $file, ''); 
                    $input['attachment_'.$key] = $fname;
                endif;
            endforeach;

            DB::beginTransaction();
            $record = $company->update($input);
            DB::table("company_projects")->where('company_id', $id)->delete();
            foreach($request->project_name as $key => $value):
                if($input['project_status'][$key] > 0):
                    DB::table('company_projects')->insert([
                        'company_id' => $id,
                        'project_name' => $input['project_name'][$key],
                        'client_name' => $input['client_name'][$key],
                        'project_cost' => $input['project_cost'][$key],
                        'project_period' => $input['project_period'][$key],
                        'project_start_date' => $input['project_start_date'][$key],
                        'project_status' => $input['project_status'][$key],
                    ]);
                endif;
            endforeach;
        }catch(Exception $e){
            DB::rollback();
            throw $e;
        }
        DB::commit();

        Mail::send('email.new-company-notification-email', ['cid' => $id], function($message) use($request){
            $message->to($this->settings->admin_email);
            $message->subject('Suchitwa Mission - New Firm Has Been Submitted');
        });
        
        return redirect()->route('user.dash')->with('success','Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
