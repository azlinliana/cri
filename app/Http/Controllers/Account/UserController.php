<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Participant;
use App\Models\Juror;
use App\Models\Admin;

class UserController extends Controller
{
    public function dashboard() {
        if (Auth::check() && Auth::user()->hasRole('superadmin')) {
            return view('account.superadmin.dashboard');
        }
        else if (Auth::check() && Auth::user()->hasRole('admin')) {
            return view('account.admin.dashboard');
        }
        else if (Auth::check() && Auth::user()->hasRole('juror')) {
            if (Auth::user()->juror->status == 'approved') {
                return view('account.juror.dashboard');
            }
            else {
                return redirect()->back();
            }
        }
        else if (Auth::check() && Auth::user()->hasRole('participant')) {
            return view('account.participant.dashboard');
        } 
        else {
            return redirect()->route('login');
        }
    }
    
    public function index() {
        if (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin')) {
            $superadmins = User::join('role_user', [['users.id', 'role_user.user_id']])->where('role_id', '1')->get();
            $countSuperAdmin = $superadmins->count();

            $admins = Admin::all();
            $countAdmin = $admins->count();

            $jurors = Juror::all();
            $countJuror = $jurors->count();

            $pendingJurors = Juror::where('status', 'pending')->get();
            $countPendingJuror = $pendingJurors->count();

            $participants = Participant::all();
            $countParticipant = $participants->count();

            return view('account.users.index', compact('superadmins', 'countSuperAdmin','admins', 'countAdmin', 'jurors', 'pendingJurors', 'countPendingJuror', 'countJuror', 'participants', 'countParticipant'));
        }
        else {
            return redirect()->route('login');
        }
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
