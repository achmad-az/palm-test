<?php

get_header(null, ['header_style' => 'dark']);

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$category = get_queried_object();
$name = ($category) ? $category->name : '';
$args = array(
    'cat' => ($category) ? $category->term_id : 0,
    'posts_per_page' => 10,
    'post_status' => 'publish',
    'post_type' => [GNS_POST_TYPE_ARTICLE, GNS_POST_TYPE_VIDEO],
    'paged' => $paged,
);
$query = new WP_Query($args);

?>
<div id="cat-archives" class="theme-dark w-full">
    <section class="content-section bg-[--theme-bg-content-color] h-full">
        <div class="container-content relative py-12">
			<header class="w-full">
				<h1 class="text-[--theme-text-prm-color] typography-h2 tracking-wide mb-[20px]">
					<?php
					printf(
						esc_html__( 'Topic: %s', GNS_TEXT_DOMAIN ),
						'<span class="cat-term">' . esc_html( $name ) . '</span>'
					);
					?>
				</h1>
			</header><!-- .page-header -->

			<div class="cat-archives-content flex justify-center w-full pt-8 pb-[104px] mx-auto">
				<div class="flex flex-col gap-y-16 sm:gap-y-6 w-full mt-8 max-w-[1077px]">
					<?php if ( $query->have_posts() ):
							while ( $query->have_posts() ) {
								$query->the_post();
								get_template_part( 'template-parts/content', 'category' ); 
							}
							wp_reset_postdata();
						else: ?>
							<p class="text-[--theme-text-content-color] text-center"><?php esc_html_e( 'No posts found.', GNS_TEXT_DOMAIN ); ?></p>
					<?php endif; ?>
				</div>
			</div>
        </div>
    </section>
</div>

<?php get_footer(null, ['footer_style' => 'dark']); ?>