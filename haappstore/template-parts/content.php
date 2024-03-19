<li>
            <figure class="thumbnail"> <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"> <img src="<?php the_post_thumbnail_url(  ); ?>" alt="<?php the_title() ?>"> </a> </figure>
            <div class="info">
              <h3><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h3>
              <p><?php echo mb_strimwidth(strip_tags(get_the_content()),0,200) ?></p>
              <time datetime="<?php the_time( get_option('date_format')); ?>"><?php the_time( get_option('date_format')); ?></time>
            </div>
          </li>