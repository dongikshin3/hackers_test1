<?php
file_put_contents('data/'.$_POST['old_title'], $_POST['text']);
header('Location: index.php?id='.$_POST['title']);
?>
