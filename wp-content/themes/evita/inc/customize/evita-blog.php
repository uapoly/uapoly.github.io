<?php
function evita_blog_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'evita_frontpage_sections', array(
			'priority' => 32,
			'title' => esc_html__( 'Homepage Sections', 'evita' ),
		)
	);
	/*=========================================
	Blog  Section
	=========================================*/
	$wp_customize->add_section(
		'blog_setting', array(
			'title' => esc_html__( 'Blog Section', 'evita' ),
			'priority' => 13,
			'panel' => 'evita_frontpage_sections',
		)
	);
	
	// Setting Head
	$wp_customize->add_setting(
		'blog_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'blog_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','evita'),
			'section' => 'blog_setting',
		)
	);
	
	// Hide / Show 
	$wp_customize->add_setting(
		'blog_hs'
			,array(
			'default'     	=> '1',	
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_checkbox',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'blog_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','evita'),
			'section' => 'blog_setting',
		)
	);
	
	// Blog Header Section // 
	$wp_customize->add_setting(
		'blog_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'blog_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','evita'),
			'section' => 'blog_setting',
		)
	);
	
	// Blog Title // 
	$wp_customize->add_setting(
    	'blog_title',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'blog_title',
		array(
		    'label'   => __('Title','evita'),
		    'section' => 'blog_setting',
			'type'           => 'text',
		)  
	);

		// Blog SubTitle // 
		$wp_customize->add_setting(
			'blog_subtitle',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'evita_sanitize_html',
				'transport'         => $selective_refresh,
				'priority' => 4,
			)
		);	
		
		$wp_customize->add_control( 
			'blog_subtitle',
			array(
				'label'   => __('Subitle','evita'),
				'section' => 'blog_setting',
				'type'           => 'text',
			)  
		);
	
	// Blog Description // 
	$wp_customize->add_setting(
    	'blog_description',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'blog_description',
		array(
		    'label'   => __('Description','evita'),
		    'section' => 'blog_setting',
			'type'           => 'textarea',
		)  
	);

	// Blog content Section // 
	
	$wp_customize->add_setting(
		'blog_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'blog_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','evita'),
			'section' => 'blog_setting',
		)
	);
	
	// blog_display_num
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		$wp_customize->add_setting(
			'blog_display_num',
			array(
				'default' => '3',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'evita_sanitize_range_value',
				'priority' => 8,
			)
		);
		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'blog_display_num', 
			array(
				'label'      => __( 'No of Posts Display', 'evita' ),
				'section'  => 'blog_setting',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'    => 1,
							'max'    => 500,
							'step'   => 1,
							'default_value' => 3,
						),
					),
			) ) 
		);
	}
	
}

add_action( 'customize_register', 'evita_blog_setting' );

// blog selective refresh
function evita_home_blog_section_partials( $wp_customize ){	
	// blog title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '.home1-blog .section-title h5',
		'settings'            => 'blog_title',
		'render_callback'  => 'evita_blog_title_render_callback',
	
	) );
	
	// blog description
	$wp_customize->selective_refresh->add_partial( 'blog_description', array(
		'selector'            => '.home1-blog .section-title h3',
		'settings'            => 'blog_description',
		'render_callback'  => 'evita_blog_desc_render_callback',
	
	) );
	
	}

add_action( 'customize_register', 'evita_home_blog_section_partials' );

// blog title
function evita_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}

// blog description
function evita_blog_desc_render_callback() {
	return get_theme_mod( 'blog_description' );
}