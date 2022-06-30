<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class BusinessListController extends Controller
{
    private $model;

    public function __construct(Job $jobObj)
    {
        $this->model = $jobObj;
    }

    public function index()
    {
        $businessList = Job::orderBy('created_at', 'DESC')->where('status', 1)->get();    
        foreach($businessList as $business){$business->category = $business->getFullCategoryName($business->category);}
        $job = new Job();
        $jobCatList = $this->model->getCatList();
        $selectedCode = "DEF";
        return view('user.business', compact('businessList', 'jobCatList', 'job'));  
    }

    public function show($id) {
        $Business = Job::find($id);
        $Business->category = $Business->getFullCategoryName($Business->category);
        
        return view('user.business', compact('Business'));
    }

}
