// select all elements by id
let choiceA = document.getElementById("A");
let choiceB = document.getElementById("B");
let choiceC = document.getElementById("C");
let choiceD = document.getElementById("D");
let question = document.getElementById("question");
let startBtn = document.getElementById("start");
let quiz = document.getElementById("quiz");
let progressBar = document.getElementById("progressBar");

// Using ajax to get the questions from php file
let questions = [];
let lastQuestion;
$.ajax({
  //send an HTTP GET request to the specified URL 
  url: "http://localhost/Quizizy/hamid.php",
  type: "GET",
  dataType: "json",
  //The callback function,data,which represents the data that was returned by the server,
  success: function(data) {
  // the callback function is setting the  value of the questions array to the value of data.
    questions = data;
    lastQuestion = questions.length - 1;//the last index of the questions
    console.log(questions);
  },
  error: function(error){
    console.log(error);
  },
});








console.log(questions);


let questionIndex = 0;//first index of the questions
let score = 0;
let choice;
// start quiz
startBtn.addEventListener("click", startQuiz);

//start quiz
function startQuiz(){
  
  showQuestion();
  showProgress();
}

rand(questions);
function showQuestion(){
  let q = questions[questionIndex];
  question.innerHTML = q.question;
  choiceA.innerHTML = q.choiceA;
  choiceB.innerHTML = q.choiceB;
  choiceC.innerHTML = q.choiceC;
  choiceD.innerHTML = q.choiceD;
}
function nextQuestion(){
  if(questionIndex < lastQuestion){
    questionIndex++;
    showQuestion();
    showProgress();
  }
  else{
    //end the quiz and show the score
    quiz.style.display = "none";
    progressBar.style.display = "none";
    document.getElementById("score").innerHTML ="You got " + score + " out of " + questions.length + " correct";
    document.getElementById("bestScore").innerHTML = "Your best score is " + getBestScore(score) + " out of " + questions.length;
    document.getElementById("scoreContainer").style.display = "block";
    document.getElementById("wrongAnswers").innerHTML = "";
    for(let wrongAnswer of wrongAnswers){
      document.getElementById("wrongAnswers").innerHTML += `<div class="wrongQuestionContainer">you answered this question wrong :<div id=wrongQuestion> the question: ${wrongAnswer["question"]}</div><br> <div id=correctAnswer> the correct answer : ${wrongAnswer.correctAnswer}</div><br><div id=answerExplanation> why : ${wrongAnswer.answerExplanation}</div></div><br><br>`;   
    };
  }
}

function rand(array) {
  array.sort(() => Math.random() - 0.5);
}

function checkAnswer(answer){
  console.log(questions[questionIndex].question);
  if(answer == questions[questionIndex].correct){
    score++;
    choice = "correct";
  }
  else{
  showAnswer(questionIndex);
  }
  nextQuestion();
}

function showProgress(){
  let scorePercent = Math.round(100 * questionIndex/questions.length);
  document.querySelector("#PB").setAttribute("data-progress", scorePercent);
  //jquery for progress bar
  $(".animated-progress span").each(function () {
    $(this).animate(
      {
        width: $(this).attr("data-progress") + "%",
      },
      100
    );
    $(this).text($(this).attr("data-progress") + "%");
  });
}
function getBestScore(score){
  let bestScore = localStorage.getItem("bestScore");
  if(score > bestScore){
    localStorage.setItem("bestScore", score);
    bestScore = score;
  }
  return bestScore;
}
let wrongAnswers = [];
function showAnswer(questionIndex)
{
  choice = "wrong";
  let wrongAnswer = {
    question: questions[questionIndex].question,
    correctAnswer: questions[questionIndex].correct,
    answerExplanation: questions[questionIndex].answer,
};
wrongAnswers.push(wrongAnswer);
}