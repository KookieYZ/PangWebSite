<?php

namespace App\Services;

use App\Models\Job;
use Illuminate\Support\Facades\DB;

class ImageManager
{

    public function saveToFolder($request, $atrributes, $folder)
    {
        $fileName = pathinfo($request->file($atrributes)->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $request->file($atrributes)->getClientOriginalExtension();
        $filenameSaved = $fileName . '_' . time() . '.' . $extension;
        $directory = 'image/' . $folder;
        $request->file($atrributes)->move($directory, $filenameSaved);
        return $filenameSaved;
    }


    public function updateImage($request, $id, $attributes, $folder, $table_name)
    {
        if ($id && $request->hasFile($attributes)) {
            $filename = $this->saveToFolder($request, $attributes, $folder);
            return $filename;
        } else {
            $currentRecord = DB::table($table_name)->where('id', $id)->first();
            return $currentRecord->$attributes;
        }
    }

    public function insertImage($request, $attributes, $folder)
    {
        if ($request->hasFile($attributes)) {
            $filename = $this->saveToFolder($request, $attributes, $folder);
            return $filename;
        } else {
            return "noimage.jpg";
        }
    }
}