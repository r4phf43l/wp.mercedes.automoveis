<?

function mcbra_customize_register( $wp_customize ) {
    class mcbra_Textarea_Control extends WP_Customize_Control {
        public $type = 'textarea';
		public function render_content() { ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="8" style="width:100%;" <?php $this->link(); ?>>
					<?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
	<? 	}
}

// create url input control
class mcbra_URL_Control extends WP_Customize_Control {
public $type = 'url';
public function render_content() {
    ?>
    	<label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <input type="url" <?php $this->link(); ?> value="<?php echo esc_url_raw( $this->value() ); ?>" />
            </label>
<?php
}
}	

// create url input control
class mcbra_TXT_Control extends WP_Customize_Control {
public $type = 'url';
public function render_content() {
    ?>
    <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <input type="url" <?php $this->link(); ?> value="<?php echo esc_url_raw( $this->value() ); ?>" />
    </label>
<?php
}
}		

// create hr input control
class mcbra_HR_Control extends WP_Customize_Control {
public $type = 'line';
public function render_content() {
    ?>
    <hr />
<?php
}
}

$wp_customize->add_section( 'ct_footer_text', array(
	'title'      => __( 'Texto do Rodapé', 'mcbra' ),
	'priority'   => 58,
	'capability' => 'edit_theme_options',
	'panel'          => 'panel_full'
) );

$wp_customize->add_setting( 'mcbra_footer_text_setting', array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',       
) );

$wp_customize->add_control( new mcbra_Textarea_Control(
	$wp_customize, 'ct_mcbra_footer_text_setting', array(
		'label'          => __( 'Edite o texto do rodapé', 'mcbra' ),
		'section'        => 'ct_footer_text',
		'settings'       => 'mcbra_footer_text_setting',			
	)
) );


// Slider Categorias

