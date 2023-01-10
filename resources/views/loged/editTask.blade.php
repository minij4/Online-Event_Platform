@extends('/loged/event')

@section('title', 'Edit photo task')

@section('content1')
    <div class="">
        <h4>Užduotis</h4>
        <form method="POST" action="{{ route('task.update', ['taskId' => $taskId, 'type' => $type]) }}" enctype="multipart/form-data">
            @csrf
            <div class="row pt-3">
                <div class="col">
                    <div class="mb-6">
                        <p>Nuoroda</p>
                        <input type="text" class="form-control" placeholder="" name="url" value="{{ $taskFile }}">

                        <p>Trukmė</p>
                        <input type="text" class="form-control" placeholder="" name="time" value="{{ $time }}">


                        <div class="mt-5">
                            @if($type == 1 || $type == 3)
                                <img  id="image" src="{{ $taskFile }}">
                            @endif
                            @if($type == 6 )
                                <audio id="audio" controls autoplay>
                                    <source src="{{ $taskFile }}">
                                    Your browser does not support the audio element.
                                </audio>                            
                            @endif
                            @if($type == 2 )
                                <canvas id="canvas"></canvas>
                            @endif
                            @if($type == 4 || $type == 5)
                                <div class="cont" id="video">
                                    <iframe
                                        class="responsive-iframe"
                                        style="border-radius:5px;"
                                        src="{{ $taskFile }}" 
                                        title="YouTube video player" 
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                        >
                                    </iframe>
                                </div>
                            @endif
                        </div>
                        
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




    <script>
    
                        const img = new Image();
                        const stage = canvas.getContext("2d");

                        img.src = "{{ $taskFile }}";
                        img.addEventListener('load', onImage ,false);
                        


                        let difficulty = 5;
                        let pieces;
                        let puzzleWidth;
                        let puzzleHeight;
                        let pieceWidth;
                        let pieceHeight;
                        let currentPiece;
                        let currentDropPiece;
                            
                        let mouse;             
                        
                        function onImage(e) {
                            pieceWidth = Math.floor(img.width / difficulty);
                            pieceHeight = Math.floor(img.height / difficulty);
                            puzzleWidth = pieceWidth * difficulty;
                            puzzleHeight = pieceHeight * difficulty;
                            setCanvas();
                            initPuzzle();
                        }
                        
                        function setCanvas() {
                            canvas.width = puzzleWidth;
                            canvas.height = puzzleHeight;
                            canvas.style.border = "1px solid black";
                        }
                        
                        function initPuzzle() {
                            pieces = [];
                            mouse = { x: 0, y: 0 };
                            currentPiece = null;
                            currentDropPiece = null;
                            stage.drawImage(
                                img,
                                0,
                                0,
                                puzzleWidth,
                                puzzleHeight,
                                0,
                                0,
                                puzzleWidth,
                                puzzleHeight
                            );
                            buildPieces();
                        }
                        
                        function buildPieces() {
                            let i;
                            let piece;
                            let xPos = 0;
                            let yPos = 0;
                            for (i = 0; i < difficulty * difficulty; i++) {
                                piece = {};
                                piece.sx = xPos;
                                piece.sy = yPos;
                                pieces.push(piece);
                                xPos += pieceWidth;
                                if (xPos >= puzzleWidth) {
                                    xPos = 0;
                                    yPos += pieceHeight;
                                }
                            }
                            window.onload = (event) => {
                                shufflePuzzle();
                            };
                        }
                        
                        function shufflePuzzle() {
                            pieces = shuffleArray(pieces);
                            stage.clearRect(0, 0, puzzleWidth, puzzleHeight);
                            let xPos = 0;
                            let yPos = 0;
                            for (const piece of pieces) {
                                piece.xPos = xPos;
                                piece.yPos = yPos;
                                stage.drawImage(
                                    img,
                                    piece.sx,
                                    piece.sy,
                                    pieceWidth,
                                    pieceHeight,
                                    xPos,
                                    yPos,
                                    pieceWidth,
                                    pieceHeight
                                );
                                stage.strokeRect(xPos, yPos, pieceWidth, pieceHeight);
                                xPos += pieceWidth;
                                if (xPos >= puzzleWidth) {
                                    xPos = 0;
                                    yPos += pieceHeight;
                                }
                            }
                        }
                        
                        function shuffleArray(o){
                            for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);

                            return o;
                        }            
    </script>
@endsection