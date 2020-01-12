@extends('layouts.header')
@section('content')

    <section id="login">
        <div class="container-fluid">
            <div class="row full-height-vh">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="card text-center width-400"style="border-radius: 15px" >
                        <div class="card-img overlap">
                        </div>
                        <div class="card-body">

                            <div class="card-block" style="background-color: #423f3f;border-radius: 15px">
                                <h2 class="white">resit password</h2>
                                <form method="POST" action='{{route('postResetPassword')}}'>
                                    @csrf


                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="your email" required>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-pink btn-block btn-raised" style="background-color: #00f6f4">
                                                Send
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>











           <div class="col-sm-6 col-lg-6 mb-3" style="margin: auto;margin-top: 66px;">
                    <div class="title-left">
                        <h3 align="center" style="color:black;" >Forget Password</h3>
                    </div>
                    <form class="mt-3  review-form-box" id="" method="post" action="{{route('postResetPassword')}}">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email" class="mb-0">{{trans('site.Email Address')}} </label>
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="{{trans('site.Email Address')}}">
                            </div>
                        </div>

                        <button type="submit" class="btn hvr-hover">Send</button>
                    </form>
                </div>
@endsection
