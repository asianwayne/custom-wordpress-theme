jQuery(document).ready(function ($) {
  $('#the-list').sortable({
    items: '> tr',
    stop: function () {
      var ids = $(this).sortable('toArray');
      ids = ids.join(',');
      $.ajax({
        url: ajaxurl,
        type: 'post',
        data: {
          action: 'update-term-order',
          ids: ids
        },
        success: function (res) {
          //const data = JSON.parse(res); 
          console.log(res);
          
        },
        error:(err) => {
          console.log(err);
        }
      });
    }
  });
});


