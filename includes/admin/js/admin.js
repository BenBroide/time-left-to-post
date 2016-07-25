(function ($) {
  $(function () {
    $('.tlb-color-picker').wpColorPicker(myOptions);
  });



  var myOptions = {
     change: function(event, ui){
        var color = ui.color.toString();

        colorBar(color);
     },
 };

//  $( "#color-one" ).change(function() {
//   alert( "Handler for .change() called." );
// });


  var color = tlb_data.color;

  colorBar(color);

  function colorBar(color){
      $('.meter > span').css({
          background: "-webkit-gradient(linear, left bottom, left top,  color-stop(0," +color+"), color-stop(1," +color+")"
      });
  }
}(jQuery));