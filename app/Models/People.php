<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class People extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'avatar',
        'spouse_name',
        'spouse_avatar',
        'gender',
        'state',
        'nationality',
        'dob_date',
        'parent_id',
        'era',
        'family',
    ];

    public function child()
    {
        return $this->hasMany('App\Models\People', 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\People', 'parent_id');
    }

    public function returnParentName($parentID)
    {
        return $this->where('id', $parentID)->value('name');
    }

    public function people_history()
    {
        return $this->hasMany('App\Models\People_History');
    }


    // function to convert arrays to string
    public function convertArraysToString($array, $separator)
    {
        $array = array_column($array, 'spouse_name'); // Covert to Normal Array
        $str = implode($separator, $array);
        return $str;
    }

    public function getParent($parent_id)
    {
        return $this->where('id', $parent_id)->first();
    }

    public function getChild($id)
    {
        return $this->where('parent_id', $id)->get();
    }

    public function getFamily($parentId)
    {
        return $this->where('id', $parentId)->value('family');
    }
}