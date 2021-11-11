<?php

namespace App\Http\Controllers;

use Auth;
use DateTime;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ThemeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.theme.index');
    }

    public function create() {
        return view('admin.theme.create');
    }

    public function store() {

    }

    public function show() {
        return view('admin.theme.show');
    }

    public function edit() {
        return view('admin.theme.edit');
    }

    public function update() {

    }

    public function destroy() {

    }
}
