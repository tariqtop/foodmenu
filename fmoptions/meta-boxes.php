<?php
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */ 
  $my_meta_box = array(
    'id'          => 'mpelos',
    'title'       => __( 'Food Menu Options', 'theme-text-domain' ),
    'desc'        => '',
    'pages'       => array( 'foodmenup' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'id'          => 'demo_list_item',
        'label'       => __( 'All Product list', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'fdproprc',
            'label'       => __( 'Price', 'theme-text-domain' ),
            'desc'        => 'Add number only. For e.g: 30.',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'fdprodtls',
            'label'       => __( 'Details', 'theme-text-domain' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'textarea-simple',
            'rows'        => '3',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
          array(
            'id'          => 'fdprodimg',
            'label'       => __( 'Image', 'theme-text-domain' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'upload',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          )
        )
      ),
    )
  );
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $my_meta_box );

  $my_meta_box_social = array(
    'id'          => 'mpelos',
    'title'       => __( 'Locations Options.', 'theme-text-domain' ),
    'desc'        => '',
    'pages'       => array( 'footeradresp' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'id'          => 'locadres',
        'label'       => __( 'Loation Adress', 'theme-text-domain' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea-simple',
        'rows'        => '3',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'locphoneno',
        'label'       => 'Phone number',
        'type'        => 'text'
      ),  
      array(
        'id'          => 'openhrstitle',
        'label'       => 'Opening Hours Title',
        'type'        => 'text'
      ),   
      array(
        'id'          => 'openhoursdels',
        'label'       => __( 'Open Time', 'theme-text-domain' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea-simple',
        'rows'        => '3',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),  
      array(
        'id'          => 'closedaylt',
        'label'       => 'Close Day Name Only. For eg. <i style="color:red">Sunday</i>',
        'type'        => 'text'
      ),         
    )
  );


  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $my_meta_box_social );


  $my_meta_box_socialmain = array(
    'id'          => 'soilistpt',
    'title'       => __( 'Address list', 'theme-text-domain' ),
    'desc'        => '',
    'pages'       => array( 'sociallst' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'id'          => 'iadresicon',
        'label'       => __( 'Add icon name only. For eg. facebook', 'theme-text-domain' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),  
      array(
        'id'          => 'soclistlist',
        'label'       => __( 'Add social link', 'theme-text-domain' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 
          array(
            'id'          => 'fslitpst',
            'label'       => __( 'Address link', 'theme-text-domain' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '10',
            'post_type'   => '',
            'taxonomy'    => '',
            'min_max_step'=> '',
            'class'       => '',
            'condition'   => '',
            'operator'    => 'and'
          ),
        )
      ),
    )
  );


  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $my_meta_box_socialmain );


}