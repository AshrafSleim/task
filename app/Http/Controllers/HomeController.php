<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Validator;
Use Alert;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->filter == 1) {
            $query  = $this->returnSearchResult($request);
            $posts = $query->paginate(10);
            $posts->setPath(URL::current() . "?"
                . "filter=1"
                . "&title=" . $request->title);
        } else {
            $posts=Post::paginate(10);
        }
        return view('home',compact('posts'));
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







    public function addnew(){
        $users =User::all();
        return view('site.addNew' ,compact('users'));
    }
    public function postnew(Request $request){
        $requestData = $request->all();
        $validator = Validator::make($requestData, [
            'title'=>'required',
            'content'=>'required',
            'image'=>'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }
        else {
            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path("uploads"), $new_name);
            } else {
                $new_name = "";
            }
            $row=Post::create(
                [
                    'title' =>$requestData['title'],
                    'content' =>$requestData['content'],
                    'image' =>$new_name,
                    'user_id'=>auth()->user()->id,

                ]);
            if (count($request->tags)>0){
                foreach ($request->tags as $tag){
                Tag::create(
                    [
                        'post_id' =>$row->id,
                        'user_id' =>$tag,
                    ]);
                }
            }
            Alert::success('Successful Store !');
            return redirect(route('home'));
        }


    }

    public function update($id){
        $post=Post::findOrFail($id);
        return view('site.update',compact('post'));
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
            return redirect(route('home'));
        }

    }

    public function addComment(Request $request ,$id){
        $requestData = $request->all();

        $row=Comment::create(
            [
                'content' =>$requestData['content'],
                'post_id'=>$id,
                'user_id'=>auth()->user()->id,

            ]);

        return redirect()->back();
    }

}
