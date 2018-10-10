<?php
	include('conn.php');
	if(isset($_POST['edit'])){
		$id=$_POST['id'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$contactnum=$_POST['contactnum'];
 
		mysqli_query($conn,"update `user` set firstname='$firstname', lastname='$lastname', contactnum='$contactnum' where userid='$id'");
	}
?>