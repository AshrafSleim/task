<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class IndexController extends Controller
{
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
        return view('welcome',compact('posts'));
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
}
