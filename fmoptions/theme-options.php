<?php
add_action( 'admin_init', 'custom_theme_options', 1 );
function custom_theme_options() {
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  $custom_settings = array(
    'sections'        => array(
      array(
        'id'          => 'controls_setting',
        'title'       => 'Menu Controls'
      ),
    ),

    'settings'        => array(
      array(
        'id'          => 'alignselect',
        'label'       => __( 'Section Title Align', 'text-domain' ),
        'type'        => 'select',
        'section'     => 'controls_setting',
        'choices'     => array( 
                array(
                    'value'       => 'left',
                    'label'       => __( 'Left Align', 'text-domain' ),
                ),
                array(
                    'value'       => 'center',
                    'label'       => __( 'Center Align', 'text-domain' ),
                ),
                array(
                    'value'       => 'right',
                    'label'       => __( 'Right Align', 'text-domain' ),
                )
            )
      ),
      array(
        'id'          => 'sectlecolor',
        'label'       => 'Section Title Color',
        'type'        => 'colorpicker',
        'section'     => 'controls_setting'
      ),
      array(
        'id'          => 'proprccolor',
        'label'       => 'Product Title and Price color',
        'type'        => 'colorpicker',
        'section'     => 'controls_setting'
      ),
      array(
        'id'          => 'prodetlscolor',
        'label'       => 'Product Details color',
        'type'        => 'colorpicker',
        'section'     => 'controls_setting'
      ), // Footer area
      array(
        'id'          => 'locmtitle',
        'label'       => 'Location Main Title',
        'type'        => 'text',
        'std'         =>  'Locations',
        'section'     => 'footer_setting'
      ),
      array(
        'id'          => 'lctialign',
        'label'       => __( 'Location Main title align', 'text-domain' ),
        'type'        => 'select',
        'section'     => 'footer_setting',
        'choices'     => array( 
                array(
                    'value'       => 'left',
                    'label'       => __( 'Left Align', 'text-domain' ),
                ),
                array(
                    'value'       => 'center',
                    'label'       => __( 'Center Align', 'text-domain' ),
                ),
                array(
                    'value'       => 'right',
                    'label'       => __( 'Right Align', 'text-domain' ),
                )
            )
      ),
    )
  );

  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}?>