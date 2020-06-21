jQuery(document).ready(function() {
	jQuery("#formFooter").validate({
		submitHandler: function () {
            // post with ajax 
			let postData = jQuery("#formFooter").serialize() + "&action=abufooter_request&param=save_refresh";
			jQuery.post(abufooter_ajax_url, postData, function (response) {
				alert(response);
			});
		}
	});
} );

