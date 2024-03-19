jQuery(document).ready(function($) {

  $(document).on('click','.js-image-upload',function(e) {
    e.preventDefault();

    var $button = $(this);


    var file_frame = wp.media.frames.file_frame = wp.media({
      title:'Select Or upload',
      library:{
        type:"image"
      },
      button:{
        text:'Select Image'
      },
      multiple:false
    });

    file_frame.on('select',function() {
      var attachment = file_frame.state().get('selection').first().toJSON(); 
      $button.siblings('.image-upload').val(attachment.url);

    });

    file_frame.open();


  });

});
  

