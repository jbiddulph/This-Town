<?php

namespace App\Http\Controllers;


use App\Venue;
use Illuminate\Http\Request;
use App\Job;
use App\Company;
use App\Post;
use App\Http\Requests\JobPostRequest;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('employer',['except'=>array('index','show','apply','allJobs')]);
    }

    public function index() {
        $jobs = Job::latest()->limit(10)->where('status',1)->get();
        $companies = Company::get()->random(12);
        $posts = Post::where('status',1)->get();
        $town = request('town');
        return view('welcome', compact('jobs','companies', 'posts'));
    }

    public function show($id, Job $job) {

        return view('jobs.show', compact('job'));
    }

    public function create() {
        return view('jobs.create');
    }

    public function myjob() {
        $jobs = Job::where('user_id',auth()->user()->id)->get();
        return view('jobs.myjob', compact('jobs'));
    }

    public function edit($id) {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id) {
//        dd($request->all());
        $job = Job::findOrFail($id);
        $job->update($request->all());
        return redirect()->back()->with('message', 'Job updated successfully!');
    }

    public function store(JobPostRequest $request) {
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id'=>$user_id,
            'company_id'=>$company_id,
            'title'=>request('title'),
            'slug'=>str_slug(request('title')),
            'description'=>request('description'),
            'roles'=>request('roles'),
            'category_id'=>request('category'),
            'position'=>request('position'),
            'address'=>request('address'),
            'type'=>request('type'),
            'status'=>request('status'),
            'last_date'=>request('last_date')
        ]);
        return redirect()->back()->with('message','Job posted successfully!');
    }

    public function apply(Request $request,$id) {
        $jobID = Job::find($id);
        $jobID->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message','Application sent!');

    }

    public function applicant() {
        $applicants = Job::has('users')->where('user_id', auth()->user()->id)->get();
        return view('jobs.applicants',compact('applicants'));
    }

    public function allJobs(Request $request, $town) {
        $keyword = $request->get('title');
        $type = $request->get('type');
        $category = $request->get('category_id');
        $address = $request->get('address');

        $town = request('town');
        $jobs = Job::query();

        if ($keyword) {
            $jobs = $jobs->where('title','LIKE','%'.$keyword.'%');
        }

        if ($type) {
            $jobs = $jobs->where('type',$type);
        }

        if ($category) {
            $jobs = $jobs->where('category_id',$category);
        }

        if ($address) {
            $jobs = $jobs->where('address',$address);
        }

        $jobs = $jobs->paginate(10);
        return view('jobs.alljobs',compact('jobs', $town));

    }
}
