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
        if (!file_exists($bannerImage->value)) {
            return 'assets/images/MainPageBanner.png';
        };
        return $bannerImage->value;
    }
    public function bgImage() {
        $bgImage = Variable::where('id','=', 5)->first();
        if (!file_exists($bgImage->value)) {
            return 'assets/images/MainPageBackground.png';
        };
        return $bgImage->value;
    }
    public function facebook() {
        $facebook = Variable::where('id','=', 6)->first();
        return $facebook;
    }
    public function message() {
        $message = Variable::where('id','=', 7)->first();
        return $message;
    }
    public function whatapps() {
        $whatapps = Variable::where('id','=', 8)->first();
        return $whatapps;
    }
    
}
