<?php
add_filter('rest_authentication_errors', 'sy_rest_api_accessibility');

function sy_rest_api_accessibility($result)
{
    $allowed_ips = []; // Replace with your allowed IP addresses

    if (!in_array($_SERVER['REMOTE_ADDR'], $allowed_ips)) {
        return new WP_Error('rest_forbidden_ip', 'Your IP address is not allowed to access the REST API.', array('status' => 403));
    }
    return $result;
}
