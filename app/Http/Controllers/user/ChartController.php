<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDO;
use App\Models\People;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
class ChartController extends Controller
{

    public function fetchfamilylist()
    {    
        return response()->json( [
            'familiylist' => $this->getList()
        ]);
    }
    
    public function downloadPDF(Request $request){   
      
         $data = $request->chartData;  
        //  dd($data); 
         $options = new Options();
        //  $options->set('defaultFont', 'SimHei');
         $dompdf = new Dompdf( $options);
         $dompdf = PDF::loadView('pdf',compact('data'));
         $dompdf->setPaper('A4', 'landscape');
         $dompdf->render();     
         return $dompdf->download('族谱.pdf');
    }

    public function getList(){
        //create instance of object to call the function
        $model =  new People();
        $familylist = $model::orderBy('dob_date', 'ASC')->get(); // Currently Generation only according date of birth
        foreach ($familylist as $family) {
            $family->parent_id = $model->returnParentName($family->parent_id); // store all parent Name to parent ID filed
            $family->gender = "1" ? "男" : "女";
        }   
        return $familylist;
    }
}


