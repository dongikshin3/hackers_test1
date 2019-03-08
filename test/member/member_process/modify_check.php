<?php
	header("Content-Type:text/html;charset=utf-8");
	session_start();	
	$conn= new mysqli('192.168.56.101','root','localhost','test');

	include "../../db/db.php";
	
	$name = $_POST[name]; 
	$id = $_POST[id]; 
	$pw1 = $_POST[pw1]; 
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

	// 필수사항 공백여부
	if(!$pw1){
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

	else if(preg_match("/[^a-z0-9]/i", $pw1)) {
		echo "비밀번호는 영문, 숫자만 사용할 수 있습니다.";
	}
	else if(mb_strlen($pw1, 'utf-8')>15 || mb_strlen($pw1, 'utf-8')<8 ){
		echo "비밀번호는 8자리 이상 15자리 이하여야 합니다 ";
	}
	else if($pw1 !=$pw2){
		echo "비밀번호가 일치하지 않습니다 ";
	}
	else{	
		echo 1;
		$password_hash = hash("sha256", $pw1);

		$sql = "update test.personal_info SET 
		pw='$password_hash', 
		email='$email', 
		email_host='$email_host', 
		mobile1='$mobile1', 
		mobile2='$mobile2', 
		mobile3='$mobile3',
		phone1='$phone1',
		phone2='$phone2',
		phone3='$phone3',
		post_num='$post_num',
		address='$address',
		address_detail= '$address_detail',
		sms_ok='$sms_ok',
		mail_ok='$mail_ok'
		where id='$id'";

		mysqli_query($conn,$sql);
	
	
	}
	

?>