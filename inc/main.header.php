<?php include('dbscripts/connection.php');
session_start();?>
<html>
<head>
<title>SchoolSystem</title>
<link href="style/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="style/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="style/global.css" rel="stylesheet" type="text/css" />
<meta name="viewpprt" content="width=device-width, initial-scale= 1.0, user-scalable=0" />
</head>
<body>
<div id="header">
	<div class="header">
		<div class="logo">
		 	<a href="#">Student<span>World</span></a>
        </div>
	</div>
</div>

<a href="#" class="mobile">MENU</a>
<div id="container">
	<img src="" alt="" />
	<div class="sidebar">
        <div class="userInfo" style="padding:10px;">
            <div class="row text-center">
                <div class="col-md-3">
                    <img src="images/avatar.jpg" alt="userImg" style="width:50px;height:60px;border:2px solid skyblue;border-radius:50%;"/>
                </div>
                <div class="col-md-9" style="color:white;">
                    <h4><b><?php echo @$_SESSION['user_fname']." ".@$_SESSION['user_lname'];?></b></h4>
                    <h6><?php echo @$_SESSION['user_role'];?></h6>
                </div>
            </div>
        </div>
		<ul id="nav">

        <?php if(@$_SESSION['user_role'] == "Administrator"){
            
            echo '
                    <li><a class="selected" href="adminDashboard.php">Dashboard</a></li>
                    <li><a  href="teachersList.php">Teachers</a></li>
                    <li><a  href="studentsList.php">Students</a></li>
                    <li><a  href="subjectsList.php">Subjects</a></li>
                    <li><a  href="parentsList.php">Parents</a></li>
                 ';
            
        }
        else if(@$_SESSION['user_role'] == "Teacher"){
           
            echo '
            <li><a class="selected" href="adminDashboard.php">Students</a></li>
			<li><a  href="#">Subjects</a></li>
                ';
        }
        else if(@$_SESSION['user_role'] == "Student"){
                      
            echo '
			<li><a class="selected" href="#">Announcements</a></li>
            <li><a  href="#">Subjects</a></li>
			<li><a  href="#">View Grades</a></li>
                ';
        }
        else{
            echo '
			<li><a  href="#">View Grades</a></li>
                ';
        }
        
        ?>	
        <li><a  href="logout.php">logout</a></li>
		</ul>
	</div>