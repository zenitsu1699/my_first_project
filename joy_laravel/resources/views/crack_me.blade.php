@extends('layout')

@section('content')
    <div class="m-b-md">
        <h2>Crack Me</h2>
        <img src="/img/zorroti.jpeg" alt="">
        <form action="/crack_me" method="post">
            {{ csrf_field() }}

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Je suis bleu. Je viens de l'espace. Je suis l'ami de tous les humains. On m'appelle ...</label>
                <input class="form-control" id="inputPassword2" type="username" name="username" placeholder="Crack Me">
            </div>

            @if($errors->has('username'))
                <p class="help is-danger">{{ $errors->first('username') }}</p>
            @endif

            <button class="btn btn-primary mb-3" type="submit">Sign in</button>

        </form>
    </div>
@endsection