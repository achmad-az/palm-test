<?php

function scp_register_contact_submission_cpt() {
    $labels = [
        'name'               => 'Contact Submissions',
        'singular_name'      => 'Contact Submission',
        'menu_name'          => 'Submissions',
        'name_admin_bar'     => 'Submission',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Submission',
        'new_item'           => 'New Submission',
        'edit_item'          => 'Edit Submission',
        'view_item'          => 'View Submission',
        'all_items'          => 'All Submissions',
        'search_items'       => 'Search Submissions',
        'not_found'          => 'No submissions found.',
        'not_found_in_trash' => 'No submissions found in Trash.',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 25,
        'menu_icon'          => 'dashicons-email-alt',
        'supports'           => ['title'],
        'capability_type'    => 'post',
        'show_in_rest'       => true, // Enable REST API support
    ];

    register_post_type('contact_submission', $args);
}
add_action('init', 'scp_register_contact_submission_cpt');
