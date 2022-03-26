<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\People;

class PeopleController extends Controller
{
    static function getPeople($id)
    {
        $params['people'] = People::where('id', '==', $id)->get();

        return view('user.history', $params);
    }
}
