<li>
            <div class="box">
              <figure class="icon"> <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"> <?php the_post_thumbnail(); ?> </a> </figure>
              <div class="info">
                <h3><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h3>
                <div class="meta"> <span>大小：1674.9MB</span> </div>
                <div class="meta"><span>版本：v21.36</span></div>
              </div>
              <div class="clear"></div>
              <div class="intro"> <em>简介：</em><?php echo mb_strimwidth(strip_tags(get_post_meta( get_the_ID(), 'itemintro', true )), 0, 300) ?> </div>
            </div>
          </li>