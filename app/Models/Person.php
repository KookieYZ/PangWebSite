<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
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
        return $this->hasMany('Person');
    }

    public function parent() {
        return $this->belongsTo('Person');
    }
}
