<?php

namespace App\Http\Controllers;

use App\User;
use App\Venue;
use Illuminate\Http\Request;
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


    public function managerRegister1($id, Venue $venue){

        return view('auth.manager-register', compact($id, $venue));
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
