<?php
	session_start();
	$correct_certi = $_SESSION['certi_num']='123456';
	$passed_certi=$_POST['certi_num'];
	
	if($passed_certi== $correct_certi){
?>
	<form method="post" action="index.php" name="frm"> 
		<input type="hidden" name="mode" value="step3"> 
		<input type="hidden" name="check1" value="on"/>
		<input type="hidden" name="check2" value="on"/>
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

