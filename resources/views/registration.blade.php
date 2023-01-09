@extends('layout')

@section('title', 'Register') 

@section('content')

<div class="container">
  <h2>Registracija</h2>
  <form action="{{ route('register.custom') }}" method="POST" autocomplete="off">
  @csrf
    <div class="form-group">
        <label for="username">Prisijungimo vardas:</label>
        <input type="text" class="form-control" id="username" placeholder="" name="username" value="{{ old('username') }}" autocomplete="off">
        @if ($errors->has('username'))
            <span class="text-danger">{{ $errors->first('username') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Elektroninis paštas:</label>
        <input type="email" class="form-control" id="email" placeholder="" name="email" value="{{ old('email') }}" autocomplete="off">
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="password">Slaptažodis:</label>
        <input type="password" class="form-control" id="password" placeholder="" name="password" autocomplete="off">
        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
    </div>
    <button type="submit" class="btn btn-dark">Pateikti</button>
  </form>
</div>
@endsection