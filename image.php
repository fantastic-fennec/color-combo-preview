<?php


//Get colors, set to object if there is none
if (empty($_GET["colors"])) {
	$colors = [];
} else {
	$colors = explode("-", $_GET["colors"]);
}

//Background color for final image
$background = "#000";

//Load the images you want to combine. All images should be the same size.
$images = ["img/sleeves.jpg", "img/body.jpg"];
$parts = [];

//Turn each image into an imagick object
foreach ($images as $image) {
	array_push($parts, new Imagick($image));
}

//A final overlay image to go on top without being altered
$overlay = new Imagick("img/over.png");

//Get the base size for new image
$height = $overlay->getImageHeight();
$width = $overlay->getImageWidth();


try {

	//Give us a base to put everything into. If you wanted a fancy background, you'd put it here
	$canvas = new Imagick();
	$canvas->newImage($width, $height, $background, "png");


	//Go through each image and color it
	foreach ($parts as $part) {

		//Create a new image of a flat color
		$new = new Imagick();
		$color = check_color(array_pop($colors));
		$new->newPseudoImage($width,$height,"canvas:" . $color);

		//Composite color image with our image
		$new->compositeImage($part, Imagick::COMPOSITE_COPYOPACITY, 0, 0);


		//Add the part we just colored into the canvas
		$canvas->compositeImage($new, Imagick::ALPHACHANNEL_COPY, 0, 0 );
	}

	//Put overlay on top last, no alpha effects
	$canvas->compositeImage($overlay,Imagick::COMPOSITE_DEFAULT, 0, 0 );


	//Output as an image
	header( "Content-Type: image/png" );
	echo $canvas;
	die;

//If something goes wrong, display a message to help us fix it.
} catch(ImagickException $e) {
	var_dump($e);
}

//Helper function
function check_color($color) {

	//Make sure color is hex and right length, else generate random color
	if (ctype_xdigit($color) && strlen($color) == 6) {
		return "#".$color;
	} else {

		//Something's not right, make a new color.
		return "rgb(".mt_rand(0,255).",".mt_rand(0,255).",".mt_rand(0,255).")";

	}

}


