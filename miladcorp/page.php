<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package miladcorp
 */

get_header();
?>
<div id="breadcrumb">
  <div class="inner"> <?php echo tie_breadcrumbs() ?> </div>
</div>

<main id="wrapper">
  <div class="inner public">
    <article id="singlepage">
      <h1 id="pageTitle"><?php the_title(); ?></h1>
      <div class="entry" id="maximg">
        <?php the_content(); ?>
      </div>
    </article>
  </div>
</main>
	

<?php

get_footer();