for ($a=0; $a<=5; $a++) {

	switch ($a) {
		case 1: $cat = "Automóveis"; $slug = "automoveis"; break;
		case 2: $cat = "Ônibus"; $slug = "onibus"; break;
		case 3: $cat = "Vans"; $slug = "vans"; break;
		case 4: $cat = "AMG"; $slug = "amg"; break;
		case 5: $cat = "Caminhões"; $slug = "caminhoes"; break;
		case 0: $cat = "Home"; $slug = "home"; break;
	}
	
	$csl = get_category_by_slug($slug); 
	$c = ($slug!="home") ? $csl ->term_id : 0;
	
	if(get_theme_mod('mcbra_full_setting_cat_' . $a)==1) {
	
		$slide_cat[$a] = get_theme_mod('slide_count_setting' . $c)!="" ? get_theme_mod('slide_count_setting' . $c) : 5;
		$wp_customize->add_panel( 'panel_slides' . $c, array(
			'priority'       => 52,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'Slides: ' . $cat,
			'description'    => 'Container de Slides (Categoria: ' . $cat . ')' . get_theme_mod('slide_count_setting' . $c),
		) );
	
		for ($i=1; $i<=$slide_cat[$a]; $i++) {		
			
			$wp_customize->add_section( 'ct_slide_options_' . $c . '_' . $i, array(
				'title'      => __( 'Slide ' . $cat . ' ' . $i, 'mcbra' ),
				'capability' => 'edit_theme_options',
				'panel'  => 'panel_slides' . $c
			) );	
		
			$wp_customize->add_setting(
				'mcbra_slide_img_setting_' . $c . '_' . $i, array(
				'default' => '',
			) );
			
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,	
				'mcbra_slide_img_setting_' . $c . '_' . $i, array(	
				'label' => 'Escolha uma Imagem',	
				'section' => 'ct_slide_options_' . $c . '_' . $i,	
				'settings' => 'mcbra_slide_img_setting_' . $c . '_' . $i	
			)));
		
			$wp_customize->add_setting( 'mcbra_slide_title_setting_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
			) );
		
			$wp_customize->add_control( 'ct_mcbra_slide_title_setting_' . $c . '_' . $i, array(
				'label'          => __( 'Título', 'mcbra' ),
				'type'			 => 'text',
				'section'        => 'ct_slide_options_' . $c . '_' . $i,
				'settings'       => 'mcbra_slide_title_setting_' . $c . '_' . $i,
			) );
		
			$wp_customize->add_setting( 'mcbra_slide_text_setting_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',        
			) );
		
			$wp_customize->add_control( 'ct_mcbra_slide_text_setting_' . $c . '_' . $i, array(
				'label'          => __( 'Descrição', 'mcbra' ),
				'section'        => 'ct_slide_options_' . $c . '_' . $i,
				'settings'       => 'mcbra_slide_text_setting_' . $c . '_' . $i,
			) );
		
			$wp_customize->add_setting( 'mcbra_slide_text_color_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',        
			) );
		
			$wp_customize->add_control( 'ct_mcbra_slide_text_color_' . $c . '_' . $i, array(
				'label'          => __( 'Texto em Branco', 'mcbra' ),
				'type'			 => 'checkbox',
				'section'        => 'ct_slide_options_' . $c . '_' . $i,
				'settings'       => 'mcbra_slide_text_color_' . $c . '_' . $i,
			) );
		
			$wp_customize->add_setting( 'mcbra_slide_url_setting_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',        
			) );
		
			$wp_customize->add_control( new mcbra_URL_Control(
				$wp_customize, 'ct_mcbra_slide_url_setting_' . $c . '_' . $i, array(
					'label'          => __( 'URL', 'mcbra' ),
					'section'        => 'ct_slide_options_' . $c . '_' . $i,
					'settings'       => 'mcbra_slide_url_setting_' . $c . '_' . $i,
				)
			) );
		
			$wp_customize->add_setting( 'mcbra_slide_link_setting_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',        
			) );
		
			$wp_customize->add_control( 'ct_mcbra_slide_link_setting_' . $c . '_' . $i, array(
				'label'          => __( 'Abrir em outra janela', 'mcbra' ),
				'type'			 => 'checkbox',
				'section'        => 'ct_slide_options_' . $c . '_' . $i,
				'settings'       => 'mcbra_slide_link_setting_' . $c . '_' . $i,
			) );
		
			$wp_customize->add_setting( 'mcbra_slide_button_setting_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'default'			=> 'Saiba mais',
			) );
		
			$wp_customize->add_control( 'ct_mcbra_slide_button_setting_' . $c . '_' . $i, array(
				'label'          => __( 'Botão', 'mcbra' ),
				'type'			 => 'text',
				'section'        => 'ct_slide_options_' . $c . '_' . $i,
				'settings'       => 'mcbra_slide_button_setting_' . $c . '_' . $i,
			) );
			
			$wp_customize->add_setting( 'mcbra_slide_active_setting_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
			) );
		
			$wp_customize->add_control( 'ct_mcbra_slide_active_setting_' . $c . '_' . $i, array(
				'label'          => __( 'Slide Inativo', 'mcbra' ),
				'type'			 => 'checkbox',
				'section'        => 'ct_slide_options_' . $c . '_' . $i,
				'settings'       => 'mcbra_slide_active_setting_' . $c . '_' . $i,
			) );	
		}
	}
}

// MINIATURAS

