<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bg.css">
  </head>
  <body>
     <video autoplay muted loop id="myVideo">
  <source src="HD.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>
  <br><br><div class="col-sm-12">
        <center><img src="images/logo.png" /> </center>
        <center><img src="images/ff.png" width="400"/> </center>
       </div>
  <div class="col-md-4"></div>
  <div class="col-md-4">
  <div class="feedback_class">
    <form id="feedback_form">
      <input type="text" name="postive" id="feedback_but" placeholder="Enter postive feedback"><br><br>
      <input type="text" name="negative" id="feedback_but" placeholder="Enter negative feedback"><br><br>
      <p></br ></p>
    <div>
      <div id="stars-green" data-rating="3"></div>
    </p>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/bootstrap-star-rating.js"></script><br>
      <button class="btn btn-info">SUBMIT</button>
    </form>
  </div>
    <script>
(function ( $ ) {
 
    $.fn.rating = function( method, options ) {
    method = method || 'create';
        var settings = $.extend({
      limit: 5,
      value: 0,
      glyph: "glyphicon-star",
            coloroff: "gray",
      coloron: "gold",
      size: "2.0em",
      cursor: "default",
      onClick: function () {},
            endofarray: "idontmatter"
        }, options );
    var style = "";
    style = style + "font-size:" + settings.size + "; ";
    style = style + "color:" + settings.coloroff + "; ";
    style = style + "cursor:" + settings.cursor + "; ";
    if (method == 'create')
    {
       this.each(function(){
        attr = $(this).attr('data-rating');
        if (attr === undefined || attr === false) { $(this).attr('data-rating',settings.value); }
      })
      for (var i = 0; i < settings.limit; i++)
      {
        this.append('<span data-value="' + (i+1) + '" class="ratingicon glyphicon ' + settings.glyph + '" style="' + style + '" aria-hidden="true"></span>');
      }
      this.each(function() { paint($(this)); });

    }
    if (method == 'set')
    {
      this.attr('data-rating',options);
      this.each(function() { paint($(this)); });
    }
    if (method == 'get')
    {
      return this.attr('data-rating');
    }
    this.find("span.ratingicon").click(function() {
      rating = $(this).attr('data-value')
      $(this).parent().attr('data-rating',rating);
      paint($(this).parent());
      settings.onClick.call( $(this).parent() );
    })
    function paint(div)
    {
      rating = parseInt(div.attr('data-rating'));
      div.find("input").val(rating);  
      div.find("span.ratingicon").each(function(){ 
        
        var rating = parseInt($(this).parent().attr('data-rating'));
        var value = parseInt($(this).attr('data-value'));
        if (value > rating) { $(this).css('color',settings.coloroff); }
        else { $(this).css('color',settings.coloron); }
      })
    }

    };
 
}( jQuery ));

$(document).ready(function(){

  $("#stars-default").rating();
  $("#stars-green").rating('create',{coloron:'green',onClick:function(){ alert('rating is ' + this.attr('data-rating')); }});
  $("#stars-herats").rating('create',{coloron:'red',limit:10,glyph:'glyphicon-heart'}); 
}); 
    </script>
  </body>
</html>