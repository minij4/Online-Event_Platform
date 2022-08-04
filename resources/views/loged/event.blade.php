@extends('/loged/layout')

@section('title', 'Start creating an event')

@section('content')

<div class="container">
    <h2>Sukurkite savo renginio žaidimus</h2>
    <br>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="/loged/createEvent">Sukurti Renginį</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/loged/createGame">Sukurti Žaidimą</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/loged/createTask">Sukurti Užduotį</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/loged/delete">Ištrinti Užduotis</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/loged/startGame">Paleisti Žaidimą</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content pt-4">
        @yield('content1')
    </div>

    <script src="{{ url('js/active.js') }}"></script>
</div>
@endsection