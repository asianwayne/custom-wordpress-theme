jQuery(document).ready(($) => {


	$('.edit-tags-php tbody').sortable({

		opacity:0.6, 
		revert:true, 
		handle:'.column-name',
		cursor:'move',
		update:(event,ui) => {

			let sort_order = $('.edit-tags-php tbody').sortable('serialize');
			$.ajax({
				url:learn_sort.ajaxurl,
				type:'POST',
				data:{
					nonce:learn_sort.learn_nonce,
					action:'learn_sort',
					new_order:sort_order,
				},
				success:(res) => {
					console.log(res);
				}
			})
		}

	});
});