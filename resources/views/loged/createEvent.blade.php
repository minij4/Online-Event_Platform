@extends('/loged/event')

@section('title', 'Creating Event')

@section('content1')
    <div class="pt-5">
        @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {!! \Session::get('success') !!}
            </div>
            @endif  
        
        <p>Renginio pavadinimas</p>  
        <form method="POST" action="{{ route('event.post') }}" >
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" id="eventName" class="form-control" placeholder="" name="eventName">
                </div>
                <p>Etapai:</p>
                <div class="col-sm-1">
                    <input class="form-control" type="number" id="stages" name="stages" min="1" max="10">
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-dark ">Sukurti</button>
                </div>
            </div>
        </form>
    </div>
@endsection