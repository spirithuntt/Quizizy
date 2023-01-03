<?php
include 'assets\php\scripts.php';
$answers = new question;
$answers = $answers->getAnswer();
$json = json_encode($answers);
echo $json;