<?php 
// 메인페이지 인덱스
header("Content-Type:text/html;charset=utf-8");
	  

?>

<?php
	session_start();
	
	// 로그인 상태
	if($_SESSION['is_logged']=='YES') {
    $id = $_SESSION['id'];
		
		// 관리자 접속
		if($id=="admin1234"){
			echo "<meta http-equiv='refresh' content='0; url=./admin/index.php'>"; 
		} // 일반 유저
		else{
			include "./view/header2.php";
			include "./view/index.html";
			include "./view/footer.php";
		}
}	
	// 로그아웃 상태
	else {
		include "./view/header.php";
		include "./view/index.html";
		include "./view/footer.php";
	}


	
?>
