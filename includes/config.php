<?php
/**
 * Created by PhpStorm.
 * User: sokhadze
 * Date: 2/21/2019
 * Time: 7:43 PM
 */

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=testDB", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->query("set names utf8");
    echo "connection successfully";
} catch (PDOException $ex) {
    echo $ex->getMessage();
}