@extends('admin.index')
@section('title', 'posts')
@section('style')
    <style>
        .rowStyle{
            font-weight: normal;
        }
        .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{
            background-color: #26b1b0 ;
            border: none;
        }
        .btn{
            border: none;
        }

    </style>
@endsection
@section('content')
    <div class="content">
        <form id="search_form" action="" method="get" >
            <div class="box-body" style="    padding-left: 0;padding-right:0">
                <input type="hidden" name="filter" value="1">

                <div class="col-md-12" style="padding:0;">
                    <div class="col-md-2 col-sm-6 col-xs-12 lft padding-a">
                        <div class=" nw-pd">
                            <input name="title" type="text" class="form-control border-r"
                                   placeholder="Search By title" value="{{isset($_GET['title']) ?$_GET['title'] : ''}}">
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12 lft padding-a">
                        <div class=" nw-pd pull-right">
                            <button  class="btn btn-primary border-r" style="background-color: #4b646f" onclick="applySearch({{route('adminPosts')}})">Search</button>

                        </div>
                    </div>
                </div>
            </div>

        </form>


        <div class="box table-responsive "style="border: none;">


            <table class="table table-striped table-hover table-bordered" >
                <thead style="background: #26b1b0">
                <tr style="color: white!important;">
                    <th>ID</th>
                    <th>title</th>
                    <th>author</th>
                    <th>image</th>
                    <th>content</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th class="rowStyle">{{$post->id}}</th>
                        <th class="rowStyle">{{$post->title}}</th>
                        <th class="rowStyle">{{$post->user->name}}</th>
                        <th class="rowStyle"  style="width: 1px "><a data-lightbox="{{url('uploads').'/'.$post->image}}" href="{{url('uploads').'/'.$post->image}}"><i class="fa fa-picture-o size" aria-hidden="true"></i></a></th>
                        <th class="rowStyle">{{Str::limit($post->content, 30)}}</th>
                        <th class="rowStyle"><a href="{{route('adminUpdate',$post->id)}}"  class="btn btn-xs btn-primary" style="background-color: #4b646f"><i class="fa fa-edit"></i> Edit</a> <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModaldelete-{{$post->id}}"><i class="fa fa-trash"></i> Delete</button> </th>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <div class="box-body">
            <input type="hidden" name="filter" value="1">
            <div class="row">

                <div class="col-md-4 col-sm-6 col-xs-12 p-l-0 p-r-0 " style="float: right;margin-top: -20px;padding-right: 6px;">
                    {{$posts->links()}}
                </div>

            </div>
        </div>
        @foreach($posts as $post)
            <div class="modal fade bs-example-modal-sm" id="myModaldelete-{{$post->id}}" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm "  >
                    +
                    <!-- Modal content-->
                    <div class="modal-content "style="text-align: center;">

                        <br>
                        <h4 class="deleteModel">Are you sure you want to delete this</h4>
                        <form method="POST" id="myformdelete" action="{{route('deletePost', $post->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-default btn-danger deleteButton">Delete</button>
                            <button type="button" class="btn btn-default btn-info deleteButton" style="background-color: #4b646f" data-dismiss="modal">Close</button>

                        </form>
                        <br>

                    </div>

                </div>
            </div>
        @endforeach

    </div>
@endsection
