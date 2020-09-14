<?php if ( is_active_sidebar( 'sidebarpage' ) ) : ?>
    <div class="sidebar sidebar-content" id="sidebar-content">
        <!--<div style='background-color: rgba(0,0,0,.7); color:#fff; font-size: 12px; padding: 0 10px;  border-radius: 1px; float: left; clear: both'> > Saiba mais</div>-->
        <?php dynamic_sidebar( 'sidebarpage' ); ?>
    </div>
<?php endif; ?>