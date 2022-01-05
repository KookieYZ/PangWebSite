<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Variable;

class ThemeController extends Controller
{
    public function facebook() {
        $facebook = Variable::where('id', '=', 7)->first();
        return $facebook;
    }
    public function message() {
        $facebook = Variable::where('id', '=', 8)->first();
        return $facebook;
    }
    public function whatapps() {
        $facebook = Variable::where('id', '=', 9)->first();
        return $facebook;
    }
}
