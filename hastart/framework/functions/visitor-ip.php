<?php 
/**
 * Plugin to record visitor ip and display in the admin page use wp list table 
 */

//first add the table when theme activate 

add_action( 'after_switch_theme', 'my_theme_activation' );


function create_my_table_on_theme_activation() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'visitor_ips'; // Replace "visitor_ips" with the name of the new table
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE $table_name (
      id INT NOT NULL AUTO_INCREMENT,
      ip VARCHAR(45) NOT NULL,
      browser VARCHAR(255) NOT NULL,
      route VARCHAR(255) NOT NULL,
      time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY  (id)
    ) $charset_collate;";
    
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}


function my_theme_activation() {
    
    create_my_table_on_theme_activation();
}


add_action('wp_head', 'record_visitor_ip');


function record_visitor_ip() {
  // Validate and sanitize the user agent and IP address variables
  $user_agent = filter_input(INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_SANITIZE_STRING);
  $page_route = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);

  $protocol = !empty($_SERVER['HTTPS']) ? 'https' : 'http';
  $page_route = $protocol . "://$_SERVER[HTTP_HOST]$page_route";
  $page_route = urldecode($page_route);
  $visitor_ip = filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP);

  if (!$user_agent || !$visitor_ip || !$page_route) {
    // Invalid input, do nothing
    return;
  }

  global $wpdb;
  $table_name = $wpdb->prefix . 'visitor_ips'; // Replace "visitor_ips" with the name of the new table

  // Check if the visitor IP already exists in the table and if it was created less than an hour ago
  // 下面是不记录一小时内访问过的ip， 勿删  勿删勿删勿删勿删
  // $query = $wpdb->prepare("SELECT id FROM $table_name WHERE ip = %s AND time > DATE_SUB(NOW(), INTERVAL 1 HOUR)", $visitor_ip);
  // $result = $wpdb->get_var($query);

  // if (!$result) {
  //   // Insert the visitor info into the table
  //   $data = array(
  //     'ip' => $visitor_ip,
  //     'browser' => $user_agent,
  //     'route'  => $page_route,
  //     'time' => current_time('mysql')
  //   );

  //   $wpdb->insert($table_name, $data);
  // }

  //下面是不带ip是否存在验证，是ip就直接插入到数据库。 数据库很容易爆
  
  $data = array(
      'ip' => $visitor_ip,
      'browser' => $user_agent,
      'route'  => $page_route,
      'time' => current_time('mysql')
    );

    $wpdb->insert($table_name, $data);


}

//注册admin menu page 

function record_visitor_ips_page() {
  add_menu_page(
    'Visitor IPs',
    '访客IP',
    'manage_options',
    'record-visitor-ips',
    'display_visitor_ips_record_page',
    'dashicons-admin-generic',
    30
  );
}
add_action('admin_menu', 'record_visitor_ips_page');

 //初始化wp list table 添加数据表信息
//添加wp list class 父系table 
// Include the WP_List_Table class
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class Record_Visitor_IP_List_Table extends WP_List_Table {

  function __construct() {
    parent::__construct( array(
      'singular' => 'visitor',
      'plural' => 'visitors',
      'ajax' => false
    ) );
  }

  function column_default( $item, $column_name ) {
  switch( $column_name ) {
    case 'id' :
    case 'ip':
    case 'browser':
      return $item[ $column_name ];
    case 'route':
      return '<a href="' . esc_url( $item['route'] ) . '">' . esc_html( $item['route'] ) . '</a>';
    case 'time':
      return $item[ $column_name ];
    default:
      return print_r( $item, true );
  }
}


  function get_columns() {
    $columns = array(
      'cb' => '<input type="checkbox" />',
      'id'         => 'ID',
      'ip' => 'IP Address',
      'browser' => 'Browser',
      'route'  => 'Route',
      'time' => 'Visit Time'
    );
    return $columns;
  }

  function prepare_items() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'visitor_ips'; // Replace "visitor_ips" with the name of the new table

    $per_page = 20; // Number of records per page

    $columns = $this->get_columns();
    $hidden = array();
    $sortable = $this->get_sortable_columns();

    $this->_column_headers = array( $columns, $hidden, $sortable );

    $current_page = $this->get_pagenum();


    //按最新时间排序
    $orderby = ( isset( $_REQUEST['orderby'] ) ) ? $_REQUEST['orderby'] : 'time';
    $order = ( isset( $_REQUEST['order'] ) ) ? $_REQUEST['order'] : 'DESC';

    $offset = ( $current_page - 1 ) * $per_page;

    $total_items = $wpdb->get_var( "SELECT COUNT(id) FROM $table_name" );

    $search_query = ( isset( $_REQUEST['s'] ) ) ? $_REQUEST['s'] : '';


        $where = '';

        if ( ! empty( $search_query ) ) {
            $where = "WHERE id LIKE '%$search_query%' OR ip LIKE '%$search_query%' OR browser LIKE '%$search_query%' OR time LIKE '%$search_query%' OR route LIKE '%$search_query%'";
        }

    $data = $wpdb->get_results( "SELECT * FROM $table_name $where ORDER BY $orderby $order LIMIT $per_page OFFSET $offset", ARRAY_A );

    $this->items = $data;

    $this->set_pagination_args( array(
      'total_items' => $total_items,
      'per_page' => $per_page,
      'total_pages' => ceil( $total_items / $per_page )
    ) );
  }

  function get_sortable_columns() {
    $sortable_columns = array(
      'id'  => 'id',
      'ip' => array( 'ip', true ),
      'browser' => array( 'browser', true ),
      'route'  => array('route',true),
      'time' => array( 'time', true )
    );
    return $sortable_columns;
  }

public function column_cb( $item ) {
        return sprintf(
            '<input type="checkbox" name="submission[]" value="%s" />', absint( $item['id'] )
        );
    }


}

//调出wp list table 
function display_visitor_ips_record_page() {
 

  $table = new Record_Visitor_IP_List_Table();
  $table->prepare_items();
    

?>

  <div class="wrap">
    <h2>访客信息记录</h2>
    <?php 
    echo '<form method="post">';
  $table->search_box( '搜索', 'ha_submission_search' );
  echo '</form>';
    $table->display(); ?>
  </div>
<?php
}

