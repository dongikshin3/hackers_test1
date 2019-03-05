<?php

  unlink('data/'.$_GET['id']);
  header('Location: index.php?id='.$_POST['title']);
 ?>
