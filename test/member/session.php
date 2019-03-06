<?php
	session_start();
	$correct_certi = $_SESSION['certi_num']='123456';
	$passed_certi=$_POST['certi_num'];

	$phone1 = $_POST['phone1'];
	$phone2 = $_POST['phone2'];
	$phone3 = $_POST['phone3'];

	

	if($passed_certi== $correct_certi){
?>

	<form method="post" action="index.php" name ="frm"> 
		<input type="hidden" name="mode" value="step3"> 
		<input type="hidden" name="check1" value="on"/>
		<input type="hidden" name="check2" value="on"/>

		<input type="hidden" name="phone1" value=" <?php echo $phone1?>">
		<input type="hidden" name="phone2" value=" <?php echo $phone2?>"/> 
		<input type="hidden" name="phone3" value=" <?php echo $phone3?>"/> 

	</form>


<?php
	}else{
?>
	<form method="post" action="index.php" name="frm"> 
		<input type="hidden" name="mode" value="step2"/> 
		<input type="hidden" name="check1" value="on"/>
		<input type="hidden" name="check2" value="on"/>
	</form>

	
<?php

	}

?>



<script language="javascript"> 
document.frm.submit(); 
</script> 

