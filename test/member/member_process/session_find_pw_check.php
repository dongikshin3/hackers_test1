<?php
		header("Content-Type:text/html;charset=utf-8");
		session_start();
		$name = $_POST['name'];
		$id=$_POST['id'];
		$passed_certi=$_POST['certi_num'];
		$correct_certi = $_SESSION['certi_num'];
		
		// 인증 에러
		if($passed_certi != $correct_certi){
?>
			<form method="post" action="../index.php?mode=find_pw" name ="frm"> 
				<input type="hidden" name="error_check" value="E1"> 
			</form>
<?php
		}else{
			$conn= new mysqli('192.168.56.101','root','localhost','test');
				mysqli_query($conn, "set session character_set_connection=utf8;");
				mysqli_query($conn, "set session character_set_results=utf8;");
				mysqli_query($conn, "set session character_set_client=utf8;");

			if ($conn->connect_error) {
				die($conn->connect_error);
			}

			$query_name = "select count(*) AS cnt from personal_info where name='$name'";
			$result=mysqli_query($conn,$query_name);
			$rows_num=mysqli_fetch_array($result);

			$query_name = "select name from personal_info where name='$name'";
			$result_name = mysqli_query($conn,$query_name);
			$row_name = mysqli_fetch_array($result_name);

			$query_id = "select id from personal_info where name='$name'";
			$result_id = mysqli_query($conn,$query_id);
			$row_id = mysqli_fetch_array($result_id);

	
		// 이름이 없는 경우 
		if($rows_num['cnt']==0){
?>
		<form method="post" action="../index.php?mode=find_pw" name ="frm"> 
			<input type="hidden" name="error_check" value="E2"> 
		</form>

<?php
		// 아이디가 틀린 경우
			}else if($row_id[0]!=$id){
?>
		<form method="post" action="../index.php?mode=find_pw" name ="frm"> 
			<input type="hidden" name="error_check" value="E3"> 
		</form>
<?php
		}else{
?>

		<form method="post" action="../index.php?mode=find_pw_complete" name ="frm"> 
			<input type="hidden" name="id" value="<?php echo $id;?>"> 
		</form>


<?php
		}
	}
?>




<script language="javascript"> 
	document.frm.submit(); 
</script> 
	
		



