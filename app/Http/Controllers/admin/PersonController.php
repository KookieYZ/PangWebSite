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
use App\Services\ImageManager;

class PersonController extends Controller
{
    private $ImgMng;
    public function __construct(ImageManager $imgObj)
    {
        $this->middleware('auth');
        $this->ImgMng = $imgObj;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'              => 'required|string|max:50',
            'avatar'            => 'image|mimes:jpeg,png,jpg|max:6000',
            'spouse_name'       => 'max:50|nullable',
            'spouse_avatar.*'     => 'image|mimes:jpeg,png,jpg|max:6000',
            'gender'            => 'required|string',
            'state'             => 'string|required',
            'nationality'       => 'string|required',
            'dob_date'          => 'required',
            'parent_id'         => 'integer|nullable',
            'era'               => 'string|required',
            'family'            => 'string|nullable'
        ]);
    }

    public function index()
    {
        $persons = People::orderBy('created_at', 'DESC')->simplePaginate(10);
        return view('admin.person.index', compact('persons'))->with('persons', $persons);
    }

    public function create()
    {
        $persons = People::orderBy('created_at', 'DESC')->get();

        return view('admin.person.create', compact('persons'));
    }

    public function store(Request $request)
    {

        $this->validator($request->all())->validate();
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $person = new People;
        // $request->request->add(['image_path' => $request->file('avatar')]);
        $person->avatar = $this->ImgMng->insertImage($request, 'avatar', 'avatar');
        $person->name = $request['name'];
        $person->gender = $request['gender'];
        $person->state = $request['state'];
        $person->nationality = $request['nationality'];
        $person->dob_date = DateTime::createFromFormat('d/m/Y', $request->get('dob_date'))->format('Y-m-d');
        $person->parent_id = $request->parent_id;
        $person->created_at = now();
        $person->updated_at = now();
        $person->era = $request['era'];
        $person->family = !is_null($request->parent_id) ? $person->getFamily($request->parent_id) : "F" . $request['name'];
        $currentTime = time(); // ensure  time wont affect by code performance.

        //Spouse
        $person->spouse_name = implode('|', $request->get('spouse_name'));
        $spouseImgArr = explode(',', $request->storeSpouseImgSrc);
        foreach ($spouseImgArr as $value) {
            if ($value == 'noimage.jpg') {
                $imageNameArray[] = 'noimage.jpg';
            } else {
                $file = explode('.', $value);
                $fileName = $file[0];
                $extension = $file[1];
                $filenameSaved = $fileName . '_' . $currentTime . '.' . $extension;
                $imageNameArray[] = $filenameSaved;
            }
        }
        $person->spouse_avatar = implode('|', $imageNameArray);

        if ($request->hasFile('spouse_avatar')) {
            foreach ($request->file('spouse_avatar') as $image) {
                $destinationPath = 'image/avatar';
                $fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $filenameSaved = $fileName . '_' . $currentTime . '.' . $extension;
                $image->move($destinationPath, $filenameSaved);
            }
        }

        if ($person->save()) {
            return redirect()->route('relationship.index')->with('success', '人际关系创建成功!');
        }
        return redirect()->route('job.index')->with('error', "Somethings went wrong");
    }

    public function show($id)
    {
        $person = People::find($id);
        $spouseNameArr = explode('|', $person->spouse_name);
        $spouseImgArr = explode('|', $person->spouse_avatar);
        $spouseAttrList = collect();
        for ($i = 0; $i < count($spouseNameArr); $i++) {
            $spouseAttrList->push(['index' => $i, 'spouse_name' => $spouseNameArr[$i], 'spouse_avatar' => $spouseImgArr[$i]]);
        }
        return view('admin.person.show', compact('person', 'spouseAttrList'));
    }

    public function edit($id)
    {
        $person = People::find($id);
        $persons = People::orderBy('id', 'ASC')->get()->except($person->parent_id);
        $family = People::get()->pluck('family')->unique();
        $spouseNameArr = explode('|', $person->spouse_name);
        $spouseImgArr = explode('|', $person->spouse_avatar);
        $spouseAttrList = collect();
        for ($i = 0; $i < count($spouseNameArr); $i++) {
            $spouseAttrList->push(['index' => $i, 'spouse_name' => $spouseNameArr[$i], 'spouse_avatar' => $spouseImgArr[$i]]);
        }

        return view('admin.person.edit', compact('person', 'persons', 'family', 'spouseAttrList'));
    }

    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $person = People::find($id);
        $person->name = $request['name'];
        $person->avatar = $this->ImgMng->updateImage($request, $id, 'avatar', 'avatar', 'People');
        $person->gender = $request['gender'];
        $person->state = $request['state'];
        $person->nationality = $request['nationality'];
        $person->dob_date = DateTime::createFromFormat('d/m/Y', $request->get('dob_date'))->format('Y-m-d');;
        $person->parent_id = $request->parent_id;
        $person->updated_at = now();
        $person->family = !is_null($request->parent_id) ? $person->getFamily($request->parent_id) : "F" . $request['name'];
        $currentTime = time(); // ensure  time wont affect by code performance.

        //Spouse
        $person->spouse_name = implode('|', $request->get('spouse_name'));
        //current record image
        $currentRecordImg = explode("|", $person->spouse_avatar);
        $spouseImgArr = explode(',', $request->storeSpouseImgSrc);
        $i = 0;
        foreach ($spouseImgArr as $value) {
            if ($value == '' && $i < $request->numofSpouse) {
                $imageNameArray[] = $currentRecordImg[$i];
                $i++;
            } else {
                if ($value != '') {
                    $file = explode('.', $value);
                    $fileName = $file[0];
                    $extension = $file[1];
                    $filenameSaved = $fileName . '_' . $currentTime . '.' . $extension;
                    $imageNameArray[] = $filenameSaved;
                } else {
                    $imageNameArray[] = 'noimage.jpg';
                }
            }
        }
        $person->spouse_avatar = implode('|', $imageNameArray);

        if ($request->hasFile('spouse_avatar')) {
            foreach ($request->file('spouse_avatar') as $image) {
                $destinationPath = 'image/avatar';
                $fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $filenameSaved = $fileName . '_' . $currentTime . '.' . $extension;
                $image->move($destinationPath, $filenameSaved);
            }
        }

        if ($person->save()) {
            return redirect()->route('relationship.index')->with('success', '人际关系创建成功!');
        }
        return redirect()->route('job.index')->with('error', "Somethings went wrong");
    }

    public function destroy($id)
    {
        $person = People::find($id);
        if ($person->delete()) {
            return redirect()->route('relationship.index')->with('success', "$person->name 资料删除成功");
        }
        return redirect()->route('job.index')->with('error', "Somethings went wrong");
    }
}