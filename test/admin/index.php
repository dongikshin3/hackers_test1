<?php
	// 관리자 페이지 
	header("Content-Type:text/html;charset=utf-8");
	
	include "../db/db.php";

	$mode = $_GET['mode'];
	if(empty($mode)) {
		$mode = 'read';
	}


	include "admin_view/".$mode.".html";
	
?>