for ($a=0; $a<=5; $a++) {

	switch ($a) {
		case 1: $cat = "Automóveis"; $slug = "automoveis"; break;
		case 2: $cat = "Ônibus"; $slug = "onibus"; break;
		case 3: $cat = "Vans"; $slug = "vans"; break;
		case 4: $cat = "AMG"; $slug = "amg"; break;
		case 5: $cat = "Caminhões"; $slug = "caminhoes"; break;
		case 0: $cat = "Home"; $slug = "home"; break;
	}
	
	$csl = get_category_by_slug($slug); 
	$c = ($slug!="home") ? $csl ->term_id : 0;
	
	if(get_theme_mod('mcbra_full_setting_cat_' . $a)==1) {
	
		$teaser[$a] = get_theme_mod('teaser_count_setting_' . $c)!="" ? get_theme_mod('teaser_count_setting_' . $c) : 6;
		$wp_customize->add_panel( 'panel_teaser_' . $c, array(
			'priority'       => 53,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'Miniaturas: ' . $cat,
			'description'    => 'Minitauras da ' . $cat,
		) );
	
		for ($i=1; $i<=$teaser[$a]; $i++) {
			
			$wp_customize->add_section( 'ct_teaser_options_' . $c . '_' . $i, array(
				'title'      => __( 'Miniatura ' . $i, 'mcbra' ),
				'capability' => 'edit_theme_options',
				'panel'  => 'panel_teaser_' . $c
			) );	
		
			$wp_customize->add_setting(
				'mcbra_teaser_img_setting_' . $c . '_' . $i, array(
				'default' => '',
			) );
			
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,	
				'mcbra_teaser_img_setting_' . $c . '_' . $i, array(	
				'label' => 'Escolha uma Imagem',	
				'section' => 'ct_teaser_options_' . $c . '_' . $i,	
				'settings' => 'mcbra_teaser_img_setting_' . $c . '_' . $i	
			)));
		
			$wp_customize->add_setting( 'mcbra_teaser_title_setting_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
			) );
		
			$wp_customize->add_control( 'ct_mcbra_teaser_title_setting_' . $c . '_' . $i, array(
				'label'          => __( 'Título', 'mcbra' ),
				'type'			 => 'text',
				'section'        => 'ct_teaser_options_' . $c . '_' . $i,
				'settings'       => 'mcbra_teaser_title_setting_' . $c . '_' . $i,
			) );
		
			$wp_customize->add_setting( 'mcbra_teaser_text_setting_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',        
			) );
		
			$wp_customize->add_control( 'ct_mcbra_teaser_text_setting_' . $c . '_' . $i, array(
				'label'          => __( 'Texto', 'mcbra' ),
				'section'        => 'ct_teaser_options_' . $c . '_' . $i,
				'settings'       => 'mcbra_teaser_text_setting_' . $c . '_' . $i,
			) );
		
			$wp_customize->add_setting( 'mcbra_teaser_url_setting_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',        
			) );
		
			$wp_customize->add_control( new mcbra_URL_Control(
				$wp_customize, 'ct_mcbra_teaser_url_setting_' . $c . '_'.$i, array(
					'label'          => __( 'URL', 'mcbra' ),
					'section'        => 'ct_teaser_options_' . $c . '_' . $i,
					'settings'       => 'mcbra_teaser_url_setting_' . $c . '_' . $i,
				)
			) );
		
			$wp_customize->add_setting( 'mcbra_teaser_link_setting_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',        
			) );
		
			$wp_customize->add_control( 'ct_mcbra_teaser_link_setting_' . $c . '_' . $i, array(
				'label'          => __( 'Abrir em outra janela', 'mcbra' ),
				'type'			 => 'checkbox',
				'section'        => 'ct_teaser_options_' . $c . '_' . $i,
				'settings'       => 'mcbra_teaser_link_setting_' . $c . '_' . $i,
			) );
		
			$wp_customize->add_setting( 'mcbra_teaser_active_setting_' . $c . '_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
			) );
		
			$wp_customize->add_control( 'ct_mcbra_teaser_active_setting_' . $c . '_' . $i, array(
				'label'          => __( 'Miniatura Inativa', 'mcbra' ),
				'type'			 => 'checkbox',
				'section'        => 'ct_teaser_options_' . $c . '_' . $i,
				'settings'       => 'mcbra_teaser_active_setting_' . $c . '_' . $i,
			) );	
		}	
	}
}	


// Todos os Veículos
	
	$wp_customize->add_panel( 'panel_pages', array(
		'priority'       => 21,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => 'Todos os Veículos/Categorias',
		'description'    => 'Links para todos os veículos na página inicial',
	) );

	$wp_customize->add_setting( 'mcbra_pages_setting', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
	) );
	
	$wp_customize->add_control( 'ct_mcbra_pages_setting', array(
		'label'          => __( 'Ativar Todos os Veículos', 'mcbra' ),
		'type'		 => 'checkbox',
		'section'        => 'ct_full_options',
		'settings'       => 'mcbra_pages_setting',
	) );	

	$wp_customize->add_setting( 'pages_count_setting', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
	) );
	
	$wp_customize->add_setting( 'mcbra_models_cat_default', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
	) );
	
	$wp_customize->add_control( 'ct_mcbra_models_cat_default', array(
		'label'          => __( 'Categoria Inicial', 'mcbra' ),
		'type'			 => 'select',
		'section'        => 'ct_full_options',
		'settings'       => 'mcbra_models_cat_default',
		'choices' => array( 'automoveis'  => 'Automóveis', 'onibus' => 'Ônibus', 'vans'  => 'Vans', 'amg' => 'AMG', 'caminhoes' => 'Caminhões', ),
	) );
	

