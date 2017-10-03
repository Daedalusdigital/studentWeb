<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
 <meta charset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="style/bootstrap.css" rel="stylesheet" type="text/css" />
 <link href="style/global.css" rel="stylesheet" type="text/css" />
 <style>

</style>
</head>
<body>
<?php
include("inc/dbscripts/connection.php");
session_start();
$idFound = $passFound = $userRole = $firstname = $lastname = ""; 
if(@$_POST['submit'] === "Login"){
    $idnumber = @$_POST['idnumber'];
    $password = @$_POST['password'];
    $password = md5($password);
    $userRole = "";
    
   $sql = "SELECT *
                FROM users 
                    WHERE user_number = '".$idnumber."' LIMIT 1";

    $results = $conn->query($sql);

    if($results->num_rows > 0){
        
        while($row = $results->fetch_assoc()){
            $idFound = $row['user_number'];
            $passFound = $row['password'];
            $userRole = $row['role'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
        }
        
        if($password !== $passFound && $idnumber === $idFound){
            echo "password incorrect";
        }
        else{
             echo "user Logged in";
             $_SESSION['user_role'] = $userRole;
             $_SESSION['user_fname'] = $firstname;
             $_SESSION['user_lname'] = $lastname;
             $_SESSION['user_number'] = $idFound;

             if($userRole == "Student"){
                 header("location:studentHome.php");
             }
             else if($userRole == "Teacher"){
                header("location:teacherHome.php");
             }
             else if($userRole == "Parent"){
                header("location:parentHome.php");
             }
             else{
                $_SESSION['user_role'] = "Administrator";
                header("location:adminDashboard.php");
             }
        }
    }
    else{
       echo "user doesnt exists";
    }
    
    /*
    echo $idnumber."</br>". $password;
    */
}

if(@$_POST['submit'] == "Admin"){
    $useramee = "admin";
    $passwordd = "admin";
}
else if(@$_POST['submit'] == "Student"){
    $useramee = "student";
    $passwordd = "student";
}
else if(@$_POST['submit'] == "Teacher"){
    $useramee = "teacher";
    $passwordd = "teacher";
}
else if(@$_POST['submit'] == "Parent"){
    $useramee = "parent";
    $passwordd = "parent";
}
?>

<div class="space" style="margin-top:100px;"></div>
<center>
<h2><b>Student World</b></h2>
</center>
<form action="" method="POST">
         <div class="container">
            <div class="col-md-offset-4 col-md-4">
                
                <input type="text" placeholder="Username" name="idnumber" value="<?php echo @$useramee;?>" required>

                <input type="password" placeholder="Password" name="password" value="<?php echo @$passwordd;?>" required>
                    
                <input type="submit" name="submit" value="Login" />
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
         </div>
</form>


<?php



?>

<center>
<form action="" method="POST" style="border:none;">
    <h4> Login as Guest: </h4>
    <button class="btn btn-primary" type="submit" name="submit" value="Admin">Admin</button>
    <button class="btn btn-default" type="submit" name="submit" value="Teacher" >Teacher</button>
    <button class="btn btn-warning" type="submit" name="submit" value="Student" >Student</button>
    <button class="btn btn-success" type="submit" name="submit" value="Parent" >Parent</button>
</form>
</center>
<?php include('inc/main.footer.php');?>