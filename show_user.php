<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		<table class="table table-bordered alert-warning table-hover">
			<thead>
				<th>Id Number</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Contact Number</th>
				<th>Action</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,"select * from `user` order by userid desc");
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['userid']; ?></td>
									<td><?php echo $urow['firstname']; ?></td>
									<td><?php echo $urow['lastname']; ?></td>
									<td><?php echo $urow['contactnum']; ?></td>
									<td><button class="btn btn-success"  data-toggle="modal" data-target="#edit<?php echo $urow['userid']; ?>">Edit</button>
											<button class="btn btn-danger delete" value="<?php echo $urow['userid']; ?>"> Delete</button>
									<?php include('edit_modal.php'); ?>
									</td>
								</tr>
							<?php
						}
 
					?>
				</tbody>
			</table>
		<?php
	}
 
?>