<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class DashboardController extends Controller
{
    //
    public function index() {
        $posts = Post::latest()->paginate(20);
        return view('admin.index', compact('posts'));
    }
    public function create() {
        return view('admin.create');
    }
    public function store(Request $request) {
//        dd($request->all());
        $this->validate($request,[
           'title'=>'required|min:3',
            'content'=>'required',
            'town'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png,gif'
        ]);
        if($request->hasFile('image')){
//            dd($request->all());
            $file = $request->file('image');
            $path = $file->store('uploads','public');
            Post::create([
                'title'=>$title=$request->get('title'),
                'slug'=>str_slug($title),
                'content'=>$request->get('content'),
                'image'=>$path,
                'town'=>$request->get('town'),
                'status'=>$request->get('status')
            ]);
        }
        return redirect('/dashboard')->with('message','Post created successfully');
    }

    public function edit($id) {
        $post =Post::findOrFail($id);
        return view('admin.edit',compact('post'));
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'title'=>'required|min:3',
            'content'=>'required',
            'town'=>'required',
        ]);
        if($request->hasFile('image')){
//            dd($request->all());
            $file = $request->file('image');
            $path = $file->store('uploads','public');
            Post::where('id', $id)->update([
                'title'=>$title=$request->get('title'),
                'content'=>$request->get('content'),
                'image'=>$path,
                'town'=>$request->get('town'),
                'status'=>$request->get('status')
            ]);
        }
        $this->updateAllExceptImage($request, $id);
        return redirect()->back()->with('message','Post updated successfully');
    }

    public function updateAllExceptImage(Request $request, $id) {
        return Post::where('id', $id)->update([
            'title'=>$title=$request->get('title'),
            'content'=>$request->get('content'),
            'town'=>$request->get('town'),
            'status'=>$request->get('status')
        ]);
    }

    public function destroy(Request $request){
        $id = $request->get('id');
        $post =Post::findOrFail($id);
        $post->delete();
        return redirect()->back()->with('message','Post deleted successfully!');
    }

    public function trash() {
        $posts = Post::onlyTrashed()->paginate(20);
        return view('admin.trash', compact('posts'));
    }

    public function restore($id) {
        Post::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message','Post restored successfully!');
    }

    public function toggle($id) {
        $post = Post::find($id);
        $post->status= !$post->status;
        $post->save();
        return redirect()->back()->with('message','Status updated successfully!');
    }

    public function show($id){
        $post = Post::find($id);
        return view('admin.read',compact('post'));
    }

}