for ($i=1; $i<=5; $i++) {

	switch ($i) {
		case 1: $cat = "Automóveis"; $slug = "automoveis"; break;
		case 2: $cat = "Ônibus"; $slug = "onibus"; break;
		case 3: $cat = "Vans"; $slug = "vans"; break;
		case 4: $cat = "AMG"; $slug = "amg"; break;
		case 5: $cat = "Caminhões"; $slug = "caminhoes"; break;
		default: $cat = ""; $slug = ""; break;
	}

	if(get_theme_mod('mcbra_full_setting_cat_' . $i)==1) {	
	
		$wp_customize->add_section( 'ct_pages_options_' . $i, array(
			'title'      => __( ($i<6 ? $cat : ((get_theme_mod('mcbra_pages_title_setting_' . $i)) ? get_theme_mod('mcbra_pages_title_setting_' . $i) : "Link Novo"  )), 'mcbra' ),
			'capability' => 'edit_theme_options',
			'panel'  => 'panel_pages'
		) );	
	
		$wp_customize->add_setting(
			'mcbra_pages_img_setting_' . $i, array(
			'default' => '',
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,	
			'mcbra_pages_img_setting_' . $i, array(	
			'label' => 'Escolha uma Imagem',	
			'section' => 'ct_pages_options_' . $i,	
			'settings' => 'mcbra_pages_img_setting_' . $i	
		)));
	
		$wp_customize->add_setting( 'mcbra_pages_title_setting_' . $i, array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'ct_mcbra_pages_title_setting_' . $i, array(
			'label'          => __( 'Título/Alt', 'mcbra' ),
			'type'			 => 'text',
			'section'        => 'ct_pages_options_' . $i,
			'settings'       => 'mcbra_pages_title_setting_' . $i,
			'default'	=> ($i<5 ? $cat : '')
		) );
	
		$wp_customize->add_setting( 'mcbra_pages_url_setting_' . $i, array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',        
		) );
	
		$wp_customize->add_control( new mcbra_URL_Control(
			$wp_customize, 'ct_mcbra_pages_url_setting_' . $i, array(
				'label'          => __( 'URL', 'mcbra' ),
				'section'        => 'ct_pages_options_' . $i,
				'settings'       => 'mcbra_pages_url_setting_' . $i,
				'default'	=> ($i<5 ? $slug : '')
			)
		) );
	
		$wp_customize->add_setting( 'mcbra_pages_link_setting_' . $i, array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',        
		) );
	
		$wp_customize->add_control( 'ct_mcbra_pages_link_setting_' . $i, array(
			'label'          => __( 'Abrir em outra janela', 'mcbra' ),
			'type'			 => 'checkbox',
			'section'        => 'ct_pages_options_' . $i,
			'settings'       => 'mcbra_pages_link_setting_' . $i,
		) );
	
		$wp_customize->add_setting( 'mcbra_pages_active_setting_' . $i, array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'ct_mcbra_pages_active_setting_' . $i, array(
			'label'          => __( 'Link Inativo', 'mcbra' ),
			'type'			 => 'checkbox',
			'section'        => 'ct_pages_options_' . $i,
			'settings'       => 'mcbra_pages_active_setting_' . $i,
		) );
	}
}

