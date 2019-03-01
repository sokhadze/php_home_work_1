<?php
/**
 * Created by PhpStorm.
 * User: sokhadze
 * Date: 2/21/2019
 * Time: 7:43 PM
 */

$servername = "157.230.27.57";
$username = "leri";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=testDB", $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn -> query("set names utf8");
    echo "<span class='badge badge-success' style='margin: 5px'> connection successfully</span> ";
} catch (PDOException $ex) {
    echo $ex->getMessage();
}