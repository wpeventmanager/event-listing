<?php 
        $wp_customize->add_setting( 'event_listing_options[event_listing_primary_color]',
            array(
                'default'           => $default['event_listing_primary_color'],
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(                 
                $wp_customize,
                'event_listing_options[event_listing_primary_color]',
                array(
                    'label'       => esc_html__( 'Primary Color', 'event-listing' ),
                    'description' => esc_html__( 'Main Site Color.', 'event-listing' ),
                    'section'     => 'colors',  
                )
            )
        );

        $wp_customize->add_setting( 'event_listing_options[event_listing_secondary_color]',
            array(
                'default'           => $default['event_listing_secondary_color'],
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(                 
                $wp_customize,
                'event_listing_options[event_listing_secondary_color]',
                array(
                    'label'       => esc_html__( 'Secondary Color', 'event-listing' ),
                    'description' => esc_html__( 'Secondary Color of the site.', 'event-listing' ),
                    'section'     => 'colors',  
                )
            )
        );


        $wp_customize->add_setting( 'event_listing_options[event_listing_button_color]',
            array(
                'default'           => $default['event_listing_button_color'],
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(                 
                $wp_customize,
                'event_listing_options[event_listing_button_color]',
                array(
                    'label'       => esc_html__( 'Button Color', 'event-listing' ),
                    'description' => esc_html__( 'Button Color of the site.', 'event-listing' ),
                    'section'     => 'colors',  
                )
            )
        );


        $wp_customize->add_setting( 'event_listing_options[event_listing_button_text_color]',
            array(
                'default'           => $default['event_listing_button_text_color'],
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(                 
                $wp_customize,
                'event_listing_options[event_listing_button_text_color]',
                array(
                    'label'       => esc_html__( 'Button Text Color', 'event-listing' ),
                    'description' => esc_html__( 'Button Text Color of the site.', 'event-listing' ),
                    'section'     => 'colors',  
                )
            )
        );




        $wp_customize->add_setting( 'event_listing_options[event_listing_link_color]',
            array(
                'default'           => $default['event_listing_link_color'],
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Color_Control(                 
                $wp_customize,
                'event_listing_options[event_listing_link_color]',
                array(
                    'label'       => esc_html__( 'Link Color', 'event-listing' ),
                    'description' => esc_html__( 'Link Color of the site.', 'event-listing' ),
                    'section'     => 'colors',  
                )
            )
        );

