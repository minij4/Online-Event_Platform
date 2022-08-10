@extends('/loged/event')

@section('title', 'Edit photo task')

@section('content1')
    <div class="">
        <h4>Nuotraukos užduotis</h4>
        @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {!! \Session::get('success') !!}
                </div>
        @endif 
        <form method="POST" action="{{ route('task.update', ['taskId' => $taskId]) }}" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" placeholder="" name="question" value=" {{ $question }}">

                                <div class="input-group pt-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="radio" name="answerId" value="{{ $data[0]->id }}"> 
                                        </div>
                                    </div>
                                    <input type="text" name="answerInput1" class="form-control" value="{{ $data[0]->answer }}">
                                </div>
                                <div class="input-group  pt-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="radio" name="answerId" value="{{ $data[1]->id }}"> 
                                        </div>
                                    </div>
                                    <input type="text" name="answerInput2" class="form-control" value="{{ $data[1]->answer }}">
                                </div>
                                <div class="input-group pt-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="radio" name="answerId" value="{{ $data[2]->id }}"> 
                                        </div>
                                    </div>
                                    <input type="text" name="answerInput3" class="form-control" value="{{ $data[2]->answer }}">
                                </div>
                                <div class="input-group pt-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="radio" name="answerId" value="{{ $data[3]->id }}"> 
                                        </div>
                                    </div>
                                    <input type="text" name="answerInput4" class="form-control" value="{{ $data[3]->answer }}">
                                </div>

                    
                                <div class="pt-3">
                                    <button type="submit" class="btn btn-secondary">Išsaugoti</button>
                                </div>
                </div>
            </div>
        </form>
    </div>
@endsection