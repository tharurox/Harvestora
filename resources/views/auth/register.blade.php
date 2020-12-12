@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card m-6 p-3">
        
        <div class="card-header bg-white d-flex justify-content-center">
            <h4 class='my-3 display-4 text-info'>Register to Harvestora</h4>
           </div>

                    <form class="form-horizontal m-5" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <a href="{{ route('login') }}" class='btn btn-link'>Already a member? Login!</a>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <h5 for="email" class="col-md-4 display-5 text-success">Enter Name</h5>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control" name="address" value="{{ old('address') }}" required>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone No</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <h5 for="email" class="col-md-4 display-5 text-success">Enter Email</h5>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <h5 for="email" class="col-md-4 display-5 text-success">Create password</h5>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <h5 for="email" class="col-md-4 display-5 text-success">Confirm password</h5>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success btn-lg">
                                   Join the community Now!
                                </button>
                            </div>
                        </div>

                        <footer class='d-flex justify-content-center float-center'>&copy; Copyright 2020 Harvestora</footer>
                    </form>
              
                   

                </div>
</div>
@endsection
