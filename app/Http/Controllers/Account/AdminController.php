<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Pagination\Paginator;

use App\Models\User;
use App\Models\Admin;

class AdminController extends Controller
{
    public function profile() {
        if (Auth::check() && (Auth::user()->hasRole('admin'))) {
            $user = Auth::user();

            return view('account.admin.profile', compact('user'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function list() {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin')) {
            $admins = Admin::paginate(30);

            $countAdmin = Admin::all()->count();

            return view('account.admin.list', compact('admins', 'countAdmin'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function grid() {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin')) {
            $admins = Admin::paginate(30);

            $countAdmin = Admin::all()->count();

            return view('account.admin.grid', compact('admins', 'countAdmin'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function searchList(Request $request) {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin')) {
            $request->validate([
                'search' => ['required', 'string', 'max:255'],
            ]);

            $search = $request->search;

            $queryAdmins = User::join('admins', [['users.id', 'admins.user_id']])
                ->where('user_id', 'LIKE', "%{$search}%")
                ->orWhere('title_user', 'LIKE', "%{$search}%")
                ->orWhere('fullname', 'LIKE', "%{$search}%")
                ->orWhere('gender', 'LIKE', "%{$search}%")
                ->orWhere('phone_number', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('organization', 'LIKE', "%{$search}%")
                ->orWhere('faculty', 'LIKE', "%{$search}%")
                ->get();

            $countResult = $queryAdmins->count();

            return view('account.admin.search-list', compact('search', 'queryAdmins', 'countResult'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function searchGrid(Request $request) {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin')) {
            $request->validate([
                'search' => ['required', 'string', 'max:255'],
            ]);

            $search = $request->search;

            $queryAdmins = User::join('admins', [['users.id', 'admins.user_id']])
                ->where('user_id', 'LIKE', "%{$search}%")
                ->orWhere('title_user', 'LIKE', "%{$search}%")
                ->orWhere('fullname', 'LIKE', "%{$search}%")
                ->orWhere('gender', 'LIKE', "%{$search}%")
                ->orWhere('phone_number', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('organization', 'LIKE', "%{$search}%")
                ->orWhere('faculty', 'LIKE', "%{$search}%")
                ->get();

            $countResult = $queryAdmins->count();
            return view('account.admin.search-grid', compact('search', 'queryAdmins', 'countResult'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function create() {
        if (Auth::check() && (Auth::user()->hasRole('superadmin'))) {
            return view('account.admin.create');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request) {
        if (Auth::check() && (Auth::user()->hasRole('superadmin'))) {
            $request->validate([
                'title_user' => ['required', 'string', 'max:255'],
                'fullname' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string', 'max:255'],
                'phone_number' => ['required', 'string', 'max:255'],
                'organization' => ['required', 'string', 'max:255'],
                'faculty' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
    
            $user = User::create([
                'title_user' => $request->title_user,
                'fullname' => $request->fullname,
                'gender' => $request->gender,
                'phone_number' => $request->phone_number,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            $admin = Admin::create([
                'user_id' => $user->id,
                'organization' => $request->organization,
                'faculty' => $request->faculty,
            ]);
    
            $user->attachRole('admin');

            return redirect()->route('admin.list');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function show(Admin $admin) {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin')) {
            return view('account.admin.show', compact('admin'));
        }
        else {
            return redirect()->route('login');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
