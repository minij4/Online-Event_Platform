@extends('/loged/event')

@section('title', 'Photo blur task')

@section('content1')
    <div class="">
        <div class="dropdown pb-3">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
                Užduotys</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="photoBlur">Blur nuotrauka</a>
                <a class="dropdown-item" href="photoMosaic">Nuotraukos mozaika</a>
                <a class="dropdown-item" href="photo">Nuotrauka</a>
                <a class="dropdown-item" href="videoBlur">Blur video</a>
                <a class="dropdown-item" href="video">Video</a>
                <a class="dropdown-item" href="audio">Audio</a>
            </div>
        </div>
        <h4>Paprastos nuotraukos užduotis</h4>
        <div class="row">
            <div class="col">
                <p>Įkelkite nuotrauka:</p>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="customFile" name="filename">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <div class="col">
                <p>Klausimas</p>
                <input type="text" class="form-control pb-4" placeholder="" name="question">

                <div class="input-group pt-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                        <input type="checkbox"> 
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Atsakymas 1">
                </div>
                <div class="input-group pt-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                        <input type="checkbox"> 
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Atsakymas 2">
                </div>
                <div class="input-group pt-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                        <input type="checkbox"> 
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Atsakymas 3">
                </div>
                <div class="input-group pt-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                        <input type="checkbox"> 
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Atsakymas 4">
                </div>

                <div class="row pt-5">
                    <div class="col">
                        <div class="dropdown">
                            <button style="width:100%" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
                                Pasirinkite Žaidimą</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Zaidimas A</a>
                                <a class="dropdown-item" href="#">Zaidimas B</a>
                                <a class="dropdown-item" href="#">Zaidimas C</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <button style="width:100%" type="submit" class="btn btn-secondary">Pridėti</button>
                    </div>
                </div>        
            </div>
        </div>
    </div>
@endsection