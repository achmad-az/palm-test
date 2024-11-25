<?php

get_header(null, ['header_style' => 'dark']);

?>
<div class="theme-dark bg-[--theme-bg-content-color] w-full">
    <div class="container-content h-full py-12">
		<section class="flex flex-col gap-y-16 sm:gap-y-6 w-full mt-8 max-w-[1077px]">
			<?php if ( have_posts() ):
					while ( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/content', get_post_format() );
					}
					wp_reset_postdata();
					?>
						<div class="flex flex-row gap-12 mt-16 justify-center">
						<div class="nav-previous typography-h6 text-[--theme-text-prm-color]"><?php previous_posts_link( '&laquo; Previous' ); ?></div>
						<div class="nav-next typography-h6 text-[--theme-text-prm-color]"><?php next_posts_link( 'Next &raquo;' ); ?></div>
						</div>
					<?php
				else: ?>
				<p class="text-[--theme-text-content-color] text-center"><?php esc_html_e( 'No posts found.', GNS_TEXT_DOMAIN ); ?></p>
			<?php endif; ?>
		</section>
    </div>
</div>

<?php get_footer(null, ['footer_style' => 'dark']); ?>
