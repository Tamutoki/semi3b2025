<?php
$imgDir = __DIR__ . '/../img';

if (is_dir($imgDir)) {
    foreach (glob($imgDir . '/*') as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
}
?>
<h2>画像フォーマット変換</h2>
<!-- フォーマット選択 -->

<form enctype='multipart/form-data'  action='?do=conversion' method='POST'>
<input type='hidden' name='name' value='value' />

アップロード: <input type='file' name='upload' required>
<table>

<tr><td>↓</td></tr>
<tr><td>変換したい形式</td>
<td><input type="radio" name="format" value=1 checked/>JPEG</td>
<td><input type="radio" name="format" value=2 >PNG</td>
<td><input type="radio" name="format" value=3 >WebP</td>
</tr>
</table>

サイズ　　　: <input type="number" name="size" value="100"/>％<br>


<input type='submit' value='ファイル送信' />

</form>