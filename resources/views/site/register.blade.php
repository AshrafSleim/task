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
                                <h2 class="white">Register</h2>
                                <form method="POST" action='{{route('sitePostRegister')}}'>
                                    @csrf

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  value="{{ old('name') }}" placeholder="your name" required autofocus >
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                              </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  value="{{ old('email') }}"placeholder="your email" required autofocus >
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                              </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <select name="role"  class="form-control border-r">
                                                @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{ $role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="your password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-pink btn-block btn-raised" style="background-color: #00f6f4">
                                                Save
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
    <!--Login Page Ends-->

@endsection