// FLYOUTS

	$models = get_theme_mod('mcbra_models_count_setting')!="" && get_theme_mod('mcbra_models_count_setting')>0 ? get_theme_mod('mcbra_models_count_setting') : 10;

	$cclasses = get_theme_mod('mcbra_classes_count_setting')!="" && get_theme_mod('mcbra_classes_count_setting')>0 ? get_theme_mod('mcbra_classes_count_setting') : 10;	
	
	$wp_customize->add_panel( 'panel_models', array(
		'priority'       => 22,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => 'Modelos',
		'description'    => 'Flayouts',
	) );
	
	$wp_customize->add_section( 'ct_models_options', array(
		'title'      => __( 'Modelos de Veículos', 'mcbra' ),
		'capability' => 'edit_theme_options',
		'panel'  => 'panel_full'
	) );	

	$wp_customize->add_setting( 'mcbra_models_setting', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'ct_mcbra_models_setting', array(
		'label'          => __( 'Ativar Modelos de Veículos', 'mcbra' ),
		'type'			 => 'checkbox',
		'section'        => 'ct_models_options',
		'settings'       => 'mcbra_models_setting',
	) );	

	$wp_customize->add_setting( 'mcbra_classes_count_setting', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'ct_mcbra_classes_count_setting', array(
		'label'          => __( 'Quantidade de Classes de Veículos', 'mcbra' ),	
		'default'        => '1',		
		'section'        => 'ct_models_options',
		'settings'       => 'mcbra_classes_count_setting',
	) );
	
	$wp_customize->add_setting( 'mcbra_models_count_setting', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'ct_mcbra_models_count_setting', array(
		'label'          => __( 'Quantidade de Modelos', 'mcbra' ),	
		'default'        => '10',		
		'section'        => 'ct_models_options',
		'settings'       => 'mcbra_models_count_setting',
	) );
		
	$wp_customize->add_section( 'ct_classes_options', array(
		'title'      => __( 'Classes', 'mcbra' ),
		'capability' => 'edit_theme_options',
		'panel'  => 'panel_models'
	) );	


	for ($i=1; $i<=$cclasses; $i++) {
	
		$wp_customize->add_setting( 'mcbra_classes_count_setting_' . $i, array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'ct_mcbra_classes_count_setting_' . $i, array(
				'label'          => __( 'Classe ' . $i, 'mcbra' ),		
				'section'        => 'ct_classes_options',
				'settings'       => 'mcbra_classes_count_setting_' . $i,
		) );
		
		$wp_customize->add_setting( 'mcbra_classes_cats_setting_' . $i, array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'ct_mcbra_classes_cats_setting_' . $i, array(
				'label'          => __( 'Categoria da classe ' . $i, 'mcbra' ),		
				'section'        => 'ct_classes_options',
				'settings'       => 'mcbra_classes_cats_setting_' . $i,
				'type'		 => 'select',			
				'choices' => array( '' => 'Escolha', 'automoveis'  => 'Automóveis', 'onibus' => 'Ônibus', 'vans'  => 'Vans', 'amg' => 'AMG', 'caminhoes' => 'Caminhões', ),
		) );
		
		$wp_customize->add_setting( 'mcbra_classes_url_setting_' . $i, array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'ct_mcbra_classes_url_setting_' . $i, array(
				'label'          => __( 'URL Classe ' . $i, 'mcbra' ),		
				'section'        => 'ct_classes_options',
				'settings'       => 'mcbra_classes_url_setting_' . $i,
		) );		
		
		$wp_customize->add_setting( 'mcbra_classes_active_setting_' . $i, array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'ct_mcbra_classes_active_setting_' . $i, array(
				'label'          => __( 'Desativar a classe ' . $i, 'mcbra' ),		
				'section'        => 'ct_classes_options',
				'type'			 => 'checkbox',
				'settings'       => 'mcbra_classes_active_setting_' . $i,
		) );
		
			$wp_customize->add_setting( 'mcbra_classes_hr_setting_' . $i, array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
			) );
		
			$wp_customize->add_control( new mcbra_HR_Control(
				$wp_customize, 'ct_mcbra_classes_hr_setting_' . $i, array(					
					'section'        => 'ct_classes_options',
					'settings'       => 'mcbra_classes_hr_setting_' . $i,
				)
			) );

		$cclasses_array [''] = '';
		$cclasses_array [get_theme_mod('mcbra_classes_count_setting_' . $i)."_".get_theme_mod('mcbra_classes_cats_setting_' . $i)] = get_theme_mod('mcbra_classes_count_setting_' . $i) . ' - ' . get_theme_mod('mcbra_classes_cats_setting_' . $i);
		
	}
	
