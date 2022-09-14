<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

use App\Models\User;
use App\Models\Participant;

class ParticipantController extends Controller
{
    public function profile() {
        return view('account.participant.profile');
    }

    public function listAll() {
        if (Auth::check() && (Auth::user()->hasRole('participant') || Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))) {
            $participants = Participant::paginate(30);

            $countParticipant = Participant::all()->count();

            return view('account.participant.list.all', compact('participants', 'countParticipant'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function listInternal() {
        if (Auth::check() && (Auth::user()->hasRole('participant') || Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))) {
            $participants = Participant::where('type', 'internal')->paginate(30);

            $countParticipant = $participants->count();

            return view('account.participant.list.internal', compact('participants', 'countParticipant'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function listExternal() {
        if (Auth::check() && (Auth::user()->hasRole('participant') || Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))) {
            $participants = Participant::where('type', 'external')->paginate(30);

            $countParticipant = $participants->count();

            return view('account.participant.list.external', compact('participants', 'countParticipant'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function gridAll() {
        if (Auth::check() && (Auth::user()->hasRole('participant') || Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))) {
            $participants = Participant::paginate(24);

            $countParticipant = Participant::all()->count();

            return view('account.participant.grid.all', compact('participants', 'countParticipant'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function gridInternal() {
        if (Auth::check() && (Auth::user()->hasRole('participant') || Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))) {
            $participants = Participant::where('type', 'internal')->paginate(24);

            $countParticipant = $participants->count();

            return view('account.participant.grid.internal', compact('participants', 'countParticipant'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function gridExternal() {
        if (Auth::check() && (Auth::user()->hasRole('participant') || Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))) {
            $participants = Participant::where('type', 'external')->paginate(24);

            $countParticipant = $participants->count();

            return view('account.participant.grid.external', compact('participants', 'countParticipant'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function show(Request $request, Participant $participant) {
        if (Auth::check() && (Auth::user()->hasRole('participant') || Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))) {
            $participants = Participant::all();

            return view('account.participant.show');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function destroy() {}

    public function searchList(Request $request) {
        if (Auth::check() && (Auth::user()->hasRole('participant') || Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))) {
            $request->validate([
                'search' => ['required', 'string', 'max:255'],
            ]);

            $search = $request->search;

            $queryParticipants = User::join('participants', [['users.id', 'participants.user_id']])
                ->where('user_id', 'LIKE', "%{$search}%")
                ->orWhere('title_user', 'LIKE', "%{$search}%")
                ->orWhere('fullname', 'LIKE', "%{$search}%")
                ->orWhere('gender', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('organization', 'LIKE', "%{$search}%")
                ->orWhere('faculty', 'LIKE', "%{$search}%")
                ->orWhere('address_line_one', 'LIKE', "%{$search}%")
                ->orWhere('address_line_two', 'LIKE', "%{$search}%")
                ->orWhere('area', 'LIKE', "%{$search}%")
                ->orWhere('state', 'LIKE', "%{$search}%")
                ->orWhere('postal_code', 'LIKE', "%{$search}%")
                ->orWhere('type', 'LIKE', "%{$search}%")
                ->get();

            $countResult = $queryParticipants->count();

            return view('account.participant.list.search', compact('search', 'queryParticipants', 'countResult'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function searchGrid(Request $request) {
        if (Auth::check() && (Auth::user()->hasRole('participant') || Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))) {
            $request->validate([
                'search' => ['required', 'string', 'max:255'],
            ]);

            $search = $request->search;

            $queryParticipants = User::join('participants', [['users.id', 'participants.user_id']])
                ->where('user_id', 'LIKE', "%{$search}%")
                ->orWhere('title_user', 'LIKE', "%{$search}%")
                ->orWhere('fullname', 'LIKE', "%{$search}%")
                ->orWhere('gender', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('organization', 'LIKE', "%{$search}%")
                ->orWhere('faculty', 'LIKE', "%{$search}%")
                ->orWhere('address_line_one', 'LIKE', "%{$search}%")
                ->orWhere('address_line_two', 'LIKE', "%{$search}%")
                ->orWhere('area', 'LIKE', "%{$search}%")
                ->orWhere('state', 'LIKE', "%{$search}%")
                ->orWhere('postal_code', 'LIKE', "%{$search}%")
                ->orWhere('type', 'LIKE', "%{$search}%")
                ->get();

            $countResult = $queryParticipants->count();

            return view('account.participant.grid.search', compact('search', 'queryParticipants', 'countResult'));
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
}
