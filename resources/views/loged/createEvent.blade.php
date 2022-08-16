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
        
        <form method="POST" action="{{ route('event.post') }}" >
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" id="eventName" class="form-control" placeholder="Renginio pavadinimas" name="eventName">
                </div>
                <div class="col-sm-1 mr-5">
                    <input class="form-control" style="width:100px;" type="number" id="stages" placeholder="etapai" name="stages" min="1" max="10">
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-dark ">Sukurti</button>
                </div>
            </div>
        </form>
    </div>
@endsection