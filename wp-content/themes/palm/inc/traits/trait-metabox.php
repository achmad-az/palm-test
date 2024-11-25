<?php

require_once get_template_directory() . '/inc/constants.php';

trait Metabox_Trait {

    use Singleton_Trait;

    /**
     * The following properties are changed to get_property method as we can't overwrite a property from trait to a class
     * 
     */
    // public $metabox_id = '';
    // public $metabox_title = '';
    // public $metabox_screen = '';
    // public $metabox_context = '';
   

    /**
     * Initialize the init
     * 
     * @return void
     */
    public function init() {
        add_action( 'add_meta_boxes', [ $this, 'register' ]);
        add_action( 'admin_init', [ $this, 'admin_init' ] );
    }

    /**
     * After admin initialized
     * 
     * @return void
     */
    public function admin_init() {
        $post_types = $this->get_property( 'metabox_screen' );

        if ( is_array( $post_types ) ) {
            foreach ( $post_types as $pt ) {
                add_action( 'save_post_' . $pt, [$this, 'save_post'], 10, 3 );
            }

        } else {
            add_action( 'save_post_' . $post_types, [$this, 'save_post'], 10, 3 );
        }

    }

    /**
     * Register Meta Box
     * 
     * @return void
     */
    public function register() {
        add_meta_box(
            $this->get_property( 'metabox_id' ),
            __( $this->get_property( 'metabox_title' ), GNS_TEXT_DOMAIN ),
            [ $this, 'metabox_content' ],
            $this->get_property( 'metabox_screen' ),
            $this->get_property( 'metabox_context' )
        );
    }

    /**
     * Set the content of the metabox
     * 
     * @return void
     */
    abstract public function metabox_content( $post );

    /**
     * Action hook to trigger upon save post
     * 
     * @return void
     */
    abstract public function save_post( $post_id );
}