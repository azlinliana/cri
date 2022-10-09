<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cluster;

class ClusterController extends Controller
{
    public function list() {

        $clusters = Cluster::all();

        return view('entry.superadmin.cluster.list', compact('clusters'));
    }

    public function store(Request $request) {
        if (Auth::check() && (Auth::user()->hasRole('superadmin'))) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
            ]);

            $cluster = Cluster::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return redirect()->route('superadmin.cluster.list');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function edit(Request $request, Cluster $cluster) {
        if (Auth::check() && (Auth::user()->hasRole('superadmin'))) {
            return view('entry.superadmin.cluster.edit', compact('cluster'));
        }
        else {
            return redirect()->route('login');
        }
    }

    public function update(Request $request, Cluster $cluster) {
        if (Auth::check() && (Auth::user()->hasRole('superadmin'))) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
            ]);

            $cluster->name = $request->name;
            $cluster->description = $request->description;
            $cluster->save();

            return redirect()->route('superadmin.cluster.list');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function destroy($cluster) {
        if (Auth::check() && (Auth::user()->hasRole('superadmin'))) {  
            Cluster::destroy($cluster);

            // Delete all of the model's associated database records. The truncate operation will also reset any auto-incrementing IDs on the model's associated table
            // Cluster::truncate();

            return redirect()->route('superadmin.cluster.list');
        }
        else {
            return redirect()->route('login');
        }
    }
}
