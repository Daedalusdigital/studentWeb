<?php include('inc/main.header.php');?>
	<div class="content">
	<div class="col-md-12">
		<h2><b>Students List</b></h2>
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th class="text-center">Subject Code</th>
					<th class="text-center">Subject name</th>
					<th class="text-center">Subject Grade</th>
					<th class="text-center">Alter Subjects</th>
				</tr>
			</thead>
			<tbody>
				<?php 

					$sql = "SELECT * FROM subjects";
					$results = $conn->query($sql);
					while($row = $results->fetch_assoc()){

						echo'
						<form action="userView.php" method="POST">
						<tr>
						<input class="hidden" type="text" name="subject_id" value="'.$row['subject_id'].'" />
						<td>'.$row['subject_code'].'</td>
						<td>'.$row['subject_name'].'</td>
						<td>'.$row['subject_grade'].'</td>
						<td style="width:147px;">
							<button type="submit" class="btn btn-info"
							>
								<i class="fa fa-edit"></i>
							</button>
							<button type="submit" class="btn btn-danger"
							>
								<i class="fa fa-minus"></i>
							</button>
							<button type="submit" class="btn btn-primary"
							>
								<i class="fa fa-eye"></i>
							</button>
						</td>
					</tr>
					</form>
							';
					}
				?>
			</tbody>
		</table>
		<a href="addSubjects.php"><button class="btn btn-success" 
		><i class="fa fa-plus"></i></button>
		</a>
	</div>
<?php include('inc/main.footer.php');?>