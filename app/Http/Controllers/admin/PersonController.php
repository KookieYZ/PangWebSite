<?php

namespace App\Http\Controllers\Admin;

use Auth;
use DateTime;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'              => 'required|string|max:50',
            // 'avatar'            => 'image|mimes:jpeg,png,jpg|max:6000',
<<<<<<< HEAD
            'spouse_name'       => 'max:50|nullable',
=======
            // 'spouse_name'       => 'string|max:50|nullable',
>>>>>>> 4426cbd59a09ac6b15820702d564b99b78ebd520
            // 'spouse_avatar'     => 'image|mimes:jpeg,png,jpg|max:6000',
            'gender'            => 'required|string',
            'state'             => 'string|required',
            'nationality'       => 'string|required',
            'dob_date'          => 'required',
            'parent_id'         => 'integer|nullable',
            'era'               => 'string|required'
        ]);
    }

    public function index() {
        $persons = People::orderBy('created_at', 'DESC')->simplePaginate(10);
        $persons->spouse_name = explode('|',$persons->spouse_name);

        return view('admin.person.index', compact('persons'))->with('persons',$persons);
    }

    public function create() {
        $persons = People::orderBy('created_at', 'DESC')->get();
        return view('admin.person.create', compact('persons'));
    }

    public function store(Request $request) {

        $this->validator($request->all())->validate();
        $request->validate([
            'spouse_name.*.spouse_name' => 'required'
        ]);

        date_default_timezone_set("Asia/Kuala_Lumpur");

        if($request->hasFile('avatar')) {
            $fileNameUploaded = $request->file('avatar')->getClientOriginalName();
            $fileName = pathinfo($fileNameUploaded, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $avatar = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->move('image/avatar', $avatar);
        }
        else {
            $avatar = 'noimage.jpg';
        }

        // $test1 = [];
        // $test2 = [];
        // $test3 = [];
        // $test4 = [];
        // $test = $request->file('spouse_avatar');
        // foreach ($test as $key => $value) {
        //     $test1[] = $test[$key]->getClientOriginalName();
        //     $test2[] = pathinfo($test1[$key], PATHINFO_FILENAME);
        //     $test3[] = $test[$key]->getClientOriginalExtension();
        //     $test4[] = $test2[$key].'_'.time().'.'.$test3[$key];
        //     $test5 = $test[$key]->move('image/avatar', $test4[$key]);
        // }
        // dd($test1, $test2, $test3, $test4);
        if($request->hasFile('spouse_avatar')) {
            $spouseavatar1 = [];
            $spouseavatar2 = [];
            $spouseavatar3 = [];
            $spouseavatar4 = [];
            $filerequest = $request->file('spouse_avatar');
            foreach ($filerequest as $key => $value) {
                $spouseavatar1[] = $filerequest[$key]->getClientOriginalName();
                $spouseavatar2[] = pathinfo($spouseavatar1[$key], PATHINFO_FILENAME);
                $spouseavatar3[] = $filerequest[$key]->getClientOriginalExtension();
                $spouseavatar4[] = $spouseavatar2[$key].'_'.time().'.'.$spouseavatar3[$key];
                $spouseavatar5 = $filerequest[$key]->move('image/avatar', $spouseavatar4[$key]);
            }
            $spouse_avatar = implode('|', $spouseavatar4);
            // $fileNameUploaded2 = $request->file('spouse_avatar')->getClientOriginalName();
            // $fileName2 = pathinfo($fileNameUploaded2, PATHINFO_FILENAME);
            // $extension2 = $request->file('spouse_avatar')->getClientOriginalExtension();
            // $spouse_avatar = $fileName2.'_'.time().'.'.$extension2;
            // $path2 = $request->file('spouse_avatar')->move('image/avatar', $spouse_avatar);
        }
        else {
            $spouse_avatar = 'noimage.jpg';
        }

        // $dob_date = $request->get('dob_date');
        // $dob_date =  Carbon::parse($dob_date);
        // $dob_date = $dob_date->format('Y-m-d');

        // DB::table('persons')->insert([
        //     'name' => $request->get('name'),
        //     'avatar' => $avatar,
        //     'spouse_name' => $request->get('spouse_name'),
        //     'spouse_avatar' => $spouse_avatar,
        //     'gender' => $request->get('gender'),
        //     'state' => $request->get('state'),
        //     'nationality' => $request->get('nationality'),
        //     'dob_date' => $dob_date,
        //     'parent_id' => Auth::id(),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        // $dateTime = strtotime($request['dob_date']);
        // $convertedDate = date('Y-m-d',$dateTime);
        $date = $request->get('dob_date');
        $convertedDate = DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');

        $spousename = $request->get('spouse_name');
        $spousename = implode('|', $spousename);

        // for($i=0;$i<count($spousename);$i++){
        //     $person = new People([
        //         'name' => $request['name'],
        //         'avatar' => $avatar,
        //         'spouse_name' => $spousename[$i],
        //         'spouse_avatar' => $spouse_avatar,
        //         'gender' => $request['gender'],
        //         'state' => $request['state'],
        //         'nationality' => $request['nationality'],
        //         'dob_date' => $convertedDate,
        //         'parent_id' => $request->parent_id,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        //     $person->save();
        // }
        $person = new People;
        $person->name = $request['name'];
        $person->avatar = $avatar;
<<<<<<< HEAD
        // $person->spouse_name = $request['spouse_name'];
        $person->spouse_name = $spousename;
=======
        $person->spouse_name = $person->convertArraysToString($request->spouse_name,'|');
>>>>>>> 4426cbd59a09ac6b15820702d564b99b78ebd520
        $person->spouse_avatar = $spouse_avatar;
        $person->gender = $request['gender'];
        $person->state = $request['state'];
        $person->nationality = $request['nationality'];
        $person->dob_date = $convertedDate;
        $person->parent_id = $request->parent_id;
        $person->created_at = now();
        $person->updated_at = now();
        $person->save();

        return redirect()->route('relationship.index')->with('success', '人际关系创建成功!');
    }

    public function show($id) {
        $person = People::find($id);
        return view('admin.person.show', compact('person'));
    }

    public function edit($id) {
        $person = People::find($id);
        $persons = People::orderBy('id', 'ASC')->get()->except($person->parent_id);
        return view('admin.person.edit', compact('person', 'persons'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name'              => 'string|max:50',
            // 'avatar'            => 'image|mimes:jpeg,png,jpg|max:6000',
            'spouse_name'       => 'string|max:50|nullable',
            // 'spouse_avatar'     => 'image|mimes:jpeg,png,jpg|max:6000',
            'gender'            => 'string',
            'state'             => 'string',
            'nationality'       => 'string',
            'parent_id'         => 'integer|nullable',
            'era'               => 'string'
        ]);

        date_default_timezone_set("Asia/Kuala_Lumpur");

        if($request->hasFile('avatar')) {
            $fileNameUploaded = $request->file('avatar')->getClientOriginalName();
            $fileName = pathinfo($fileNameUploaded, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $avatar = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->move('image/avatar', $avatar);
        }
        else {
            $avatar = DB::table('people')
                ->where('id', $id)
                ->pluck('avatar')
                ->toArray();

            $avatar = implode("",$avatar);
        }

        if($request->hasFile('spouse_avatar')) {
            $fileNameUploaded2 = $request->file('spouse_avatar')->getClientOriginalName();
            $fileName2 = pathinfo($fileNameUploaded2, PATHINFO_FILENAME);
            $extension2 = $request->file('spouse_avatar')->getClientOriginalExtension();
            $spouse_avatar = $fileName2.'_'.time().'.'.$extension2;
            $path2 = $request->file('spouse_avatar')->move('image/avatar', $spouse_avatar);
        }
        else {
            $spouse_avatar = DB::table('people')
                ->where('id', $id)
                ->pluck('spouse_avatar')
                ->toArray();

            $spouse_avatar = implode("",$spouse_avatar);
        }

        $date = $request->get('dob_date');
        $convertedDate = DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');

        $person = People::find($id);
        $person->name = $request['name'];
        $person->avatar = $avatar;
        $person->spouse_name = $request['spouse_name'];
        $person->spouse_avatar = $spouse_avatar;
        $person->gender = $request['gender'];
        $person->state = $request['state'];
        $person->nationality = $request['nationality'];
        $person->dob_date = $convertedDate;
        $person->parent_id = $request->parent_id;
        $person->created_at = now();
        $person->updated_at = now();
        $person->save();

        return redirect()->route('relationship.index')->with('success', "$person->name 资料更改成功!");
    }

    public function destroy($id) {
        $person = People::find($id);
        $person->delete();

        return redirect()->route('relationship.index')->with('success', "$person->name 资料删除成功");
    }

}
