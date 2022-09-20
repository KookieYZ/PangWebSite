<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class JobListController extends Controller
{
    public function index()
    {
        $jobList = Job::orderBy('created_at', 'DESC')->where('is_publish', 1)->get();   
        foreach($jobList as $job){$job->category = $job->getFullCategoryName($job->category);} 
        return view('user.job', compact('jobList'));  
    }

    public function show($id) {
        $Jobs = Job::find($id);
        $Jobs->category = $Jobs->getFullCategoryName($Jobs->category);
        return view('user.job', compact('Jobs'));
    }

}
