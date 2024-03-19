<?php 
/**
 * One Click Demo Import custom config file 
 * First you need install one click demo import plugin
 * 
 */

//register plugins 
//add_filter( 'ocdi/register_plugins', 'hanav_register_plugins' );

function hanav_register_plugins( $plugins ) {
  // $theme_plugins = [
  //   [ // A WordPress.org plugin repository example.
  //     'name'     => 'Advanced Custom Fields', // Name of the plugin.
  //     'slug'     => 'advanced-custom-fields', // Plugin slug - the same as on WordPress.org plugin repository.
  //     'required' => true,                     // If the plugin is required or not.
  //   ],
    // [ // A locally theme bundled plugin example.
    //   'name'     => 'Some Bundled Plugin',
    //   'slug'     => 'bundled-plugin',         // The slug has to match the extracted folder from the zip.
    //   'source'   => get_template_directory_uri() . '/bundled-plugins/bundled-plugin.zip',
    //   'required' => false,
    // ],
    // [
    //   'name'        => 'Self Hosted Plugin',
    //   'description' => 'This is the plugin description',
    //   'slug'        => 'self-hosted-plugin',  // The slug has to match the extracted folder from the zip.
    //   'source'      => 'https://example.com/my-site/self-hosted-plugin.zip',
    //   'preselected' => true,
    // ],

 
  return array_merge( $plugins, $theme_plugins );
}

function ocdi_import_files() {
  return array(
    array(
      'import_file_name'             => 'Haapp Demo',
      'local_import_file'            => trailingslashit( get_template_directory() ) . '/framework/plugins/demos/context.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/framework/plugins/demos/widgets.wie',
      

      'local_import_redux'           => array(
        array(
          'file_path'   => trailingslashit( get_template_directory() ) . '/framework/plugins/demos/redux_options.json',
          'option_name' => 'theme_options',
        ),
      ),
      
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'your-textdomain' ),
      
    ),
  );
}
add_filter( 'ocdi/import_files', 'ocdi_import_files' );