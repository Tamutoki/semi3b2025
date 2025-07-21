<!--  http://localhost/img_app --><!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>画像ファイル処理プログラム</title>
</head>
<body>
<?php

$do = 'home'; //ホームページ (imgapp_window)をデフォルト機能とする
if (isset($_GET['do'])) {//index.php?do=に続くパラメータで実行する機能を指定
  $do = $_GET['do'];
}

include('src/' . $do . '.php'); //指定されたファイルを読み込む

?>
</body>
</html>