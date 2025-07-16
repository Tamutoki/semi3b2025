<!--  http://localhost/img_app/imgapp_sample.php -->
<?php
// 画像の幅と高さを指定
$width = 600;
$height = 400;

// 画像リソースを作成
$image = imagecreatetruecolor($width, $height);

// 白い背景を作成
$white = imagecolorallocate($image, 255, 255, 255);
imagefilledrectangle($image, 0, 0, $width, $height, $white);

// 画像を保存
imagepng($image, 'img/my_image.png');
imagejpeg($image, 'img/my_image.jpeg');
imagewebp($image, 'img/my_image.webp');



// リソースを解放
imagedestroy($image);
?>