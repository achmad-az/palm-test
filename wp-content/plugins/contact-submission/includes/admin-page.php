<?php

function scp_add_admin_menu() {
    add_menu_page(
        'Add Submissions',
        'List Submissions',
        'manage_options',
        'contact-submissions',
        'scp_render_admin_page',
        'dashicons-email-alt',
        26
    );
}
add_action('admin_menu', 'scp_add_admin_menu');

function scp_render_admin_page() {
    $paged = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
    $args = [
        'post_type'      => 'contact_submission',
        'posts_per_page' => 20,
        'paged'          => $paged,
    ];
    $query = new WP_Query($args);

    echo '<div class="wrap">';
    echo '<h1>Contact Submissions</h1>';
    echo '<table class="widefat fixed" cellspacing="0">';
    echo '<thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Services</th><th>Message</th></tr></thead>';
    echo '<tbody>';

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $name = get_post_meta(get_the_ID(), '_contact_name', true);
            $email = get_post_meta(get_the_ID(), '_contact_email', true);
            $phone = get_post_meta(get_the_ID(), '_contact_phone', true);
            $services = get_post_meta(get_the_ID(), '_contact_services', true);
            $message = get_post_meta(get_the_ID(), '_contact_message', true);
        
            echo '<tr>';
            echo '<td>' . esc_html($name) . '</td>';
            echo '<td>' . esc_html($email) . '</td>';
            echo '<td>' . esc_html($phone) . '</td>';
            echo '<td>' . esc_html($services) . '</td>';
            echo '<td>' . esc_html($message) . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="5">No submissions found.</td></tr>';
    }

    echo '</tbody></table>';

    // Pagination links
    $big = 999999999; // A large number for pagination links
    echo paginate_links([
        'base'    => str_replace($big, '%#%', esc_url(add_query_arg('paged', '%#%'))),
        'format'  => '?paged=%#%',
        'current' => max(1, $paged),
        'total'   => $query->max_num_pages,
    ]);

    echo '</div>';
    wp_reset_postdata();
}