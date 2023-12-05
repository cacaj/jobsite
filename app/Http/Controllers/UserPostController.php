<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobEditRequest;
use App\Http\Requests\JobPostRequest;
use App\Models\Listing;
use App\Post\JobPost;



class UserPostController extends Controller
{
    protected $job;
    public function __construct(JobPost $job){
        $this->job = $job;
        $this->middleware(['auth', 'isAdmin']);
        $this->middleware('isPremiumUser')->only(['create', 'store']);

    }
    public function create(){
        return view('job.create');
    }

    public function store(JobPostRequest $request){

        $this->job->store($request);
        return redirect('job')->with('success', 'You have successfully posted your job!');

    }
    public function edit(Listing $listing){
        return view('job.edit', compact('listing'));
    }
    public function update($id, JobEditRequest $request){

       $this->job->updatePost($id, $request);
       return redirect('job')->with('success','You have successfully updated your job!');
    }
    public function destroy($id){

        Listing::find($id)->delete();
        return back()->with('success','You have successfully deleted your job!');
    }

    public function index(){
        $jobs = Listing::where('user_id', auth()->user()->id)->get();
        return view('job.index', compact('jobs'));

    }

}





