<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class MediaManager
{
        public function saveToFolder($request,$folder){
        $fileName = pathinfo($request->file('media_path')->getClientOriginalName(),PATHINFO_FILENAME);
        $extension = $request->file('media_path')->getClientOriginalExtension();
        $filenameSaved = $fileName.'_'.time().'.'.$extension;
        $directory = 'assets/videos/' . $folder;
        $request->file('media_path')->move($directory, $filenameSaved);
        return $filenameSaved;
    }

    public function updateVideo($request,$id,$folder,$table_name){
        if($id && $request->hasFile('media_path')){        
         $filename = $this->saveToFolder($request,$folder);
        return $filename;
        }
        else{
        $currentRecord = DB::table($table_name)->where('id', $id)->first();
        return $currentRecord->media_path;                     
        }
    }

    public function insertVideo($request,$folder){
        if($request->hasFile('media_path')){
            $filename = $this->saveToFolder($request,$folder);
            return $filename;     
        }
    }
}
