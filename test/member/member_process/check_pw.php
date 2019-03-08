<?php
	header("Content-Type:text/html;charset=utf-8");
	session_start();	
	
	
	$conn= new mysqli('192.168.56.101','root','localhost','test');

	mysqli_query($conn, "set session character_set_connection=utf8;");
	mysqli_query($conn, "set session character_set_results=utf8;");
	mysqli_query($conn, "set session character_set_client=utf8;");
			if ($conn->connect_error) {
			die($conn->connect_error);
		}
	$pw1 = $_POST['pw1'];
	$pw2 = $_POST['pw2'];
	$id = $_POST['id'];
	

	if(!$pw1){
        echo "비밀번호를 입력해주세요";
      }

	// 비밀번호 유효성
	else if(preg_match("/[^a-z0-9]/i", $pw1)) {
		echo "비밀번호는 영문, 숫자만 사용할 수 있습니다.";
	}
	else if(mb_strlen($pw1, 'utf-8')>15 || mb_strlen($pw1, 'utf-8')<8 ){
		echo "비밀번호는 8자리 이상 15자리 이하여야 합니다 ";
	}
	else if($pw1 !=$pw2){
		echo "비밀번호가 일치하지 않습니다 ";
	}else{
		$password_hash = hash("sha256", $pw1);
		$sql = "update test.personal_info SET pw='$password_hash' where id = '$id'";
		mysqli_query($conn,$sql);

		echo 1;
		
	}



?>
