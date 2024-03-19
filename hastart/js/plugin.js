



  //弹出底部订阅

// window.onscroll = function () {
//   var scrollPercent = 100 * window.pageYOffset / (document.body.offsetHeight - window.innerHeight);
    
//     if (scrollPercent > 66 && getCookie("bottomClosed") !== "true") {

//       document.getElementById("popup-form").style.display = "block";

//     }  
//    }

   // Get the modal
var modal = document.getElementById("loginModal");

// Get the button that opens the modal
var btn = document.getElementById("loginBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];



// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


jQuery(document).ready(function($) {
  // Click event for the icon
  $('#loginBtn').on('click', function() {
    if (hastart.loggedIn) {
      // Show dropdown menu
      console.log('you are logged in');
      $('.header-dropdown').toggle();
    } else {
      // Open login modal
      console.log('you are not logged in');
      $('#login-modal').show();
    }
  });

  

$('.like-btn').on('click',function(){

const post_id = $(this).attr('data-post-id');

const lastClickTime = localStorage.getItem(`likeTime_${post_id}`);

if (!lastClickTime || (Date.now() - lastClickTime) >= 24 * 60 * 60 * 1000) {

  localStorage.setItem(`likeTime_${post_id}`, Date.now()); // Store the current time 

   $.ajax({
                url: wproot.root + 'custom/v1/like/' + post_id, // Use the custom endpoint
                method: 'POST',
                success: (res) => {
                    console.log('Like count updated successfully:', res);
                    $(this).html('<i class="fa-2x fa fa-heart"></i>');
                    $('.like-count').text(res.meta.likeCount);
                },
                error: (err) => {
                    console.log('Error updating like count:', err);
                }
            });


} else {
        // Notify the user that they need to wait
        $(this).html('<i class="fa-2x fa fa-heart"></i>');
        alert("每篇文章每天只能点赞一次");
    }

//send ajax to increase the like field 
//
});

});






  










