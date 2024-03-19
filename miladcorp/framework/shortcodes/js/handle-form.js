jQuery(document).ready(($) => {

	$("#mc-contact-form").on('submit',function(e) {

		e.preventDefault();

		const form = this;  

		if (!form[0].checkValidity()) {

			console.log('form is not valid ');  return false;

		} 

		const formData = new FormData(this); 


		formData.append('action','mc_submit_form_cb');
		formData.append('nonce',short_script.nonce);

		$.ajax({
			url:short_script.ajax_url,
			data:formData,
			type:'post',
			contentType:false,
			processData:false,
			success:(res) => {
				console.log(res);
				if (res.success) {
					alert(res.data);
					form.reset();
				} else {
					alert(res.data);
				}
			},
			error:(err) => {
				alert(res.data);
			}



		})

		

	});

	// Separate touch event handler for the submit button
    $('#mc-contact-form button[type="submit"]').on('touchstart', function(e) {
        e.preventDefault(); // Prevent default touch behavior
        $(this).closest('form').submit(); // Trigger form submission
    });

});