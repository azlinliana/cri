<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

use App\Models\User;

class SuperAdminController extends Controller
{
    public function profile() {
        return view('account.superadmin.profile');
    }

    public function list() {
        if (Auth::check() && (Auth::user()->hasRole('superadmin'))) {
            $superadmins = User::join('role_user', [['users.id', 'role_user.user_id']])
                ->where('role_id', '1')
                ->paginate(5);

            $countSuperadmin =  $superadmins->count();

            $currentUser = Auth::user()->id;

            return view('account.superadmin.list', compact('superadmins', 'countSuperadmin', 'currentUser'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function grid() {
        if (Auth::check() && (Auth::user()->hasRole('superadmin'))) {
            $superadmins = User::join('role_user', [['users.id', 'role_user.user_id']])
                ->where('role_id', '1')
                ->paginate(5);

            $countSuperadmin =  $superadmins->count();

            $currentUser = Auth::user()->id;

            return view('account.superadmin.grid', compact('superadmins', 'countSuperadmin', 'currentUser'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
