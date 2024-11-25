<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/dist/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/dist/images/favicon/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/dist/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/dist/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/dist/images/favicon/site.webmanifest">
    <!-- end favicon -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php do_action('palm_site_before'); ?>
    <div id="page" class="<?php if (is_user_logged_in()): ?> min-h-[calc(100vh-32px)] <?php else: ?> min-h-screen <?php endif; ?> flex flex-col">
        <?php do_action('palm_header'); ?>
        <div class="bg-gray-900">
            <header class="absolute inset-x-0 top-0 z-50" x-data="{ open: false }">
                <!-- Mobile menu, show/hide based on menu open state. -->
                <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-full" x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform translate-x-0" x-transition:leave-end="opacity-0 transform translate-x-full" class="lg:hidden h-screen" role="dialog" aria-modal="true">
                    <!-- Background backdrop, show/hide based on slide-over state. -->
                    <div class="fixed inset-0 z-50"></div>
                    <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-[#f0f0f0] px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-white/10">
                        <div class="flex items-center justify-between">
                            <?php if (has_custom_logo()) : ?>
                                <?php the_custom_logo(); ?>
                            <?php else : ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="-m-1.5 p-1.5">
                                    <img class="h-8 w-auto" src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/logo.svg" alt="<?php bloginfo('name'); ?>">
                                </a>
                            <?php endif; ?>
                            <button type="button" @click="open = false" class="-m-2.5 rounded-md p-2.5 text-gray-400">
                                <span class="sr-only">Close menu</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="mt-6 flow-root">
                            <div class="-my-6 divide-y divide-gray-500/25">
                                <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary',
                                        'menu_id'        => 'primary-menu',
                                        'container'      => false,
                                        'menu_class'     => 'space-y-2 py-6',
                                        'link_before'    => '<a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-black hover:text-white hover:bg-black">',
                                        'link_after'     => '</a>',
                                    ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Mobile menu, show/hide based on menu open state. -->
                <div class="max-w-6xl m-auto">
                    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                        <div class="flex lg:flex-1">
                            <?php if (has_custom_logo()) : ?>
                                <?php the_custom_logo(); ?>
                            <?php else : ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="-m-1.5 p-1.5">
                                    <img class="h-8 w-auto" src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/logo.svg" alt="<?php bloginfo('name'); ?>">
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="flex lg:hidden">
                            <button type="button" @click="open = !open" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400">
                                <span class="sr-only">Open main menu</span>
                                <svg x-show="!open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                                <svg x-show="open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                            <div class="hidden lg:flex lg:gap-x-12 items-center mr-8">
                                <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary',
                                        'menu_id'        => 'primary-menu',
                                        'container'      => false,
                                        'menu_class'     => 'flex space-x-12',
                                        'link_before'    => '<a href="#" class="text-sm font-semibold leading-6 text-white">',
                                        'link_after'     => '</a>',
                                    ));
                                ?>
                            </div>
                            <a href="#" class="px-8 py-4 border-2 border-[--theme-red] flex-col justify-center items-center inline-flex hover:bg-[--theme-red] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[--theme-red]">
                                <div class="self-stretch text-center text-white text-base font-['Verdana'] uppercase">Jetz Anfragen</div>
                            </a>
                        </div>
                    </nav>
                </div>
                
            </header>

            