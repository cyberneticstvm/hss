<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SettingsController extends Controller
{
    protected $settings;

    public function __construct(){
        $this->settings = DB::table('settings')->find(1);
    }
    public function fyearedit(){
        $settings = $this->settings;
        return view('settings.fyear', compact('settings'));
    }
    public function fyearupdate(Request $request){
        $this->validate($request, [
            'fyear_start' => 'required',
            'fyear_end' => 'required',
        ]);
        $upd = DB::table('settings')->where('id', 1)->update(['fyear_start' => $request->fyear_start, 'fyear_end' => $request->fyear_end]);
        return redirect()->route('settings.fyear.edit')->with('success','Record updated successfully');
    }
    public function comedit(){
        $settings = $this->settings;
        return view('settings.com', compact('settings'));
    }
    public function comupdate(Request $request){
        $this->validate($request, [
            'cut_off_mark' => 'required',
        ]);
        $upd = DB::table('settings')->where('id', 1)->update(['cut_off_mark' => $request->cut_off_mark]);
        return redirect()->route('settings.com.edit')->with('success','Record updated successfully');
    }
}
