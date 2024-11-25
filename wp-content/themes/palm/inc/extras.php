<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * This file intended to be use only for defining global functions that will be utilized on 
 * template files such as page-about-us.php, footer.php, etc.
 * 
 * 
 */



/**
 * Get value of theme style from post meta
 * 
 * @return String
 */
function palm_get_theme_style( $name = null ) {

    $key = '';

    switch ($name) {
        case 'header':
            $key = GNS_Metabox_Theme_Style_Class::$meta_header_style_label;
          break;
        case 'footer':
            $key = GNS_Metabox_Theme_Style_Class::$meta_footer_style_label;
          break;
        default: // page
            $key = GNS_Metabox_Theme_Style_Class::$meta_page_style_label;
      }
    

   return get_post_meta(get_the_ID(), $key, true);
}

function get_main_class( $css_class ) {

	$classes = array();

	$classes[] = 'main';

	if ( ! empty( $css_class ) ) {
		if ( ! is_array( $css_class ) ) {
			$css_class = preg_split( '#\s+#', $css_class );
		}
		$classes = array_merge( $classes, $css_class );
	} else {
		// Ensure that we always coerce class to being an array.
		$css_class = array();
	}

	/**
	 * Filters the list of CSS body class names for the current post or page.
	 *
	 * @since 2.8.0
	 *
	 * @param string[] $classes   An array of body class names.
	 * @param string[] $css_class An array of additional class names added to the body.
	 */
	$classes = apply_filters( 'main_class', $classes, $css_class );

	return array_unique( $classes );

}

function main_class( $css_class = '' ) {
	// Separates class names with a single space, collates class names for body element.
	echo 'class="' . esc_attr( implode( ' ', get_main_class( $css_class ) ) ) . '"';
}

/**
 * Determine whether it is an AMP response.
 *
 * @return bool Is AMP response.
 */
function is_amp_page()
{
	if (function_exists('amp_is_request')) {
		return amp_is_request();
	} else if (function_exists('is_amp_endpoint')) {
		return is_amp_endpoint();
	}
	return false;
}

/**
 * Get single category from post id
 * 
 * @return WP_Term
 */
function palm_get_single_category( $post_id = null ) {

  $categories = get_the_category($post_id);

  if (!empty($categories)) return $categories[0];

   return null;
}

/**
 * Get array category ids from post id
 * 
 * @return Array
 */
function palm_get_categories_ids( $post_id = null ) {

  $cat = [];

  $categories = get_the_category($post_id);

  foreach($categories as $category) {
      $cat[] = $category->term_id;
  }

   return $cat;
}

/**
 * Check whether a page is in goblin mode
 * 
 * @return boolean
 */
function palm_is_goblin_mode( $post = null ) {
  if (!$post)  {
    global $post;
  }
  $post_id = ($post) ? $post->ID : 0;
  $post_template = get_post_meta( $post_id, '_wp_page_template', true );

  if (has_category(['goblin-mode', 'Goblin Mode'], $post)) return true;
  
  if ($post_template == 'page-goblin-mode.php') return true;

  return false;
}

/**
 * check whether a page is goblin mode landing page
 * 
 * @return boolean
 */
function palm_is_goblin_mode_landing_page() {
  global $post;

  $post_id = ($post) ? $post->ID : 0;
  $post_template = get_post_meta( $post_id, '_wp_page_template', true );
  
  if ($post_template == 'page-goblin-mode.php') return true;

  return false;
}

/**
 * Convert url string into clickable link
 *
 * @return string.
 */
function palm_autolink($content) {
  $content = preg_replace('/\b(https?|ftp):\/\/[^\s<]+/', '<a target="_blank" class="!text-[--theme-text-link-color]" rel="noopener noreferrer" href="$0">$0</a>', $content);

  return $content;
}

/**
 * Get social media data
 *
 * @return array.
 */
