<?php
file_put_contents('data/'.$_POST['date'], $_POST['text']);
header('Location: index.php');
?>
