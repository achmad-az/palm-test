<?php

$page_style = palm_get_theme_style();
$body_class = $page_style === 'dark' ? 'theme-dark' : 'theme-light';
?>
<div class="w-full flex flex-col sm:flex-row justify-start items-center sm:items-end gap-x-6 gap-y-[16px]">
    <a class="block w-full xs:w-fit no-underline" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(get_the_title()); ?>">
        <figure class="post-thumbnail relative bg-[--theme-img-vid-color] place-items-center w-full h-[194px] 2xs:h-[204px] 2xs:w-[362px] xs:h-[254px] xs:w-[448px] sm:h-[108px] sm:w-[194px] md:h-[173px] md:w-[307px]">
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail( 'special-card', [ 'loading' => 'lazy', 'class' => 'object-cover object-center w-full h-full', 'alt' => esc_attr(get_the_title()) ] ); ?>
            <?php endif; ?>
        </figure>
    </a>
    <div class="w-full">
        <span class="typography-body-l text-[--theme-text-scd-color] inline-block w-full mb-4 md:mb-6">
            <?php $cat = palm_get_single_category(get_the_ID()); ?>
            <?php if ($cat): ?>
                <a class="no-underline" href="<?php echo esc_url(get_term_link($cat)); ?>" rel="category tag"><?php echo esc_html($cat->name); ?></a>
            <?php else: ?>
                &nbsp;
            <?php endif; ?>
        </span>
        <h4 class="typography-h4 text-[--theme-text-fth-color] line-clamp-3 min-h-[52px] md:min-h-[74px]">
            <a class="block no-underline" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h4>
    </div>
</div>