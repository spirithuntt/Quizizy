<?php include_once("assets\php\scripts.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" ></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Quizizy</title>
</head>
    <header class="showcase">
        <div class="container">
            <nav>
                <h1 class="logo">Quizizy</h1>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                </ul>
            </nav>
        </div>
        </header>
<!-- quiz game -->
<div class="note" id="note">
<!-- instructions -->
<h1 class="title">Instructions</h1>
<p class="parag">This is a quiz game. You will be given 4 options and you have to select the correct one. Good luck!</p>
<button id="start">Start the Quiz</button>
</div>

<div class="quiz" id="quiz">
    <div class="question" id="question">
      <h1 class="title"></h1>
    </div>
    <!--Start Animated Progress Bar-->
<div class="animated-progress progress-blue" id="progressBar">
  <span id="PB" data-progress="45"></span>
</div>
<!--End Animated Progress Bar-->
    <div class="cards">
      <button class="card" id="A" onclick="checkAnswer('A');"></button>
      <button class="card" id="B" onclick="checkAnswer('B');"></button>
      <button class="card" id="C" onclick="checkAnswer('C');"></button>
      <button class="card" id="D" onclick="checkAnswer('D');"></button>
    </div>
</div>
<!-- score result -->
<div class="score-container" id="scoreContainer">
  <h1 class="title1">Your Score</h1>
  <p class="parag" id="score"></p>
  <p class="parag" id="bestScore"></p>
  <button onclick="location.reload();" id="btn-reload">Start again</button>
  <!-- show wrongAnswers -->
  <div class="wrongAnswers" id="wrongAnswers">
</div>
</div>
<!--start js -->
<script src="assets/js/scripts.js"></script>
<script>
  $("#quiz").hide();
  $("#progressBar").hide();
   $("#scoreContainer").hide();
                $(function(){
                    $("#quiz").hide();
                    $("#start").click(function(){
                        $("#quiz").show();
                        $("#progressBar").show();
                        $("#note").hide();
                    })
                    
                })
</script>
<!-- end js -->
</body>
</html>