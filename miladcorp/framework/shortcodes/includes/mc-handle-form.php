<?php 

// Add a function to be called when WordPress initializes
add_action('init', 'create_custom_table_on_init');

function create_custom_table_on_init() {
    global $wpdb;

    // Define your table name
    $table_name = $wpdb->prefix . 'mc_contact_form';

    // SQL statement to create the table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id INT NOT NULL AUTO_INCREMENT,
        fullname VARCHAR(100) NOT NULL,
        cf_phone VARCHAR(20) NOT NULL,
        cf_email VARCHAR(100),
        cf_message TEXT,
        submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    )";

    // Execute the SQL query
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}



// Custom class extending WP_List_Table
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

// Custom class extending WP_List_Table
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class Custom_Data_List_Table extends WP_List_Table {

    function __construct() {
        parent::__construct(array(
            'singular' => 'entry',
            'plural' => 'entries',
            'ajax' => false
        ));
    }

    function column_default($item, $column_name) {
        return $item[$column_name];
    }

    function get_columns() {
        return array(
            'id' => 'ID',
            'fullname' => 'Full Name',
            'cf_phone' => 'Phone',
            'cf_email' => 'Email',
            'cf_message' => 'Message',
            'submission_date' => 'Submission Date'
        );
    }

    function prepare_items() {
        global $wpdb;

        $table_name = $wpdb->prefix . 'mc_contact_form';
        $per_page = 100;

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();

        $this->_column_headers = array($columns, $hidden, $sortable);

        $paged = $this->get_pagenum();
        $offset = ($paged - 1) * $per_page;

        $orderby = isset($_GET['orderby']) ? esc_sql($_GET['orderby']) : 'submission_date';
        $order = isset($_GET['order']) ? esc_sql($_GET['order']) : 'DESC';

        // Handle search query
        $search = isset($_REQUEST['s']) ? sanitize_text_field($_REQUEST['s']) : '';

        $where = '';
        if (!empty($search)) {
            $search = '%' . $wpdb->esc_like($search) . '%';
            $where = $wpdb->prepare(" WHERE fullname LIKE %s OR cf_phone LIKE %s OR cf_email LIKE %s OR cf_message LIKE %s", $search, $search, $search, $search);
        }

        $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name" . $where);

        $this->items = $wpdb->get_results("SELECT * FROM $table_name" . $where . " ORDER BY $orderby $order LIMIT $offset, $per_page", ARRAY_A);

        $this->set_pagination_args(array(
            'total_items' => $total_items,
            'per_page' => $per_page,
            'total_pages' => ceil($total_items / $per_page)
        ));
    }
}

function custom_data_admin_page() {
    $myListTable = new Custom_Data_List_Table();
    $myListTable->prepare_items();
    ?>
    <div class="wrap">
        <h2>Custom Data</h2>
        <form method="get">
            <input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>" />
            <?php $myListTable->search_box('Search', 'search_id'); ?>
            <?php $myListTable->display(); ?>
        </form>
    </div>
    <?php
}

function custom_data_menu() {
    add_menu_page('Custom Data', 'Custom Data', 'manage_options', 'custom-data', 'custom_data_admin_page');
}

add_action('admin_menu', 'custom_data_menu');




add_action( 'wp_ajax_mc_submit_form_cb', 'mc_handle_ajax_submit' );

function mc_handle_ajax_submit($request)
{


	//check ajax referre second parameter is the parameter from the $_request 

	check_ajax_referer( 'mc-form-handle', 'nonce' );

	if (isset($_POST['user_verification_code']) && isset($_POST['actual_verification_code'] )) {

		if ($_POST['user_verification_code'] === $_POST['actual_verification_code']) {

			$full_name = sanitize_text_field( $_POST['fullname'] );
			$cf_phone = sanitize_text_field( $_POST['cf_phone'] );
			$cf_email = sanitize_email( $_POST['cf_email'] );
			$cf_message = sanitize_textarea_field( $_POST['cf_message'] );


			global $wpdb; 
			$table_name = $wpdb->prefix . 'mc_contact_form';

			$wpdb->insert($table_name,array(
				'fullname'  => $full_name,
				'cf_phone'  => $cf_phone,
				'cf_email'  => $cf_email,
				'cf_message'  => $cf_message,

			));



			wp_send_json_success( 'Successfully insert the data' );
			
		} else {
			wp_send_json_error('the verification code is error',500);
		}
		
	}
	

	

	//no die then 
	
}

//add_action( 'init', 'mc_custom_form_table' );

function mc_custom_form_table()
{

	global $wpdb; 

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	
}