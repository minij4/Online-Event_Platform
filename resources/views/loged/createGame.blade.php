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
                    <div class="col">
                        @foreach ($data as $row)
                        <!-- Čia rodytų visų visų events etapus, tačiau scriptas paleidžia tik tuos etapus, kurio event yra aktyvus pagal row->id -->
                        <div class="stages" id="{{ $row->id }}" style="display: none">
                            <p>Žaidimas priskiriamas etapui</p>
                            <input class="form-control" type="number" name="{{ $row->id }}" min="1" max="{{ $row->stages }}">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                            <button type="submit" class="btn btn-dark ">Sukurti</button>
                    </div>
                </div> 
            </form>
    </div>

<!-- 
    Jei pasikeičia #eventName tada atnaujiną .stages rodymą. 
    t.y. pasikeitus renginiui pasikeičia ir jo turimas etapų skaičius 
-->

    <script type="text/javascript">
        $(document).ready(function() {
            $(".stages:first").css("display", "block");
        });
        $('#eventName').on('change', function()
        {
            $(".stages").css("display", "none");
            var id = $(this).find('option:selected').val();
            $("#" + id).css("display", "block");
        }); 
    </script>
@endsection