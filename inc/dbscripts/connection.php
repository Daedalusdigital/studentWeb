<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "studentWorld";

$conn = new mysqli($host,$username,$password,$dbname);

if(!$conn){
    echo "connection unsuccessful";
}

?>