(function( $ ) {

	$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
	}

	var location_id = $.urlParam('id');
	var endpoint = "http://0.0.0.0:3000/api/locations/" + location_id;

	$(document).ready( function() {
		if (location_id) {
			$.ajax({
		    url: endpoint,
		    type: 'GET',
				async: false,
		    success: function(response){
					$("#locName").val(response.name);
					$("#locAddress").val(response.address);
					$("#locLat").val(response.locationLatLng.lat);
					$("#locLng").val(response.locationLatLng.lng);
					$("#openingHours").val(response.openingHours);
          $("#accessMethod").val(response.methodsOfAccess);
					$("#locationType").val(response.locationType);
					$("#otherInfo").val(response.otherInformation);
					$("#notes").val(response.notes);
					console.log(response);
				},
				error: function(response){
					$("#messages").append( errors(response.status) );
	        $("#edit-location").hide();
	  		},
			});
		}
	});

	$("#edit-location").submit(function( event ) {
		// Reset and Validate
    // If valid, load AJAX
    reset();
    if ( validate() ) {
      ajax_post();
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
			case 404:
        msg = '<div class="ipf-message red"><h2>404 Not Found</h2><p>Location does not exist.</p></div>'
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

  function ajax_post() {
    $.ajax({
      url: endpoint,
      type: 'PUT',
      data: {
        "name": $("#locName").val(),
        "locationLatLng": {
          "lat": $("#locLat").val(),
          "lng": $("#locLng").val()
        },
        "methodsOfAccess": $("#accessMethod").val(),
        "locationType": $("#locationType").val(),
        "notes": $("#notes").val(),
        "openingHours": $("#openingHours").val(),
        "address": $("#locAddress").val(),
        "otherInformation": $("#otherInfo").val(),
        "id": location_id
      },
      success: function(response){
        $("#messages").append('<div class="ipf-message green"><h2>Success</h2><p>Location has been updated.</p><a href="admin.php?page=rhok2015-main" type="submit" class="button">Back to Homepage</a></div>');
        $("#edit-location").slideUp();
  		},
      error: function(response) {
        $("#messages").append( errors(response.status) );
      },
  	});
  }
})( jQuery );
