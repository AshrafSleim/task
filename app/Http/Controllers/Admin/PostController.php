<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Validator;
Use Alert;
class PostController extends Controller
{
    public function index(Request $request)
    {
        session()->forget('menu');
        session()->put('menu', 'posts');
        if ($request->filter == 1) {
            $query  = $this->returnSearchResult($request);
            $posts = $query->paginate(10);
            $posts->setPath(URL::current() . "?"
                . "filter=1"
                . "&title=" . $request->title);
        } else {
            $posts=Post::paginate(10);
        }
        return view('admin.allPosts',compact('posts'));
    }



    public function returnSearchResult($request)
    {
        $title      = $request->title;

        $posts  = Post::query();
        $posts->where(function ($query) use ($title) {
            if ($title) {
                $query->where('title', 'LIKE', ['%' . $title . '%']);
            }

            return $query;
        });
        return $posts;
    }



    public function update($id){
        $post=Post::findOrFail($id);
        return view('admin.updatePost',compact('post'));
    }
    public function postUpdate(Request $request,$id){
        $requestData = $request->all();
        $validator = Validator::make($requestData, [
            'title'=>'required',
            'content'=>'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }else {
            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path("uploads"), $new_name);
                Post::where('id', $id)->update([
                    'title' =>$requestData['title'],
                    'content' =>$requestData['content'],
                    'image' =>$new_name,
                ]);
            } else {
                Post::where('id', $id)->update([
                    'title' =>$requestData['title'],
                    'content' =>$requestData['content'],
                ]);
            }
            Alert::success('Successful Update !');
            return redirect(route('adminPosts'));
        }

    }

    public function delete($id){
        Post::findOrFail($id)->delete();
        Alert::success('Successful delete !');
        return redirect()->back();
    }
}
