<?php
function print_list(){

  $list = scandir('./data');
  $i=0;

rsort($list);

  while($i < count($list)){

    if($list[$i] != '.') {
      if($list[$i] != '..') {
        $ext = substr(strrchr($list[$i], '.'), 1); // strrchr문자열에서 마지막 .이 나오는 곳을 찾음, 그곳 뒤를 삭제.
        if($ext!='png' && $ext!='jpg'){
        echo "<li><a href=\"index.php?id=$list[$i]\">$list[$i]</a></li>\n";
        echo file_get_contents("data/".$list[$i]);
        echo "<hr>";

        }else{
          echo "<a href=\"index.php?id=$list[$i]\">$list[$i]<br><img src =\"data/$list[$i]\" href=\"index.php?id=$list[$i]\"></img></a>\n";
          echo "<hr>";
        }
      }
    }
    $i = $i + 1;
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      welcome
    </title>
    <meta http-equive="content-type" content="text/html;charset=utf-8" />
  	<meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <link href="https://fonts.googleapis.com/css?family=East+Sea+Dokdo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR" rel="stylesheet">

    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/motivation.css?after" />

  </head>
  <body>
    <h1 class="title_1">작가의 영감</h1>
    <div class="create_wrap">
      <div class="add_img">
        <form enctype="multipart/form-data" action="upload_img.php"  method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="300000" ></input>


          <input type="file" name="userfile" class="file_finder"></input>
          <input type="submit" name="upload" class="file_uploader"></input>
        </form>
      </div>

      <form action="create_process.php" method="post">
        <p>
          <textarea name="date" type="hidden" class="hidden_date"><?php
              echo date("Y-m-d-h-i-s",strtotime ("+1 day"))
          ?></textarea>
        </p>

        <p>
          <textarea name="text" value="abc" class="description_create">
          </textarea>
        </p>




        <p>
          <input type="submit" class="submit_create">
        </p>

      </form>

      <?php if(isset($_GET['id'])) { ?>
        <a href="update.php?id=<?php echo $_GET['id']?>" class="button_update">update</a>
        <a href="delete_process.php?id=<?php echo $_GET['id']?>" class="button_delete">delete</a>
      <?php } ?>

  </div>

  <div class="past_content_wrap">
    <ol>
      <?php
      print_list();
      ?>
    </ol>
  </div>




  </body>
</html>
