@extends('layout')

@section('title', 'Login') 

@section('content')

<div class="container">
  <h2>Registration</h2>
  <form action="{{ route('register.custom') }}" method="POST" autocomplete="off">
  @csrf
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" autocomplete="off">
        @if ($errors->has('username'))
            <span class="text-danger">{{ $errors->first('username') }}</span>
        @endif
    </div>
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
    <button type="submit" class="btn btn-dark">Register</button>
  </form>
</div>
@endsection