for ($i=1; $i<=$models; $i++) {
	
	$wp_customize->add_section( 'ct_models_options_' . $i, array(
		'title'      => __( ((get_theme_mod('mcbra_models_title_setting_'.$i)!='') ? 'Modelo: ' . get_theme_mod('mcbra_models_classe_setting_'.$i) . ' ' . get_theme_mod('mcbra_models_title_setting_'.$i) : 'Modelo Novo'), 'mcbra' ),
		'capability' => 'edit_theme_options',
		'panel'  => 'panel_models'
	) );	

	$wp_customize->add_setting(
		'mcbra_models_img_setting_' . $i, array(
		'default' => '',
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,	
		'mcbra_models_img_setting_' . $i, array(	
		'label' => 'Escolha uma Imagem (705x325)',	
		'section' => 'ct_models_options_' . $i,	
		'settings' => 'mcbra_models_img_setting_' . $i	
	)));
	
	$wp_customize->add_setting(
		'mcbra_models_mini_setting_' . $i, array(
		'default' => '',
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,	
		'mcbra_models_mini_setting_' . $i, array(	
		'label' => 'Escolha uma Miniatura (271x124)',	
		'section' => 'ct_models_options_' . $i,	
		'settings' => 'mcbra_models_mini_setting_' . $i
	)));	
	
	$wp_customize->add_setting( 'mcbra_models_classe_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
	) );
	
	$wp_customize->add_control( 'ct_mcbra_models_classe_setting_' . $i, array(
		'label'          => __( 'Classe', 'mcbra' ),
		'type'			 => 'select',
		'section'        => 'ct_models_options_' . $i,
		'settings'       => 'mcbra_models_classe_setting_' . $i,
		'choices' => $cclasses_array,
	) );
	
	
	$wp_customize->add_setting( 'mcbra_models_cat_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
	) );
	
	$wp_customize->add_control( 'ct_mcbra_models_cat_setting_' . $i, array(
		'label'          => __( 'Categoria', 'mcbra' ),
		'type'			 => 'select',
		'section'        => 'ct_models_options_' . $i,
		'settings'       => 'mcbra_models_cat_setting_' . $i,
		'choices' => array( '' => '', 'automoveis'  => 'Automóveis', 'onibus' => 'Ônibus', 'vans'  => 'Vans', 'amg' => 'AMG', 'caminhoes' => 'Caminhões', ),
	) );/*'choices' => $catclasses_array,*/
	
	$wp_customize->add_setting( 'mcbra_models_title_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'ct_mcbra_models_title_setting_' . $i, array(
		'label'          => __( 'Modelo', 'mcbra' ),
		'type'			 => 'text',
		'section'        => 'ct_models_options_' . $i,
		'settings'       => 'mcbra_models_title_setting_' . $i,
	) );
	
	$wp_customize->add_setting( 'mcbra_models_active_0_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'ct_mcbra_models_active_0_setting_' . $i, array(
		'label'          => __( 'Modelo Inativo', 'mcbra' ),
		'type'			 => 'checkbox',
		'section'        => 'ct_models_options_' . $i,
		'settings'       => 'mcbra_models_active_0_setting_' . $i,
	) );	
	

	$wp_customize->add_setting( 'mcbra_models_url_4_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',        
	) );

	$wp_customize->add_control('ct_mcbra_models_url_4_setting_'.$i, array(
			'label'          => __( 'Titulo Chamada', 'mcbra' ),
			'section'        => 'ct_models_options_' . $i,
			'settings'       => 'mcbra_models_url_4_setting_' . $i,
			'default'        => 'Mais Informações'
	) );
	/*	
	$wp_customize->add_setting( 'mcbra_models_url_5_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',        
	) );

	$wp_customize->add_control('ct_mcbra_models_url_5_setting_'.$i, array(
			'label'          => __( 'Texto Chamada', 'mcbra' ),
			'section'        => 'ct_models_options_' . $i,
			'settings'       => 'mcbra_models_url_5_setting_' . $i,
	) );
	
	*/
	
	$wp_customize->add_setting( 'mcbra_models_url_3_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',        
	) );

	$wp_customize->add_control( new mcbra_URL_Control(
		$wp_customize, 'ct_mcbra_models_url_3_setting_'.$i, array(
			'label'          => __( 'URL Mais Informações', 'mcbra' ),
			'section'        => 'ct_models_options_' . $i,
			'settings'       => 'mcbra_models_url_3_setting_' . $i,
		)
	) );	
		
    /*
	$wp_customize->add_setting( 'mcbra_models_url_1_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',        
	) );

	$wp_customize->add_control( new mcbra_URL_Control(
		$wp_customize, 'ct_mcbra_models_url_1_setting_'.$i, array(
			'label'          => __( 'Dados Técnicos', 'mcbra' ),
			'section'        => 'ct_models_options_' . $i,
			'settings'       => 'mcbra_models_url_1_setting_' . $i,
		)
	) );		
    */

	$wp_customize->add_setting( 'mcbra_models_link_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',        
	) );

	$wp_customize->add_control( 'ct_mcbra_models_link_setting_' . $i, array(
		'label'          => __( 'Abrir em outra janela', 'mcbra' ),
		'type'			 => 'checkbox',
		'section'        => 'ct_models_options_' . $i,
		'settings'       => 'mcbra_models_link_setting_' . $i,
	) );
    /*
	$wp_customize->add_setting( 'mcbra_models_url_2_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',        
	) );

	$wp_customize->add_control( new mcbra_URL_Control(
		$wp_customize, 'ct_mcbra_models_url_2_setting_'.$i, array(
			'label'          => __( 'Galeria de Imagens', 'mcbra' ),
			'section'        => 'ct_models_options_' . $i,
			'settings'       => 'mcbra_models_url_2_setting_' . $i,
		)
	) );
	
	$wp_customize->add_setting( 'mcbra_models_link_2_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',        
	) );

	$wp_customize->add_control( 'ct_mcbra_models_link_2_setting_' . $i, array(
		'label'          => __( 'Abrir em outra janela', 'mcbra' ),
		'type'			 => 'checkbox',
		'section'        => 'ct_models_options_' . $i,
		'settings'       => 'mcbra_models_link_2_setting_' . $i,
	) );
	*/
	$wp_customize->add_setting( 'mcbra_models_url_7_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',        
	) );

	$wp_customize->add_control( new mcbra_URL_Control(
		$wp_customize, 'ct_mcbra_models_url_7_setting_'.$i, array(
			'label'          => __( 'Titulo Outros', 'mcbra' ),
			'section'        => 'ct_models_options_' . $i,
			'settings'       => 'mcbra_models_url_7_setting_' . $i,
		)
	) );
	
	$wp_customize->add_setting( 'mcbra_models_url_6_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',        
	) );

	$wp_customize->add_control( new mcbra_URL_Control(
		$wp_customize, 'ct_mcbra_models_url_6_setting_'.$i, array(
			'label'          => __( 'URL Outros', 'mcbra' ),
			'section'        => 'ct_models_options_' . $i,
			'settings'       => 'mcbra_models_url_6_setting_' . $i,
			'default'        => 'Compare'
		)
	) );
	
	$wp_customize->add_setting( 'mcbra_models_link_6_setting_' . $i, array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',        
	) );

	$wp_customize->add_control( 'ct_mcbra_models_link_6_setting_' . $i, array(
		'label'          => __( 'Abrir em outra janela', 'mcbra' ),
		'type'			 => 'checkbox',
		'section'        => 'ct_models_options_' . $i,
		'settings'       => 'mcbra_models_link_6_setting_' . $i,
	) );		

}

 // Social 

	$social_sites = array(
            'twitter',
            'facebook',
            'instagram',
            'youtube'
	);

	$wp_customize->add_section( 'ct_social_links', array(
		'title'      => __( 'Midias Sociais', 'mcbra' ),
		'priority'   => 55,
		'capability' => 'edit_theme_options',
		'panel'          => 'panel_full'
	) );

	foreach($social_sites as $social_site) {
		$wp_customize->add_setting( 'mcbra_social_' . $social_site . '_setting', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',        
	) );

	$wp_customize->add_control( new mcbra_URL_Control(
		$wp_customize, 'ct_mcbra_social_' . $social_site . '_setting', array(
			'label'          => __( $social_site, 'mcbra' ),
			'section'        => 'ct_social_links',
			'settings'       => 'mcbra_social_' . $social_site . '_setting',
		)
	) ); 
	
