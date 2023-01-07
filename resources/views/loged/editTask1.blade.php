@extends('/loged/event')

@section('title', 'Edit photo task')

@section('content1')
    <div class="">
        <h4>Nuotraukos užduotis</h4>
        <form method="POST" action="{{ route('task.update', ['taskId' => $taskId]) }}" enctype="multipart/form-data">
            @csrf
            <div class="row pt-3">
                <div class="col">
                    <div class="mb-6">
                        <p>Nuoroda</p>
                        <input type="text" class="form-control" placeholder="" name="url" value="{{ $taskFile }}">
                    </div>
                </div>
                <div class="col">
                    <p>Klausimas</p>
                                <input type="text" class="form-control" placeholder="" name="question" value=" {{ $question }}">

                                <div class="input-group pt-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="radio" name="answerId" value="{{ $data[0]->id }}" {{ ($data[0]->id==$answerId)? "checked" : "" }}> 
                                        </div>
                                    </div>
                                    <input type="text" name="answerInput1" class="form-control" value="{{ $data[0]->answer }}">
                                </div>
                                <div class="input-group  pt-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="radio" name="answerId" value="{{ $data[1]->id }}" {{ ($data[1]->id==$answerId)? "checked" : "" }}> 
                                        </div>
                                    </div>
                                    <input type="text" name="answerInput2" class="form-control" value="{{ $data[1]->answer }}">
                                </div>
                                <div class="input-group pt-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="radio" name="answerId" value="{{ $data[2]->id }}" {{ ($data[2]->id==$answerId)? "checked" : "" }}> 
                                        </div>
                                    </div>
                                    <input type="text" name="answerInput3" class="form-control" value="{{ $data[2]->answer }}">
                                </div>
                                <div class="input-group pt-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="radio" name="answerId" value="{{ $data[3]->id }}" {{ ($data[3]->id==$answerId)? "checked" : "" }}> 
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