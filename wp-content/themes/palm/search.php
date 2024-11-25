<?php

get_header(null, ['header_style' => 'dark']);

?>
<div id="search-result" class="theme-dark w-full">
    <section class="content-section bg-[--theme-bg-content-color] h-full">
        <div class="container-content relative py-12">
			<header class="w-full">
				<h1 class="text-[--theme-text-prm-color] typography-h2 tracking-wide mb-[20px]">
					<?php
					printf(
						/* translators: %s: search term. */
						esc_html__( 'Results for "%s"', GNS_TEXT_DOMAIN ),
						'<span class="search-term">' . esc_html( get_search_query() ) . '</span>'
					);
					?>
				</h1>
			</header><!-- .page-header -->

			<div class="search-result-count w-full typography-body-l text-[--theme-text-content-color] mb-[30px]">
				<?php
				printf(
					esc_html(
						/* translators: %d: the number of search results. */
						_n(
							'We found %d result for your search.',
							'We found %d results for your search.',
							(int) $wp_query->found_posts,
							GNS_TEXT_DOMAIN
						)
					),
					(int) $wp_query->found_posts
				);
				?>
			</div><!-- .search-result-count -->

			<div class="search-result-content flex justify-center w-full pt-8 pb-[104px] mx-auto">
				<div class="flex flex-col gap-y-16 sm:gap-y-6 w-full mt-8 max-w-[1077px]">
					<?php if ( have_posts() ):
							while ( have_posts() ) {
								the_post();
								get_template_part( 'template-parts/content', 'search' ); 
							}
							wp_reset_postdata();
							?>
								<div class="flex flex-row gap-12 mt-16 justify-center">
								<div class="nav-previous typography-h6 text-[--theme-text-prm-color]"><?php previous_posts_link( '&laquo; Previous' ); ?></div>
								<div class="nav-next typography-h6 text-[--theme-text-prm-color]"><?php next_posts_link( 'Next &raquo;' ); ?></div>
								</div>
							<?php
						else: ?>
						<p class="text-[--theme-text-content-color] text-center py-12"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', GNS_TEXT_DOMAIN ); ?></p>
					<?php endif; ?>
				</div>
			</div><!-- .search-result-content -->
        </div>
    </section>
</div>

<?php get_footer(null, ['footer_style' => 'dark']); ?>
