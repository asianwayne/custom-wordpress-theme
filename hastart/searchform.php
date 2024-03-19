<div class="search"> <i class="s-btn off fa fa-search"></i>
  <div class="s-form"> <i class="arrow fa fa-caret-up"></i>
    <form class="sform" id="searchform" name="formsearch" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input class="sinput" name="s" type="text" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'textdomain' ); ?>" value="<?php echo get_search_query(); ?>">
      <button><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>