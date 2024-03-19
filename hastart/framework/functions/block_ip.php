<?php 
function block_visitors_by_ip() {
    
    $blocked_ips = ha_get_option('disallow_ips'); // Replace with the IP address you want to block.
    if (in_array($_SERVER['REMOTE_ADDR'], $blocked_ips)) {
        header("HTTP/1.1 403 Forbidden");
        exit();
    }
}
add_action('init', 'block_visitors_by_ip');