// Blocos da Página Inicial

	$wp_customize->add_section( 'ct_block_options', array(
		'priority'   => 56,
		'capability' => 'edit_theme_options',
		'title'          => 'Blocos da página Inicial',
		'description'    => 'Altera os títulos dos blocos da página Inicial',
		'panel'          => 'panel_full'
	) );		

	$wp_customize->add_setting( 'mcbra_block_setting_1', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'default'		 => 'Novidades'
	) );

	$wp_customize->add_control( 'ct_mcbra_block_setting_1', array(
		'label'          => __( 'Bloco 1', 'mcbra' ),
		'type'			 => 'text',
		'section'        => 'ct_block_options',
		'settings'       => 'mcbra_block_setting_1',			
	) );

	$wp_customize->add_setting( 'mcbra_block_setting_2', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'default'		 => 'Serviços'
	) );

	$wp_customize->add_control( 'ct_mcbra_block_setting_2', array(
			'label'          => __( 'Bloco 2', 'mcbra' ),
			'type'			 => 'text',
			'section'        => 'ct_block_options',
			'settings'       => 'mcbra_block_setting_2',			
	) );

	$wp_customize->add_setting( 'mcbra_block_setting_3', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'default'		 => 'Notícias'
	) );

	$wp_customize->add_control( 'ct_mcbra_block_setting_3', array(
			'label'          => __( 'Bloco 3', 'mcbra' ),
			'type'			 => 'text',
			'section'        => 'ct_block_options',
			'settings'       => 'mcbra_block_setting_3',			
	) );

