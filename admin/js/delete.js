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
					$("#locName").append(response.name);
					console.log(response);
				},
				error: function(response){
					$("#messages").append( errors(response.status) );
	        $("#delete-location").hide();
	  		},
			});
		}
	});

	$("#delete-location").submit(function( event ) {
    ajax_delete();
    // Prevent default button action
    event.preventDefault();
  });

  function errors(response_code) {
    var msg = "";
    switch(response_code) {
			case 404:
        msg = '<div class="ipf-message red"><h2>404 Not Found</h2><p>Location does not exist.</p></div>'
        break;
      default:
        msg = '<div class="error notice"><p>An error has occured. Please try again.</p></div>';
    }
    return msg;
  }

  function ajax_delete() {
    $.ajax({
      url: endpoint,
      type: 'DELETE',
      data: {},
      success: function(response){
        $("#messages").append('<div class="ipf-message green"><h2>Success</h2><p>Location has been deleted.</p><a href="admin.php?page=rhok2015-main" type="submit" class="button">Back to Homepage</a></div>');
        $("#delete-location").slideUp();
  		},
      error: function(response) {
        $("#messages").append( errors(response.status) );
      },
  	});
  }
})( jQuery );
