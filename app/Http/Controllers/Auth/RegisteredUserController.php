<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Participant;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $request->validate([
            'title_user' => ['required', 'string', 'max:255'],
            'fullname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'organization' => ['required', 'string', 'max:255'],
            'faculty' => ['required', 'string', 'max:255'],
            'address_line_one' => ['required', 'string', 'max:255'],
            'address_line_two' => ['string', 'max:255'],
            'area' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'type' => ['required', 'string', 'max:255'],
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

        $participant = Participant::create([
            'user_id' => $user->id,
            'organization' => $request->organization,
            'faculty' => $request->faculty,
            'address_line_one' => $request->address_line_one,
            'address_line_two' => $request->address_line_two,
            'area' => $request->area,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'type' => $request->type,
        ]);

        $user->attachRole('participant');

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
