<?php
	include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "UTF-8" name = "viewport" content = "width-device=width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>CRUD PAGE 2</title>
</head>
<body>
	<div class="body_site">
		<header>
			<div class="banner clearfix">
         <h1 class="page2_h1">CRUD <br/> PAGE 2</h1>
      </div>
		</header>

		<main>
			<div class="main_site clearfix">
				<h2>Crud  Assemble</h2> 
				<div class="search_con">
					<label>ID Number:</label>
					<input type="text" id="searchid" onkeyup="searchID()" placeholder="search for user id number..." title="Type in a number" />
				</div>
				<div class="search_con">
					<label>Name:</label>
					<input type="text" id="searchN" onkeyup="searchN()" placeholder="search for user Name..." title="Type in a name" />
				</div>
				<div id="userTable"></div>
				<a href="index.php" class="reg_link"> Register Here!</a>
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
		function searchID() {
		  // Declare variables 
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("searchid");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("userTable");
		  tr = table.getElementsByTagName("tr");

		  // Loop through all table rows, and hide those who don't match the search query
		  for (i = 0; i < tr.length; i++) {
		    td = tr[i].getElementsByTagName("td")[0];
		    if (td) {
		      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
		        tr[i].style.display = "";
		      } else {
		        tr[i].style.display = "none";
		      }
		    } 
		  }
		}

		function searchN() {
		  // Declare variables 
		  var input, filter, table, tr, td, i, j;
		  input = document.getElementById("searchN");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("userTable");
		  tr = table.getElementsByTagName("tr");

		  // Loop through all table rows, and hide those who don't match the search query
	 		for ( i = 0; i < tr.length; i++) {
	 			td = tr[i].getElementsByTagName("td");
	 			if(td.length > 0){
	 				if (td[1].innerHTML.toUpperCase().indexOf(filter) > -1 ||
	 					td[2].innerHTML.toUpperCase().indexOf(filter) > -1){
	 						tr[i].style.display = ""
	 					}
	 					else {
	 						tr[i].style.display = "none";
	 					}
	 			}
	 		}
	 	}

		$(document).ready(function(){
			showUser();
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