<?php header("Content-Type:text/html;charset=utf-8");
	  

?>

<?php
	session_start();
	
	// 로그인 상태
	if($_SESSION['is_logged']=='YES') {
    $id = $_SESSION['id'];
	include "./view/header2.php";
	include "./view/index.html";
	include "./view/footer.php";
}	
	// 로그아웃 상태
	else {
		include "./view/header.php";
		include "./view/index.html";
		include "./view/footer.php";
	}


	
?>
