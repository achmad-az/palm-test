<?php 

/*
Template Name: Roll For Updates Page
*/

get_header(); ?>

<main id="content" class="site-content flex-grow flex my-[-1px]">

    <div class="w-full">

	<?php if ( have_posts() ) : ?>

		<?php
		while ( have_posts() ) :
			the_post();
			?>

            <!-- Render the block content -->
            <div class="block-content">
                <?php
                global $post;
                if ($post) {
                    echo do_blocks($post->post_content);
                }
                ?>
                <!-- <div class="bg-[#f0f0f0] flex w-full justify-center contact-form">
                <?php // echo do_shortcode('[contact-form-7 id="930f0fc" title="Contact form 1"]'); ?>
            </div> -->

            <section class="bg-white flex flex-col w-full px-6 pt-8 pb-20 lg:px-8 ">
                <div class="w-full bg-[#f0f0f0] mx-auto form-box max-w-6xl px-8 py-8 lg:px-[160px] lg:py-[52px]">
                    <?php echo do_shortcode('[contact-form-7 id="930f0fc" title="Contact form 1"]'); ?>
                </div>
                </div>
            </section>

		<?php endwhile; ?>

	<?php endif; ?>

<?php
get_footer(); ?>

            
