<?php 
// 맴버 인덱스
header("Content-Type:text/html;charset=utf-8");
	$mode = $_GET['mode'];
	if(empty($mode)) {
		$mode = 'step1';
	}

?>

<?php
	session_start();
	
	include "../db/db.php";

	if($_SESSION['is_logged']=='YES'){
		include "../view/header2.php";
		include "member_view/".$mode.".html";
		include "../view/footer.php";
	}
	else if($mode=='login'){
		include "member_view/".$mode.".html";
	}
	else{
		include "../view/header.php";
		include "member_view/".$mode.".html";
		include "../view/footer.php";
	}
		

?>



