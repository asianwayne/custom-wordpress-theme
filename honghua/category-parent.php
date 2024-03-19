<!-- breadcrumb -->
<?php /**
 * Template for displaying the category with the children category
 * 
 * 
 * 
 *  */ ?>
<?php global $q_obj; tie_breadcrumbs(); ?>

<div class="main clearfix">
  <div class=" recruit-search main_box_shadow">
    <div class="recruit-search_cnt">

      <div class="major recruit-search-cnt clearfix"> <b class="attribute left"><?php echo $q_obj->name; ?>：</b>
        <ul class="left clearfix">
          <?php 
          $c_cat_children = get_categories(array(
            'child_of' => $q_obj->term_id,
            'hide_empty' => false
          ));
          foreach ($c_cat_children as $sub_cat) { ?>
          <li><a href="<?php echo get_term_link($sub_cat->term_id) ?>" title="<?php echo $sub_cat->name ?>"><?= $sub_cat->name ?></a></li>
          <?php 
          }         ?>
          
        </ul>
      </div>
    </div>
  </div>
  <div class="left main_l"> 

  <?php 
  foreach ($c_cat_children as $children) { ?> 

  <div class=" news_box main_box_bg">
      <div class="main-tit clearfix"> <span class="fl"><?= $children->name ?></span><a class="fr mrt" href="<?=get_term_link($children->term_id)?>">+更多</a></div>
      <ul class="news clearfix">
        
      <?php 
      $children_q = new WP_Query(array(
        'cat' => $children->term_id,
        'posts_per_page' => 8,
      ));
      while ($children_q->have_posts()) {
        # code...
        $children_q->the_post(); ?>
        <li><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title()?></a><span class="fr"><?php the_time(get_option('date_format'))?></span></li>

        <?php 
      }
      
      ?>
        
      </ul>
    </div>

  <?php 
    # code...
  }
  
  ?>
     </div>
  <!-- right --> 
  <?php get_sidebar()?>
 
  <!-- right over --> 
</div>