<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Businesses;

class BusinessListController extends Controller
{
    private $model;

    public function __construct(Businesses $businessObj)
    {
        $this->model = $businessObj;
    }

    public function index()
    {
        $businessList = Businesses::orderBy('created_at', 'DESC')->where('status', 1)->get();    
        foreach($businessList as $business){$business->category = $business->getFullCategoryName($business->category);}
        $business = new Businesses();
        $businessCatList = $this->model->getCatList();
        $selectedCode = "DEF";
        return view('user.business', compact('businessList', 'businessCatList', 'business'));  
    }

    public function show($id) {
        $Business = Businesses::find($id);
        $Business->category = $Business->getFullCategoryName($Business->category);
        
        return view('user.business', compact('Business'));
    }

}
