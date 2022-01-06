<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Variable;

class ThemeController extends Controller
{
    public function primaryColor() {
        $primaryColor = Variable::where('id','=', 1)->first();
        return $primaryColor;
    }
    public function secondColor() {
        $secondColor = Variable::where('id','=', 2)->first();
        return $secondColor;
    }
    public function bgColor() {
        $bgColor = Variable::where('id','=', 3)->first();
        return $bgColor;
    }
    public function bannerImage() {
        $bannerImage = Variable::where('id','=', 4)->first();
        return $bannerImage;
    }
    public function bgImage() {
        $bgImage = Variable::where('id','=', 5)->first();
        return $bgImage;
    }
    public function facebook() {
        $facebook = Variable::where('id','=', 7)->first();
        return $facebook;
    }
    public function message() {
        $message = Variable::where('id','=', 8)->first();
        return $message;
    }
    public function whatapps() {
        $whatapps = Variable::where('id','=', 9)->first();
        return $whatapps;
    }
    
}
