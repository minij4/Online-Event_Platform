@extends('/loged/event')

@section('title', 'Deleting games')

@section('content1')
<!-- <h4 class="pb-5">Ištrinkite nereikalingus žaidimus</h4>
    @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {!! \Session::get('success') !!}
        </div>
    @endif  
<h5>Renginiai</h5>
<form method="post" action="{{ route('event.delete') }}">
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
            <button type="submit" class="btn btn-dark ">Ištrinti</button>
        </div>
    </div>
</form>
<h5>Žaidimai</h5>
<form method="post" action="{{ route('game.delete') }}">
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
            <button type="submit" class="btn btn-dark ">Ištrinti</button>
        </div>
    </div>
</form>
<h5>Užduotys</h5>
<form method="post" action="{{ route('task.delete') }}">
    @csrf
    <div class="row">
        <div class="column pl-1 pr-4" style="width:20%">
            <select class="form-control" name = "task" data-parsley-required="true">
                @foreach ($tasks as $row) 
                {
                    <option value="{{ $row->id }}">{{ $row->question }}</option>
                }
                @endforeach
            </select>  
        </div>
        <div class="column">
            <button type="submit" class="btn btn-dark " >Ištrinti</button>
        </div>
    </div>
</form> -->

<h5 class="pb-5">Ištrinkite nereikalingus renginius, žaidimus ar užduotis paspausdami ant jų</h5>
<input id="myInput" type="text" placeholder=" Paieška">
    <table class="table">
        @foreach ($events as $event)
            
                <tbody id="myTable">
                    <tr>
                        <td><h4>RENGINYS</h4></td>
                    </tr>
                    <tr>
                        <td>
                            <form method="post" action="{{ route('event.delete') }}">
                                @csrf
                                <button type="submit" onclick="return confirm('Ar tikrai norite ištrinti renginį:  `{{ $event->eventName }}` ?')" class="btn" value="{{ $event->id }}" name="event">{{ $event->eventName }}</button>
                            </form>
                        </td>
                    </tr>
                    @foreach ($games as $game) 
                        @if ($event->id == $game->eventId)
                            <tr>
                                <td><h6>ŽAIDIMAS</h6></td>
                                <td><h6>UŽDUOTYS</h6></td>
                            </tr>
                            <tr>
                                <td>
                                    <form method="post" action="{{ route('game.delete') }}">
                                    @csrf
                                        <button type="submit" onclick="return confirm('Ar tikrai norite ištrinti žaidimą:  `{{ $game->gameName }}` ?')" class="btn" value="{{ $game->id }}" name="game">{{ $game->gameName }}</button>
                                    </form>
                                </td>
                                @foreach ($tasks as $task)
                                    @if ($game->id == $task->gameId)
                                        <td>
                                            <form method="post" action="{{ route('task.delete') }}">
                                            @csrf
                                                <button type="submit" onclick="return confirm('Ar tikrai norite ištrinti užduotį:  `{{ $task->question }}` ?')" class="btn" value="{{ $task->id }}" name="task">{{ $task->question }}</button>
                                            </form>
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endif 
                    @endforeach
                </tbody>
        @endforeach
    </table>
@endsection

