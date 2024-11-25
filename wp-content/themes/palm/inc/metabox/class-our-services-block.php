<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// use carbon fields
use Carbon_Fields\Container;
use Carbon_Fields\Block;
use Carbon_Fields\Field;

/**
 * This class intended to metabox in the goblin mode template.
 *
 * @package palm
 */

if ( ! class_exists( 'PALMourservicesblock' ) ) {
    class PALMourservicesblock {

        /**
         * Instance of the object.
         * @static
         * @access public
         * @var null|object
         */
        public static $instance = null;

        /**
         * Access the single instance of this class.
         * @return PALMourservicesblock
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
            Block::make( __( 'Palm Our Services Block' ) )
            ->add_fields( array(
                Field::make( 'text', 'heading_section', __( 'Heading Section' ) ),
                Field::make( 'textarea', 'description_section', __( 'Description Section' ) ),
                Field::make( 'complex', 'our_services', 'Our Services' )
                    ->set_layout( 'tabbed-horizontal' )
                    ->set_max( 5 )
                    ->add_fields( array(
                        Field::make( 'image', 'image', __( 'Service Image' ) ),
                        Field::make( 'text', 'heading', __( 'Service Heading' ) ),
                        Field::make( 'textarea', 'content', __( 'Service Content' ) ),
                    ) ),
                Field::make( 'text', 'link', __( 'Button Link' ) ),
            ) )
            ->set_description( __( 'A block consisting of multiple services, each with an image, heading, and content.' ) )
            ->set_category( 'layout' )
            ->set_icon( 'cover-image' )
            ->set_keywords( [ __( 'block' ), __( 'services' ), __( 'repeater' ) ] )
            ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
                ?>

            <div class="bg-white w-full py-24 sm:py-32">
                <div class="mx-auto max-w-6xl px-6 lg:px-8">
                    <div class="flex mx-auto max-w-2xl pb-8 flex-col justify-center items-center gap-8 text-center">
                        <h2 class="text-black lg:text-5xl font-bold font-['Verdana'] uppercase sm:text-4xl"> <?php echo esc_html( $fields['heading_section'] ); ?>
                        </h2>
                        <div class="w-[106px] h-[0px] border-2 border-[#d21411]"></div>
                        <div class="text-black text-lg font-normal font-['Verdana']"><?php echo esc_html( $fields['description_section'] ); ?></div>
                    </div>
                    <div class="mx-auto mt-6 max-w-2xl lg:max-w-none">
                        <dl class="grid max-w-xl grid-cols-1 gap-8 lg:max-w-none lg:grid-cols-3">
                            <?php foreach ( $fields['our_services'] as $service ) : ?>
                            <div class="flex flex-col p-8 border border-[#d2d2d2]">
                                <dt class="text-base font-semibold leading-7 text-gray-900">
                                    <div class="mb-6 flex h-20 w-20 items-center justify-center">
                                        <?php echo wp_get_attachment_image( $service['image'], 'thumbnail', false, array( 'class' => 'text-white' ) ); ?>
                                    </div>
                                    <div class="text-black text-sm font-bold font-['Verdana'] uppercase">
                                        <?php echo esc_html( $service['heading'] ); ?></div>
                                </dt>
                                <dd class="mt-1 flex flex-auto flex-col text-base leading-7 text-gray-600">
                                    <p class="flex-auto text-black text-xs font-normal font-['Verdana']">
                                        <?php echo esc_html( $service['content'] ); ?></p>
                                </dd>
                            </div>
                            <?php endforeach; ?>
                            <?php if ( ! empty( $fields['link'] ) ) : ?>
                            <div class="flex flex-col p-8 border border-[#d2d2d2] content-center">
                                <div class="my-auto">
                                    <dt class="text-black text-[22px] font-bold font-['Verdana'] uppercase">
                                        Lorem ipsum
                                    </dt>
                                    <dd class="mt-1 flex flex-auto flex-col text-base leading-7 text-gray-600">
                                        <a href="<?php echo esc_url( $fields['link'] ); ?>"
                                            class="text-black text-sm font-bold font-['Verdana'] uppercase">Jetz
                                            Anfragen ></span></a>
                                        </p>
                                    </dd>
                                </div>
                            </div>
                            <?php endif; ?>
                        </dl>
                    </div>
                </div>
            </div>

                <?php
	        } );
        }

    }
}

PALMourservicesblock::get_instance()->init();