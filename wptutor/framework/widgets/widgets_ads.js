jQuery(document).ready(($) => {

	$("#widgets-editor").on('click','#ads_upload',function(e) {
		e.preventDefault(); 
		const button = $(this); 
		const widget_id = button.data('widget-id'); 



		console.log('You find the right one');

		const frame = wp.media({
			title:'SELECT',
			library:{
				type:'image'
			},
			button:{
				text:'SELECT'
			},
			multiple:false
		}); 

		frame.on('select',function(){

			const attachment = frame.state().get('selection').first().toJSON(); 

			$(".custom_ads_widget_"+widget_id).val(attachment.url); 

			$(".custom_ads_widget_"+widget_id).trigger('change');

		});


		frame.open(); 



	});

});