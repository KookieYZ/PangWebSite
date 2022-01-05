<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'        => 'required|string|max:50',
            'email'       => 'required|email',
            'password'    => 'required|string',
        ]);
    }

    public function index() {
        $admins = User::orderBy('created_at', 'DESC')->simplePaginate(10);
        return view('admin.user.index', compact('admins'))->with('admins', $admins);
    }

    public function create() {
        return view('admin.user.create');
    }

    public function store(Request $request) {
        $this->validator($request->all())->validate();

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $admin = new User;
        $admin->name = $request['name'];
        $admin->email = $request['email'];
        $admin->password =  Hash::make($request['password']);
        $admin->created_at = now();
        $admin->updated_at = now();

        $admin->save();

        return redirect()->route('user.index')->with('success', 'Admin created successfully!');
    }

    public function show($id) {
        $user = User::find($id);
        return view('admin.user.show', compact('user'));
    }

    public function edit($id) {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name'        => 'string|max:50',
            'email'       => 'email',
            'password'    => 'string',
        ]);

        date_default_timezone_set("Asia/Kuala_Lumpur");

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request['password']);
        // $user->created_at = now();
        $user->updated_at = now();
        $user->save();


        return redirect()->route('user.index')->with('success', "$user->name updated successfully!");
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', "$user->name was deleted!");
    }
}
