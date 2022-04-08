<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class JobListController extends Controller
{
    public function index()
    {
        $jobList = Job::orderBy('created_at', 'DESC')->get();    
        return view('user.job', compact('jobList'));  
    }

    public function show($id) {
        $Jobs = Job::find($id);

        return view('user.job', compact('Jobs'));
    }

}
