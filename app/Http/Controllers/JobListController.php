<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class JobListController extends Controller
{
    public function index(Request $request){

        $salary = $request->query('sort');
        $date = $request->query('date');
        $jobType = $request->query('job_type');

        $listings = Listing::query();
        if ($salary === 'salary_high_to_low'){
            $listings->orderByRaw('CAST(salary as UNSIGNED) DESC');
        }
        elseif ($salary === 'salary_low_to_high'){
            $listings->orderByRaw('CAST(salary as UNSIGNED) ASC');
        }

        if ($date === 'latest'){
            $listings->orderBy('created_at', 'desc');
        }
        elseif ($date === 'oldest'){
            $listings->orderBy('created_at', 'asc');
        }

        if ($jobType === 'full_time'){
            $listings->where('job_type', 'Full time');
        }
        elseif ($jobType === 'part_time'){
            $listings->where('job_type', 'Part time');
        }
        elseif ($jobType === 'casual'){
            $listings->where('job_type', 'Casual');
        }
        elseif ($jobType === 'contract'){
            $listings->where('job_type', 'Contract');
        }




        $jobs = $listings->with('profile')->get();

        return view('main' , compact('jobs'));
    }

    public function show (Listing $listing){
        return view('show', compact('listing'));
    }
}
