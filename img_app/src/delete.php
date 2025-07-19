<?php
$file = $_POST['imgLink'];
 
//ファイルを削除する
if (unlink($file)){
  echo $file.'の削除に成功しました。';
}else{
  echo $file.'の削除に失敗しました。';
}
?>
<button><a href="?do=imgapp_window">戻る</a></button>
