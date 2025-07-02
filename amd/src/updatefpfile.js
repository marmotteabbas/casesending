define(['jquery'], function() {
    var check = function() {
        $( "body" ).on( "mousemove", function( event ) {
            $("input[name='fpfilecheck']")[0].value = $(".dndupload-message").is(":visible");
        });
  };
    return {
        check: check
    };
});