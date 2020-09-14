<div class='search-form-container'>
    <button id="search-icon" class="search-icon">
        <i class="fa fa-search"></i>
    </button>
    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
        <label class="screen-reader-text"><?php _e('Procurar por:', 'mcbra'); ?></label>
        <input type="search" class="search-field" placeholder="<?php _e('Procurar', 'mcbra'); ?>&#8230;" value="" name="s" title="<?php _e('Procurar por:', 'mcbra'); ?>" />
        <input type="submit" class="search-submit" value='<?php _e('Buscar', 'mcbra'); ?>' style="margin-left:10px" />
    </form>
</div>