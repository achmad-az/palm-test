<?php /* Template Name: Coming Soon */ ?>

<?php

get_header('coming-soon');

$logo_path = '/assets/dist/images/gns_new_logo_on_dark.svg';
$logo_url = get_template_directory() . $logo_path;

$background_img = get_template_directory_uri() . '/assets/dist/images/coming-soon-bg-min.jpg';

?>

<div class="flex-grow flex theme-dark bg-[--theme-bg-color] text-[--theme-text-color] xl:pt-[83px] pt-[46px]">
    <div class="container mx-auto xl:pl-[72px] pl-[15px] pr-[16px] xl:pr-0">
        <div class="flex flex-col xl:flex-row xl:gap-[28px] gap-[40px]">
            <!-- Left side -->
            <div class="lg:w-[522px] z-20">
                <div class="xl:mb-[125px] mb-[55px]">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="[&_svg]:w-[232px] [&_svg]:h-[34px]">
                        <?php
                        echo file_get_contents($logo_url);
                        ?>
                    </a>
                </div>

                <h5 class="font-Verdana font-medium text-grey-700 text-[18px] leading-[25.2px] mb-[27px]">COMING SOON</h5>
                <h1 class="  xl:text-[60px] text-[39px] text-sage font-normal xl:leading-[72px] leading-[46.8px] tracking-normal mb-[28px]">Get Ready to Unlock a World <br class="inline-block xl:inline-block md:hidden sm:hidden" /> of Wonder!</h1>
                <p class="font-Verdana text-[18px] text-grey-500 font-medium leading-[25.2px] tracking-[-0.6px] sm:tracking-normal mb-[26px]">Something magical this way comes. Follow us for updates!</p>
                <div class="pb-[3px] gap-[20.62px] flex [&_svg]:w-[30.38px] [&_svg]:h-[34px] ">
                    <?php
                    $social_sites = array('youtube', 'instagram', 'facebook', 'tiktok');
                    $social_icons = array(
                        'youtube' => 'icon-youtube-light.svg',
                        'instagram' => 'icon-instagram-light.svg',
                        'facebook' => 'icon-facebook-light.svg',
                        'tiktok' => 'icon-tiktok-light.svg',
                    );
                    foreach ($social_sites as $social_site) {
                        $icon_path = get_template_directory() . '/assets/dist/images/' . $social_icons[$social_site];
                        $url = get_theme_mod("palm_social_{$social_site}_url");
                        echo '<a href="' . esc_url($url) . '" target="_blank" class="flex items-end">' . file_get_contents($icon_path) . '</a>';
                    }
                    ?>
                </div>
            </div>
            <!-- Right side -->
            <div class="relative">
                <div class="absolute w-full h-full shadow-coming-soon-img z-10"></div>
                <img class="w-full max-w-[818px]" src="<?php echo esc_url($background_img); ?>" alt="Coming Soon">
            </div>
        </div>
    </div>
</div>

<!-- <h1>Coming Soon</h1> -->

<?php get_footer('coming-soon'); ?>