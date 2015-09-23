
# color-combo-preview
Accepts different colors to composite an image


##Prerequisites

1. PHP + server of choice
2. [Image Magick] (http://www.imagemagick.org/)
3. [Imagick] (http://php.net/manual/en/book.imagick.php) (PHP plugin)

If you're on linux getting it running should be about as simple as `apt-get install imagemagick php5-imagick`
Specifics per OS will vary, but there are many guides online. Windows can be very finicky with imagick, you may want to use a virtual machine.


##Install / Run

None needed. Just clone into your web root, and see it on [localhost/color-combo-preview] (http://localhost/color-combo-preview) (Or whatever you may have named the folder)


##About

This is a simple script to test different color combinations on a single item. It's easy to change a slider around in photoshop but can be tedious for seperate colors on multiple layers to see what looks nice. 

The front end is a quick and dirty color swapper to see the effect; but the real magic is in the image script, no pun intended. The particular filters being used have an effect like "multiply" in photoshop - it could be modified to combine other images than the supplied, seperating each piece as a light monochrome image.

Originally for picking colors on a neat hoodie from https://www.etsy.com/shop/DOXOlove based on game OFF https://forum.starmen.net/forum/Fan/Games/OFF-by-Mortis-Ghost



##Example

<img src="https://github.com/fantastic-fennec/color-combo-preview/blob/master/img/example-1.png" width="350">
<img src="https://github.com/fantastic-fennec/color-combo-preview/blob/master/img/example-2.png" width="350">


