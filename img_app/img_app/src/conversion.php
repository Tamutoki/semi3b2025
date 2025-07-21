<form action='?do=delete' method='POST'>
<?php
$tmp_file = $_FILES['upload']['tmp_name']; # 一時ファイル名
$true_file = $_FILES['upload']['name']; # 本来のファイル名
$formatold = $_POST['formatold'];
$format = $_POST['format'];
$size = $_POST['size'];
# is_uploaded_fileメソッドで、一時的にアップロードされたファイルが本当にアップロード処理されたかの確認

if (is_uploaded_file($tmp_file)) {
    if (move_uploaded_file($tmp_file , $true_file )) {
        echo '';
    } else {
        echo 'ファイルをアップロードできません。<button><a href="?do=home">戻る</a></button>';
    }
} else {
    echo 'ファイルが選択されていません。<button><a href="?do=home">戻る</a></button>';
}
    
$iminfo = getimagesize($true_file);
if($iminfo == false){
    echo "画像を認識できませんでした。";
}

//前のファイル形式を取得

if($formatold == 1){
    echo "<br>JPEG形式を";
    $im = imagecreatefromjpeg($true_file);
}else if($formatold == 2){
    echo "<br>PNG形式を";
    $im = imagecreatefrompng($true_file);
}else if($formatold == 3){
    echo "<br>WEBP形式を";
    $im = imagecreatefromwebp($true_file);
}else{
    $im = null;
}

//リサイズ処理
list($width, $height) = getimagesize($true_file);
$newwidth = $width * ($size /100);
$newheight = $height * ($size /100);

$newImg = imagecreatetruecolor((int)$newwidth, (int)$newheight);
imagecopyresized($newImg, $im, 0, 0, 0, 0, (int)$newwidth, (int)$newheight, $width, $height);
if($format == 1){
    echo "JPEG形式に変換しました。";
    imagejpeg($newImg, 'img/convert.jpeg');
    $imlink = 'img/convert.jpeg';
}else if($format == 2){
    echo "PNG形式に変換しました。";
    imagepng($newImg, 'img/convert.png');
    $imlink = 'img/convert.png';
}else if($format == 3){
    echo "WEBP形式に変換しました。";
    imagewebp($newImg, 'img/convert.webp');
    $imlink = 'img/convert.webp';
}
echo "<br><img src='".$imlink."' >";

unset($im);
unlink($true_file);
echo "<input type='hidden' name='imgLink' value='". $imlink ."' />";
?>
<br>ファイル保存が終わりましたら右のボタンから削除してください。
<input type='submit' value='削除' />
</form>