@extends('/loged/event')

@section('title', 'Start a game')

@section('content1')
    <h4>Paleisti žaidimą</h4>

    @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {!! \Session::get('success') !!}
        </div>
    @endif 
    @if (\Session::has('error'))
        <div class="alert alert-warning alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {!! \Session::get('error') !!}
        </div>
    @endif  
    <form method="POST" action="{{ route('start.post') }}">
        @csrf
        <div class="row pt-5">
            <div class="col">
                <div class="dropdown">
                    <select class="form-control" name="gameId" id="gameId" data-parsley-required="true">
                        @foreach ($data as $row) 
                        {
                            <option value="{{ $row->id }}">
                                {{ $row->eventName . ' — ' . $row->stage . ' etapas ' }}  
                                {{ $row->status === 1 ? "| aktyvus" : ""  }}
                            </option>
                        }
                        @endforeach
                    </select>     
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-dark">paleisti / sustabdyti</button>
            </div           
        </div>
    </form>
@endsection