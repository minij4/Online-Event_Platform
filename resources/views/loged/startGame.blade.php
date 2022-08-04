@extends('/loged/event')

@section('title', 'Start a game')

@section('content1')
    <h4>Paleisti žaidimą</h4>

    <div class="row pt-5">
        <div class="col">
            <div class="dropdown">
                <select class="form-control" name="gameId" id="gameId" data-parsley-required="true">
                    @foreach ($data as $row) 
                    {
                        <option value="{{ $row->id }}">{{ $row->eventName . ' — ' . $row->gameName }}</option>
                    }
                    @endforeach
                </select>     
            </div>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-secondary">Paleisti Žaidimą</button>
        </div>
    </div>
@endsection