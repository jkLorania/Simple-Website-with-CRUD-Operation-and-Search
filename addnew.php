<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$contactnum=$_POST['contactnum'];
 
		mysqli_query($conn,"insert into `user` (firstname, lastname, contactnum) values ('$firstname', '$lastname', '$contactnum')");
	}
?>