<?php 
header("Content-Type:text/html;charset=utf-8");

	$mode = $_POST['mode'];
	$checker1 = 'off';
	$checker2 = 'off';
	$checker1 = $_POST['check1'];
	$checker2 = $_POST['check2'];

	if(empty($mode)) {
		$mode = 'step1';
	}
// 선택박스 확인 
		if($checker1=='on' && $checker2=='on'){}
		else{
			$mode = 'step1';
		}


	
?>


<?php
	include "../header.php";
	include "../db.php";
?>

<?php
	include $mode.".html";
	echo $mode;
?>

<?php
	include "../footer.php";
	$checker1 = 'off';
	$checker2 = 'off';
?>

