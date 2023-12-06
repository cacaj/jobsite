<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class JobListController extends Controller
{
    public function index(){
        $jobs = Listing::with('profile')->get();

        return view('main' , compact('jobs'));
    }
}
