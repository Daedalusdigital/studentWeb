<?php include('inc/main.header.php');?>
	<div class="content">
	<div class="col-md-12">
		<h2><b>Teachers List</b></h2>
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th class="text-center">Firstname</th>
					<th class="text-center">Lastname</th>
					<th class="text-center">Identity Number</th>
					<th class="text-center">Alter Students</th>
				</tr>
			</thead>
			<tbody>
				<?php 

					$sql = "SELECT * FROM users WHERE role='Teacher'";
					$results = $conn->query($sql);
					while($row = $results->fetch_assoc()){

						echo'
						<tr>
						<td>'.$row['firstname'].'</td>
						<td>'.$row['lastname'].'</td>
						<td>'.$row['user_number'].'</td>
						<td style="width:147px;">
							<button class="btn btn-info"
							>
								<i class="fa fa-edit"></i>
							</button>
							<button class="btn btn-danger"
							>
								<i class="fa fa-minus"></i>
							</button>
							<button class="btn btn-primary"
							>
                                 <i class="fa fa-eye"></i>
							</button>
						</td>
					</tr>
							';
					}
				?>
			</tbody>
		</table>
		<a href="registerUsers.php"><button class="btn btn-success" 
		><i class="fa fa-plus"></i></button>
		</a>
	
	</div>
<?php include('inc/main.footer.php');?>