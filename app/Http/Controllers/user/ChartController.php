<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDO;
use App\Models\People;
class ChartController extends Controller
{

    public function fetchfamilylist()
    {
        //create instance of object to call the function
        $model =  new People();
        $familylist = $model::orderBy('dob_date', 'ASC')->get();// Currently Generation only according date of birth
        foreach ($familylist as $family) {
            $family->parent_id = $model->returnParentName($family ->parent_id); // store all parent Name to parent ID filed
        }   
        return response()->json( [
            'familiylist' => $familylist
        ]);
    }

}