// Portal

	$wp_customize->add_section( 'ct_general_options', array(
		'priority'   => 56,
		'capability' => 'edit_theme_options',
		'title'          => 'Link Portal',
		'description'    => 'Define o link do Portal',
		'panel'          => 'panel_full'
	) );		

	$wp_customize->add_setting( 'mcbra_general_portal', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'ct_mcbra_general_portal', array(
		'label'          => __( 'Link', 'mcbra' ),
		'type'			 => 'text',
		'section'        => 'ct_general_options',
		'settings'       => 'mcbra_general_portal',			
	) );

	$wp_customize->add_setting( 'mcbra_general_portal_title', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'ct_mcbra_general_portal_title', array(
			'label'          => __( 'Alt', 'mcbra' ),
			'type'			 => 'text',
			'section'        => 'ct_general_options',
			'settings'       => 'mcbra_general_portal_title',			
	) );


// Configurações Gerais

	$wp_customize->add_panel( 'panel_full', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => 'Configurações Gerais',
		'description'    => 'Configs',
	) );

	$wp_customize->add_section( 'ct_full_options', array(
		'priority'   => 0,
		'capability' => 'edit_theme_options',
		'title'          => 'Todos os Veículos / Categorias',
		'description'    => 'Opções de Categorias do Tema',
		'panel'          => 'panel_full'
	) );
	
		
	for ($i=1;$i<6;$i++) {
	
		switch ($i) {
			//case 0: $cat = "Home"; break;
			case 1: $cat = "Automóveis"; $slug = "automoveis"; break;
			case 2: $cat = "Ônibus"; $slug = "onibus"; break;
			case 3: $cat = "Vans"; $slug = "vans"; break;
			case 4: $cat = "AMG"; $slug = "amg"; break;
			case 5: $cat = "Caminhões"; $slug = "caminhoes"; break;			
		}
			
		$wp_customize->add_setting( 'mcbra_full_setting_cat_'.$i, array(
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',			
		) );//'default'           => $cat,
		
		$wp_customize->add_control( 'ct_mcbra_full_setting_cat_'.$i, array(
			'label'          => __( 'Ativar ' . $cat, 'mcbra' ),
			'type'		 => 'checkbox',
			'section'        => 'ct_full_options',
			'settings'       => 'mcbra_full_setting_cat_'.$i,
		) );
		
	}

}
}


add_action( 'customize_register', 'mcbra_customize_register' );