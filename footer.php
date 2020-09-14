</div> <!-- .main -->







<footer id="site-footer" class="site-footer" role="contentinfo">



    <div class="design-credit">



            <?php



	            $user_footer_text = get_theme_mod('mcbra_footer_text_setting');



                $site_url = 'http://www.rafaantonio.com/mercedes/';



                $footer_text = sprintf( __( '&copy; 2017. Desenvolvido por Comunimax', 'tracks' ), esc_url( $site_url ) );





                

				echo ($user_footer_text) ? $user_footer_text . ' | ': '';

				echo $footer_text;


            ?>



    </div>



</footer>







<?php if( get_theme_mod('additional_options_return_top_settings') != 'hide' ) { ?>



	<button id="return-top" class="return-top">



		<i class="fa fa-arrow-up"></i>



	</button>



<?php } ?>



</div>



<?php wp_footer(); ?>

</body>



</html>