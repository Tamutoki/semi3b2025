<?php
$tmp_file = $_FILES['upload']['tmp_name']; # 一時ファイル名
print_r($_FILES );
$true_file = $_FILES['upload']['name']; # 本来のファイル名
$formatold = $_POST['formatold'];
$format = $_POST['format'];
$resolution = $_POST['resolution'];
$size = $_POST['size'];
# is_uploaded_fileメソッドで、一時的にアップロードされたファイルが本当にアップロード処理されたかの確認

if (is_uploaded_file($tmp_file)) {
    if (move_uploaded_file($tmp_file , $true_file )) {
        echo $true_file . "をアップロードしました。";
    } else {
        echo "ファイルをアップロードできません。";
    }
} else {
    echo "ファイルが選択されていません。";
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

if($format == 1){
    echo "JPEG形式に変換しました。";
    imagejpeg($im, 'img/test.jpeg');
    echo "<br><img src='img/test.jpeg' width='600'>";
    //unlink('img/test.jpeg');
}else if($format == 2){
    echo "PNG形式に変換しました。";
    imagepng($newImg, 'img/test.png');
    echo "<br><img src='img/test.png' width='600'>";
    //unlink('img/test.png');
}else if($format == 3){
    echo "WEBP形式に変換しました。";
    imagewebp($im, 'img/test.webp');
    echo "<br><img src='img/test.webp' width='600'>";
    //unlink('img/test.webp');
}
unset($im);
unlink($true_file);

?>