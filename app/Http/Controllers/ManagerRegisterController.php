<?php

namespace App\Http\Controllers;

use App\User;
use App\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagerRegisterController extends Controller
{
    public function managerRegister() {
        $user = User::create([
            'email' => request('email'),
            'user_type' => request('user_type'),
            'password' => Hash::make(request('password')),
        ]);

        Venue::create([
            'user_id'=>$user->id,
            'vname'=> request('vname'),
            'slug'=>str_slug(request('vname'))
        ]);
        return redirect()->to('login');
    }


    public function managerRegister1(Venue $venue)
    {
        return view('auth.manager-register')->withVenue($venue);
    }


    public function managerRegister1Post(Venue $venue, Request $request)
    {
        $fields = $request->all();

        $venue = Venue::findOrFail($venue->id);
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'user_type' => request('user_type'),
            'password' => Hash::make(request('password')),
        ]);
        DB::table('venues')
            ->where('id', $venue->id)
            ->update(['user_id' => $user->id]);

        return redirect('/home')->withSuccess('Venu successfully claimed');
    }

}

//$venue = Venue::findOrFail($id);
//$user = User::create([
//    'email' => request('email'),
//    'user_type' => request('user_type'),
//    'password' => Hash::make(request('password')),
//]);
//DB::table('venues')
//    ->where('venue_id', $venue->id)
//    ->update(['user_id' => $user->id]);
//return view('auth.manager-register', compact('venue'));
