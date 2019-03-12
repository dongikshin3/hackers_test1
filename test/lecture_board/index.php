<?php 
// 수강후기 인덱스
header("Content-Type:text/html;charset=utf-8");
	$mode = $_GET['mode'];
	if(empty($mode)) {
		$mode = 'list';
	}

?>


<?php
	session_start();
	
	include "../db/db.php";

	if($_SESSION['is_logged']=='YES'){
		include "../view/header2.php";
		include "lecture_board_view/".$mode.".html";
		include "member_view/".$mode.".html";
		include "../view/footer.php";
	}
	else{
		include "../view/header.php";
		include "lecture_board_view/".$mode.".html";
		include "member_view/".$mode.".html";
		include "../view/footer.php";
	}
		

?>
?>




