<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use DateTime;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function index() {
        return view('admin.page.index');
    }

    public function create() {
        return view('admin.page.create');
    }

    public function store() {

    }

    public function show() {
        return view('admin.page.show');
    }

    public function edit() {
        return view('admin.page.edit');
    }

    public function update() {

    }

    public function destroy() {

    }
}
