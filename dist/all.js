$(document).ready(function() {

var windWidth = $(window).width();
    if(windWidth < 802) {
        $('ul#menu-header-menu').appendTo($('#the-mobi'));
        // $('ul#menu-new-header').appendTo($('#the-mobi'));
    };

    $('.good-burger').click(function() {
        $('#the-mobi').slideToggle('slow');
    });


    $.each($('.menu li.menu-item'), function (index, value) {
      if ($(this).children('ul').length > 0 || $(this).children('div').length > 0) {
        $(this).children('a').append($('<span class="arrow"></span>'));
      }
    });


    $('#the-mobi li.menu-item-has-children > a').contents().unwrap();

    $('#the-mobi li.menu-item-has-children').click(function() {
        
        var $this = $(this);
        $(this).children('ul').slideToggle('slow');


        $(this).children('ul li:active a').click(function() {
          
          $(this).children.attr('<?= get_permalink(); ?>');
        });
        

        // if ($(this).children('ul:visible').length) {

        //   // $(this).children.attr('<?= get_permalink(); ?>');
        //   // $(this).find('> ul:visible').stop().slideUp('slow');
        // } else {
        //   $(this).children('ul').slideToggle('slow');
        // }
         // return false;
    });


    // $('#the-mobi ul li span.arrow').click(function() {
    //       var $this = $(this);
    //       alert("close me");
    //       $(this).children('ul').stop().slideToggle('slow');
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