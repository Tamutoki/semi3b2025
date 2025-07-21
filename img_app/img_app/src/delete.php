<?php
$file = $_POST['imgLink'];
 
//ファイルを削除する
if (unlink($file)){
  echo 'ファイルの削除に成功しました。';
}else{
  echo 'ファイルの削除に失敗しました。';
}
?>
<button><a href="?do=home">戻る</a></button>
