<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\People;
use App\Models\People_History;
use App\Services\ImageManager;
use App\Services\MediaManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeopleHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $model;
    public $imgService;
    public $mediaService;

    public function __construct(People_History $obj, ImageManager $imgObj, MediaManager $medObj) {
        $this->middleware('auth');
        $this->model = $obj;  
        $this->imgService = $imgObj;
        $this->mediaService = $medObj;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'history_name'=> 'required',
            'image_path'=>'mimes:jpeg,jpg,png,gif|max:10000',
            'incident_date' => 'required',
            'people_id' =>'required'
        ]);
    }
    public function index()
    {
        $people_history = $this->model::orderBy('created_at', 'DESC')->simplePaginate(10);
        foreach($people_history as $ppl){    
            $currentPerson = People::find($ppl->people_id);
            $ppl->people_id = $currentPerson->name;
        }
        return view('admin.people_history.index', compact('people_history'))->with('people_history',$people_history);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pplNameArr = People::select('name','id')->get();
        $selectedPerson = null;
        return view('admin.people_history.create',compact('pplNameArr','selectedPerson'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validator($request->all())->validate();    
         $isCreated = $this->model->create_update($request,null,$this->imgService,$this->mediaService);
         if($isCreated){
             return redirect()->route('people_history.index')->with('success', '事迹创建成功!');
         }
            return redirect()->route('people_history.index')->with('error', "Somethings went wrong");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $people_history = People_History::find($id);
        $pplNameArr = People::select('name','id')->get();
        return view('admin.people_history.show', compact('people_history','pplNameArr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $people_history = People_History::find($id);
        $pplNameArr = People::select('name','id')->get();
        return view('admin.people_history.edit', compact('people_history','pplNameArr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validator($request->all())->validate();
         $isUpdated = $this->model->create_update($request,$id,$this->imgService,$this->mediaService);
         if($isUpdated){
             return redirect()->route('people_history.index')->with('success', '事迹更改成功!');
         }
            return redirect()->route('people_history.index')->with('error', "Somethings went wrong");
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $isDeleted = $this->model->deleteRecord($id);
         $people_history_name = $this->model->history_name;
          if($isDeleted){
              return redirect()->route('people_history.index')->with('success', "$people_history_name 资料删除成功!");
         }
              return redirect()->route('people_history.index')->with('error', "Somethings went wrong");    
    }
}
