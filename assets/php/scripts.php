<?php
include_once("assets\php\db.php");
class question extends Database{
    public function getQuestions(){

        //requet sql with rand function
        $sql = "SELECT id, question, choiceA, choiceB, choiceC, choiceD FROM questions ORDER BY RAND() LIMIT 10;";
        $result = $this->connect()->query($sql);
        $num = $result->rowCount();
        if ($num>0){
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
}

class answer extends Database{
    public function getAnswers(){
        $sql = "SELECT id, correct, answer FROM questions LIMIT 10";
        $result = $this->connect()->query($sql);
        $num = $result->rowCount();
        if ($num>0){
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
}