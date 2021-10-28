<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'ranking',
    ];

    /**
    * Relationship:
    * A page belongs to many page_contents
    */
    public function page_content() {
        return $this->hasMany('App\Models\Page_Content');
    }
}
