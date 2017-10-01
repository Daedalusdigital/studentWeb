<?php


include("connection.php");


if(@$_POST['submit'] === "Login"){
    $idnumber = @$_POST['idnumber'];
    $password = @$_POST['password'];
    $password = md5($password);
    
   $sql = "SELECT *
                FROM users 
                    WHERE user_number = '".$idnumber."' LIMIT 1";

    $results = $conn->query($sql);

    if($results->num_rows > 0){
        
        while($row = $results->fetch_assoc()){
            $idFound = $row['user_number'];
            $passFound = $row['password'];
        }
        
        if($password !== $passFound && $idnumber === $idFound){
            echo "password incorrect";
        }
        else{
             echo "user Logged in";
        }
    }
    else{
       echo "user doesnt exists";
    }
    
    /*
    echo $idnumber."</br>". $password;
    */
}


echo '
    <form method="POST" action="">
        <table>
        <tr>       <td>identity document number :</td> <td><input type="text" name="idnumber" placeholder="ID Number"  value="'.@$idnumber.'"/></td></tr> 
        <tr>       <td>Password :</td>         <td><input type="password" name="password" placeholder="password" /></td></tr>
        <tr>       <td colspan="2"><input type="submit" name="submit" value="Login" /></td></tr>
        </table>
    </form>
';


?>