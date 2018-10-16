$(document).ready(function() {

var windWidth = $(window).width();
    if(windWidth < 655) {
        $('ul#menu-new-header').appendTo($('#the-mobi'));
    };

    $('.good-burger').click(function() {
        $('#the-mobi').toggle();
    })
    

    // $('.good-burger').click(function() {
    //     $('#the-mobi').slideDown();
    // });
 
   



//wrap all iframe videos in class to make responsive
var $iframes = $("iframe");

$iframes.each(function () {
    $(this).removeAttr("width");
    $(this).removeAttr("height");
    $(this).wrap("<div class='videowrapper'></div>");
});

var canvas = document.getElementById('canvas'),
ctx = canvas.getContext('2d');


function noise(ctx) {

    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        idata = ctx.createImageData(w, h),
        buffer32 = new Uint32Array(idata.data.buffer),
        len = buffer32.length,
        run = 0,
        color = 0,
        m = Math.random() * 6 + 4,
        band = Math.random() * 256 * 256,
        p = 0,
        i = 0;

    for (; i < len;) {
        if (run < 0) {
            run = m * Math.random();
            p = Math.pow(Math.random(), 0.4);
            color = (255 * p) << 24;
        }
        run -= 1;
        buffer32[i++] = color;
    }

    ctx.putImageData(idata, 0, 0);
}

var frame = 0;

// added toggle to get 30 FPS instead of 60 FPS
(function loop() {
    frame += 1;
    if (frame % 3) {
        requestAnimationFrame(loop);
        return;
    }
    noise(ctx);
    requestAnimationFrame(loop);
})();








});