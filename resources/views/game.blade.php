@extends('layout')

@section('title', 'Login to game') 

@section('content')

<div class="container pt-5">
    @if (session('error'))
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
          {{ session('error') }}
      </div>
    @endif
    <form method="POST" action="{{ route('player.post') }}">
        @csrf
        <div class="row">
            <div class="col-sm-4 pb-4">
                <input type="text" id="nickname" class="form-control" placeholder="Dalyvio vardas" name="nickname" autocomplete="off">
            </div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-dark ">Prisijungti</button>
            </div>
        </div>
    </form>
</div>
@endsection