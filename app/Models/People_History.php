<?php

namespace App\Models;

use App\Services\ImageManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People_History extends Model
{
    use HasFactory;
    
     protected $table = 'people_history';
      protected $fillable = [
        'history_name',
        'description',
        'media_path',
        'incident_date',
        'people_id',
        'onlyIncidentYear',
        'image_path',
    ]; 

     public function people(){
      return $this->belongsTo(People::class);
    }

    //CRUD section
    public function create_update($request,$id,$imgService,$mediaService){
       date_default_timezone_set("Asia/Kuala_Lumpur");
         if($id){ // Update
          $people_history = $this->find($id);
          $people_history->updated_at = now();
          $people_history->image_path = $imgService->updateImage($request,$id,'people_history','people_history');
          $people_history->media_path = $mediaService->updateVideo($request,$id,'people_history','people_history');
          return $this->toDTO($people_history,$request)->save();
         }
        //Create
        $people_history = new People_History;
        $people_history->created_at = now();
        $people_history->updated_at = now();
        $people_history->image_path = $imgService->insertImage($request,'people_history');
        $people_history->media_path = $mediaService->insertVideo($request,'people_history');
        return $this->toDTO($people_history,$request)->save();
    }

    public function toDTO($currentRecord, $usrInput){
       $currentRecord->history_name = $usrInput->history_name;
       $currentRecord->description = $usrInput->description;
       $currentRecord->incident_date = $usrInput->incident_date;
       $currentRecord->people_id = $usrInput->people_id;
       return $currentRecord;
    }

    public function deleteRecord($id){
      $people_history = $this->find($id);
      $this->history_name = $people_history->history_name;
      return  $people_history->delete();
    }
}
