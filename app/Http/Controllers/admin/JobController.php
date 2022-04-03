<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Services\ImageManager;
use App\Services\JobCategoryManager;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;


class JobController extends Controller
{

    private $ImgMng;
    private $model;


    public function __construct(ImageManager $imgObj, Job $jobObj) {
        $this->middleware('auth');
        $this->ImgMng = $imgObj;
        $this->model = $jobObj;       
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'=> 'required',
            'image_path'=>'mimes:jpeg,jpg,png,gif|max:10000',
            // 'status'=>'required|boolean'
        ]);
    }

    public function index()
    {
        $jobs = Job::orderBy('created_at', 'DESC')->simplePaginate(10);    
        return view('admin.job.index', compact('jobs'))->with('jobs',$jobs);  
    }

   
    public function create()
    { 
        $job = new Job();
        $jobCatList = $this->model->getCatList();
        $selectedCode = "DEF";
        return view('admin.job.create',compact('jobCatList','selectedCode'));
 
    }

   
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
       

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $job = new Job();
        $job->name = $request['name'];
        $job->description = $request['description'];
        $job->note = $request['note'];
        $job->image_path = $this->ImgMng->insertImage($request,'job');
        $job->category = $request['category'];
        $job->salary = $request['salary'];
        $job->background = $request['background'];
        $job->address = $request['address'];
        $job->posted_on = $request['posted_on'];
        $job->status = $request['status'] == null ? 1 : $request['status'];
        $job->created_at = now();
        $job->updated_at = now();
        $isCreated = $job->save();
        if($isCreated){
        return redirect()->route('job.index')->with('success', '彭氏来源资料创建成功!');
        }
        return redirect()->route('job.index')->with('error', "Somethings went wrong");
    }

  
    public function show($id)
    {
        $job = Job::find($id);
        $jobCatName = $this->model->getFullCategoryName($job->category);
        return view('admin.job.show', compact('job','jobCatName'));
    }

    
    
    public function edit($id)
    {
        $job = Job::find($id);
        $jobCatList= $this->model->getCatList();
        return view('admin.job.edit', compact('job', 'jobCatList'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $job = Job::find($id);
        $job->name = $request['name'];
        $job->description = $request['description'];
        $job->note = $request['note'];
        $job->image_path = $this->ImgMng->updateImage($request,$id,'job','jobs');
        $job->category = $request['category'];
        $job->salary = $request['salary'];
        $job->background = $request['background'];
        $job->address = $request['address'];
        $job->posted_on = $request['posted_on'];
        $job->status = $request['status'] == null ? 1 : $request['status'];       
        $job->updated_at = now();
        $isUpdated = $job->save();
        if($isUpdated){
             return redirect()->route('job.index')->with('success', "$job->name 资料更改成功!");
        }
             return redirect()->route('job.index')->with('error', "Somethings went wrong");
    }

    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();
        return redirect()->route('job.index')->with('success', "$job->name 资料删除成功!");

    }
    
}
