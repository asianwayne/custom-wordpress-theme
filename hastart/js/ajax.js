jQuery(document).ready(($) => {

  $(document).on('click','.load-more',(e) => {

    var _self = jQuery(e.currentTarget),
      _postlistWrap = jQuery('.posts-list'),
      _button = jQuery('.load-more'),
      _data = _self.data(); 
    jQuery.ajax({

      url: '/wp-admin/admin-ajax.php',
      data: _data,
      type: 'POST',
      dataType: 'json',
      success: (data, textStatus, jqXHR) => {

        _postlistWrap.append(data.data);

        //当button. paged跟 button.max 一样  隐藏 button 
        if (_data['paged'] == _data['total']) {

          _button.hide();
          
        }
        _button.data("paged", _button.data('paged') + 1);

        //use history api to keep the paged history 

        let currentUrl = $(location).attr('href');

        //首先获取当前网址的path，看下Pathname是几个， 然后在pathname后面添加paged/


        //let baseUrl = getUrl.protocol + '//' + getUrl.hostname + getUrl.pathname;



        console.log(currentUrl);


        window.history.pushState('', '', currentUrl + 'page/' + parseInt(_data['paged']));

        console.log('This success');

      },
      error:(err) => {
        console.log(err.responseText);
        console.log('this is wrong');
      }

      });

    });

});
  

  

    
    //set the loading class 




    //ajax 
  //   jQuery.ajax({

  //     url: '/wp-admin/admin-ajax.php',
  //     data: _data,
  //     type:'POST',
  //     dataType: 'json',
  //     success: function (data, textStatus, jqXHR) {
  //       console.log(jqXHR.status);

  //     }

  //   });


  // alert('Damn');






// jQuery(document).ready(($) => {
//   var _self = jQuery(this),
//     _postlistWrap = jQuery('.posts-con'),
//     _button = jQuery('#fa-loadmore'),
//     _data = _self.data(); 


//     // set class loading 

//   const button = $('.load-more');
//   button.on('click',(e) => {
//     let paged = $('.posts-list').data('paged');
//     let maxPages = $('.posts-list').data('total');

//     let params = new URLSearchParams();

//     params.append('action','load_more_posts');
//     params.append('current_page',currentPage);

//     $.ajax({
//       url:'/wp-admin/admin-ajax.php',
//       type:'POST',
//       data:{
//         action:'load_more_posts',
//         current_page: currentPage,
//       },
//       success:(res)  => {
//         //const data = JSON.parse(res);

//         const postsList = $('.posts-list');
//         postsList.append(res.data);

//         if ($('.posts-list').data('page') == $('.posts-list').data('max')) {
//           button.parentNode.removeChild(button);
//         }

//         $('.posts-list').data('page', '3');

//         console.log(res);

//       },
//       error:(err) => {
//         console.log('ajax request failed');
//       }

//     })

//   });

// });



