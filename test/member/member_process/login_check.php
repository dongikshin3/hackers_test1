<?php
	header("Content-Type:text/html;charset=utf-8");

	session_start();
	$id = $_POST[id];
    $pw = $_POST[pw];
	
	$conn= new mysqli('192.168.56.101','root','localhost','test');

	mysqli_query($conn, "set session character_set_connection=utf8;");
	mysqli_query($conn, "set session character_set_results=utf8;");
	mysqli_query($conn, "set session character_set_client=utf8;");


		if ($conn->connect_error) {
			die($conn->connect_error);
		}
		
	
	$query="select count(*) AS cnt from personal_info where id='$id'";
	$result=mysqli_query($conn,$query);
    $rows_num=mysqli_fetch_array($result);
	

	// 아이디가 없는 경우
	if($rows_num['cnt']==0){
		$form_error_check_val="Y";
	}else{
		$query_pw = "select pw from personal_info where id='$id'";
		$result_pw = mysqli_query($conn,$query_pw);
		$row_pw = mysqli_fetch_array($result_pw);
		$password_hash = hash("sha256", $_POST['pw'] );

		
			
		if($row_pw[0]!=$password_hash){

			$form_error_check_val="T";

		}else{
			$_SESSION['is_logged'] = 'YES';
			$_SESSION['id'] = $id;

			$query_name = "select name from personal_info where id='$id'";
			$result_name = mysqli_query($conn,$query_name);
			$row_name = mysqli_fetch_array($result_name);
			
			$_SESSION['name'] = $row_name[0];

			header("location:../../index.php");

		}
	}
?>



<form method="post" action="../index.php?mode=login" name ="frm"> 
		<input type="hidden" name="error_check" value="<?=$form_error_check_val ?>"> 
</form>

<script language="javascript"> 
	document.frm.submit(); 
</script> 



