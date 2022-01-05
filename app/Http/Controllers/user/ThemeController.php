<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Variable;

class ThemeController extends Controller
{
    public function facebook() {
        $facebook = Variable::where('key', 'facebook-link')->first();
        return $facebook;
    }
    public function message() {
        $facebook = Variable::where('key', 'message-link')->first();
        return $facebook;
    }
    public function whatapps() {
        $facebook = Variable::where('key', 'whatsapp-link')->first();
        return $facebook;
    }
}
