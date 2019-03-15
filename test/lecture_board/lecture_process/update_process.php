
<?php
header('Content-Type: text/html; charset=utf-8');

	include "../../db/db.php";
	session_start();
	
		$id = $_SESSION['id'];
		$prev_review = $_SESSION['lecture_tmp_review'];
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
			
			echo $sql =  "update test.review set
						lecture_name = '$lecture_name' , 
						review_title = '$title' , 
						writer = '$id' , 
						lecture_type = '$group', 
						review = '$review',
						review_date = '$review_date'
						where
						lecture_name = '$lecture_name' and writer = '$id' and review ='$prev_review'
						";
					
					mysqli_query($conn,$sql);
					
					echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
					exit();
		}
		
	


	
	

?>

