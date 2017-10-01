<?php
include("connection.php");


//USER REGISTRATION

if(@$_POST['submit'] === "Register"){
    
    $idnumber = @$_POST['idnumber'];      
    $firstname = @$_POST['fname'];      
    $lastname = @$_POST['lname'];      
    $role = @$_POST['role'];      
    $password = @$_POST['password'];   
    $c_password = @$_POST['c_password']; 

    
    if($role !== "<--select role -->"){
        if($password == $c_password ){
            
            /*
             echo "Firstname : ". $firstname."</br>
              idnumber : ". $idnumber."</br>
              Lastname : ". $lastname."</br>
              Role : ". $role."</br>
              Password : ". $password."</br>
              
             ";
            */
            
            $sql = "SELECT *
                        FROM users 
                            WHERE user_number = '".$idnumber."' LIMIT 1";
            
            $results = $conn->query($sql);
            
            if($results->num_rows > 0){
                echo "user already exists";
            }
            else{
                $password = md5($password);
                $sql ="INSERT INTO users VALUES('','$firstname','$lastname','$role','$password','$idnumber')";
                $conn->query($sql);
                echo "user was successfully created";
            }
            
            $firstname = $lastname = $idnumber =   " ";
            $role = "<--select role -->";
        }else{
            echo "password doesnt match";
        }
    }
    else{
         echo "role not selected.Please select to continue";
    }
}

echo '
    <form method="POST" action="">
        <table>
        <tr>       <td>identity document number :</td>         <td><input type="text" name="idnumber" placeholder="ID Number" value="'.@$idnumber.'"/></td></tr>
        <tr>       <td>First name :</td>         <td><input type="text" name="fname" placeholder="first name" value="'.@$firstname.'"/></td></tr>
        <tr>       <td>last name :</td>          <td><input type="text" name="lname" placeholder="last name"  value="'.@$lastname.'"/></td></tr>
        <tr>       <td>role :</td>               <td><select name="role" style="width:100%; value="'.@$role.'"">
                                                    <option style="color:grey;" value="<--select role -->"><--select role --></option>
                                                    <option value="Student">Student</option>
                                                    <option value="Teacher">Teacher</option>
                                                </select>
                                                                                                               </td></tr>
        <tr>       <td>Password :</td>         <td><input type="password" name="password" placeholder="password" /></td></tr>
        <tr>       <td>Confirm Password :</td>         <td><input type="password" name="c_password" placeholder="confirm Password" /></td></tr>
        <tr>       <td colspan="2"><input type="submit" name="submit" value="Register" /></td></tr>
        </table>
    </form>
';

?>