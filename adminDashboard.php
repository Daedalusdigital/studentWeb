<?php include('inc/main.header.php');

$number_of_students = $number_of_teachers = $number_of_parents = 0;
$number_of_subjects = 0;


$sqlUserTable = "SELECT * FROM users";
$sqlSubjectTable = "SELECT * FROM subjects";


$resultsUsers = $conn->query($sqlUserTable);
$resultsSubjects = $conn->query($sqlSubjectTable);


while($notNUll = $resultsUsers->fetch_assoc())
{
	if($notNUll['role'] == "Student"){
		$number_of_students++;
	}else if($notNUll['role'] == "Parent"){
		$number_of_parents++;
	}else if($notNUll['role'] == "Teacher"){
		$number_of_teachers++;
	}
}

while($notNUll = $resultsSubjects->fetch_assoc())
{
	$number_of_subjects++;
}

?>
<style>
	h1{
		margin-top:0;
	}

	
</style>
	<div class="content">
		<a href="studentsList.php">
			<div class="card">
				<div class="number">
					<h1><?php echo $number_of_students;?></h1>
					<b>Students</b>
				</div>
				<div class="glyphicon"><i class="fa fa-graduation-cap"></i></div>
			</div>
		</a>
		<a href="teachersList.php">
			<div class="card" style="background-color:blueviolet">
				<div class="number">
					<h1><?php echo $number_of_teachers;?></h1>
					<b>Teachers</b>
				</div>
				<div class="glyphicon">ICON</div>
			</div>
		</a>
		<a href="parentsList.php">
			<div class="card"  style="background-color:lightcoral">
				<div class="number">
					<h1><?php echo $number_of_parents;?></h1>
					<b>Parents</b>
				</div>
				<div class="glyphicon">ICON</div>
			</div>
		</a>
		<a href="subjectsList.php">
			<div class="card"  style="background-color:sienna">
				<div class="number">
					<h1><?php echo $number_of_subjects;?></h1>
					<b>Subjects</b>
				</div>
				<div class="glyphicon">ICON</div>
			</div>
		</a>
	</div>

<?php include('inc/main.footer.php');?>