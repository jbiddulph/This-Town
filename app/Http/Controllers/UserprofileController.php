<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class UserprofileController extends Controller
{
    public function index() {
        return view('profile.index');
    }

    public function store(Request $request) {
        $this->validate($request,[
           'hometown'=>'required',
            'bio'=>'required|min:20',
            'experience'=>'required|min:20',
//            'phone_number'=>'required|regex:/(07)[0-9]{9}/',
            'phone_number'=>'required|min:10|numeric'
        ]);

        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
            'hometown'=>request('hometown'),
            'experience'=>request('experience'),
            'bio'=>request('bio'),
            'phone_number'=>request('phone_number'),
        ]);

        return redirect()->back()->with('message', 'Profile Successfully Updated!');

    }

    public function coverletter(Request $request) {
        $this->validate($request,[
           'cover_letter'=>'required|mimes:pdf,doc,docx|max:30000'
        ]);
        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'cover_letter'=>$cover
        ]);
        return redirect()->back()->with('message', 'Cover Letter Successfully Updated!');
    }

    public function resume(Request $request) {
        $this->validate($request,[
            'resume'=>'required|mimes:pdf,doc,docx|max:30000'
        ]);
        $user_id = auth()->user()->id;
        $resume = $request->file('resume')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'resume'=>$resume
        ]);
        return redirect()->back()->with('message', 'Resume Successfully Updated!');
    }

    public function avatar(Request $request) {
        $this->validate($request,[
            'avatar'=>'required|mimes:png,jpeg,jpg|max:30000'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/avatar/', $filename);
            Profile::where('user_id', $user_id)->update([
                'avatar'=>$filename
            ]);
            return redirect()->back()->with('message', 'Profile Picture Successfully Updated!');
        }
    }
}
