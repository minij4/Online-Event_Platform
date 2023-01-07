@extends('/loged/event')

@section('title', 'Editing Event')

@section('content1')
    <div class="pt-5">    
        <p>Renginio pavadinimas</p>
        <form method="POST" action="{{ route('event.update', ['eventId' => $event->id]) }}" >
            @csrf
            <div class="row">
                <div class="col">
                    <input type="text" id="eventName" class="form-control" placeholder="" name="eventName" value="{{ $event->eventName }}">
                </div>
                <div class="col-sm-1 mr-5">
                    <input class="form-control" style="width:100px;" type="number" id="stages" placeholder="etapai" name="stages" min="1" max="10">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-dark ">Išsaugoti</button>
                </div>
            </div>
              
        </form>
    </div>
@endsection