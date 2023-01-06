<?php
include 'assets\php\scripts.php';
$answers = new answer;
$answers = $answers->getAnswers();
//oncvert from arr assoc to json
$json = json_encode($answers);
echo $json;