<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Pagination\Paginator;

use App\Models\Title;
use App\Models\User;
use App\Models\Juror;
use App\Models\Cluster;
use App\Models\ClusterJuror;

class JurorController extends Controller
{
    public function register() {
        $clusters = Cluster::all();

        return view('account.juror.register', compact('clusters'));
    }

    public function store(Request $request) {
        $request->validate([
            'title_user' => ['required', 'string', 'max:255'],
            'fullname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'organization' => ['required', 'string', 'max:255'],
            'faculty' => ['required', 'string', 'max:255'],
            'field_of_study' => ['required', 'string', 'max:255'],
            'expertise' => ['required', 'string', 'max:255'],
            'cv' => ['required', 'mimes:pdf,doc,docx', 'max:5048'],
            'judging_preference' => 'required',
        ]);

        $cv = $request->cv;

        if($cv = $request->file('cv')) {
            $newCv = $request->cv->getClientOriginalName();
            $cv->move(public_path('storage/account/juror/cv'), $newCv);
        }

        $user = User::create([
            'title_user' => $request->title_user,
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $juror = Juror::create([
            'user_id' => $user->id,
            'organization' => $request->organization,
            'faculty' => $request->faculty,
            'field_of_study' => $request->field_of_study,
            'expertise' => $request->expertise,
            'cv' => $newCv,
            'status'=> 'Pending',
        ]);

        foreach ($juror->clusters as $cluster) {
            $cluster_juror = ClusterJuror::create([
                'juror_id' => $juror->id,
                'cluster_id' => $cluster->id,
            ]);
        }
        
        $juror->clusters()->sync( $request->judging_preference );

        $user->attachRole('juror');

        return redirect()->route('juror.register');
    }

    public function profile() {
        if (Auth::check() && (Auth::user()->hasRole('juror'))) {

            return view('account.juror.profile');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function listAll() {
        if (Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin'))) {
            $jurors = Juror::paginate(30);

            $countJuror = Juror::all()->count();

            return view('account.juror.list.all', compact('jurors', 'countJuror'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function listPending() {
        if (Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin'))) {
            $jurors = Juror::where('status', 'pending')->paginate(30);

            $countJuror = $jurors->count();

            return view('account.juror.list.pending', compact('jurors', 'countJuror'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function listApproved() {
        if (Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin'))) {
            $jurors = Juror::where('status', 'approved')->paginate(30);

            $countJuror = $jurors->count();

            return view('account.juror.list.approved', compact('jurors', 'countJuror'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function listRejected() {
        if (Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin'))) {
            $jurors = Juror::where('status', 'rejected')->paginate(30);

            $countJuror = $jurors->count();

            return view('account.juror.list.rejected', compact('jurors', 'countJuror'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function gridAll() {
        if (Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin'))) {
            $jurors = Juror::paginate(30);

            $countJuror = Juror::all()->count();

            return view('account.juror.grid.all', compact('jurors', 'countJuror'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function gridPending() {
        if (Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin'))) {
            $jurors = Juror::paginate(30);

            $countJuror = Juror::all()->count();

            return view('account.juror.grid.pending', compact('jurors', 'countJuror'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function gridApproved() {
        if (Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin'))) {
            $jurors = Juror::where('status', 'approved')->paginate(30);

            $countJuror = $jurors->count();

            return view('account.juror.grid.approved', compact('jurors', 'countJuror'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function gridRejected() {
        if (Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin'))) {
            $jurors = Juror::where('status', 'rejected')->paginate(30);
            
            $countJuror = $jurors->count();

            return view('account.juror.grid.rejected', compact('jurors', 'countJuror'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function show(Juror $juror, Cluster $cluster) {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin')) {
            return view('account.juror.show', compact('juror', 'cluster'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function edit(Request $request, Juror $juror)
    {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin')) {

            $currentUser = Auth::user();

            return view('account.juror.edit', compact('juror', 'currentUser'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function update(Request $request, Juror $juror)
    {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin')) {
            if ($request->status == 'approved') {
                $request->validate([
                    'status' => ['required', 'string', 'max:255'],
                    'reviewer' => ['required', 'string', 'max:255'],
                ]);

                $juror->status = $request->status;
                $juror->reason = NULL;
                $juror->reviewer = $request->reviewer;
                $juror->save();

                return redirect()->route('juror.list.all');
            }
            elseif ($request->status == 'rejected') {
                $request->validate([
                    'status' => ['required', 'string', 'max:255'],
                    'reason' => ['nullable', 'required', 'string', 'max:255'],
                    'reviewer' => ['required', 'string', 'max:255'],
                ]);

                $juror->status = $request->status;
                $juror->reason = $request->reason;
                $juror->reviewer = $request->reviewer;
                $juror->save();

                return redirect()->route('juror.list.all');
            }
        }
        else {
            return redirect()->route('login');
        }
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

    public function searchList(Request $request) {
        if (Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin'))) {
            dd($request);
            $request->validate([
                'search' => ['required', 'string', 'max:255'],
            ]);

            $search = $request->search;

            $queryJurors = User::join('jurors', [['users.id', 'jurors.user_id']])
                ->where('user_id', 'LIKE', "%{$search}%")
                ->orWhere('title_user', 'LIKE', "%{$search}%")
                ->orWhere('fullname', 'LIKE', "%{$search}%")
                ->orWhere('gender', 'LIKE', "%{$search}%")
                ->orWhere('phone_number', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('organization', 'LIKE', "%{$search}%")
                ->orWhere('faculty', 'LIKE', "%{$search}%")
                ->orWhere('field_of_study', 'LIKE', "%{$search}%")
                ->orWhere('expertise', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->orWhere('reason', 'LIKE', "%{$search}%")
                ->orWhere('reviewer', 'LIKE', "%{$search}%")
                ->get();

            $countResult = $queryJurors->count();

            return view('account.juror.list.search', compact('search', 'queryJurors', 'countResult'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function searchGrid(Request $request) {
        if (Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin'))) {
            $request->validate([
                'search' => ['required', 'string', 'max:255'],
            ]);

            $search = $request->search;

            $queryJurors = User::join('jurors', [['users.id', 'jurors.user_id']])
                ->where('user_id', 'LIKE', "%{$search}%")
                ->orWhere('title_user', 'LIKE', "%{$search}%")
                ->orWhere('fullname', 'LIKE', "%{$search}%")
                ->orWhere('gender', 'LIKE', "%{$search}%")
                ->orWhere('phone_number', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('organization', 'LIKE', "%{$search}%")
                ->orWhere('faculty', 'LIKE', "%{$search}%")
                ->orWhere('field_of_study', 'LIKE', "%{$search}%")
                ->orWhere('expertise', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%")
                ->orWhere('reason', 'LIKE', "%{$search}%")
                ->orWhere('reviewer', 'LIKE', "%{$search}%")
                ->get();

            $countResult = $queryJurors->count();


            return view('account.juror.grid.search', compact('search', 'queryJurors', 'countResult'));
        }
        else {
            return redirect()->route('login');
        }
    }
}
