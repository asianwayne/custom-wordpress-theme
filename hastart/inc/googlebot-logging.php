<?php
/**
 * 记录谷歌蜘蛛爬行历史
 */

global $wpdb;

// Create the table if it doesn't exist
$table_name = $wpdb->prefix . 'googlebot_logs';
$charset_collate = $wpdb->get_charset_collate();
$sql = "CREATE TABLE IF NOT EXISTS $table_name (
  id bigint(20) NOT NULL AUTO_INCREMENT,
  time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  url varchar(255) DEFAULT '' NOT NULL,
  ip varchar(255) DEFAULT '' NOT NULL,
  PRIMARY KEY  (id)
) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

// Log the Googlebot's request
function googlebot_logging() {
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'Googlebot') !== false) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'googlebot_logs';
        $url = $_SERVER['REQUEST_URI'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $wpdb->insert(
            $table_name,
            array(
                'time' => current_time( 'mysql' ),
                'url' => $url,
                'ip' => $ip,
            )
        );
    }
}
add_action('wp', 'googlebot_logging');
?>