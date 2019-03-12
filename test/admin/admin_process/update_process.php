<?php
	// 파일 업로드 유효성 검사
	header("Content-Type:text/html;charset=utf-8");
	session_start();
	$lecture_previous_name = $_SESSION['lecture_tmp_name'];
	
	$name = $_FILES['userfile']['name'];
	$uploads_dir = '../admin_data';
	$allowed_ext = array('jpg','jpeg','png','gif'); 
	$ext = substr($name, strrpos($name, '.') + 1); 
	$form_error_check_val = "EN";

	
	// 섬네일 변경하지 않음
	if(!in_array($ext, $allowed_ext) && $name == ""){
		$lecture_name =  $_POST['lecture_name'];
		$teacher_name =  $_POST['teacher_name'];
		$lecture_level =  $_POST['lecture_level'];
		$term = $_POST['term'];
		$group = $_POST['group'];

		if(!$lecture_name){
			$form_error_check_val = "E2";
		}else if(!$teacher_name){ 
			$form_error_check_val = "E3";
		
		}else if(!$lecture_level || !is_numeric($lecture_level) || $lecture_level>10 || $lecture_level<0){
			$form_error_check_val = "E4";
			
		}else if(!$term || !is_numeric($term)){
			$form_error_check_val = "E5";
			
		}else{		
				include "../../db/db.php";
					$sql = "update test.lecture set
						lecture_name = '$lecture_name' , 
						teacher_name = '$teacher_name' , 
						lecture_level = '$lecture_level' , 
						term = '$term', 
						lecture_type = '$group'
						where
						lecture_name = '$lecture_previous_name'
						";
					mysqli_query($conn,$sql);
					echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
					exit();
		}
	}else{
		if(!in_array($ext, $allowed_ext)){
				$form_error_check_val = "E1";	
			}else{
				$lecture_name =  $_POST['lecture_name'];
				$teacher_name =  $_POST['teacher_name'];
				$lecture_level =  $_POST['lecture_level'];
				$term = $_POST['term'];
				$group = $_POST['group'];

				if(!$lecture_name){
					$form_error_check_val = "E2";

				}else if(!$teacher_name){ 
				$form_error_check_val = "E3";
				
				}else if(!$lecture_level || !is_numeric($lecture_level) || $lecture_level>10 || $lecture_level<0){
					$form_error_check_val = "E4";
					
				}else if(!$term || !is_numeric($term)){
					$form_error_check_val = "E5";
					
				}else{		
						include "../../db/db.php";
							$sql = "update test.lecture set
								thumb_nail ='$name' ,	 
								lecture_name = '$lecture_name' , 
								teacher_name = '$teacher_name' , 
								lecture_level = '$lecture_level' , 
								term = '$term', 
								lecture_type = '$group'
								where
								lecture_name = '$lecture_previous_name'
								";
							mysqli_query($conn,$sql);
							move_uploaded_file($_FILES['userfile']['tmp_name'], "$uploads_dir/$name");
							echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
							exit();
			}
		}		
	}		

?>

<form method="get" action="../index.php" name="frm"> 
	<input type="hidden" name="error_check" value="<?=$form_error_check_val ?>">
	<input type="hidden" name="mode" value="update"/> 
</form>



<script language="javascript"> 
	document.frm.submit(); 
</script> 

