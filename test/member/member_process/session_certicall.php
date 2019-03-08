<?php

	session_start();	
	$correct_certi = $_SESSION['certi_num']= $randomNum = mt_rand(000000, 999999);;

	$result['success']	= true;
	$result['data']	= $correct_certi;
	
	echo json_encode(array('result'=>'success','data'=>$correct_certi));


?>