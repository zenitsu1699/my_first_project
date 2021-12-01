@extends('layout')

@section('content')
    <div class="title m-b-md">
        Inscription
    </div>

    <div class="links m-b-md">
        <form action="/inscription" method="post">
            {{ csrf_field() }}

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input class="form-control" id="inputPassword2" type="email" name="email" placeholder="Email input" value="{{ old('email') }}">
            </div>

            <!-- @if($errors->has('email'))
                <p class="help is-danger">{{ $errors->first('email') }}</p>
            @endif -->

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">User name</label>
                <input class="form-control" id="inputPassword2" type="username" name="username" placeholder="Name of user">
            </div>

            <!-- @if($errors->has('username'))
                <p class="help is-danger">{{ $errors->first('username') }}</p>
            @endif -->

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input class="form-control" id="inputPassword2" type="password" name="password" placeholder="Password of account">
            </div>

            <!-- @if($errors->has('password'))
                <p class="help is-danger">{{ $errors->first('password') }}</p>
            @endif -->

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password confirmation</label>
                <input class="form-control" id="inputPassword2" type="password" name="password confirmation" placeholder="Password Confirmation">
            </div>

            <!-- @if($errors->has('password_confirmation'))
                <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
            @endif -->

            <button class="btn btn-primary mb-3" type="submit">Sign in</button>

        </form>
    </div>
@endsection