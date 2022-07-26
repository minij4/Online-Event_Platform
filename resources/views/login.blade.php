@extends('layout')

@section('title', 'Login') 

@section('content')

<div class="container">
  <h2>Login</h2>
  <form method="POST" action="{{ route('login.custom') }}" autocomplete="off">
    @csrf
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" autocomplete="off">
      @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
      @endif
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" autocomplete="off">
      @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
      @endif
    </div>
    <button type="submit" class="btn btn-dark">Login</button>
  </form>
</div>
@endsection