<?php get_header(); ?>

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
            </div>

		<?php endwhile; ?>

	<?php endif; ?>

<?php
get_footer(); ?>

            
