<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index () {
            return view('dashboard');
    }
    public function home (){

        $jobs = Listing::with('profile')->get();
        return view('home', compact('jobs'));
    }
    public function verify(){
        $user = Auth::user();
        if($user->hasVerifiedEmail()){
            if ($user->user_type == 'admin'){
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('home');
            }

        }
        return view('user.verify');
    }
    public function resend(Request $request){
        $user = Auth::user();
        if($user->hasVerifiedEmail()){
            if ($user->user_type == 'admin'){
                return redirect()->route('dashboard')->with('success', 'Your email was verified');
            }else{
                return redirect()->route('home')->with('success', 'Your email was verified');
            }

        }
        $user->sendEmailVerificationNotification();
        return back()->with('success', 'Verification link sent successfully');
    }
}
