@extends('layout')

@section('title', 'Login') 

@section('content')

<div class="container">
  <h2>Prisijungimo duomenys:</h2>
    @if (session('error'))
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
          {{ session('error') }}
      </div>
    @endif
  <form method="POST" action="{{ route('login.custom') }}" autocomplete="off">
    @csrf
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