function palm_social_media($page_style, $force_style_dark = false, $shared_url = null) {
  if ($force_style_dark) {
    $page_style = 'dark';
  }
  $social_icons = [
      'youtube' => [
          'url_social' => get_theme_mod("palm_social_youtube_url"),
          'label_social' => 'Watch our YouTube channel',
          'icon' => ($page_style === 'dark') ? 'icon-youtube-light.svg' : 'icon-youtube.svg',
          'icon_path' => ($page_style === 'dark') ? get_template_directory() . '/assets/dist/images/icon-youtube-light.svg' : get_template_directory() . '/assets/dist/images/icon-youtube.svg',
          'icon_url' => ($page_style === 'dark') ? get_template_directory_uri() . '/assets/dist/images/icon-youtube-light.svg' : get_template_directory_uri() . '/assets/dist/images/icon-youtube.svg',
          'url_share' => '',
          'label_share' => 'Share on YouTube',
      ],
      'instagram' => [
          'url_social' => get_theme_mod("palm_social_instagram_url"),
          'label_social' => 'Follow us on Instagram',
          'icon' => ($page_style === 'dark') ? 'icon-instagram-light.svg' : 'icon-instagram.svg',
          'icon_path' => ($page_style === 'dark') ? get_template_directory() . '/assets/dist/images/icon-instagram-light.svg' : get_template_directory() . '/assets/dist/images/icon-instagram.svg',
          'icon_url' => ($page_style === 'dark') ? get_template_directory_uri() . '/assets/dist/images/icon-instagram-light.svg' : get_template_directory_uri() . '/assets/dist/images/icon-instagram.svg',
          'url_share' => '',
          'label_share' => 'Share on Instagram',
      ],
      'facebook' => [
          'url_social' => get_theme_mod("palm_social_facebook_url"),
          'label_social' => 'Follow us on Facebook',
          'icon' => ($page_style === 'dark') ? 'icon-facebook-light.svg' : 'icon-facebook.svg',
          'icon_path' => ($page_style === 'dark') ? get_template_directory() . '/assets/dist/images/icon-facebook-light.svg' : get_template_directory() . '/assets/dist/images/icon-facebook.svg',
          'icon_url' => ($page_style === 'dark') ? get_template_directory_uri() . '/assets/dist/images/icon-facebook-light.svg' : get_template_directory_uri() . '/assets/dist/images/icon-facebook.svg',
          'url_share' => 'https://www.facebook.com/sharer/sharer.php?u='. $shared_url,
          'label_share' => 'Share on Facebook',
      ],
      'tiktok' => [
          'url_social' => get_theme_mod("palm_social_tiktok_url"),
          'label_social' => 'Follow us on TikTok',
          'icon' => ($page_style === 'dark') ? 'icon-tiktok-light.svg' : 'icon-tiktok.svg',
          'icon_path' => ($page_style === 'dark') ? get_template_directory() . '/assets/dist/images/icon-tiktok-light.svg' : get_template_directory() . '/assets/dist/images/icon-tiktok.svg',
          'icon_url' => ($page_style === 'dark') ? get_template_directory_uri() . '/assets/dist/images/icon-tiktok-light.svg' : get_template_directory_uri() . '/assets/dist/images/icon-tiktok.svg',
          'url_share' => '',
          'label_share' => 'Share on TikTok',
      ],
  ];

  return $social_icons;
}

/**
 * Check remote image exist
 *
 * @return boolean
 */
function palm_image_exists($url) {
    $headers = @get_headers($url);
    
    if ($headers && strpos($headers[0], '200') !== false) {
        return true;
    } else {
        return false;
    }
}

/**
 * Hide tags from quick edit if user does not have admin priviledges
 */
function palm_hide_playlist_from_quick_edit( $show_in_quick_edit, $taxonomy_name, $post_type ) {
    if ( GNS_TAXONOMY_PLAYLIST === $taxonomy_name ) {
        return false;
    } else {
        return $show_in_quick_edit;
    }
}
add_filter( 'quick_edit_show_taxonomy', 'palm_hide_playlist_from_quick_edit', 10, 3 );