<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page_Content;
use Illuminate\Http\Request;
use DateTime;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'media_type'    => 'required|string',
            'media_path'    => 'required|string',
            'description'   => 'string|max:5000',
            'is_publish'    => 'string',
            'year'          => 'required|integer|max:10',
            'page_id'       => 'nullable|string'
        ]);
    }

    public function index() {
        $blogs = Page_Content::orderBy('created_at', 'DESC')->simplePaginate(10);
        return view('admin.blog.index', compact('blogs'));
    }

    public function create() {
        $blogs = Page_Content::orderBy('created_at', 'DESC')->get();
        return view('admin.blog.create', compact('blogs'));
    }

    public function store(Request $request) {

        $this->validator($request->all())->validate();

        date_default_timezone_set("Asia/Kuala_Lumpur");


    }

    public function show() {

    }

    public function edit() {

    }

    public function update() {

    }

    public function destroy() {

    }
}
