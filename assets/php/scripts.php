<?php
include_once("assets\php\db.php");
class question extends Database{
    public function getQuestions(){

        $sql = "SELECT question, choiceA, choiceB, choiceC, choiceD FROM questions";
        $result = $this->connect()->query($sql);
        $num = $result->rowCount();
        if ($num>0) {
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }


    public function getAnswer()
    {
        $sql = "SELECT correct, answer  FROM questions";
        $result = $this->connect()->query($sql);
        $num = $result->rowCount();
        if ($num>0) {
            $result = $result->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

}