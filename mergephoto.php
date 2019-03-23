<?php

function imagettfstroketext(&$image, $size, $angle, $x, $y, &$textcolor, &$strokecolor, $fontfile, $text, $px) {

    for($c1 = ($x-abs($px)); $c1 <= ($x+abs($px)); $c1++)
        for($c2 = ($y-abs($px)); $c2 <= ($y+abs($px)); $c2++)
            $bg = imagettftext($image, $size, $angle, $c1, $c2, $strokecolor, $fontfile, $text);

   return imagettftext($image, $size, $angle, $x, $y, $textcolor, $fontfile, $text);
} 


$imageFile = $_POST['image'];
$yourname = ($_POST['yourname'] == '') ? '......' :$_POST['yourname'];

header('Content-Type: image/png');
$targetFolder = 'photos/';

$x=$y=500;

$img1 = "photos/$imageFile";
$img2 = 'images/play/frame-06.png';
$img3 = 'images/play/frame-07.png';

$outputImage = imagecreatetruecolor(500, 500);

// set background to white
$first = imagecreatefrompng($img1);
$second = imagecreatefrompng($img2);
$third = imagecreatefrompng($img3);


$first = imagecreatefrompng($img1);
$second = imagecreatefrompng($img2);
$third = imagecreatefrompng($img3);

//imagecopyresized ( resource $dst_image , resource $src_image , int $dst_x , int $dst_y , int $src_x , int $src_y , int $dst_w , int $dst_h , int $src_w , int $src_h )
imagecopyresized($outputImage,$first,0,0,0,0, $x, $y,$x,$y);
imagecopyresized($outputImage,$second,0,0,0,0, $x, $y,$x,$y);
imagecopyresized($outputImage,$third,0,0,0,0, $x, $y,$x,$y);


// Add the text
//imagettftext ( resource $image , float $size , float $angle , int $x , int $y , int $color , string $fontfile , string $text )
//$white = imagecolorallocate($im, 255, 255, 255);
$text = $yourname;
$font = 'font.ttf';
$font_color = imagecolorallocate($outputImage, 54, 104, 169);
$stroke_color = imagecolorallocate($outputImage, 255, 255, 255);
// $white = imagecolorallocate($outputImage, 255, 255, 255);
// imagettftext($outputImage, 18, 0, 45, 415, $font_color, $font, $text);
imagettfstroketext($outputImage, 24, 0, 70, 425, $font_color, $stroke_color, $font, $text, 1);


$filename = round(microtime(true)).'.png';
imagepng($outputImage, $targetFolder.$filename);
imagedestroy($outputImage);
        
echo $filename

?>