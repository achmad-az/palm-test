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

if ( ! class_exists( 'PALMtestimonialblock' ) ) {
    class PALMtestimonialblock {

        /**
         * Instance of the object.
         * @static
         * @access public
         * @var null|object
         */
        public static $instance = null;

        /**
         * Access the single instance of this class.
         * @return PALMtestimonialblock
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
            Block::make( __( 'Palm Testimonial Block' ) )
            ->add_fields( array(
                Field::make( 'text', 'heading_section', __( 'Heading Section' ) )
                    ->set_required( true ),
                Field::make( 'textarea', 'description_section', __( 'Description Section' ) )
                    ->set_required( true ),
                Field::make( 'complex', 'testimonials', 'Testimonials' )
                    ->set_layout( 'tabbed-horizontal' )
                    ->set_max( 6 )
                    ->add_fields( array(
                        Field::make( 'text', 'name', __( 'Name' ) )
                            ->set_required( true ),
                        Field::make( 'textarea', 'content', __( 'Testimonial Content' ) )
                            ->set_required( true ),
                    ) ),
            ) )
            ->set_description( __( 'A block consisting of multiple testimonials, each with an image, name, and content.' ) )
            ->set_category( 'layout' )
            ->set_icon( 'cover-image' )
            ->set_keywords( [ __( 'block' ), __( 'testimonial' ), __( 'repeater' ) ] )
            ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
                ?>

            <section class="bg-white flex flex-col w-full px-6 py-24 sm:py-32 lg:px-8">
                <div class="w-full">
                    <div class="flex mx-auto w-full lg:max-w-4xl pb-8 flex-col justify-center items-center gap-8 text-center">
                        <h2 class="text-black lg:text-5xl font-bold font-['Verdana'] uppercase sm:text-4xl"><?php echo esc_html( $fields['heading_section'] ); ?></h2>
                        <div class="w-[106px] h-[0px] border-2 border-[#d21411]"></div>
                        <div class="max-w-2xl text-black text-lg font-normal font-['Verdana']"><?php echo esc_html( $fields['description_section'] ); ?></div>
                    </div>
                </div>
                
                <div class="mx-auto w-full lg:max-w-6xl justify-center content-center items-center gap-6 inline-flex overflow-hidden relative" x-data="{ currentSlide: 0, slides: <?php echo count( $fields['testimonials'] ); ?>, itemsPerSlide: 1 }" x-init="itemsPerSlide = window.innerWidth >= 1024 ? 3 : (window.innerWidth >= 768 ? 2 : 1); window.addEventListener('resize', () => { itemsPerSlide = window.innerWidth >= 1024 ? 3 : (window.innerWidth >= 768 ? 2 : 1); })">
                    <div class="flex w-full transition-transform duration-500" :style="{ transform: `translateX(-${currentSlide * (100 / itemsPerSlide)}%)` }">
                        <?php foreach ( $fields['testimonials'] as $testimonial ) : ?>
                            <figure class="flex flex-col mx-auto text-center justify-center items-center py-12 px-10 w-full md:w-1/2 lg:w-1/3 flex-shrink-0">
                                <p class="sr-only">5 out of 5 stars</p>
                                <div class="flex gap-x-1">
                                    <svg width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path id="Vector" d="M21.0716 22.5632L13.3338 17.2245L5.59602 22.5632L8.56701 13.9412L0.833328 8.63655H10.3815L13.3338 0L16.2861 8.63655H25.8333L18.1007 13.9412L21.0716 22.5632Z" fill="#D3A972"/>
                                    </svg>
                                    <svg width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path id="Vector" d="M21.0716 22.5632L13.3338 17.2245L5.59602 22.5632L8.56701 13.9412L0.833328 8.63655H10.3815L13.3338 0L16.2861 8.63655H25.8333L18.1007 13.9412L21.0716 22.5632Z" fill="#D3A972"/>
                                    </svg>
                                    <svg width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path id="Vector" d="M21.0716 22.5632L13.3338 17.2245L5.59602 22.5632L8.56701 13.9412L0.833328 8.63655H10.3815L13.3338 0L16.2861 8.63655H25.8333L18.1007 13.9412L21.0716 22.5632Z" fill="#D3A972"/>
                                    </svg>
                                    <svg width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path id="Vector" d="M21.0716 22.5632L13.3338 17.2245L5.59602 22.5632L8.56701 13.9412L0.833328 8.63655H10.3815L13.3338 0L16.2861 8.63655H25.8333L18.1007 13.9412L21.0716 22.5632Z" fill="#D3A972"/>
                                    </svg>
                                    <svg width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path id="Vector" d="M21.0716 22.5632L13.3338 17.2245L5.59602 22.5632L8.56701 13.9412L0.833328 8.63655H10.3815L13.3338 0L16.2861 8.63655H25.8333L18.1007 13.9412L21.0716 22.5632Z" fill="#D3A972"/>
                                    </svg>
                                </div>
                                <blockquote class="mt-6 text-xl font-semibold leading-8 tracking-tight text-gray-900 sm:text-2xl sm:leading-9">
                                    <div class="text-black text-lg font-normal font-['Verdana']"><?php echo esc_html( $testimonial['content'] ); ?></div>
                                </blockquote>
                                <figcaption class="mt-14 flex items-center gap-x-6">
                                    <div class="text-lg leading-6">
                                        <div class="text-black font-normal font-['Verdana']"><?php echo esc_html( $testimonial['name'] ); ?></div>
                                    </div>
                                </figcaption>
                            </figure>
                        <?php endforeach; ?>
                    </div>
                    <!-- Navigation buttons -->
                    <button @click="currentSlide = (currentSlide > 0) ? currentSlide - 1 : Math.ceil(slides / itemsPerSlide) - 1" class="absolute left-0 top-1/2 transform -translate-y-1/2">
                    <svg width="14" height="25" viewBox="0 0 14 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="Frame" clip-path="url(#clip0_1_303)">
                        <path id="Vector" d="M12.775 23.2816L1.225 12.2816L12.775 1.28162" stroke="black" stroke-width="1.4"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_1_303">
                        <rect width="14" height="24" fill="white" transform="matrix(-1 0 0 1 14 0.281616)"/>
                        </clipPath>
                        </defs>
                    </svg>
                    </button>
                    <button @click="currentSlide = (currentSlide < Math.ceil(slides / itemsPerSlide) - 1) ? currentSlide + 1 : 0" class="absolute right-0 top-1/2 transform -translate-y-1/2">
                    <svg width="14" height="25" viewBox="0 0 14 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="Frame" clip-path="url(#clip0_1_336)">
                        <path id="Vector" d="M1.22498 23.2816L12.775 12.2816L1.22498 1.28162" stroke="black" stroke-width="1.4"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_1_336">
                        <rect width="14" height="24" fill="white" transform="matrix(-1 0 0 1 14 0.281616)"/>
                        </clipPath>
                        </defs>
                    </svg>
                    </button>
                </div>
            </section>
                <?php
            } );
        }

    }
}

PALMtestimonialblock::get_instance()->init();