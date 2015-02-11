function caller() {
    elaborator(".box1");
    elaborator(".box2");
    elaborator(".box3");
    elaborator(".box4");
    elaborator(".box5");
    elaborator(".box6");
}
function elaborator(class_string) {
    try {
        var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
        if (!is_chrome) {
            var newheight = 0;
            var padding = $(class_string).css("padding").split("px");
            $(class_string).each(function () {
                if ($(this).height() > newheight) {
                    newheight = $(this).height();
                }
            });
            var compHeight = newheight + 10 + "px";
            $(class_string).css("height", compHeight);
        }
    }
    catch (e) {
    }
}

$(document).ready(function () {
    caller()
});