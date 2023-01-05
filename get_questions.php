<?php
include 'assets\php\scripts.php';
$questions = new question;
$questions = $questions->getQuestions();
//oncvert from arr assoc to json
$json = json_encode($questions);
echo $json;