<?php

include("connection.php");

$SelectStudentSql = "SELECT *
FROM users ";
    
$StudentResults = $conn->query($sql);
while($row = $StudentResults->fetch_assoc()){
$idnumber = $row["user_number"];
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$finit = substr($firstname,0,1);
echo '<option value="'.$idnumber.'">'.$idnumber.' '.$finit.' '.$lastname.'</option>';
}

?>