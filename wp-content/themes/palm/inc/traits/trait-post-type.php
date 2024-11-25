<?php

require_once get_template_directory() . '/inc/constants.php';
require_once get_template_directory() . '/inc/traits/trait-singleton.php';

trait Post_Type_Trait {

    use Singleton_Trait;

    /**
     * The following properties are changed to get_property method as we can't overwrite a property from trait to a class
     * 
     */
    // public $post_type = '';
    // public $post_label_singular = '';
    // public $post_label_plural = '';
    // public $post_menu_icon = '';
    // public $post_taxonomies = [ 'post_tag', 'category' ];
    // public $post_supports = [ 'title', 'editor', 'thumbnail', 'tags', 'custom-fields' ];
    // public $has_archive = true;
    // public $rewrite = array( 'slug' => 'post' );
    // public $menu_position = 12;

    /**
     * Initialize the init
     * 
     * @return void
     */
    public function init() {
        add_action( 'init', [ $this, 'register' ]);
        add_action( 'admin_init', [ $this, 'admin_init' ] );
    }

    /**
     * After admin initialized
     * 
     * @return void
     */
    public function admin_init() {
        add_action( 'save_post_' . $this->get_property( 'post_type' ), [$this, 'save_post'], 10, 3 );
    }

    /**
     * Register Post Type
     * 
     * @return void
     */
    public function register() {
        register_post_type( $this->get_property('post_type') , [
            'labels'=>[
                'name' => __( $this->get_property( 'post_label_plural' ), GNS_TEXT_DOMAIN ),
                'singular_name' => __( $this->get_property( 'post_label_singular' ), GNS_TEXT_DOMAIN ),
                'menu_name' =>__( $this->get_property( 'post_label_plural' ), GNS_TEXT_DOMAIN ),
                'name_admin_bar'        => __( $this->get_property( 'post_label_plural' ), GNS_TEXT_DOMAIN ),
                'archives'              => __( $this->get_property( 'post_label_plural' ) . ' Archives', GNS_TEXT_DOMAIN ),
                'attributes'            => __( $this->get_property( 'post_label_singular' ) . ' Attributes', GNS_TEXT_DOMAIN ),
                'parent_item_colon'     => __( $this->get_property( 'post_label_singular' ) . ' Item:', GNS_TEXT_DOMAIN ),
                'all_items'             => __( 'All ' . $this->get_property( 'post_label_plural' ), GNS_TEXT_DOMAIN ),
                'add_new_item'          => __( 'Add New ' . $this->get_property( 'post_label_singular' ), GNS_TEXT_DOMAIN ),
                'add_new'               => __( 'Add New ' . $this->get_property( 'post_label_singular' ), GNS_TEXT_DOMAIN ),
                'new_item'              => __( 'New ' . $this->get_property( 'post_label_singular' ), GNS_TEXT_DOMAIN ),
                'edit_item'             => __( 'Edit ' . $this->get_property( 'post_label_singular' ), GNS_TEXT_DOMAIN ),
                'update_item'           => __( 'Update ' . $this->get_property( 'post_label_singular' ), GNS_TEXT_DOMAIN ),
                'view_item'             => __( 'View ' . $this->get_property( 'post_label_singular' ), GNS_TEXT_DOMAIN ),
                'view_items'            => __( 'View ' . $this->get_property( 'post_label_plural' ), GNS_TEXT_DOMAIN ),
                'search_items'          => __( 'Search ' . $this->get_property( 'post_label_plural' ), GNS_TEXT_DOMAIN ),
                'not_found'             => __( 'Not found', GNS_TEXT_DOMAIN ),
                'not_found_in_trash'    => __( 'Not found in Trash', GNS_TEXT_DOMAIN ),
                'featured_image'        => __( 'Featured Image', GNS_TEXT_DOMAIN ),
                'set_featured_image'    => __( 'Set featured image', GNS_TEXT_DOMAIN ),
                'remove_featured_image' => __( 'Remove featured image', GNS_TEXT_DOMAIN ),
                'use_featured_image'    => __( 'Use as featured image', GNS_TEXT_DOMAIN ),
                'insert_into_item'      => __( 'Insert into ' . $this->get_property( 'post_label_singular' ), GNS_TEXT_DOMAIN ),
                'uploaded_to_this_item' => __( 'Uploaded to this ' . $this->get_property( 'post_label_singular' ), GNS_TEXT_DOMAIN ),
                'items_list'            => __( $this->get_property( 'post_label_singular' ) . ' list', GNS_TEXT_DOMAIN ),
                'items_list_navigation' => __( $this->get_property( 'post_label_plural' ) . ' list navigation', GNS_TEXT_DOMAIN ),
                'filter_items_list'     => __( 'Filter ' . $this->get_property( 'post_label_plural' ) . ' list', GNS_TEXT_DOMAIN ),
            ],
            'menu_icon'             => $this->get_property( 'post_menu_icon' ),
            'public'                => true,
            'has_archive'           => $this->get_property( 'has_archive' ),
            'hierarchical'          => false,
            'taxonomies'            => $this->get_property( 'post_taxonomies' ),
            'supports'              => $this->get_property( 'post_supports' ),
            'show_in_rest'          => true,
            'menu_position'         => $this->get_property( 'menu_position' ),
            'rewrite'               => $this->get_property( 'rewrite' ),
        ]);
    }

    /**
     * Action hook to trigger upon save post
     * 
     * @return void
     */
    abstract public function save_post($post_id, $post, $update);
}