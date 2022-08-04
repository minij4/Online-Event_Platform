@extends('/loged/event')

@section('title', 'Creating tasks')

@section('content1')
    <h4>Pasirinkite užduotį</h4>
    <ul class="nav">
        <li class="nav-item sq">
            <a class="nav-link square" href="tasks/photoBlur">Blur Nuotrauka</a>
        </li>
        <li class="nav-item sq">
            <a class="nav-link square" href="tasks/photoMosaic">Nuotraukos Mozaika</a>
        </li>
        <li class="nav-item sq">
            <a class="nav-link square" href="tasks/photo">Nuotrauka</a>
        </li>
       
    </ul>
    <ul class="nav">
        <li class="nav-item sq">
            <a class="nav-link square" href="tasks/videoBlur">Blur Video</a>
        </li>
        <li class="nav-item sq">
            <a class="nav-link square" href="tasks/video">Video</a>
        </li>
        <li class="nav-item sq">
            <a class="nav-link square" href="tasks/audio">Audio</a>
        </li>
    </ul>
@endsection