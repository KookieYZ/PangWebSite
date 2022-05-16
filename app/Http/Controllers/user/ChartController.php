<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\People;
use App\Models\Job;
use PDF;

class ChartController extends Controller
{

    private $model;


    public function __construct(People $pplObj)
    {
        $this->model = $pplObj;
    }

    public function fetchfamilylist($id)
    {
        return response()->json([
            'familiylist' => $this->getList($id)
        ]);
    }

    public function downloadPDF(Request $request)
    {
        $data = $request->chartData;
        $dompdf = PDF::loadView('user.pdf', compact('data'));
        $dompdf->setPaper('A4', 'landscape');
        //  $dompdf -> setWarnings(true);
        $dompdf->render();
        return $dompdf->download('族谱.pdf');
    }

    public function getList($id)
    {
        $currentUserRecord = $this->model->where('id', $id)->first();
        $familylist = $this->model->where('family', $currentUserRecord->family)->get();
        foreach ($familylist as $family) {
            $family->parent_id = !is_null($family->parent_id) ? $this->model->returnParentName($family->parent_id) : null; // store all parent Name to parent ID filed
            $family->gender = "1" ? "男" : "女";
            $spouse_avatar = explode('|', $family->spouse_avatar);
            $family->spouse_avatar = $spouse_avatar[0]; // only get <f></f>irst wife avatar
        }
        return $familylist;
    }
}