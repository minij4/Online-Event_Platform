@extends('/loged/event')

@section('title', 'Creating tasks')

@section('content1')
    <h4>Pasirinkite užduotį</h4>
    <ul class="nav">
        <li class="nav-item sq">
            <a class="nav-link square" href="tasks/photoBlur/1">Blur Nuotrauka</a>
        </li>
        <li class="nav-item sq">
            <a class="nav-link square" href="tasks/photoMosaic/2">Nuotraukos Mozaika</a>
        </li>
        <li class="nav-item sq">
            <a class="nav-link square" href="tasks/photo/3">Nuotrauka</a>
        </li>
       
    </ul>
    <ul class="nav">
        <li class="nav-item sq">
            <a class="nav-link square" href="tasks/videoBlur/4">Blur Video</a>
        </li>
        <li class="nav-item sq">
            <a class="nav-link square" href="tasks/video/5">Video</a>
        </li>
        <li class="nav-item sq">
            <a class="nav-link square" href="tasks/audio/6">Audio</a>
        </li>
    </ul>

        <h4>Patarimas:</h4>
        <p>Video failų nuorodas kelti iš <strong>Youtube.com</strong>.</p>
        <p>Nuotraukų failus ir audio įrašus iš <strong>DropBox.com</strong>.</p>
        <p>Įkelti iš kitur failai gali neveikti.</p>



        
<!--
<canvas id="canvas" style="height:250px; "></canvas>
<script>

// MOZAIKOS SCRIPTAS


const PUZZLE_HOVER_TINT = '#009900';
 
 
 const canvas = document.querySelector("#canvas");
 const stage = canvas.getContext("2d");
 const img = new Image();

  
 let difficulty = 5;
 let pieces;
 let puzzleWidth;
 let puzzleHeight;
 let pieceWidth;
 let pieceHeight;
 let currentPiece;
 let currentDropPiece;
  
 let mouse;
 
 
 img.addEventListener('load',onImage,false);
 img.src = "https://upload.wikimedia.org/wikipedia/commons/9/9a/Antanas_Smetona_2.jpg";
 
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
     createTitle("Click to Start Puzzle");
     buildPieces();
 }
 
 function createTitle(msg) {
     stage.fillStyle = "#000000";
     stage.globalAlpha = 0.4;
     stage.fillRect(100, puzzleHeight - 40, puzzleWidth - 200, 40);
     stage.fillStyle = "#FFFFFF";
     stage.globalAlpha = 1;
     stage.textAlign = "center";
     stage.textBaseline = "middle";
     stage.font = "20px Arial";
     stage.fillText(msg, puzzleWidth / 2, puzzleHeight - 20);
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
     document.onpointerdown = onPuzzleClick;
 }
 
 function shuffleArray(o){
     for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
     return o;
 }
</script>


-->

@endsection