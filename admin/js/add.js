(function( $ ) {
	var endpoint = "http://0.0.0.0:3000/api/locations";

  $(".ipf-form").submit(function( event ) {
    // Reset and Validate
    // If valid, load AJAX
    reset();
    if ( validate() ) {
      ajax();
    };

    // Prevent default button action
    event.preventDefault();
  });

  function errors(response_code) {
    var msg = "";
    switch(response_code) {
      case 422:
        msg = '<div class="error notice"><p>Please fix the validation errors</p></div>'
        break;
      default:
        msg = '<div class="error notice"><p>An error has occured. Please try again.</p></div>';
    }
    return msg;
  }

  function validate() {
    var isValid = true;

    if( $("#locName").val() == '' ) {
      $("#locName").parent().addClass("invalid");
      isValid = false;
    }

    if( $("#locAddress").val() == '' ) {
      $("#locAddress").parent().addClass("invalid");
      isValid = false;
    }

    if (isValid == false) {
      $("#messages").append( errors(422) );
    }

    return isValid;
  }

  function reset() {
    $("#messages").empty();
    $("#locName").parent().removeClass("invalid");
    $("#locAddress").parent().removeClass("invalid");
  };

  function ajax() {
    $.ajax({
      url: endpoint,
      type: 'POST',
      data: {
        "name": $("#locName").val(),
        "locationLatLng": [
          $("#locLat").val(),
          $("#locLng").val()
        ],
        "locationType": $("#locationType").val(),
        "methodsOfAccess": $("#accessMethod").val(),
        "notes": $("#notes").val(),
        "openingHours": $("#openingHours").val(),
        "address": $("#locAddress").val(),
        "otherInformation": $("#otherInfo").val(),
        "id": null
      },
      success: function(response){
        $("#messages").append('<div class="ipf-message green"><h2>Success</h2><p>Location has been added.</p><a href="admin.php?page=rhok2015-main" type="submit" class="button">Back to Homepage</a></div>');
        $("#add-location").slideUp();
  		},
      error: function(response) {
        $("#messages").append( errors(response.status) );
      },
  	});
  }
})( jQuery );
