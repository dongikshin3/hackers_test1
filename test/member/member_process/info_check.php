<?php
	header("Content-Type:text/html;charset=utf-8");
	session_start();	
	
	include "../../db/db.php";
		
	$name = $_POST['name'];
	$id =  $_POST[id]; 
	$pw = $_POST[pw]; 
	$pw2 = $_POST[pw2]; 
	$email = $_POST[email]; 
	$email_host = $_POST[email_host]; 
	$mobile1 = $_POST[mobile1]; 
	$mobile2 = $_POST[mobile2]; 
	$mobile3 = $_POST[mobile3]; 
	$phone1 = $_POST[phone1]; 
	$phone2 = $_POST[phone2]; 
	$phone3 = $_POST[phone3]; 
	$post_num = $_POST[post_num]; 
	$address = $_POST[address]; 
	$address_detail = $_POST[address_detail]; 
	$sms_ok = $_POST[sms_ok]; 
	$mail_ok = $_POST[mail_ok]; 
	$key= $_POST['key'];

	// 필수사항 공백여부
	if(!$name){
        echo "이름을 입력해주세요";
		
      }
	else if(!$id){
        echo "아이디를 입력해주세요";
      }
	else if(!$pw){
        echo "비밀번호를 입력해주세요";
      }
	else if(!$email){
        echo "이메일을 입력해주세요";
      }
	else if(!$email_host){
        echo "이메일을 입력해주세요";
      }
	else if(!$mobile1 || !$mobile2 || !$mobile3){
        echo "핸드폰 번호를 입력해주세요";
      }

	else if(!$address){
        echo "기본주소를 입력해주세요";
      }
	else if(!$address_detail){
        echo "상세주소를 입력해주세요";
      }

	
	// 이름 유효성
	else if (mb_strlen($name, 'utf-8')>20){
		echo "이름은 20자 미만입니다"; 
	}
	
	// 아이디 유효성
	else if(!preg_match("/^[a-z]/i", $id)) {
	 echo "아이디의 첫글자는 영문이어야 합니다.";
	}
	else if(preg_match("/[^a-z0-9]/i", $id)) {
		echo "아이디는 영문, 숫자만 사용할 수 있습니다.";
	}
	else if(mb_strlen($id, 'utf-8')>15 || mb_strlen($id, 'utf-8')<4 ){
		echo "아이디는 4자리 이상 15자리 이하여야 합니다 ";
	}
	
	// 비밀번호 유효성
	else if(preg_match("/[^a-z0-9]/i", $pw)) {
		echo "비밀번호는 영문, 숫자만 사용할 수 있습니다.";
	}
	else if(mb_strlen($pw, 'utf-8')>15 || mb_strlen($pw, 'utf-8')<8 ){
		echo "비밀번호는 8자리 이상 15자리 이하여야 합니다 ";
	}
	else if($pw !=$pw2){
		echo "비밀번호가 일치하지 않습니다 ";
	}
	// 아이디 중복 부재
	else if($key=='C' || $key=='N'){
		echo "아이디 중복확인을 해주세요 ";
	}

	else{
		
		$password_hash = hash("sha256", $pw);

		$sql = " insert into test.personal_info 
			(name, 
			id, 
			pw, 
			email, 
			email_host, 
			mobile1, 
			mobile2, 
			mobile3, 
			phone1, 
			phone2, 
			phone3, 
			post_num, 
			address, 
			address_detail, 
			sms_ok, 
			mail_ok
			)
			values(
			'".$name."',
			'".$id."',
			'".$password_hash."',
			'".$email."',
			'".$email_host."',
			'".$mobile1."',
			'".$mobile2."',
			'".$mobile3."',
			'".$phone1."',
			'".$phone2."',
			'".$phone3."',
			'".$post_num."',
			'".$address."',
			'".$address_detail."',
			'".$sms_ok."',
			'".$mail_ok."'			
			); ";

		mysqli_query($conn,$sql);
		
}

		
?>	