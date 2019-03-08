<?php
	// 세션에 인증 코드 저장 
	session_start();	
	$correct_certi = $_SESSION['certi_num']= $randomNum = mt_rand(000000, 999999);;
	

	// 임시진행
	$result['success']	= true;
	$result['data']	= $correct_certi;
	
	echo json_encode(array('result'=>'success','data'=>$correct_certi));


?>