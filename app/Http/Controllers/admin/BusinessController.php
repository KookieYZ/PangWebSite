<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Businesses;
use App\Services\ImageManager;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;


class BusinessController extends Controller
{

    private $ImgMng;
    private $model;

    public function __construct(ImageManager $imgObj, Businesses $businessObj)
    {
        $this->middleware('auth');
        $this->ImgMng = $imgObj;
        $this->model = $businessObj;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'image_path' => 'mimes:jpeg,jpg,png,gif|max:10000',
            // 'status'=>'required|boolean'
        ]);
    }

    public function index()
    {
        $business = Businesses::orderBy('created_at', 'DESC')->simplePaginate(10);
        return view('admin.business.index', compact('business'))->with('business', $business);
    }


    public function create()
    {
        $business = new Businesses();
        $businessCatList = $this->model->getCatList();
        $selectedCode = "DEF";
        return view('admin.business.create', compact('businessCatList', 'selectedCode'));
    }


    public function store(Request $request)
    {
        $this->validator($request->all())->validate();


        date_default_timezone_set("Asia/Kuala_Lumpur");

        $business = new Businesses();
        $business->name = $request['name'];
        $business->description = $request['description'];
        $business->image_path = $this->ImgMng->insertImage($request, 'image_path', 'business');
        $business->category = $request['category'];
        $business->background = $request['background'];
        $business->address = $request['address'];
        $business->status = $request['status'] == null ? false : $request['status'];
        $business->created_at = now();
        $business->updated_at = now();
        $isCreated = $business->save();
        if ($isCreated) {
            return redirect()->route('business.index')->with('success', '彭氏来源资料创建成功!');
        }
        return redirect()->route('business.index')->with('error', "Somethings went wrong");
    }


    public function show($id)
    {
        $business = Businesses::find($id);
        $businessCatName = $this->model->getFullCategoryName($business->category);
        return view('admin.business.show', compact('business', 'businessCatName'));
    }



    public function edit($id)
    {
        $business = Businesses::find($id);
        $businessCatList = $this->model->getCatList();
        return view('admin.business.edit', compact('business', 'businessCatList'));
    }


    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $business = Businesses::find($id);
        $business->name = $request['name'];
        $business->description = $request['description'];
        $business->image_path = $this->ImgMng->updateImage($request, $id, 'image_path', 'business', 'businesses');
        $business->category = $request['category'];
        $business->background = $request['background'];
        $business->address = $request['address'];
        $business->status = $request['status'] == null ? false : $request['status'];
        $business->updated_at = now();
        $isUpdated = $business->save();
        if ($isUpdated) {
            return redirect()->route('business.index')->with('success', "$business->name 资料更改成功!");
        }
        return redirect()->route('business.index')->with('error', "Somethings went wrong");
    }

    public function destroy($id)
    {
        $business = Businesses::find($id);
        $business->delete();
        return redirect()->route('business.index')->with('success', "$business->name 资料删除成功!");
    }
}