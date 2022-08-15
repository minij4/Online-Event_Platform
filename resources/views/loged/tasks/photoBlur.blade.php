@extends('/loged/event')

@section('title', 'Photo blur task')

@section('content1')
    <div class="">
        <div class="dropdown pb-3">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
                Užduotys</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/loged/tasks/photoBlur/1">Blur nuotrauka</a>
                <a class="dropdown-item" href="/loged/tasks/photoMosaic/2">Nuotraukos mozaika</a>
                <a class="dropdown-item" href="/loged/tasks/photo/3">Nuotrauka</a>
                <a class="dropdown-item" href="/loged/tasks/videoBlur/4">Blur video</a>
                <a class="dropdown-item" href="/loged/tasks/video/5">Video</a>
                <a class="dropdown-item" href="/loged/tasks/audio/6">Audio</a>
            </div>
        </div>
        <h4>Blurintos nuotraukos užduotis</h4>

        @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {!! \Session::get('success') !!}
                </div>
        @endif
        @if (\Session::has('error'))
                <div class="alert alert-denger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {!! \Session::get('success') !!}
                </div>
        @endif 

        <form method="POST" action="{{ route('task.post', ['taskType' => $taskType]) }}" enctype="multipart/form-data">
            @csrf
            <div class="row pt-3">
                <div class="col">
                    <div class="mb-6">
                        <input type="file" name="file" id="file">
                        @error('file')<small class="text-red-500">{{ $message }}</small>@enderror
                    </div>
                </div>
                <div class="col">
                        <p>Klausimas</p>
                        <input type="text" class="form-control" placeholder="" name="question">

                                <div class="input-group pt-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="radio" name="answerRadioId" value="1"> 
                                        </div>
                                    </div>
                                    <input type="text" name="answerInput1" class="form-control" placeholder="atsakymas">
                                </div>
                                <div class="input-group  pt-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="radio" name="answerRadioId" value="2"> 
                                        </div>
                                    </div>
                                    <input type="text" name="answerInput2" class="form-control" placeholder="atsakymas">
                                </div>
                                <div class="input-group pt-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="radio" name="answerRadioId" value="3"> 
                                        </div>
                                    </div>
                                    <input type="text" name="answerInput3" class="form-control" placeholder="atsakymas">
                                </div>
                                <div class="input-group pt-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="radio" name="answerRadioId" value="4"> 
                                        </div>
                                    </div>
                                    <input type="text" name="answerInput4" class="form-control" placeholder="atsakymas">
                                </div>

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
                                <button style="width:100%" type="submit" class="btn btn-secondary">Pridėti</button>
                            </div>
                        </div>
                        
                </div>
            </div>
        </form>
    </div>
@endsection