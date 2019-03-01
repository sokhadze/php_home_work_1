<?php
/**
 * Created by PhpStorm.
 * User: sokhadze
 * Date: 2/28/2019
 * Time: 7:36 PM
 */

class db
{
    public $conn;

    public function __construct() {
        try {
            $servername = "157.230.27.57";
            $username = "leri";
            $password = "root";
            $conn = new PDO("mysql:host=$servername;dbname=quiz", $username, $password);
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn -> query("set names utf8");
            $this->conn = $conn;
            echo "<span class='badge badge-success' style='margin: 5px'> connection successfully</span> ";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function addQuestion($question,$answer) {
        $query = "INSERT INTO questions (question,answer) VALUES ('$question', $answer)";
        $this->conn->exec($query);
        echo "new word added!";
    }

    public function getQuestions() {
        $stmp =  $this->conn->prepare("select * from questions");
        $stmp->execute();
        $result = $stmp->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmp->fetchAll();
        return $data;
    }
}