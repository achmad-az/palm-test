<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Delete all custom post types and metadata
$args = ['post_type' => 'contact_submission', 'numberposts' => -1];
$submissions = get_posts($args);

foreach ($submissions as $submission) {
    wp_delete_post($submission->ID, true);
}