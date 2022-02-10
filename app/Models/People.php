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
        'dbo_date',
        'parent_id',
    ];

    public function child() {
        return $this->hasMany('App\Models\People', 'parent_id');
    }

    public function parent() {
        return $this->belongsTo('App\Models\People', 'parent_id');
    }

    public function returnParentName($parentID){       
        return DB::table('People')->where('parent_id', $parentID)->value('name');
    }
}
