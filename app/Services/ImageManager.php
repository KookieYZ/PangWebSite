<?php

namespace App\Services;
use App\Models\Job;
use Illuminate\Support\Facades\DB;

class ImageManager
{
  
    public function saveToFolder($request,$folder){
        $fileName = pathinfo($request->file('image_path')->getClientOriginalName(),PATHINFO_FILENAME);
        $extension = $request->file('image_path')->getClientOriginalExtension();
        $filenameSaved = $fileName.'_'.time().'.'.$extension;
        $directory = 'image/' . $folder;
        $request->file('image_path')->move($directory, $filenameSaved);
        return $filenameSaved;
    }


    public function updateImage($request,$id,$folder,$table_name){
        if($id && $request->hasFile('image_path')){        
         $filename = $this->saveToFolder($request,$folder);
        return $filename;
        }
        else{
        $currentRecord = DB::table($table_name)->where('id', $id)->first();
        return $currentRecord->image_path;                         
        }
    }

    public function insertImage($request,$folder){
        if($request->hasFile('image_path')){
            $filename = $this->saveToFolder($request,$folder);
            return $filename;     
        }
        else{
            return "noimage.jpg";
        }
    }
}
