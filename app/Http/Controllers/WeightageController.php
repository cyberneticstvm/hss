<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weightage;
use Carbon\Carbon;
use DB;

class WeightageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$weightage = DB::table('weightage')->find($id);
        $weightage = Weightage::find($id);
        $weightages = DB::table('weightages_ext')->get();
        $weightages = json_decode(json_encode($weightages), true);
        return view('admin.weightage', compact('weightage', 'weightages'));
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
        $weightage = Weightage::find($id);
        $weightage->update($input);
        DB::table('weightages_ext')->delete();
        try{
            foreach($input['cr5_min'] as $key => $value):
                DB::table('weightages_ext')->insert([
                    'category' => 'civil',
                    'min_val' => $input['cr5_min'][$key],
                    'max_val' => $input['cr5_max'][$key],
                    'score' => $input['cr5_score'][$key],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            endforeach;
            foreach($input['cr6_min'] as $key => $value):
                DB::table('weightages_ext')->insert([
                    'category' => 'chemical',
                    'min_val' => $input['cr6_min'][$key],
                    'max_val' => $input['cr6_max'][$key],
                    'score' => $input['cr6_score'][$key],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            endforeach;
            foreach($input['cr7_min'] as $key => $value):
                DB::table('weightages_ext')->insert([
                    'category' => 'structural',
                    'min_val' => $input['cr7_min'][$key],
                    'max_val' => $input['cr7_max'][$key],
                    'score' => $input['cr7_score'][$key],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            endforeach;
            foreach($input['cr8_min'] as $key => $value):
                DB::table('weightages_ext')->insert([
                    'category' => 'mechanical',
                    'min_val' => $input['cr8_min'][$key],
                    'max_val' => $input['cr8_max'][$key],
                    'score' => $input['cr8_score'][$key],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            endforeach;
        }catch(Exception $e){
            throw $e;
        }        
        return redirect()->route('admin.weightage.edit', $id)->with('success','Settings updated successfully');
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
