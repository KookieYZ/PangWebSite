<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    // protected function validator(array $data)
    // {
        // return Validator::make($data, [
            // 'name'              => 'required|string|max:50',
            // 'avatar'            => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'spouse_name'       => 'required|string|max:50',
            // 'spouse_avatar'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'gender'            => 'required|string',
            // 'state'             => 'string|required',
            // 'nationality'       => 'string|required',
            // 'dbo_date'          => 'required',
            // 'parent_id'         => 'integer',
            // 'created_at'  => now(),
            // 'updated_at'  => now(),
        // ]);
    // }

    public function index() {
        return view('admin.person.index');
    }

    public function create() {
        return view('admin.person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        error_log('result = aaa');
        $request->validate([
            'name'              => 'required|string|max:50',
            'avatar'            => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'spouse_name'       => 'required|string|max:50',
            'spouse_avatar'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender'            => 'required|string',
            'state'             => 'string|required',
            'nationality'       => 'string|required',
            'dbo_date'          => 'required',
            'parent_id'         => 'integer',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        if($request->hasFile('avatar')) {
            $fileNameUploaded = $request->file('avatar')->getClientOriginalName();
            $fileName = pathinfo($fileNameUploaded, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $avatar = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->move('image/avatar', $avatar);
        }

        if($request->hasFile('spouse_avatar')) {
            $fileNameUploaded2 = $request->file('spouse_avatar')->getClientOriginalName();
            $fileName2 = pathinfo($fileNameUploaded2, PATHINFO_FILENAME);
            $extension2 = $request->file('spouse_avatar')->getClientOriginalExtension();
            $spouse_avatar = $fileName2.'_'.time().'.'.$extension2;
            $path2 = $request->file('spouse_avatar')->move('image/avatar', $spouse_avatar);
        }

        $person = Person::create([
            'name' => $request->get('name'),
            'avatar' => $avatar,
            'spouse_name' => $request->get('spouse_name'),
            'spouse_avatar' => $spouse_avatar,
            'gender' => $request->get('gender'),
            'state' => $request->get('state'),
            'nationality' => $request->get('nationality'),
            'dob_date' => $request->get('dob_date'),
            'parent_id' => Auth::id()
        ]);

        error_log('result = ');
        error_log($person);

        // $person->name = $request['name'];
        // $person->avatar = $avatar;
        // $person->spouse_name = $request['spouse_name'];
        // $person->spouse_avatar = $spouse_avatar;
        // $person->gender = $request['gender'];
        // $person->state = $request['state'];
        // $person->nationality = $request['nationality'];
        // $person->dob_date = $request['dob_date'];
        // $person->created_at = now();
        // $person->update_at = now();
        // $person->parent_id = Auth::id();
        $person->save();

        return redirect('/admin/relationship/index')->with('success', 'Relationship created successfully!');
    }

    public function show() {
        return view('admin.person.show');
    }

    public function edit() {
        return view('admin.person.edit');
    }

    public function update() {

    }

    public function destroy(Person $person) {
        if(Auth::user()->cant('delete', $person)) {
            return redirect()->route('admin.person.index')->with('error', 'Unauthorized Page');
        }

        $person->delete();

        return redirect()->route('admin.person.index')->with('success', "$person->name was deleted");
    }
}
