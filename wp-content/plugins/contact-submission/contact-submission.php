<?php
/**
 * Plugin Name: Contact Submission
 * Description: A simple plugin to handle contact submissions using a custom post type.
 * Version: 1.0
 * Author: Achmad Az
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    exit;
}

// Include required files
require_once plugin_dir_path(__FILE__) . 'includes/cpt-registration.php';
require_once plugin_dir_path(__FILE__) . 'includes/meta-box.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin-page.php';

// Hook into Contact Form 7 submission
add_action('wpcf7_before_send_mail', 'scp_save_cf7_submission');

function scp_save_cf7_submission($contact_form) {
    // Get form submission data
    $submission = WPCF7_Submission::get_instance();
    if (!$submission) {
        return;
    }

    $data = $submission->get_posted_data();

    // Extract fields
    $name = isset($data['your-name']) ? sanitize_text_field($data['your-name']) : '';
    $email = isset($data['your-email']) ? sanitize_email($data['your-email']) : '';
    $phone = isset($data['your-phone']) ? sanitize_text_field($data['your-phone']) : '';
    $services = isset($data['your-services']) ? sanitize_text_field($data['your-services']) : '';
    $message = isset($data['your-message']) ? sanitize_textarea_field($data['your-message']) : '';

    // Create a new Contact Submission post
    $post_id = wp_insert_post([
        'post_title'  => 'Submission from ' . $name,
        'post_type'   => 'contact_submission',
        'post_status' => 'publish',
    ]);

    // Add meta data to the post
    if ($post_id) {
        update_post_meta($post_id, '_contact_name', $name);
        update_post_meta($post_id, '_contact_email', $email);
        update_post_meta($post_id, '_contact_phone', $phone);
        update_post_meta($post_id, '_contact_services', $services);
        update_post_meta($post_id, '_contact_message', $message);
    }
}

// Register uninstall hook
register_uninstall_hook(__FILE__, 'scp_uninstall');