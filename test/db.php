
<?php

	$conn= new mysqli('192.168.56.101','root','localhost','test');

	mysqli_query($conn, "set session character_set_connection=utf8;");
	mysqli_query($conn, "set session character_set_results=utf8;");
	mysqli_query($conn, "set session character_set_client=utf8;");


		if ($conn->connect_error) {
			die($conn->connect_error);
		}
		
	$sql = mysqli_query($conn,'select * from personal_info');	
	 
	while($row = mysqli_fetch_array($sql)){
	


	}




?>