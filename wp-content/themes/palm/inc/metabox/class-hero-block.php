<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// use carbon fields
use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * This class intended to metabox in the goblin mode template.
 *
 * @package palm
 */

if ( ! class_exists( 'PALMheroblock' ) ) {
    class PALMheroblock {

        /**
         * Instance of the object.
         * @static
         * @access public
         * @var null|object
         */
        public static $instance = null;

        /**
         * Access the single instance of this class.
         * @return PALMheroblock
         */
        public static function get_instance() {
            if ( null === self::$instance ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Constructor
         * @return void
         */
        private function __construct() {
        }

        /**
         * Initialize the init
         * @return void
         */
        public function init() {
            add_action( 'carbon_fields_register_fields', [$this, 'metabox'] );
            add_action( 'admin_footer', [$this, 'script'] );
            add_filter( 'tiny_mce_before_init',  [$this, 'tinymce_settings'] );
        }
        public function metabox() {
            $nonce = wp_create_nonce('gns_ajax_nonce');
            Block::make( __( 'Palm Hero Block' ) )
            ->add_fields( array(
                Field::make( 'image', 'image', __( 'Block Image' ) ),
                Field::make( 'text', 'heading', __( 'Block Heading' ) ),
                Field::make( 'rich_text', 'content', __( 'Block Content' ) ),
                Field::make( 'text', 'link', __( 'Button Link' ) ),
            ) )
            ->set_description( __( 'A simple block consisting of a heading, an image and a text content.' ) )
            ->set_category( 'layout' )
            ->set_icon( 'cover-image' )
            ->set_keywords( [ __( 'block' ), __( 'image' ), __( 'hero' ) ] )
            ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
                ?>

                <div class="relative isolate overflow-hidden pt-14">
                    <?php echo wp_get_attachment_image( $fields['image'], 'full', false, array( 'class' => 'absolute inset-0 -z-10 h-full w-full object-cover' ) ); ?>
                    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                    </div>
                    <div class="max-w-5xl m-auto">
                        <div class="mx-auto py-32 sm:py-48 lg:py-56">
                            <div class="text-center">
                                <?php if ( ! empty( $fields['heading'] ) ) : ?>
                                <h1 class="text-4xl font-['Verdana'] uppercase tracking-tight text-white sm:text-6xl"><?php echo esc_html( $fields['heading'] ); ?></h1>
                                <?php endif; ?>
                                <?php if ( ! empty( $fields['content'] ) ) : ?>
                                    <div class="hero-description"><?php echo apply_filters( 'the_content', $fields['content'] ); ?></div>
                                <?php endif; ?>
                                <?php if ( ! empty( $fields['link'] ) ) : ?>
                                    <div class="mt-10 flex items-center justify-center gap-x-6">
                                        <a href="<?php echo esc_url( $fields['link'] ); ?>" class="px-8 py-4 border-2 border-[--theme-red] flex-col justify-center items-center inline-flex hover:bg-[--theme-red] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[--theme-red]">
                                            <div class="self-stretch text-center text-white text-base font-['Verdana'] uppercase">Jetz Anfragen</div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <main id="content" class="site-content">

                <?php
	        } );
        }

        public function script() {
            // Add any custom scripts here if needed
        }

        public function tinymce_settings( $settings ) {
            // Customize TinyMCE settings if needed
            return $settings;
        }

    }
}

PALMheroblock::get_instance()->init();