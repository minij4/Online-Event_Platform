@extends('/loged/event')

@section('title', 'Editing games')

@section('content1')
<h4 class="pb-5">Redaguokite žaidimus</h4>
    @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {!! \Session::get('success') !!}
        </div>
    @endif
    @if (\Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {!! \Session::get('error') !!}
        </div>
    @endif  
<h5>Renginiai</h5>
<form method="post" action="{{ route('event.edit') }}">
@csrf
    <div class="row">
        <div class="column pl-1 pr-4" style="width:20%">
            <select class="form-control" name="event" data-parsley-required="true">
            @foreach ($events as $row) 
            {
                <option value="{{ $row->id }}">{{ $row->eventName }}</option>
            }
            @endforeach
            </select>
        </div>
        <div class="column">
            <button type="submit" class="btn btn-dark ">Redaguoti</button>
        </div>
    </div>
</form>
<h5>Žaidimai</h5>
<form method="post" action="{{ route('game.edit') }}">
@csrf
    <div class="row">
        <div class="column  pl-1 pr-4" style="width:20%">
            <select class="form-control" name="game" data-parsley-required="true">
                @foreach ($games as $row) 
                {
                    <option value="{{ $row->id }}">{{ $row->gameName }}</option>
                }
                @endforeach
            </select>  
        </div>
        <div class="column">
            <button type="submit" class="btn btn-dark ">Redaguoti</button>
        </div>
    </div>
</form>
<h5>Užduotys</h5>
<form method="post" action="{{ route('task.edit') }}">
    @csrf
    <div class="row">
        <div class="column pl-1 pr-4" style="width:20%">
            <select class="form-control" name="task" data-parsley-required="true">
                @foreach ($tasks as $row) 
                {
                    <option value="{{ $row->id }}">{{ $row->question }}</option>
                }
                @endforeach
            </select>  
        </div>
        <div class="column">
            <button type="submit" class="btn btn-dark " >Redaguoti</button>
        </div>
    </div>
</form>
@endsection