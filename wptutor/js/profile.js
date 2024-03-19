jQuery(document).ready(($) => {
  const btn = $("#user_custom_avatar_upload"); 
  const user_avatar = $("#user_custom_avatar"); 
  btn.on('click',function(e) {
    e.preventDefault();
    console.log('Click the user upload');
    

    const hs_frame = wp.media({

      title:'SELECT Images',
      button:{
        text:"Select"
      }, 
    }); 

    hs_frame.on('select',function(){
      var attachment = hs_frame.state().get('selection').first().toJSON();
      $("#user_custom_avatar").val(attachment.url);
      $("#user_custom_avatar_img").attr('src',attachment.url);
$("#user_custom_avatar").trigger('change');
      console.log(attachment.url);

    });

    hs_frame.open(); 

  });

});