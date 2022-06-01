<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;


class BusinessDetailController extends Controller
{
    public function getBusinessDetail($id) {
        $businessDetail = Job::find($id);
        $businessDetail->category = $businessDetail->getFullCategoryName($businessDetail->category);
        return view('user.businessDetail', compact('businessDetail'));
    }
}
