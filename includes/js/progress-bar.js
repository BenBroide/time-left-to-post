(function($){
    $(document).ready(function(){
        $(window).scroll(function () {
            var color = tlb_data.color;
            var s = $(window).scrollTop(),
            d = $("article").height(),
            c = $(window).height();
            scrollPercent = (s / (d-c)) * 100;
            var position = scrollPercent;
            var progressWidth = $(".meter").width();
            var greenWidthInPx = 0;
            greenWidthInPx = (progressWidth / 100) * (position);


            if(greenWidthInPx > (progressWidth + 4)){
                return;
            }

            $("#progressbar").attr('value', position);
            $("#progressbar").css( "width", greenWidthInPx + 'px' );

            $('.meter > span').css({
                background: "-webkit-gradient(linear, left bottom, left top,  color-stop(0," +color+"), color-stop(1," +color+")"
            });


        });
    });
})(jQuery);




// background-color: rgb(43,194,83);
// background-image: -webkit-gradient(
//   linear,
//   left bottom,
//   left top,
//   color-stop(0, rgb(43,194,83)),
//   color-stop(1, rgb(84,240,84))
//  );

