<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    const JOB_USER = 'user';
    const JOB_ADMIN = 'admin';
    public function createUser () {
        return view('user.registration');
    }

    public function createAdmin () {
        return view('user.admin-register');
    }

    public function storeAdmin (UserRegistrationRequest $request) {

        $admin = User::create([
            'name'=> request('name') ,
            'email'=> request('email'),
            'password'=> bcrypt(request('password')),
            'user_type'=> self::JOB_ADMIN,
            'user_trial'=> now()->addWeek()
        ]);
        Auth::login($admin);
        $admin->sendEmailVerificationNotification();

//        return response()->json('success');
        return redirect()->route('verification.notice')->with('success', 'Your accout was created successfully, please login!');
    }
    public function storeUser (UserRegistrationRequest $request) {

        $user = User::create([
           'name'=> request('name') ,
            'email'=> request('email'),
            'password'=> bcrypt(request('password')),
            'user_type'=> self::JOB_USER
        ]);

        Auth::login($user);
        $user->sendEmailVerificationNotification();
//        return back()->with('success','You have been registered successfully!');
        return redirect()->route('verification.notice')->with('success', 'Your accout was created successfully, please verify your account!');
    }
    public function login (){
        return view('user.login');
    }

    public function postLogin (Request $request){
        $request->validate([
           'email'=>'required',
           'password'=>'required'
        ]);

        $credentails = $request->only('email', 'password');

        if (Auth::attempt($credentails)) {
            if (\auth()->user()->user_type == 'admin') {
                return redirect()->to('dashboard');
            }else{
                return redirect()->to('home');
            }
        }
        return back()->with('error', 'Wrong email or password');
    }
    public function postLogout(){
        auth()->logout();
        return redirect()->route('main');
    }
    public function profile(){
        return view('profile.index');
    }
    public function update(Request $request){
        $request->validate([
            'profile_pic' => 'mimes:jpg,jpeg,png',
        ]);
        if ($request->hasFile('profile_pic')){
            $imagePath = $request->file('profile_pic')->store('profile','public');
            User::find(auth()->user()->id)->update(['profile_pic' => $imagePath]);
        }
        User::find(auth()->user()->id)->update($request->except('profile_pic'));

        return back()->with('success', 'Your profile updated successfully!');
    }

    public function uploadResume(Request $request){
        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx',
            ]);
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resume', 'public');
            User::find(auth()->user()->id)->update(['resume' => $resumePath]);
            return back()->with('success','Your resume has been changed successfully');

        }
    }
    public function userProfile(){
        return view('user.profile');
    }
    public function updatePassword(Request $request){

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = auth()->user();

        if(!Hash::check($request->current_password, $user->password)){
            return back()->with('error', 'Current password is incorrect');
        }
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success','Your password has been changed successfully');
    }

}
