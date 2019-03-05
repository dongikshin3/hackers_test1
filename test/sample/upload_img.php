
  <!DOCTYPE html>
  <html>
  <head>
      <meta charset="utf-8"/>
  </head>
  <body>
    <?php
      ini_set("display_errors", "1");
    //  $uploaddir = '.\host\home3\sdi654321\html\data\\';
      $uploadfile = "data/".date("Y-m-d-h-i-s ",strtotime("+1 day")). basename($_FILES['userfile']['name']);
      echo '<pre>';

      if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
          echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
          header('Location: index.php');
      } else {
          print "파일 업로드 공격의 가능성이 있습니다!\n";
      }
      echo '자세한 디버깅 정보입니다:';
      print_r($_FILES);
      print "</pre>";
    ?>
    <img src="file\<?=$_FILES['userfile']['name'] ?>"/>
  </body>
</html>
