<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Title;

class TitleController extends Controller
{
    public function list() {

        $titleUsers = Title::all();

        return view('account.superadmin.title-user.list', compact('titleUsers'));
    }

    public function store(Request $request) {
        if (Auth::check() && (Auth::user()->hasRole('superadmin'))) {
            $request->validate([
                'abbrev' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
            ]);

            $titleUsers = Title::create([
                'abbrev' => $request->abbrev,
                'description' => $request->description,
            ]);

            return redirect()->route('superadmin.title-user.list');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function edit(Request $request, Title $titleUser) {
        if (Auth::check() && (Auth::user()->hasRole('superadmin'))) {
            return view('account.superadmin.title-user.edit', compact('titleUser'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function update(Request $request, Title $titleUser) {
        if (Auth::check() && (Auth::user()->hasRole('superadmin'))) {
            $request->validate([
                'abbrev' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
            ]);

            $titleUser->abbrev = $request->abbrev;
            $titleUser->description = $request->description;
            $titleUser->save();

            return redirect()->route('superadmin.title-user.list');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function destroy($titleUser) {
        if (Auth::check() && (Auth::user()->hasRole('superadmin'))) {  
            Title::destroy($titleUser);

            // Delete all of the model's associated database records. The truncate operation will also reset any auto-incrementing IDs on the model's associated table
            // Cluster::truncate();

            return redirect()->route('superadmin.title-user.list');
        }
        else {
            return redirect()->route('login');
        }
    }
}
