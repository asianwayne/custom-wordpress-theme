<?php global $q_obj; ?>
<!-- breadcrumbs -->
<?php tie_breadcrumbs(); ?>

<div class="main clearfix">
  <!-- 这个如果是父级父级里的子级 如果有父级  展示父级子级  如果是不带子级的父级 不要li -->
  <div class=" recruit-search main_box_shadow">
    <div class="recruit-search_cnt">
      
      <div class="major recruit-search-cnt clearfix"> <b class="attribute left"><?php echo ($q_obj->parent) ? get_cat_name($q_obj->parent) : $q_obj->name ?>：</b>
        <ul class="left clearfix">
          <?php 
          if ($q_obj->parent) { //如果是子级 也就是parent为0 
            $c_cat_parent = get_categories(array(
              'child_of' => $q_obj->parent,
              'hide_empty' => false 
            )); foreach ($c_cat_parent as $sub_cat) { ?>
            <li><a href="<?php echo get_term_link($sub_cat->term_id) ?>" title="<?=$sub_cat->name?>"><?= $sub_cat->name ?></a></li>
            <?php 
            }
          ?>
          <?php 
          }
          ?>
        </ul>
      </div>
    </div>
  </div>

  <div class="left main_l">
    <div class="search-result main_box_shadow"> <b><?= $q_obj->name; ?></b></div>
    <div class="school-list clearfix"> 

      <?php 
      while(have_posts()) {
        the_post(); ?>
        <dl class="school-list-cnt main_box_shadow clearfix">
          <dt class="school-logo"><a href="<?php the_permalink() ?>"> <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>" width="260" height="260"></a></dt>
          <dd class="school-cnt"> <a class="school-tit" href="<?php the_permalink() ?>"><?php the_title();?></a>
            <p class="clearfix mt"> <?php echo mb_strimwidth(strip_tags(get_the_content()),0,150,'...')?> </p>
            <p class="clearfix"> <span class="sp-address"><?php the_author()?></span> <span class="sp-xuezhi">时间&nbsp;:&nbsp;<?php the_time(get_option('date_format'))?></span> <span class="sp-xuefei">浏览&nbsp;:&nbsp;<?php echo get_post_meta(get_the_ID(), 'tie_views', true)?></span> </p>
          </dd>
        </dl>
        <?php 
      }?>
    </div>
    
    <?php echo tie_get_pagenavi(false,false,'<div class="page-box main_box_shadow">','</div>');?>
  </div>

  <!-- right --> 
  <?php get_sidebar()?>
 
  <!-- right over --> 
</div>