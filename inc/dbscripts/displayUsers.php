<?php

include('connection.php');

$sql = "SELECT * FROM Users";

$results = $conn->query($sql);
echo "<table>";
echo "<tr><th>User id</th><th>user number</th><th>Role</th></tr>";
while($row = $results->fetch_assoc()){
    echo "<tr><td>".$row['user_id']."</td><td>".$row['user_number']."</td><td>".$row['role']."</td></tr>";
}
echo "</table>";

?>