<?php
session_start();
$captcha_num = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; // add the characters which are to be displayed in captcha
$captcha_num = substr(str_shuffle($captcha_num), 0, 6); //shuffle the characters and take a string of 6 characters
$_SESSION["captcha"] = $captcha_num; //put the captcha code in session variable for later authentication

$font_size = 5; //specify the size of font in image
$img_width = 250; //specify the width of image
$img_height = 40; //specify the height of image


$image = imagecreate($img_width, $img_height); // create background image with dimensions
$background = imagecolorallocate($image, 255, 255, 255); // set background color

$text_color = imagecolorallocate($image, 0x33, 0x33, 0x33); // set captcha text color

$linecolor = imagecolorallocate($image, 0xCC, 0xCC, 0xCC); //set color of line which are to be drawn across image so as to decrease readibility of text for bots

// draw random lines on canvas using for loop
for($i=0; $i < 5; $i++) 
{
  imagesetthickness($image, rand(1,4)); //set lines thickness randomly
  imageline($image, 0, rand(0,40), 250, rand(0,40), $linecolor); //specify the area in which lines has to be drawn
}

header("Content-type: image/png"); //let the browser know what type of data is coming

imagestring($image, $font_size, 100, 15, $captcha_num, $text_color); //print the data on image
imagepng($image); //convert the image in png format for output
imagedestroy($image); //free up resources
?>