<div class="modal fade" id="edit<?php echo $urow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<?php
		$n=mysqli_query($conn,"select * from `user` where userid='".$urow['userid']."'");
		$nrow=mysqli_fetch_array($n);
	?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class = "modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
			<h3 class = "modal-title">Update Member Info</h3>
		</div>
		<form class="form-inline">
		<div class="modal-body">
			Firstname: <input type="text" value="<?php echo $nrow['firstname']; ?>" id="ufirstname<?php echo $urow['userid']; ?>" class="form-control"> <br/>
			Lastname: <input type="text" value="<?php echo $nrow['lastname']; ?>" id="ulastname<?php echo $urow['userid']; ?>" class="form-control"> <br/>
			Contact Number: <input type="text" value="<?php echo $nrow['contactnum']; ?>" id="ucontactnum<?php echo $urow['userid']; ?>" class="form-control">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"> Cancel</button> <button type="button" class="updateuser btn btn-success" value="<?php echo $urow['userid']; ?>"> Save</button>
		</div>
		</form>
    </div>
  </div>
</div>