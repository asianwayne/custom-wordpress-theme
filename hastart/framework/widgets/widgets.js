jQuery(function ($) {
  console.log($(document));
  $(document).on('click', '.custom_media_upload', (e) => {
    e.preventDefault();
    var custom_uploader = wp.media({
      title: 'Custom Image',
      button: {
        text: 'Upload Image'
      },
      multiple: false  // Set this to true to allow multiple files to be selected
    })
      .on('select', function () {
        var attachment = custom_uploader.state().get('selection').first().toJSON();
        $('.custom_media_input').val(attachment.id);
        $('.custom_media_preview_img').attr('src', attachment.url).css('display', 'block');
        $('.custom_media_preview_default').css('display', 'none');
        $('.custom_media_remove').css('display', 'inline-block');
        $('.custom_media_url').val(attachment.url);
      })
      .open();
  });
  $(document).on('click', '.custom_media_remove', function (e) {
    $('.custom_media_input').val('');
    $('.custom_media_preview_img').css('display', 'none');
    $('.custom_media_preview_default').css('display', 'block');
    $('.custom_media_remove').css('display', 'none');
  });
});

