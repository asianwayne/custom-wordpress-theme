<?php
function ocdi_import_files() {
	return array(
		array(
			'import_file_name'             => 'Guowen 主题',
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'framework/plugins/demo/gw-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'framework/plugins/demo/gw-content-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'framework/plugins/demo/gw-content-customizer.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'framework/plugins/demo/gw-content-redux.json',
					'option_name' => 'theme_fields',
				),
			),
			'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'your-textdomain' ),
      'import_preview_image_url'     => get_theme_file_uri() . '/framework/plugins/demo/preview_demo.png',
		),
		
	);
}
add_filter( 'ocdi/import_files', 'ocdi_import_files' );