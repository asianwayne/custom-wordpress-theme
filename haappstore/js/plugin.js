jQuery(document).ready(($) => {
 $(".login-btn").click(function(e) {
                e.preventDefault();
                $("#login-popup").toggleClass("show");
            });

            $(".close-popup").click(function() {
                $("#login-popup").removeClass("show");
            });

            $(".dropdown").hover(
            function() {
                $(this).find(".dropdown-menu").show();
            },
            function() {
                $(this).find(".dropdown-menu").hide();
            }
        );




            $('a[download]').on('click', function(e) {
    e.preventDefault(); // Prevent the default behavior of the download link
    var fileUrl = $(this).attr('href');

    // Perform an AJAX request to a custom PHP endpoint or WordPress REST API route
    $.ajax({
      type: 'POST',
      url: downloadTrackingAjax.ajaxUrl, // Replace with the appropriate URL for your endpoint
      data: {
        action: 'track_download', // Action hook to handle the download tracking request
        file_url: fileUrl
      },
      success: function(response) {
        console.log(response);
        window.location.href = fileUrl; // Proceed with the file download after tracking
      },
      error:(err) => {
        console.log('error');
        console.log(err);
      }
    });
  });
})