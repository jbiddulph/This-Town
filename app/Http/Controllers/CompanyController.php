<?php

namespace App\Http\Controllers;

use App\Company;
use App\Job;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('employer',['except'=>array('index')]);
    }

    public function index($id, Company $company) {
        return view('company.index',compact('company'));
    }

    public function create() {
        return view('company.create');
    }

    public function store(Request $request) {
        $this->validate($request,[
            'address'=>'required',
            'website'=>'required|min:5',
            'phone'=>'required|min:8',
//            'phone_number'=>'required|regex:/(07)[0-9]{9}/',
            'slogan'=>'required|min:10',
            'description'=>'required|min:10'
        ]);

        $user_id = auth()->user()->id;
        Company::where('user_id', $user_id)->update([
            'address'=>request('address'),
            'phone'=>request('phone'),
            'website'=>request('website'),
            'slogan'=>request('slogan'),
            'description'=>request('description')
        ]);

        return redirect()->back()->with('message', 'Company Successfully Updated!');

    }

    public function coverPhoto(Request $request) {
        $user_id = auth()->user()->id;
        if($request->hasFile('cover_photo')){
            $file = $request->file('cover_photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/coverphoto/', $filename);
            Company::where('user_id', $user_id)->update([
               'cover_photo'=>$filename
            ]);
            return redirect()->back()->with('message', 'Company cover photo Successfully Updated!');
        }
    }

    public function companyLogo(Request $request) {
        $user_id = auth()->user()->id;
        if($request->hasFile('company_logo')){
            $file = $request->file('company_logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/logo/', $filename);
            Company::where('user_id', $user_id)->update([
                'logo'=>$filename
            ]);

        }
        return redirect()->back()->with('message', 'Company logo Successfully Updated!');
    }

}
