<?php 
header("Content-Type:text/html;charset=utf-8");
	$mode = $_GET['mode'];
	if(empty($mode)) {
		$mode = 'step1';
	}

?>


<?php
	session_start();
	
	include "../db/db.php";

	if($mode == 'modify'){
		include "../view/header2.php";
		include "member_view/".$mode.".html";
		include "../view/footer.php";
	}
	else if($mode!='login'){
		include "../view/header.php";
		include "member_view/".$mode.".html";
		include "../view/footer.php";
	}
	else{
		include "member_view/".$mode.".html";
	}
		

?>



