<?php
	
add_filter('show_admin_bar', '__return_false');
add_post_type_support( 'page', 'excerpt' );

add_filter( 'excerpt_length', function($length) {
    return 20;
} );
	

/**
 * Fire on the initialization of the admin screen or scripts.
 */
function the_dramatist_fire_on_admin_screen_initialization() {
// Add to the admin_init hook of your theme functions.php file
register_taxonomy_for_object_type('post_tag', 'page');
register_taxonomy_for_object_type('category', 'page');           
}
add_action( 'admin_init', 'the_dramatist_fire_on_admin_screen_initialization' );

// Add to the admin_init hook of your theme functions.php file
  

function wpdocs_theme_name_scripts() {
	
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.css', false );
	wp_enqueue_style( 'font-style', 'https://fonts.googleapis.com/css?family=Merriweather+Sans|Montserrat:400,700', false );
	wp_enqueue_style( 'font-awesome-style', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css', false );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', false );
	
	wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.3.1.js', array(), '3.3.1');
    
    wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/assets/bootstrap/js/popper.min.js', true);
    wp_enqueue_script( 'bootstrap-popper', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', true);
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.js', true);
	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/btwnFriends-custom.js', array ( 'jquery' ), 1.1, true);
	
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
	
function mytheme_setup() {

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );
	
	register_nav_menus(
	array(
		'top_menu' => __( 'Top Menu', 'btwnfriends' ),
		'footer_nav' => __( 'Footer Menu', 'btwnfriends' ),
		'social_nav' => __( 'Social Media Menu', 'btwnfriends' ),
		'phone_menu' => __( 'Phone Menu', 'btwnfriends' ),
		'gethelp_menu' => __( 'Mobile Get Help', 'btwnfriends' ),
		'involved_menu' => __( 'Mobile Get Involved', 'btwnfriends' ),
		'programs_menu' => __( 'Mobile Our Programs', 'btwnfriends' ),
		'aboutus_menu' => __( 'Mobile About Us', 'btwnfriends' ),
		
		)
	);

}
add_action( 'after_setup_theme', 'mytheme_setup' );




//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
        return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
    }
add_filter('language_attributes', 'add_opengraph_doctype');
 
//Lets add Open Graph Meta Info
 
function insert_fb_in_head() {
    global $post;
    if ( !is_singular()) //if it is not a post or a page
        return;
        echo '<meta property="fb:admins" content="YOUR USER ID"/>';
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:description" content="' . get_the_excerpt() . '"/>';
        echo '<meta property="og:site_name" content="Between Friends Chicago"/>';
    if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
        $default_image="http://www.betweenfriendschicago.org/wp-content/uploads/2019/03/42876518_1981118575278690_6890802511309963264_n.jpg"; //replace this with a default image on your server or an image in your media library
        echo '<meta property="og:image" content="' . $default_image . '"/>';
    }
    else{
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
    }
    echo "
";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );







add_filter( 'body_class', 'sk_body_class_for_pages' );
function sk_body_class_for_pages( $classes ) {

	if ( is_singular( 'page' ) ) {
		global $post;
		$classes[] = 'page-' . $post->post_name;
	}

	return $classes;

}

//SVG's
function add_file_types_to_uploads($file_types){
$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


//SITE LOGO
add_theme_support( 'custom-logo', array(
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );

function theme_prefix_the_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

}

//WIDGETS 

function bf_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer Menu 1',
		'id'            => 'footer_menu_1',
		'before_widget' => '<div class="footer-menu">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
	register_sidebar( array(
		'name'          => 'Footer Menu 2',
		'id'            => 'footer_menu_2',
		'before_widget' => '<div class="footer-menu">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
	register_sidebar( array(
		'name'          => 'Footer Menu 3',
		'id'            => 'footer_menu_3',
		'before_widget' => '<div class="footer-menu">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
	
	register_sidebar( array(
		'name'          => 'Footer Menu 4',
		'id'            => 'footer_menu_4',
		'before_widget' => '<div class="footer-menu">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
	register_sidebar( array(
		'name'          => 'Footer Menu 5',
		'id'            => 'footer_menu_5',
		'before_widget' => '<div class="footer-menu">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

}
add_action( 'widgets_init', 'bf_widgets_init' );

//SLIDES

 function custom_post_slide() {
  $labels = array(
    'name'               => _x( 'Slides', 'post type general name' ),
    'singular_name'      => _x( 'Slide', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Slide' ),
    'edit_item'          => __( 'Edit Slide' ),
    'new_item'           => __( 'New Slide' ),
    'all_items'          => __( 'All Slides' ),
    'view_item'          => __( 'View Slide' ),
    'search_items'       => __( 'Search Slides' ),
    'not_found'          => __( 'No Slide found' ),
    'not_found_in_trash' => __( 'No Slide found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Home Slides'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our Slide and Slide specific data',
    'public'        => true,
    'menu_position' => 6,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
	'menu_icon' => 'dashicons-format-gallery',
  );
  register_post_type( 'slide', $args ); 
}
add_action( 'init', 'custom_post_slide' );


//BOARD MEMBERS
 function custom_post_board() {
  $labels = array(
    'name'               => _x( 'Board Members', 'post type general name' ),
    'singular_name'      => _x( 'Board Member', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Board Member' ),
    'edit_item'          => __( 'Edit Board Member' ),
    'new_item'           => __( 'New Board Member' ),
    'all_items'          => __( 'All Board Members' ),
    'view_item'          => __( 'View Board Member' ),
    'search_items'       => __( 'Search Board Members' ),
    'not_found'          => __( 'No Board Members found' ),
    'not_found_in_trash' => __( 'No Board Members found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Board Members'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our Board Member and Board Member specific data',
    'public'        => true,
    'menu_position' => 6,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
	'menu_icon' => 'dashicons-groups',
  );
  register_post_type( 'board', $args ); 
}
add_action( 'init', 'custom_post_board' );


//JOBS
 function custom_post_jobs() {
  $labels = array(
    'name'               => _x( 'Jobs', 'post type general name' ),
    'singular_name'      => _x( 'Job', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Job' ),
    'edit_item'          => __( 'Edit Job' ),
    'new_item'           => __( 'New Job' ),
    'all_items'          => __( 'All Jobs' ),
    'view_item'          => __( 'View Job' ),
    'search_items'       => __( 'Search Jobs' ),
    'not_found'          => __( 'No Jobs found' ),
    'not_found_in_trash' => __( 'No Jobs found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Jobs'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our Job and Job specific data',
    'public'        => true,
    'menu_position' => 6,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
	'menu_icon' => 'dashicons-nametag',
  );
  register_post_type( 'jobs', $args ); 
}
add_action( 'init', 'custom_post_jobs' );


//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_employ_hierarchical_taxonomy', 0 );
function create_employ_hierarchical_taxonomy() {
  $labels = array(
    'name' => _x( 'Employment Opportunities', 'taxonomy general name' ),
    'singular_name' => _x( 'Employment Opportunity', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Employment' ),
    'all_items' => __( 'All Employment' ),
    'parent_item' => __( 'Parent Employment' ),
    'parent_item_colon' => __( 'Parent Employment:' ),
    'edit_item' => __( 'Edit Employment' ), 
    'update_item' => __( 'Update Employment' ),
    'add_new_item' => __( 'Add New Employment' ),
    'new_item_name' => __( 'New Employment Name' ),
    'menu_name' => __( 'Employment Opportunities' ),
  );    
 
  register_taxonomy('employment',array('jobs'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'topic' ),
  ));
 
}



function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}