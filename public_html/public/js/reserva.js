$(document).ready(function(){
  $( "#ubicacion" ).keypress(function() {
    var input=$('#ubicacion').val();
var url="https://maps.googleapis.com/maps/api/place/autocomplete/json?input="+input+"&types=address&location=-34.6080333,-58.4483968&radius=150&key=AIzaSyDbkfRCQbeJ5ydJOPMnqQuscHsSHRoxg7Q";
$.ajax({
          url: url,
          type: "GET",
          dataType: 'jsonp',
          cache: false,
          success: function(response){
              alert(response);
          }
      });

   });
});
