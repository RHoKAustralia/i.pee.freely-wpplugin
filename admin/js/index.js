(function( $ ) {
	var endpoint = "http://0.0.0.0:3000/api/locations";
	var view_item = "/edit?get=";
	var edit_item = "admin.php?page=rhok2015-edit&id=";
	var delete_item = "/edit?get=";

	$.ajax({
    url: endpoint,
    type: 'GET',
    success: function(response){
			var trHTML = '';
			$.each(response, function (i, item) {
					trHTML += '<tr class="location">';
					trHTML += '<td class="col-info">';
					trHTML += '<p class="name">' + item.name + '</p>';
					trHTML += '<p class="address">' + item.address +'</p>';
					trHTML += '</td><td class="col-actions">';
					// trHTML += '<a class="view option" href="' + view_item + item.id + '"><span class="dashicons-before dashicons-heart">View Feedback</span></a>';
					trHTML += '<a class="edit option" href="' + edit_item + item.id + '"><span class="dashicons-before dashicons-edit">Edit</span></a>';
					trHTML += '<a class="delete option" href="' + delete_item + item.id + '"><span class="dashicons-before dashicons-trash">Delete</span></a>';
					trHTML += '</td></tr>'
			});
			$('#locations tbody').append(trHTML);
		}
	});
})( jQuery );
