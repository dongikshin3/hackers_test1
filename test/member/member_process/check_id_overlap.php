<?php
	header("Content-Type:text/html;charset=utf-8");
	session_start();	
	$id = $_POST[id];

	$conn= new mysqli('192.168.56.101','root','localhost','test');

	mysqli_query($conn, "set session character_set_connection=utf8;");
	mysqli_query($conn, "set session character_set_results=utf8;");
	mysqli_query($conn, "set session character_set_client=utf8;");


		if ($conn->connect_error) {
			die($conn->connect_error);
		}
		
	//$sql = mysqli_query($conn, "select * from personal_info where id = '".$id."'");	
	$query="select count(*) AS cnt from personal_info where id='$id'";
	$result=mysqli_query($conn,$query);
    $rows_num=mysqli_fetch_array($result);
	// $rows_num = mysqli_num_rows($sql);

	
	//if($rows_num['cnt'] == 0){echo $id."는 사용가능한 ID입니다.";}
	//else{ echo $id."사용중인 ID입니다."; }
	echo $rows_num['cnt'];
	mysql_close($conn);

?>



