<?php

require_once get_template_directory() . '/inc/constants.php';
require_once get_template_directory() . '/inc/traits/trait-singleton.php';

trait Taxonomy_Trait {

    use Singleton_Trait;

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
        add_action( 'saved_' . $this->get_property( 'taxonomy' ), [$this, 'save_taxonomy'], 10, 4 );
    }

    /**
     * Register Post Type
     * 
     * @return void
     */
    public function register() {
        register_taxonomy( $this->get_property('taxonomy') , $this->get_property('post_types'), [
            'labels'=>[
                'name' => __( $this->get_property( 'tax_label_plural' ), GNS_TEXT_DOMAIN ),
                'singular_name' => __( $this->get_property( 'tax_label_singular' ), GNS_TEXT_DOMAIN ),
                'menu_name' =>__( $this->get_property( 'tax_label_plural' ), GNS_TEXT_DOMAIN ),
                'name_admin_bar'        => __( $this->get_property( 'tax_label_plural' ), GNS_TEXT_DOMAIN ),
                'attributes'            => __( $this->get_property( 'tax_label_singular' ) . ' Attributes', GNS_TEXT_DOMAIN ),
                'parent_item'           => __( 'Parent ' . $this->get_property( 'tax_label_singular' ), GNS_TEXT_DOMAIN ),
                'parent_item_colon'     => __( $this->get_property( 'tax_label_singular' ) . ' Item:', GNS_TEXT_DOMAIN ),
                'all_items'             => __( 'All ' . $this->get_property( 'tax_label_plural' ), GNS_TEXT_DOMAIN ),
                'add_new_item'          => __( 'Add New ' . $this->get_property( 'tax_label_singular' ), GNS_TEXT_DOMAIN ),
                'add_new'               => __( 'Add New ' . $this->get_property( 'tax_label_singular' ), GNS_TEXT_DOMAIN ),
                'new_item_name'         => __( 'New ' . $this->get_property( 'tax_label_singular' ), GNS_TEXT_DOMAIN ),
                'edit_item'             => __( 'Edit ' . $this->get_property( 'tax_label_singular' ), GNS_TEXT_DOMAIN ),
                'update_item'           => __( 'Update ' . $this->get_property( 'tax_label_singular' ), GNS_TEXT_DOMAIN ),
                'view_item'             => __( 'View ' . $this->get_property( 'tax_label_singular' ), GNS_TEXT_DOMAIN ),
                'view_items'            => __( 'View ' . $this->get_property( 'tax_label_plural' ), GNS_TEXT_DOMAIN ),
                'search_items'          => __( 'Search ' . $this->get_property( 'tax_label_plural' ), GNS_TEXT_DOMAIN ),
                'not_found'             => __( 'Not found', GNS_TEXT_DOMAIN ),
                'items_list'            => __( $this->get_property( 'tax_label_singular' ) . ' list', GNS_TEXT_DOMAIN ),
                'items_list_navigation' => __( $this->get_property( 'tax_label_plural' ) . ' list navigation', GNS_TEXT_DOMAIN ),
                'filter_items_list'     => __( 'Filter ' . $this->get_property( 'tax_label_plural' ) . ' list', GNS_TEXT_DOMAIN ),
                'back_to_items'         => __( 'Back to ' . $this->get_property( 'tax_label_plural' ), GNS_TEXT_DOMAIN ),

            ],
            'public'                => $this->get_property( 'public' ),
            'hierarchical'          => $this->get_property( 'hierarchical' ),
            'show_in_rest'          => $this->get_property( 'show_in_rest' ),
            'rewrite'               => $this->get_property( 'rewrite' ),
            'show_ui'               => $this->get_property( 'show_ui' ),
            'orderby'               => 'title',
            'order'                 => 'ASC',
            'show_admin_column'     => $this->get_property( 'show_admin_column' ),
            'show_in_nav_menus'     => $this->get_property( 'show_in_nav_menus' ),
            'publicly_queryable'    => $this->get_property( 'publicly_queryable' ),
            'query_var'             => $this->get_property( 'query_var' ),  
            'show_tagcloud'         => $this->get_property( 'show_tagcloud' ),
            'meta_box_cb'           => $this->get_property( 'meta_box_cb' ),
            'capabilities'          => [
                'manage_terms' => 'edit_posts',
                'edit_terms'   => 'edit_posts',
                'delete_terms' => 'edit_posts',
                'assign_terms' => 'edit_posts'
            ]
        ]);
    }

    /**
     * Action hook to trigger upon save post
     * 
     * @return void
     */
    abstract public function save_taxonomy($term_id, $tt_id, $update, $args);
}