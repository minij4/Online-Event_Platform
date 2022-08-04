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
            <form method="POST" action="{{ route('game.post') }}">
                @csrf
                <div class="row pb-4">
                    <div class="col">
                        <p>Žaidimo pavadinimas</p>
                        <input type="text" class="form-control" placeholder="" name="gameName">            
                    </div>
                    <div class="col">
                        <p>Žaidimas priskiriamas renginiui</p>
                        <select class="form-control" name="eventName" id="eventName" data-parsley-required="true">
                            @foreach ($data as $row) 
                            {
                                <option value="{{ $row->id }}">{{ $row->eventName }}</option>
                            }
                            @endforeach
                        </select>           
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                            <button type="submit" class="btn btn-dark ">Sukurti</button>
                    </div>
                </div> 
            </form>
    </div>
@endsection