<?php
function print_title(){
  if(isset($_GET['id'])){
    echo $_GET['id'];
  }
}
function print_description(){
  if(isset($_GET['id'])){
    echo file_get_contents("data/".$_GET['id']);
  }
}
function print_list(){
  $list = scandir('./data');
  $i = 0;
  while($i < count($list)){
    if($list[$i] != '.') {
      if($list[$i] != '..') {
        echo "<li><a href=\"index.php?id=$list[$i]\">$list[$i]</a></li>\n";
      }
    }
    $i = $i + 1;
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <head>
      <meta charset="utf-8">
      <title>
        welcome
      </title>
      <meta http-equive="content-type" content="text/html;charset=utf-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=Edge">

      <link rel="stylesheet" href="./css/reset.css" />
        <link rel="stylesheet" href="./css/motivation.css" />

      <link href="https://fonts.googleapis.com/css?family=East+Sea+Dokdo" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR" rel="stylesheet">

    </head>
  </head>
  <body>


      <div class="create_wrap">

      <h2 class="update_header">"<?php print_title(); ?>" 수정</h2>
       <form action="update_process.php" method="post">
         <input type="hidden" name="old_title" value="<?=$_GET['id']?>">
         <p>
           <textarea name="text" value="abc" class="description_create">
           </textarea>
         </p>


         <p>
           <input type="submit" class="submit_create">
         </p>

       </form>
   </div>
  </body>
</html>
