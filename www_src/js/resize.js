$(document).ready(function () {
    caller()
});
$(window).addEventListener("resize", caller());

function caller() {
    elaborator(".box1");
    elaborator(".box2");
    elaborator(".box3");
    elaborator(".box4");
    elaborator(".box5");
    elaborator(".box6");
}

function elaborator(class_string) {
    var newheight = 0;
    var element = $(class_string);
    var padding = parseInt(element.css(attr).split("px")[0]) + 
            parseInt(element.css("padding-bottom").split("px")[0]);
    /* 
     * oppure, se devi fare la stessa cosa su più attributi..
     
    var padding = 0; 
    ["padding-top","padding-bottom"].map(function(a){
        padding+=parseInt(element.css(a).split("px")[0]);
    });
    */
    
    var compHeight = newheight + padding + "px";
    $(class_string).css("height", compHeight);
}