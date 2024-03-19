<?php 
get_header();
$current_user = get_queried_object();
$user_description = get_the_author_meta( 'description', $current_user->ID );



 ?>
  <div class="container">
    <h1>会员中心</h1>
    
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">所有文章</a></li>
      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">个人资料</a></li>
      <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">Contact</a></li>
    </ul>
    
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">
        <!-- all posts belong to this author -->
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">excerpt</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
        <?php $current_user_id = get_current_user_id();

        $args = array(
            'author' => $current_user_id,
            'post_type' => 'post',
            'posts_per_page' => 10 // to retrieve all the posts
        );
        $i = 1;

        $posts_query = new WP_Query( $args );

        if ( $posts_query->have_posts() ) {
            while ( $posts_query->have_posts() ) {
                $posts_query->the_post();
                // Display or manipulate each post here ?>
                <tr>
              <th scope="row"><?php echo $i; ?></th>
              <td><?php the_title(); ?></td>
              <td><?php echo mb_strimwidth(strip_tags(get_the_content()),0,150); ?></td>
              <td>@mdo</td>
            </tr>

                <?php 
                $i++;
            }
            wp_reset_postdata();
        } else {
        // No posts found
        echo 'Posts not found';
        }
     ?>
      </tbody>
    </table>
        
      </div>
      <div role="tabpanel" class="tab-pane mt-3" id="profile">
        <div class="row mt-3 pt-3" style="margin-top:2rem">
          <div class="col-sm-2">
            <?php echo get_avatar( $current_user_id ); ?>
          </div>
          <div class="col-sm-10 text-left">
            <form id="user-profile" method="post">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="user-name" name="user-name" placeholder="Enter your name" value="<?php echo $current_user->display_name; ?>">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="user-email" name="user-email" placeholder="Enter your email address" value="<?php echo $current_user->user_email; ?>">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="user-description" id="user-description" cols="30" rows="10"><?php echo $user_description; ?>
              </textarea>
            </div>
            <div class="form-group">
              
              <label for="file">头像</label>
              <input type="file" id="user-avartar" name="user-avatar" accept="image/*">
              <div id="upload-alert"></div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
            
          </div>
        </div>
      </div>

      <div role="tabpanel" class="tab-pane" id="contact">
        <p>Content for Contact tab goes here.</p>
      </div>
    </div>
    
  </div>


<?php get_footer(); ?>
