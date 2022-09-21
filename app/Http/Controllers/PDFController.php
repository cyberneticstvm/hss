<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

use QrCode;
use PDF;
use Carbon\Carbon;
use DB;

class PDFController extends Controller
{
    public function profile($id){
        $company = Company::find($id);
        $projects = DB::table('company_projects')->where('company_id', $id)->get();
        $pdf = PDF::loadView('/pdf/company-profile', compact('company', 'projects'));
        return $pdf->stream('company-profile.pdf', array("Attachment"=>0));
    }
}
