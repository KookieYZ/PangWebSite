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
            'spouse_name'       => 'string|max:50|nullable',
            // 'spouse_avatar'     => 'image|mimes:jpeg,png,jpg|max:6000',
            'gender'            => 'required|string',
            'state'             => 'string|required',
            'nationality'       => 'string|required',
            'dob_date'          => 'required',
            'parent_id'         => 'integer|nullable'
        ]);
    }

    public function index() {
        $persons = People::orderBy('created_at', 'DESC')->simplePaginate(10);

        return view('admin.person.index', compact('persons'))->with('persons',$persons);
    }

    public function create() {
        $persons = People::orderBy('created_at', 'DESC')->get();
        return view('admin.person.create', compact('persons'));
    }

    public function store(Request $request) {

        $this->validator($request->all())->validate();

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

        if($request->hasFile('spouse_avatar')) {
            $fileNameUploaded2 = $request->file('spouse_avatar')->getClientOriginalName();
            $fileName2 = pathinfo($fileNameUploaded2, PATHINFO_FILENAME);
            $extension2 = $request->file('spouse_avatar')->getClientOriginalExtension();
            $spouse_avatar = $fileName2.'_'.time().'.'.$extension2;
            $path2 = $request->file('spouse_avatar')->move('image/avatar', $spouse_avatar);
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
        //     'dbo_date' => $dob_date,
        //     'parent_id' => Auth::id(),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        // $dateTime = strtotime($request['dob_date']);
        // $convertedDate = date('Y-m-d',$dateTime);
        $date = $request->get('dob_date');
        $convertedDate = DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');

        $person = new People;
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

        return redirect()->route('relationship.index')->with('success', 'Relationship created successfully!');
    }

    public function show($id) {
        $person = People::find($id);
        return view('admin.person.show', compact('person'));
    }

    public function edit($id) {
        $person = People::find($id);
        $persons = People::orderBy('id', 'ASC')->get()->except($person->id);;
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
            'parent_id'         => 'int'
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

        return redirect()->route('relationship.index')->with('success', "$person->name updated successfully!");
    }

    public function destroy($id) {
        $person = People::find($id);
        $person->delete();

        return redirect()->route('relationship.index')->with('success', "$person->name was deleted");
    }
}
