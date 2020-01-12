@extends('admin.index')
@section('title', 'UpdatePost')
@section('style')
    <style>
        .btn{
            border: none;
        }
    </style>
@endsection
@section('content')
    <div class="form-content">
        <form action="{{route('adminPostUpdate',$post->id)}}"  method="post" class="mb-3 pb-2" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="title">post title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="image"> image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/x-png,image/gif,image/jpg,image/jpeg" >
                </div>

            </div>
            <div class="row">

            <div class="form-group">
                <label for="content">content</label>
                <textarea class="form-control" rows="5" id="content" name="content" required>{{$post->content}}</textarea>
            </div>
            </div>
            </br>

            <div class="row ">
                <div class="form-group col-md-12 ">
                    <button type="submit" class="btn btn-primary" style="background-color: #26b1b0">Save</button >
                    <a href="{{route('adminPosts')}}" class="btn btn-info" style="background-color: #4b646f">Cancel</a>
                </div>
            </div>
        </form>

    </div>
@endsection
@section('script')

@endsection
