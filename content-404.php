<div class='entry'>
	
<div class="widgts-pages">
	<?php get_template_part('sidebar','sidebar'); ?>
</div>

    <div class="entry-container">

        <div class='entry-header'>
            <h1 class="entry-title"><?php _e('404: ', 'mcbra'); ?></h1>
        </div>

        <div class="entry-content">
            <article>
                <p>
					A P&aacute;gina Solicitada n&atilde;o foi encontrada</p>
                    <p><?php _e('Parece que nada foi encontrado nesta URL. Confira se a URL est&aacute; correta ou digite o que procura abaixo.', 'mcbra'); ?></p>
                <?php get_search_form(); ?>
            </article>
        </div>
    </div>
	<div style="clear:both"></div>
</div>