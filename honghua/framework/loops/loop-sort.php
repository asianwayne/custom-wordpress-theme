<div class=" recruit-search main_box_shadow">
            <div class="recruit-search_cnt">
                <div class="major recruit-search-cnt clearfix">
                    <b class="attribute left">产品:</b>
                    <ul class="left clearfix">
                      <?php 
                      //get all the chanpin taxonomies 
                      $sorts = get_terms(array(
                        'taxonomy' => 'sort',
                        'hide_empty' => false,
                        'parent' => 0
                      )
                    ); 
                    foreach ($sorts as $sort) { ?>
                    <li><a href="<?php echo get_term_link($sort->term_id) ?>" title="<?=$sort->name?>"><?=$sort->name?></a></li>
                    <?php 
                      # code...
                    }
                      ?>
                    </ul>
                </div>
            </div>
        </div>