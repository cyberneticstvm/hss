<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Hash;
use DB;
use Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function signup(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required|unique:users,mobile',
            'email' => 'required|email|unique:users,email',
            'company_type' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);       
        
        $token = Str::random(64);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['user_type'] = 'user';
        $input['email_token'] = $token;

        $user = User::create($input);

        Mail::send('email.user-verification-email', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Suchitwa Mission - Verification Email');
        });

        return redirect()->route('user.signup')
                        ->with('success','Success! Validation email has been sent to registered email id. Please verify your email id before proceeding further.');
    }

    public function verifyemail($token){
        try{
            User::where('email_token', $token)->where('email_verified_at', NULL)->update(['email_verified_at' => Carbon::now()]);
        }catch(Exception $e){
            throw $e;
        }
        return redirect()->route('user.login')
                        ->with('success', "You've successfully verified your email. Please Login to continue.");
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);   
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            if(Auth::User()->email_verified_at == NULL){
                return redirect()->route('user.login')->with('error', 'User verification not yet to be completed.');
            }else{
                return redirect()->route('user.dash')
                        ->with('success','User Logged in successfully');
            }
        }else{
            return redirect()->route('user.login')->with('error', 'Login details are not valid');
        } 
    }
    public function adminlogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);   

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if(Auth::User()->email_verified_at == NULL){
                return redirect()->route('admin.login')->with('error', 'User verification not yet to be completed.');
            }else if(Auth::User()->user_type == 'user'){
                return redirect()->route('admin.login')->with('error', 'Login details are not valid');
            }else{
                return redirect()->route('admin.dash')
                        ->with('success','User Logged in successfully');
            }
        }else{
            return redirect()->route('admin.login')->with('error', 'Login details are not valid');
        } 
    }

    public function userlogout(){
        Session::flush();
        Auth::logout();  
        return Redirect('/user/login/');
    }
    public function adminlogout(){
        Session::flush();
        Auth::logout();  
        return Redirect('/admin/login/');
    }

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
        //
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
        //
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

    public function forgotpwd(){
        return view('forgot-password');
    }

    public function forgotpwdmail(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
        $token = User::where('email', $request->email)->value('email_token');
        if($token):
            Mail::send('email.password-reset-email', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Suchitwa Mission - Password Reset Email');
            });
            return redirect()->route('forgotpwd')
                        ->with('success','Success! Password Rest email has been sent to registered email id.');
        else:
            return redirect()->route('forgotpwd')->with('error', 'Provided email not found in the records.');
        endif;
    }

    public function resetpasswordform($token){
        return view('password-reset', compact('token'));
    }

    public function resetpassword(Request $request){
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
            'token' => 'required',
        ]);
        $password = Hash::make($request->password);
        try{
            User::where('email_token', $request->token)->update(['password' => $password]);
        }catch(Exception $e){
            throw $e;
        }
        return redirect()->route('user.login')
                        ->with('success', "You've successfully updated your password. Please Login to continue.");
    }
}
