<?php
function resize_image($file, $newfile, $w, $h) {
 list($width, $height) = getimagesize($file);
 if(strpos(strtolower($file), ".jpg"))
    $src = imagecreatefromjpeg($file);
 else if(strpos(strtolower($file), ".png"))
    $src = imagecreatefrompng($file);
 else if(strpos(strtolower($file), ".gif"))
    $src = imagecreatefromgif($file);
 $dst = imagecreatetruecolor($w, $h);
 imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
 if(strpos(strtolower($newfile), ".jpg"))
    imagejpeg($dst, $newfile);
 else if(strpos(strtolower($newfile), ".png"))
    imagepng($dst, $newfile);
 else if(strpos(strtolower($newfile), ".gif"))
    imagegif($dst, $newfile);

}

 ?>
