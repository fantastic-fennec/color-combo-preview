
//List of available colors; can be used for any part.
var colors = new Array('533595','3b0078','DDDDDD','111111','fe0a00','740009','012c56','01a0fe','3c3c3c','d4b9ca','a7968f','fee320','049584','fe8101','fe7445','fe5b70','57fe01','0000cc','d24da6','004443');


$(document).ready(function() {

    //Create a button for each color per part
    for (var i=0;i<colors.length;i++) {

        $(".controls").append("<img style='background-color:#" + colors[i] + ";' src='img/x.png' data-color='" + colors[i] + "' />");

    }

    //Set up buttons to switch image values
    $(".controls").delegate("img","click",function() {

        //Color we just picked
        var new_color = $(this).attr("data-color");

        //Currently active item in current control group
        var replacing = $(this).parent().attr("data-order");

        //Previous value, since we only want to update 1 at a time
        var old_src = $("#display").attr('src');

        //We have a url string, get the color value from it
        var colors = old_src.split('colors=')[1];

        //Turn into array, replace old item, and combine again
        colors = colors.split("-");
        colors[replacing] = new_color;
        colors = colors.join("-");


        $("#display").attr('src',"image.php?colors=" + colors);

    });


});

