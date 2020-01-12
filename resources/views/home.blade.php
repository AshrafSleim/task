@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card">
                <form id="search_form" action="{{route('home')}}" method="get" class="mb-3" >
                    <div class="box-body" style="    padding-left: 0;padding-right:0">
                        <input   type="hidden" name="filter" value="1">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 lft padding-a">
                                <div class="input-group mt-3 mb-3">
                                    <input name="title" type="text" class="form-control border-r input-group-lg "
                                           placeholder="Search By title" value="{{isset($_GET['title']) ?$_GET['title'] : ''}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-accent-2" id="basic-addon2">Go!</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 lft padding-a">
                                <div class=" nw-pd pull-right">
                                    <button  class="btn btn-primary  border-r" style="background-color: #4b646f" >Search</button>
                                </div>
                            </div>
                        </div>

                </form>
                @if(auth()->user()->can('create'))
                <div class="card-header"> <a href="{{route('addnew')}}">add new post</a></div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
            <br/>
                    @foreach($posts as $post)
                <div class="card">
                    <div class="card-body">

                            <div class="row">
                                <h1 class="mx-auto text-danger">{{$post->title}}</h1>
                            </div>

                        <div class="row">
                            <img src="{{url('/')}}/uploads/{{$post->image}}" style="width: 100% ; height: 300px" class="img-fluid rounded mx-auto d-block" alt="Image">
                        </div>
                            <div class="row mt-2">
                                <p style="font-size: 1.3em">created by <span class="text-primary">{{$post->user->name}}</span>
                               @if(count($post->tags)>0)
                                        <label>taged:</label>
                                        @foreach($post->tags as $tag)
                                            @
                                            <span class="text-danger">
                                        {{$tag->user->name}}
                                    </span>
                                        @endforeach
                                   @endif

                                </p>
                            </div>


                            <div class="row bg-light px-5">
                                <h4 class="mx-auto text-dark">The Content Of Post </h4><br/>
                                <p style="font-size: 1.1em" class="text-info">{{$post->content}}</p>
                            </div>
                            <div class="row">
                                <label>all Comments</label>
                            </div>

                        @foreach($post->comments as $comment)
                                    <div class="row">
                                        <h5 class="mx-auto">by: {{$comment->user->name}}</h5>
                                    </div>

                                <div class="row ">

                                        <p class="bg-light px-4 lead text-center" style="font-size: 1.2em">{{$comment->content}}</p>
                                    </div>
                                    @endforeach
                            <div class="row">
                                <label for="">Add Comment</label>
                            </div>
                            <div class="row">
                             <div class="col-lg-12">
                                <form method="post" action="{{route('addComment',$post->id)}}" class="">
                                    @csrf
                                    <div class="form-group">
                                        <textarea class="form-control" rows="6" style="min-width: 100%" id="content" name="content" required></textarea>
                                    </div>
                                    <div class="row ">

                                    <div class="form-group col-md-12 ">
                                            <button type="submit" class="btn btn-primary" style="background-color: #26b1b0">Comment</button >
                                        </div>
                                    </div>
                                </form>
                             </div>
                            </div>
                            @if(auth()->user()->can('edit') ||  $post->user_id == auth()->user()->id)

                            <div class="row">
                              <button class="btn mx-auto mb-3" style="background-color: #4b646f"><a style="text-decoration: none ; color: white"  href="{{route('update',$post->id)}}"> update Post</a></button>
                            </div>
                            @endif
                </div>
                </div>
                        <br/>
                        @endforeach
<div class="row">                    {{$posts->links()}}
</div>

        </div>
    </div>
</div>
@endsection
