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

if ( ! class_exists( 'PALMimagetextblock' ) ) {
    class PALMimagetextblock {

        /**
         * Instance of the object.
         * @static
         * @access public
         * @var null|object
         */
        public static $instance = null;

        /**
         * Access the single instance of this class.
         * @return PALMimagetextblock
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
        }
        public function metabox() {
            $nonce = wp_create_nonce('gns_ajax_nonce');
            Block::make( __( 'Palm Text Image Block' ) )
            ->add_fields( array(
                Field::make( 'text', 'heading', __( 'Block Heading' ) ),
                Field::make( 'rich_text', 'content', __( 'Block Content' ) ),
                Field::make( 'image', 'image', __( 'Block Image' ) ),
            ) )
            ->set_description( __( 'A simple block consisting of a heading, an image and a text content.' ) )
            ->set_category( 'layout' )
            ->set_icon( 'cover-image' )
            ->set_keywords( [ __( 'block' ), __( 'image' ), __( 'hero' ) ] )
            ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
                ?>

            <div class="overflow-hidden bg-[#f0f0f0] py-24 sm:py-32">
                <div class="mx-auto max-w-6xl md:px-6 lg:px-8">
                    <div class="grid grid-cols-1 gap-x-8 gap-y-12 lg:grid-cols-2 lg:items-center">
                        <div class="px-6 lg:px-0 lg:pr-4 lg:pt-4">
                            <div class="flex max-w-2xl pb-8 flex-col justify-start gap-8">
                                <h2 class="text-black lg:text-5xl font-bold font-['Verdana'] uppercase sm:text-4xl"><?php echo esc_html( $fields['heading'] ); ?></h2>
                                <div class="w-[106px] h-[0px] border-2 border-[#d21411]"></div>
                                <div class="text-black text-lg font-normal font-['Verdana']"><?php echo apply_filters( 'the_content', $fields['content'] ); ?></div>
                            </div>
                        </div>
                        <div class="sm:px-6 lg:px-0">
                            <div class="mx-auto max-w-2xl sm:mx-0 sm:max-w-none">
                                <?php echo wp_get_attachment_image( $fields['image'], 'full', false, array( 'class' => 'w-[57rem] max-w-full' ) ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <?php
	        } );
        }

    }
}

PALMimagetextblock::get_instance()->init();