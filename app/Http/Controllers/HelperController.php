<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HelperController extends Controller
{
    public function getProjectStatus(){
        $data = DB::table('project_status')->select('id', 'name')->get();
        return response()->json($data);
    }
}
