<?php include('inc/main.header.php');?>
	<div class="content">
	<div class="col-md-12">
		<h2><b>Tasks List</b></h2>
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th class="text-center">Task Name</th>
					<th class="text-center">Description</th>
					<th class="text-center">Due Date</th>
					<th class="text-center">Grade</th>
					<th class="text-center">Subject Code</th>
					<th class="text-center">Alter Tasks</th>
				</tr>
			</thead>
			<tbody>
				<?php 

					$sql = "SELECT * FROM tasks";
					$results = $conn->query($sql);
					while($row = $results->fetch_assoc()){

						echo'
						<form action="" method="POST">
						<tr>
						<input class="hidden" type="text" name="user_id" value="'.$row['task_id'].'" />
						<td>'.$row['task_name'].'</td>
						<td>'.$row['description'].'</td>
						<td>'.$row['dueDate'].'</td>
						<td>'.$row['grade'].'</td>
						<td>'.$row['subject_code'].'</td>
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
		<a href="addTasks.php"><button class="btn btn-success" 
		><i class="fa fa-plus"></i></button>
		</a>
	</div>
<?php include('inc/main.footer.php');?>