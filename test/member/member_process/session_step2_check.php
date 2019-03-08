<?php

	session_start();	
	$passed_certi=$_POST['certi_num'];

	$phone1 = $_POST['phone1'];
	$phone2 = $_POST['phone2'];
	$phone3 = $_POST['phone3'];

	if($passed_certi== $_SESSION['certi_num'] && $passed_certi!=0){
?>

	<form method="get" action="../index.php" name ="frm"> 
		<input type="hidden" name="mode" value="step3"> 

		<input type="hidden" name="phone1" value=" <?php echo $phone1?>">
		<input type="hidden" name="phone2" value=" <?php echo $phone2?>"/> 
		<input type="hidden" name="phone3" value=" <?php echo $phone3?>"/> 

	</form>


<?php
	}else{
?>
	<form method="get" action="../index.php" name="frm"> 
		<input type="hidden" name="mode" value="step2"/> 
	</form>

	
<?php

	}

?>


<script language="javascript"> 
document.frm.submit(); 
</script> 

