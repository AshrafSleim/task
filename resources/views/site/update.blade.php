@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">  update post</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('postUpdate',$post->id)}}"  method="post" class="mb-3 pb-2" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">post title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}" required>
                            </div>
                            <div class="form-group ">
                                <label for="image"> image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/x-png,image/gif,image/jpg,image/jpeg" >
                            </div>
                            <div class="form-group">
                                <label for="content">content</label>
                                <textarea class="form-control" rows="5" id="content" name="content" required>{{$post->content}}</textarea>
                            </div>
                            <div class="row ">
                                <div class="form-group col-md-12 ">
                                    <button type="submit" class="btn btn-primary" style="background-color: #26b1b0">Update</button >
                                    <a href="{{route('home')}}" class="btn btn-info" style="background-color: #4b646f">Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
