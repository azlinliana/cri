<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

use App\Models\User;
use App\Models\Admin;
use App\Models\Participant;

use App\Models\ProjectEntry;
use App\Models\Cluster;

class EntryController extends Controller
{
    public function index() {
        return view('entry.superadmin.index');
    }

    // Participant
    public function listAllEntry() {
        if (Auth::check() && Auth::user()->hasRole('participant')) {
            $user = Auth::user();

            return view('entry.participant.list.all');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function listDraftEntry() {
        if (Auth::check() && Auth::user()->hasRole('participant')) {
            $user = Auth::user();

            return view('entry.participant.list.draft');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function listPendingEntry() {
        if (Auth::check() && Auth::user()->hasRole('participant')) {
            $user = Auth::user();

            return view('entry.participant.list.pending');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function listAcceptedEntry() {
        if (Auth::check() && Auth::user()->hasRole('participant')) {
            $user = Auth::user();

            return view('entry.participant.list.accepted');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function listRejectedEntry() {
        if (Auth::check() && Auth::user()->hasRole('participant')) {
            $user = Auth::user();

            return view('entry.participant.list.rejected');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function searchEntry() {
        if (Auth::check() && Auth::user()->hasRole('participant')) {
            $user = Auth::user();

            return view('entry.participant.search');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function createEntry() {
        if (Auth::check() && Auth::user()->hasRole('participant')) {
            $user = Auth::user();

            $clusters = Cluster::all();

            return view('entry.participant.create', compact('user', 'clusters'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function sendDraft(Request $request) {
        if (Auth::check() && Auth::user()->hasRole('participant')) {

            $request->validate([
                'title_entry' => ['required', 'string', 'max:255'],
                'cluster_id' => ['required'],
                'summary_of_invention' => ['required', 'mimes:pdf', 'max:5048'],
                'applicant_consent' => ['required'],
            ]);

            $summary_of_invention = $request->summary_of_invention;

            if($summary_of_invention = $request->file('summary_of_invention')) {
                $newSummaryInvention = $request->summary_of_invention->getClientOriginalName();
                $summary_of_invention->move(public_path('storage/entry/summary_of_invention'), $newSummaryInvention);
            }

            $projectEntry = ProjectEntry::create([
                'participant_id' => Auth::user()->participant->id,
                'title_entry' => $request->title_entry,
                'cluster_id' => $request->cluster_id,
                'summary_of_invention' => $newSummaryInvention,
                'applicant_consent' => $request->applicant_consent,
                'status' => 'Draft',
            ]);
            

            return 'Selesai!';
        }
        else {
            return redirect()->route('login');
        }
    }

    public function sendPending() {
        if (Auth::check() && Auth::user()->hasRole('participant')) {

        }
        else {
            return redirect()->route('login');
        }
    }

    public function showEntry() {}

    public function editEntry() {}

    public function updateEntry() {}

    public function destroyEntry() {}

    // Super admin and admin
    public function listAllEntryRequest() {
        if (Auth::check() && (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))) {

            return view('entry.users.list.all');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function listPendingEntryRequest() {
        if (Auth::check() && (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))) {

            return view('entry.users.list.pending');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function listAcceptedEntryRequest() {
        if (Auth::check() && (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))) {

            return view('entry.users.list.accepted');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function listRejectedEntryRequest() {
        if (Auth::check() && (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))) {

            return view('entry.users.list.rejected');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function searchEntryRequest() {
        if (Auth::check() && Auth::user()->hasRole('participant')) {
            $user = Auth::user();

            return view('entry.users.search');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function showEntryRequest() {
        if (Auth::check() && (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))) {

            return view('entry.users.show');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function editEntryRequest() {
        if (Auth::check() && (Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('admin'))) {

            return view('entry.users.edit');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function updateEntryRequest() {}

    public function destroyEntryRequest() {}
}
