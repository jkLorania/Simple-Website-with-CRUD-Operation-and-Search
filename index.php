<?php
	include('conn.php');
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
		<title>CRUD ASSEMBLE</title>
	</head>

<body>
	<div class="body_site">
		<header>
			<div class="banner clearfix">
         <h1>CRUD</h1>
      </div>
		</header>

		<main>
			<div class="main_site clearfix">
				<h2>Crud  Assemble</h2>
					<form class="page1_form" action="page2.php">
						<div class="user_info">
							<label>Firstname:</label>
							<input type  = "text" id = "firstname" required>
						</div>
						<div class="user_info">
							<label>Lastname:</label>
							<input type  = "text" id = "lastname" required>
						</div>
						<div class="user_info">
							<label>Contact Number:</label>
							<input type  = "text" id = "contactnum" required>
						</div>
						<div>
							<button class="btn_reg" type = "submit" value="submit" id="addnew">Register</button>
						</div>
					</form>
				</div>
		</main>

		<footer>
			<div class="footer_site">
				<ul>
					<li><a href="facebook.com"> Facebook </a></li>
					<li><a href="twitter.com"> Twitter </a></li>
					<li><a href="instagram.com"> Instagram </a></li>
				</ul>
				<p> &copy Copyright 2018</p>
			</div>
		</footer>

	</div>
</body>

<script src = "js/jquery-3.1.1.js"></script>	
	<script src = "js/bootstrap.js"></script>
	<script type = "text/javascript">
		$(document).ready(function(){
			showUser();
			//Add New
			$(document).on('click', '#addnew', function(){
				if ($('#firstname').val()=="" || $('#lastname').val()=="" || $('#contactnum').val()==""){
					alert('Please enter data first');
				}
				else{
				$firstname=$('#firstname').val();
				$lastname=$('#lastname').val();
				$contactnum=$('#contactnum').val();				
					$.ajax({
						type: "POST",
						url: "addnew.php",
						data: {
							firstname: $firstname,
							lastname: $lastname,
							contactnum: $contactnum,
							add: 1,
						},
						success: function(){
							showUser();
						}
					});
				}
			});
			//Delete
			$(document).on('click', '.delete', function(){
				$id=$(this).val();
					$.ajax({
						type: "POST",
						url: "delete.php",
						data: {
							id: $id,
							del: 1,
						},
						success: function(){
							showUser();
						}
					});
			});
			//Update
			$(document).on('click', '.updateuser', function(){
				$uid=$(this).val();
				$('#edit'+$uid).modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
				$ufirstname=$('#ufirstname'+$uid).val();
				$ulastname=$('#ulastname'+$uid).val();
				$contactnum=$('#ucontactnum'+$uid).val();
					$.ajax({
						type: "POST",
						url: "update.php",
						data: {
							id: $uid,
							firstname: $ufirstname,
							lastname: $ulastname,
							contactnum: $contactnum,
							edit: 1,
						},
						success: function(){
							showUser();
						}
					});
			});
	 
		});
	 
		//Showing our Table
		function showUser(){
			$.ajax({
				url: 'show_user.php',
				type: 'POST',
				async: false,
				data:{
					show: 1
				},
				success: function(response){
					$('#userTable').html(response);
				}
			});
		}
	 
	</script>

</html>