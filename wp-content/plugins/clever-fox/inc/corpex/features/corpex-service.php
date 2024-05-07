<?php
function corpex_service_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Service  Section
	=========================================*/
	$wp_customize->add_section(
		'service_setting', array(
			'title' => esc_html__( 'Service Section', 'clever-fox' ),
			'priority' => 3,
			'panel' => 'corpex_frontpage_sections',
		)
	);

	//Service Documentation Link
	class WP_service_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   ?>
			<h3><?php _e('Section Documentation','clever-fox'); ?></h3>
			<p><a href="#" target="_blank" style="background-color:#0083E3; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;"><?php _e('Click Here','clever-fox');?></a></p>
			
		<?php
	   }
	}
	
	// Service Doc Link // 
	$wp_customize->add_setting( 
		'service_doc_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'corpex_sanitize_callback' => 'corpex_sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_service_Customize_Control($wp_customize,
	'service_doc_link' , 
		array(
			'label'          => __( 'Service Documentation Link', 'clever-fox' ),
			'section'        => 'service_setting',
			'type'           => 'radio',
			'description'    => __( 'Service Documentation Link', 'clever-fox' ), 
		) 
	) );

	// Service Section // 
	$wp_customize->add_setting(
		'service_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'corpex_sanitize_callback' => 'corpex_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'service_headings',
		array(
			'type' => 'hidden',
			'label' => __('Services','clever-fox'),
			'section' => 'service_setting',
		)
	);
	
	// Hide / Show 
	$wp_customize->add_setting(
		'service_hs'
			,array(
			'default'     	=> '1',	
			'capability'     	=> 'edit_theme_options',
			'corpex_sanitize_callback' => 'corpex_sanitize_checkbox',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'service_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'service_setting',
		)
	);
	
	// Service Title // 
	$wp_customize->add_setting(
    	'service_title',
    	array(
	        'default'			=> __('Our <span>Service</span>','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'corpex_sanitize_callback' => 'corpex_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'service_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'service_setting',
			'type'           => 'text',
		)  
	);
	
	// Service Description // 
	$wp_customize->add_setting(
    	'service_description',
    	array(
	        'default'			=> __('There are many variations of passages of Lorem Ipsum available.','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'corpex_sanitize_callback' => 'corpex_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'service_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'service_setting',
			'type'           => 'text',
		)  
	);
	
	// Service content Section // 
	
	$wp_customize->add_setting(
		'service_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'corpex_sanitize_callback' => 'corpex_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'service_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'service_setting',
			)
	);
	
	/**
	 * Customizer Repeater for add service
	 */
	
		$wp_customize->add_setting( 'service_contents', 
			array(
			 'corpex_sanitize_callback' => 'repeater_corpex_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => corpex_get_service_default()
			)
		);
		
		$wp_customize->add_control( 
			new Corpex_Repeater( $wp_customize, 
				'service_contents', 
					array(
						'label'   => esc_html__('Service','clever-fox'),
						'section' => 'service_setting',
						'add_field_label'                   => esc_html__( 'Add New Service', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Service', 'clever-fox' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_image_control' => false,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						// 'customizer_repeater_text2_control' => true,
						'customizer_repeater_link_control' => true,						
						'customizer_repeater_image2_control' => true,
					) 
				) 
			);
		
		//Pro feature
		class Corpex_service__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
				$theme = wp_get_theme(); // gets the current theme	
				
			?>
				<a class="customizer_service_upgrade_section up-to-pro" href="https://www.nayrathemes.com/corpex-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php }
		}
		
		$wp_customize->add_setting( 'service_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'corpex_sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 5,
		));
		$wp_customize->add_control(
			new Corpex_service__section_upgrade(
			$wp_customize,
			'service_upgrade_to_pro',
				array(
					'section'				=> 'service_setting',
				)
			)
		);
}

add_action( 'customize_register', 'corpex_service_setting' );

// service selective refresh
function corpex_home_service_section_partials( $wp_customize ){	
	// service title
	$wp_customize->selective_refresh->add_partial( 'service_title', array(
		'selector'            => '.service-home .section-title h2 span',
		'settings'            => 'service_title',
		'render_callback'  	  => 'corpex_service_title_render_callback',
	) );
	

	// service Description
	$wp_customize->selective_refresh->add_partial( 'service_description', array(
		'selector'            => '.service-home .section-title p',
		'settings'            => 'service_description',
		'render_callback'     => 'corpex_service_description_render_callback',
	) );


	// service content
	$wp_customize->selective_refresh->add_partial( 'service_contents', array(
		'selector'            => '.service-home .service-box .service-content'
	) );
}

add_action( 'customize_register', 'corpex_home_service_section_partials' );

// service title
function corpex_service_title_render_callback() {
	return get_theme_mod( 'service_title' );
}

// service description
function corpex_service_description_render_callback() {
	return get_theme_mod( 'service_description' );
}