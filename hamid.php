<?php
include 'assets\php\scripts.php';
$questions = new question;
$questions = $questions->getQuestions();
$json = json_encode($questions);
echo $json;