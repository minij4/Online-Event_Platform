@extends('/loged/event')

@section('title', 'Creating game')

@section('content1')
    <div class="pt-5">
            @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {!! \Session::get('success') !!}
                </div>
            @endif    
            <form method="POST" action="{{ route('game.update',  ['gameId' => $game->id]) }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="text" id="gameName" class="form-control" placeholder="" name="gameName" value="{{ $game->gameName }}">
                    </div>
                    <div class="col">
                        <input class="form-control" type="number" placeholder="{{ $game->stage }}" name="stage" min="1" max="{{ $event->stages }}">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-dark ">Išsaugoti</button>
                    </div>
                </div>
            </form>
    </div>
@endsection