<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Playing</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>
        <style>
            .blur { filter: blur(5px); }
        </style>
        <link rel="stylesheet" href="{{ url('css/styles.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
      
    </head>
    <body>
   
        <div class="container main">
                <div class="content">
                    <div class="pb-1"><h1  style="margin-top: 0px;">{{ $game->gameName }}</h1></div>
                    <div class="pb-2"><h2>{{ $task->question }}</h2></div>
                    
                    <div class="box">
                        <div class="image pb-2">
                            <canvas id="canvas"></canvas>
                            <img  id="image" src="{{ asset($task->url) }}">

                            <video id="video" autoplay>
                                <source src="{{ asset($task->url) }}" type="video/mp4" >
                                Sorry, your browser does not support HTML5 video.
                            </video>

                            <audio id="audio" controls autoplay>
                                <source src="{{ asset($task->url) }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                        <div class="answers" id="answers">
                            @foreach ($answers as $row)
                                <div class="pb-4 answer">
                                    <button onclick="score(id)" type="button" class="btn btn-light p-4" id="{{ $row->id }}"></button> 
                                    <p style="display:inline">{{ $row->answer }}</p>
                                    
                                </div>
                            @endforeach
                        </div>
                        <div id="answBox">
                            <h3 id="comment">Teisingas atsakymas: </h3>
                            <p id="answ"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('scripts')
    </body>
</html>
        <script>
        document.getElementById('answBox').style.display = "none";

            var taskType = "{{ $task->type }}";

            var SCORE =  parseInt("{{ Session::get('score') }}");
           
            var answer = "{{ $answer }}";
            

            console.log(taskType);
            

            if( taskType == 1 ) {
                const canvas = document.getElementById('canvas');
                canvas.style.display = "none";
                const audio = document.getElementById('audio');
                audio.style.display = "none";
                const video = document.getElementById('video');
                video.style.display = "none";
                const img = document.getElementById('image');
                img.classList.add("blur");
            }
            if( taskType == 3 ) {
                const canvas = document.getElementById('canvas');
                canvas.style.display = "none";
                const audio = document.getElementById('audio');
                audio.style.display = "none";
                const video = document.getElementById('video');
                video.style.display = "none";
            }
            if( taskType == 5 ) {
                const img = document.getElementById('image');
                img.style.display = "none";
                const canvas = document.getElementById('canvas');
                canvas.style.display = "none";
                const audio = document.getElementById('audio');
                audio.style.display = "none";
            }

            if( taskType == 4 ) {
                const img = document.getElementById('image');
                img.style.display = "none";
                const canvas = document.getElementById('canvas');
                canvas.style.display = "none";
                
                const video = document.getElementById('video');
                video.classList.add("blur");
                const audio = document.getElementById('audio');
                audio.style.display = "none";
            }
            if( taskType == 6 ) {
                const img = document.getElementById('image');
                img.style.display = "none";
                const canvas = document.getElementById('canvas');
                canvas.style.display = "none";
                const video = document.getElementById('video');
                video.style.display = "none";
            }

            
            var answerId = "{{ $answerId }}";
            var choosen;

            



            function score(id) {
                console.log(id);
                choosen = id;
                const answers = document.getElementById('answers');
                answers.style.display = "none";
               
            }

            window.setTimeout(function() {
                document.getElementById('answers').style.display = "none";
                document.getElementById('answBox').style.display = "block";
                
                if(answerId == choosen) {
                    SCORE = SCORE + 100;

                    $.ajaxSetup({
                        headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
                    });

                    $.ajax({ 
                        url: "{{ route('session.create') }}",
                        data: {'score': SCORE},
                        type: 'get',
                        success: function(response){
                            console.log(response);
                        }
                    });

                    document.getElementById('comment').innerHTML = "Atsakėte teisingai!";
                } else {
                    document.getElementById('answ').innerHTML = "{{ $answer }}";
                }
            }, 5000);

            window.setTimeout(function() {
                window.location.href = '/task';
            }, 10000);

























                    ///// Mosaic function
                    if( taskType == 2 ) {
                        const audio = document.getElementById('audio');
                        audio.style.display = "none";
                        const img2 = document.getElementById('image');
                        img2.style.display = "none";
                        const video = document.getElementById('video');
                        video.style.display = "none";

                        const canvas = document.getElementById('canvas');
                        canvas.style.display = "block";
                    
                        const img = new Image();
                        const stage = canvas.getContext("2d");

                        img.addEventListener('load', onImage ,false);
                        img.src = "{{ $task->url }}";

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
                    }

                    

        </script>
