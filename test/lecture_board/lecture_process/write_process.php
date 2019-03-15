
<?php
header('Content-Type: text/html; charset=utf-8');


	include "../../db/db.php";
	session_start();
	
		$id = $_SESSION['id'];
		$group = $_POST['list'];
		$title = $_POST['title'];
		$satisfaction = $_POST['radio'];
		$lecture_name = $_POST['lecture'];
		$review = $_POST['ir1'];

		$review_date = date("Y-m-d-h-i-s", time()); 

		$form_error_check_val = "EN";

		// 분류가 없으면 분류 할당
		if($group=="0"){
			$query = "select lecture_type from lecture where lecture_name='$lecture_name'";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_row($result);
			$group = $row[0];						
		}
		if(mb_strlen($title, 'utf-8')>20){
			$form_error_check_val = "E1";	
		}else{
			$sql = " insert into test.review 
						(lecture_name, 
						review_title, 
						satisfacion, 
						writer, 
						lecture_type, 
						review, 
						review_date
						)
						values
						(
						'".$lecture_name."',
						'".$title."',
						'".$satisfaction."',
						'".$id."',
						'".$group."',
						'".$review."',
						'".$review_date."'
						);
						";
					
					mysqli_query($conn,$sql);
					echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
					exit();
		}
		
	


	
	

?>


<form method="get" action="../index.php" name="frm"> 
	<input type="hidden" name="error_check" value="<?=$form_error_check_val ?>">
	<input type="hidden" name="mode" value="write"/> 
</form>



<script language="javascript"> 
	document.frm.submit(); 
</script> 

