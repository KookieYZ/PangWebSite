<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class JobDetailController extends Controller
{
    public function getJobDetail($id) {
        $jobDetail = Job::find($id);
        $jobDetail->category = $jobDetail->getFullCategoryName($jobDetail->category);
        return view('user.jobDetail', compact('jobDetail'));
    }
}
