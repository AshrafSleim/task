@extends('admin.index')
@section('title', 'Venoola | Home')
@section('content')
        <div class="container mywithd">
            <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h2>User Control</h2>
                        <p>All Data About Users</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{route('adminUser.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="small-box bg-yellow-gradient">
                    <div class="inner">
                        <h2>Post Control</h2>

                        <p> All Data About Posts </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-alt"></i>
                    </div>
                    <a href="{{route('adminPosts')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            </div>
        </div>
@endsection


