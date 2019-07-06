<?php

namespace App\Http\Controllers;

use App\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager',['except'=>array('index')]);
    }

    public function index($id, Venue $venue) {
        return view('venue.index',compact('venue'));
    }

    public function create() {
        return view('venue.create');
    }


    public function store(Request $request) {
//        $this->validate($request,[
//            'address'=>'required',
//            'town'=>'required',
//            'county'=>'required',
//            'postcode'=>'required',
//            'latitude'=>'required',
//            'longitude'=>'required',
//            'website'=>'required|min:5',
//            'phone'=>'required|min:8',
////            'phone_number'=>'required|regex:/(07)[0-9]{9}/',
//            'slogan'=>'required|min:10',
//            'description'=>'required|min:10'
//        ]);
        $user_id = auth()->user()->id;


        Venue::where('user_id', $user_id)->update([
            'address'=>request('address'),
            'town'=>request('town'),
            'county'=>request('county'),
            'postcode'=>request('postcode'),
            'phone'=>request('phone'),
            'website'=>request('website'),
            'slogan'=>request('slogan'),
            'description'=>request('description'),
            'latitude'=>request('latitude'),
            'longitude'=>request('longitude')
        ]);

        return redirect()->back()->with('message', 'Venue Successfully Updated!');

    }


    public function coverPhoto(Request $request) {
        $user_id = auth()->user()->id;
        if($request->hasFile('cover_photo')){
            $file = $request->file('cover_photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/coverphoto/', $filename);
            Venue::where('user_id', $user_id)->update([
                'cover_photo'=>$filename
            ]);
            return redirect()->back()->with('message', 'Venue cover photo Successfully Updated!');
        }
    }

    public function venueLogo(Request $request) {
        $user_id = auth()->user()->id;
        if($request->hasFile('venue_logo')){
            $file = $request->file('venue_logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/logo/', $filename);
            Venue::where('user_id', $user_id)->update([
                'logo'=>$filename
            ]);

        }
        return redirect()->back()->with('message', 'Venue logo Successfully Updated!');
    }
}
