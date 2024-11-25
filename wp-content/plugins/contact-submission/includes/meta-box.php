<?php

function scp_add_meta_box() {
    add_meta_box(
        'contact_submission_details',
        'Contact Submission Details',
        'scp_render_meta_box',
        'contact_submission',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'scp_add_meta_box');

function scp_render_meta_box($post) {
    // Retrieve existing data
    $name = get_post_meta($post->ID, '_contact_name', true);
    $email = get_post_meta($post->ID, '_contact_email', true);
    $phone = get_post_meta($post->ID, '_contact_phone', true);
    $services = get_post_meta($post->ID, '_contact_services', true);
    $message = get_post_meta($post->ID, '_contact_message', true);

    echo '<label>Name:</label>';
    echo '<input type="text" name="contact_name" value="' . esc_attr($name) . '" style="width: 100%; margin-bottom: 10px;">';

    echo '<label>Email:</label>';
    echo '<input type="email" name="contact_email" value="' . esc_attr($email) . '" style="width: 100%; margin-bottom: 10px;">';

    echo '<label>Phone:</label>';
    echo '<input type="text" name="contact_phone" value="' . esc_attr($phone) . '" style="width: 100%; margin-bottom: 10px;">';

    echo '<label>Services:</label>';
    echo '<select name="contact_services" style="width: 100%; margin-bottom: 10px;">
            <option value="Consultation"' . selected($services, 'Consultation', false) . '>Consultation</option>
            <option value="Installation"' . selected($services, 'Installation', false) . '>Installation</option>
            <option value="Maintenance"' . selected($services, 'Maintenance', false) . '>Maintenance</option>
            <option value="Support"' . selected($services, 'Support', false) . '>Support</option>
          </select>';

    echo '<label>Message:</label>';
    echo '<textarea name="contact_message" rows="5" style="width: 100%;">' . esc_textarea($message) . '</textarea>';
}

function scp_save_meta_box_data($post_id) {
    if (!isset($_POST['scp_meta_box_nonce_field']) || !wp_verify_nonce($_POST['scp_meta_box_nonce_field'], 'scp_meta_box_nonce')) {
        return;
    }

    if (isset($_POST['contact_name'])) {
        update_post_meta($post_id, '_contact_name', sanitize_text_field($_POST['contact_name']));
    }

    if (isset($_POST['contact_email'])) {
        update_post_meta($post_id, '_contact_email', sanitize_email($_POST['contact_email']));
    }

    if (isset($_POST['contact_phone'])) {
        update_post_meta($post_id, '_contact_phone', sanitize_text_field($_POST['contact_phone']));
    }

    if (isset($_POST['contact_services'])) {
        update_post_meta($post_id, '_contact_services', sanitize_text_field($_POST['contact_services']));
    }

    if (isset($_POST['contact_message'])) {
        update_post_meta($post_id, '_contact_message', sanitize_textarea_field($_POST['contact_message']));
    }
}
add_action('save_post', 'scp_save_meta_box_data');
