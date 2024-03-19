<?php /****Template Name:restapi */ 

get_header();
?>

<div class="container">
  <section class="index_cont list_content">
    <div class="main_cont clear">
      
      <div class="list-cont fl">
        <nav class="breadcrumb"> 
          <?php echo tie_breadcrumbs(); ?> 
        </nav>
        <div class="recommend_list mod_list">
          
          <h1>Rest api posts</h1>
          <ul class="rest-article-list posts-list" data-home=true id="post-list">
            
         
          </ul>

          
          
        </div>
      </div>
      <?php get_sidebar();
      
      
      ?>
    </div>
  </section>
</div>
<script>
  jQuery(document).ready(function($) {
      var currentPage = 1;

      function displayPosts(page) {
        $.ajax({
          url: "https://aj0.cn/wp-json/wp/v2/posts?page=" + page + "&per_page=10",
          success: function(posts, textStatus, xhr) {
            var html = "";
            for (var i = 0; i < posts.length; i++) {
              html += `<li class="post_part clear" id=""> <a href="" class="pic"> <img class="lazy" src="" onerror='this.src=""' alt="" title="" width="200" height="150"> </a>
  <div class="cont">
    <h3><a href="${posts[i].link}" class="title">${posts[i].title.rendered}</a></h3>
    <div class="info"> 
      <!-- Categori list -->
      <span class="author">  <span class="gap_point">•</span><span></span> </span> 
    </div>
    <p class="summary">${posts[i].excerpt.rendered}</p>
  </div>
</li>`;
            }


            $(".rest-article-list").html(html);
            
            // Update pagination links
            var totalPages = xhr.getResponseHeader("X-WP-TotalPages");
            var paginationHtml = "";
            for (var i = 1; i <= totalPages; i++) {
              if (i == page) {
                paginationHtml += "<a href='#' class='active'>" + i + "</a>";
              } else {
                paginationHtml += "<a href='#' data-page='" + i + "'>" + i + "</a>";
              }
            }
            $(".pagination").html(paginationHtml);
          },
          error: function(xhr, textStatus, errorThrown) {
            console.log("Error: " + errorThrown);
          }
        });
      }

      displayPosts(currentPage);

      // Handle pagination clicks
      $(document).on("click", ".pagination a:not(.active)", function(e) {
        e.preventDefault();
        currentPage = $(this).data("page");
        displayPosts(currentPage);
      });
    });
</script>


<?php get_footer(); ?>