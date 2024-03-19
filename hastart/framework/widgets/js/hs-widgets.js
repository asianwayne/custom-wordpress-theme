console.log('helooooo');
jQuery(document).ready(($) => {

  $("#widgets-editor").on('click','.ads_widget_upload_btn',function(e) {

    //先验证下点击监听是否成功
    console.log('You click the upload btn'); 
    widget_id = $(this).dataset("widget-id");
    console.log(widget_id);

     hr_custom_uploader = wp.media({
                title: 'Choose Image',
                library: {
                    type: 'image'
                },
                button: {
                    text: 'Select Image'
                },
                multiple: false
            }).on('select', function () {
                
                var attachment = hr_custom_uploader.state().get('selection').first().toJSON();
                console.log(attachment.url);
                $('.custom-ads-img-url').val(attachment.url);
                $('.custom-ads-img-url').trigger('change');


            }).open();
  });


});