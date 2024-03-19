<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'theme_options';  // YOU MUST CHANGE THIS.  DO NOT USE 'redux_demo' IN YOUR PROJECT!!!

// Uncomment to disable demo mode.
/* Redux::disable_demo(); */  // phpcs:ignore Squiz.PHP.CommentedOutCode

$dir = dirname( __FILE__ ) . DIRECTORY_SEPARATOR;

/*
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 */

// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
	'code'   => array(),
);

/*
 * ---> BEGIN ARGUMENTS
 */

/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL -> Change these values as you need/desire.
$args = array(
	// This is where your data is stored in the database and also becomes your global variable name.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,

	// The text to appear in the admin menu.
	'menu_title'                => esc_html__( '主题设置', 'haqiye' ),

	// The text to appear on the page title.
	'page_title'                => esc_html__( 'Theme Options', 'haqiye' ),

	// Disable to create your own Google fonts loader.
	'disable_google_fonts_link' => true,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => true,

	// Icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Sets a different name for your global variable other than the opt_name.
	'global_variable'           => $opt_name,

	// Show the time the page took to load, etc. (forced on while on localhost or when WP_DEBUG is enabled).
	'dev_mode'                  => false,

	// Enable basic customizer support.
	'customizer'                => true,

	// Allow the panel to open expanded.
	'open_expanded'             => false,

	// Disable the save warning when a user changes a field.
	'disable_save_warn'         => false,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => 90,

	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel, will be based off page title, then menu title, then opt_name if not provided.
	'page_slug'                 => $opt_name,

	// On load save the defaults to DB before user clicks save.
	'save_defaults'             => true,

	// Display the default value next to each field when not set to the default value.
	'default_show'              => false,

	// What to print by the field's title if the value shown is default.
	'default_mark'              => '*',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,

	// The time transients will expire when the 'database' arg is set.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts,
	// but stops the dynamic CSS from going to the page head.
	'output_tag'                => true,

	// Disable the footer credit of Redux. Please leave if you can help it.
	'footer_credit'             => '',

	// If you prefer not to use the CDN for ACE Editor.
	// You may download the Redux Vendor Support plugin to run locally or embed it in your code.
	'use_cdn'                   => true,

	// Set the theme of the option panel.  Use 'wp' to use a more modern style, default is classic.
	'admin_theme'               => 'wp',

	// Enable or disable flyout menus when hovering over a menu with submenus.
	'flyout_submenus'           => true,

	// Mode to display fonts (auto|block|swap|fallback|optional)
	// See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display.
	'font_display'              => 'swap',

	// HINTS.
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'red',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',
	'network_admin'             => true,
	'search'                    => true,
);

// Panel Intro text -> before the form.
if ( ! isset( $args['global_variable'] ) || false !== $args['global_variable'] ) {
	if ( ! empty( $args['global_variable'] ) ) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace( '-', '_', $args['opt_name'] );
	}

	// translators:  Panel opt_name.

} else {
	$args['intro_text'] = '<p>' . esc_html__( 'This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'haqiye' ) . '</p>';
}



Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */
$help_tabs = array(
	array(
		'id'      => 'redux-help-tab-1',
		'title'   => esc_html__( 'Theme Information 1', 'haqiye' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'haqiye' ) . '</p>',
	),
	array(
		'id'      => 'redux-help-tab-2',
		'title'   => esc_html__( 'Theme Information 2', 'haqiye' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'haqiye' ) . '</p>',
	),
);
Redux::set_help_tab( $opt_name, $help_tabs );

// Set the help sidebar.
$content = '<p>' . esc_html__( 'This is the sidebar content, HTML is allowed.', 'haqiye' ) . '</p>';

Redux::set_help_sidebar( $opt_name, $content );

/*
 * <--- END HELP TABS
 */

/*
 * ---> START SECTIONS
 */

// -> START Basic Fields
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( '基础字段', 'haqiye' ),
		'id'               => 'basic',
		'desc'             => esc_html__( '包含头部和尾部的字段，也可以头部和尾部字段分开', 'haqiye' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-home',
		'fields'  => array(
			array(
				'title'  => '主题Logo',
				'id'  => 'theme_logo',
				'subtitle'  => 'Upload your theme logo', 
				'type'  => 'media' 
			),
			array(
				'title'  => '网站介绍',
				'id'  => 'site_intro',
				'subtitle'  => 'Site Introdcution',
				'type'  => 'textarea'
			),
			array(
				'title'  => '循环图片默认占位图片',
				'id'  => 'on_error',
				'subtitle'  => 'defafult image for the post thumbnail',
				'type'  => 'media'
			),
			array(
				'title'  => '默认页面背景',
				'id' => 'default_banner',
				'subtitle'  => 'Default page banner',
				'type'  => 'media'
			),

			array(
				'title'  => '是否开启下雪特效',
				'id'  => 'snow_effect_switch',
				'type'  => 'switch',
				'default'  => false,

			),
			
			array(
				'title'  => '首页分类',
				'id'  => 'home_cats',
				'desc'  => 'main categories in Home page，要么选择6个要么选择9个不然不好看', 
				'type' => 'select',
				'multi'  => true,
				'data'  => 'categories',
				'args'  => array(
					'hide_empty'  => false
				)
				),

				array(
					'title'  => '版权',
					'id'  => 'ha_copyright',
					'type' => 'text', 
				),

				array(
					'title'  => '备案号',
					'id'  => 'ha_beian',
					'type' => 'text', 
				),
				array(
					'type' => 'divide',
				),

				array(
					'title'  => '默认用户头像',
					'id' => 'default_avatar',
					'type'  => 'media'
				),
				array(
					'title'  => '网站默认关键词',
					'id'  => 'site_keywords',
					'type'  => 'text'

				),
				

		)
	)
);


// ads section 
Redux::set_section($opt_name, array(
	'title' => __('广告区域'),
	'id' => 'ads_section',
	'desc' => 'Section for display ads',
	'customizer_width' => '400px',
	'icon' => 'el el-book',
	'fields'  => array(
		array(
			'title'  => 'top banner control',
			'id' => 'top_banner_switch',
			'type' => 'switch',
			'default'  => false 

		),
		array(
		'title'  => 'top banner position',
		'id'  => 'top_banner',
		'type'  => 'media',
		'width'  => '1230',
		'height'  => '80',
		'desc'  => 'Width:1230,height:80'
		),

		array(
			'id'  => 'top_divide',
			'type'  => 'divide' 

		),

		array(
			'title'  => 'Banner before sticky posts link',
			'id'  => 'banner_before_sticky_link',
			'type'  => 'text',
			'desc'  => 'URL for the banner, paste the url',

		),

		array(
			'title'  => 'Banner before sticky posts',
			'id' => 'banner_before_sticky',
			'type'  => 'media',
			'width' => '1230', 
			'height' => '80',
			'desc'  => 'Width:1230'
		),

		array(
			'title'  => 'Alt text for the banner of the sticky front', 
			'id'  => 'banner_before_sticky_alt',
			'type'  => 'text',
			'desc'  => 'banner image alt text'

		),

		array(
			'id'  => 'middle_divide',
			'type'  => 'divide' 

		),

		array(
		'title'  => 'Home middle position',
		'id'  => 'home_middle',
		'type'  => 'media',
		'width'  => '1230',
		'height'  => '138',
		'desc'  => 'Width:1230,height:138'
		),

			array(

 'id'   =>'divider_2',
    
    'type' => 'divide'

		),

		array(
			'title'  => 'Image link above the single posts',
			'id'  => 'image_link_above_single',
			'type'  => 'text',
			'desc'  => 'URL for the image above single post, paste the url',

		),

		array(
		'title'  => 'Image above single post',
		'id'  => 'single_above',
		'type'  => 'media',
		'width'  => '860',
		'height'  => '90',
		'desc'  => 'Width:860,height:90'
		),

		array(
			'title'  => 'Alt text for the image above single post', 
			'id'  => 'image_above_single_alt',
			'type'  => 'text',
			'desc'  => 'Alt text for the image above single post'

		),

		array(

 'id'   =>'divider_1',
    
    'type' => 'divide'

		),

		array(
			'title'  => 'Image link at the bottom of the single posts',
			'id'  => 'image_link_at_single_bottom',
			'type'  => 'text',
			'desc'  => 'URL for the image at the bottom of the single post, paste the url',

		),

		array(
		'title'  => 'Image at Single bottom position',
		'id'  => 'single_bottom',
		'type'  => 'media',
		'width'  => '860',
		'height'  => '90',
		'desc'  => 'Width:860,height:90'
		),

		array(
			'title'  => 'Alt text for the image at the bottom of the single post', 
			'id'  => 'image_at_single_bottom_alt',
			'type'  => 'text',
			'desc'  => 'Alt text for the image at single post bottom'

		),


		array(
			'title'  => 'Bottom bannder control',
			'id' => 'bottom_banner_switch',
			'type'  => 'switch',
			'default'  => false 
		)


	)


)
);

Redux::set_section($opt_name, array(
	'title' => __('404 设置', 'hastart'),
	'id' => '404_section',
	'desc' => __('404 page section fields', 'hastart'),
	'customizer_width' => '400px',
	'icon' => 'el el-error-alt',
	'fields' => array(
		array(
			'title'  => __('404 bg image','hastart'),
			'id'  => '404_bg',
			'type'  => 'media',
			'desc'  => 'Background Image of 404 page'

		), 
		array(
			'title'  => __('404 plane image','hastart'),
			'id'  => '404_plane',
			'type'  => 'media',
			'desc'  => 'Plane Image of 404 page，你在这里可以换个更大的飞机，比如说波音747'

		),
		array(
			'title'  => __('404 Scene 1','hastart'),
			'id'  => '404_scene_1',
			'type'  => 'media',
			'desc'  => 'Scene 1 background of 404 page'

		),
		array(
			'title'  => __('404 Scene 2','hastart'),
			'id'  => '404_scene_2',
			'type'  => 'media',
			'desc'  => 'Scene 2 background of 404 page'

		),
		array(
			'title'  => __('404 Scene 3','hastart'),
			'id'  => '404_scene_3',
			'type'  => 'media',
			'desc'  => 'Scene 3 background of 404 page'

		),
		array(
			'title'  => __('404 heading 1','hastart'),
			'id'  => '404_heading_1',
			'type'  => 'text',
			'desc'  => '404 标题 1'

		),
		array(
			'title'  => __('404 heading 2','hastart'),
			'id'  => '404_heading_2',
			'type'  => 'text',
			'desc'  => '404 标题 2'

		),
		array(
			'title'  => __('404 text 1','hastart'),
			'id'  => '404_text_1',
			'type'  => 'text',
			'desc'  => '404 文本 1'

		),
		array(
			'title'  => __('404 button text 1','hastart'),
			'id'  => '404_btn_text',
			'type'  => 'text',
			'desc'  => '404 按钮文本'

		),
		array(
			'type'  => 'divide'
		)
	)

)
);

Redux::set_section($opt_name, array(
	'title'  => '网站保护',
	'id'  => 'urlprotect',
	'desc'  => 'Url protected function',
	'customizer_width' => '400px',
	'icon' => 'el el-link',
	'fields'  => array(
		array(
					'title'  => '密码保护路径',
					'subtitle' => '设置 / 就是设置主网址',
					'id'  => 'allowered_path',
					'type'  => 'multi_text',

				),
				array(
					'title'  => '密码保护用户名',
					'id'  => 'valide_user',
					'type' => 'text', 
				),
				array(
					'title'  => '密码保护密码',
					'id'  => 'valide_pass',
					'type' => 'text', 
				),
				array(
					'title'  => 'ip封禁',
					'subtitle' => '设置封禁的ip地址',
					'id'  => 'disallow_ips',
					'type'  => 'multi_text',

				),
				
	)
));
Redux::set_section($opt_name, array(
	'title' => 'UrlRedirect by 301，跳转前后网址都对应 ',
	'id' => 'urlredirect',
	'desc' => 'Url redirect function，函数在theme-funtcion里添加',
	'customizer_width' => '400px',
	'icon' => 'el el-forward-alt',
	'fields' => array(
		array(
			'title'  => 'Url跳转前网址',
					'subtitle' => '设置URL跳转前主网址',
					'desc'  => 'page的slug,不用Http://',
					'id'  => 'old_url_render',
					'type'  => 'multi_text',
		),
		array(
			'title'  => 'Url跳转后网址',
					'subtitle' => '设置URL跳转后主网址',
					'desc'  => '具体的网址，必须添加Https://',
					'id'  => 'new_url_render',
					'type'  => 'multi_text',
		),
	)

)
);

Redux::set_section($opt_name,array(
	'title'  => '自定义设置',
	'id'  => 'ha_customizer',
	'subtitle'  => '网站自定义设置',
	'customizer_width' => '400px',
	'icon' => 'el el-idea-alt',
	'fields'  => array(
		array(
			'title'  => '网站一键灰色',
			'id'  => 'switch_grey',
			'type'  => 'switch',
			'desc'  => '纪念某些弄权者阵亡时候使用，只能单独开启一种，要开启其他颜色模式，要先关闭当前模式，全都开启的话只会执行最下面的一种模式',
		),

		array(
			'title'  => '网站一键红色',
			'id'  => 'switch_red',
			'type'  => 'switch',
			'desc'  => '庆祝某些弄权会议召开时候或者中国足球夺冠的时候使用，只能单独开启一种，要开启其他颜色模式，要先关闭当前模式，全都开启的话只会执行最下面的一种模式',
		),
	)

));



/**
 * Metaboxes 
 */

Redux_Metaboxes::set_box($opt_name,array(
	'title'  => __('Post/page Metabox','haqiye'),
	'id'  => 'page-metabox',
	'post_types'  => array('page','post'),
	'position'  => 'normal',
	'priority'  => 'high', 
	'sections'  => array(

		array(
			'title'  => __('Basic Fields','haqiye'),
			'id'  => 'basic-fields', 
			'desc'  => __('Page Basic Fields','haqiye'), 
			'fields'  => array(
				array(
				'title'  => 'Key Words', 
				'id'  => 'keywords',
				'type'  => 'text' )
				
	)

))));

/*
 * <--- END SECTIONS
 */

/*
 * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR OTHER CONFIGS MAY OVERRIDE YOUR CODE.
 */

/*
 * --> Action hook examples.
 */

// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
// add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);
//
// Change the arguments after they've been declared, but before the panel is created.
// add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );
//
// Change the default value of a field after it's been set, but before it's been used.
// add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );
//
// Dynamically add a section. Can be also used to modify sections/fields.
// add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');
// .
if ( ! function_exists( 'compiler_action' ) ) {
	/**
	 * This is a test function that will let you see when the compiler hook occurs.
	 * It only runs if a field's value has changed and compiler=>true is set.
	 *
	 * @param array  $options        Options values.
	 * @param string $css            Compiler selector CSS values  compiler => array( CSS SELECTORS ).
	 * @param array  $changed_values Any values changed since last save.
	 */
	function compiler_action( array $options, string $css, array $changed_values ) {
		echo '<h1>The compiler hook has run!</h1>';
		echo '<pre>';
		// phpcs:ignore WordPress.PHP.DevelopmentFunctions
		print_r( $changed_values ); // Values that have changed since the last save.
		// echo '<br/>';
		// print_r($options); //Option values.
		// echo '<br/>';
		// print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS ).
		echo '</pre>';
	}
}

if ( ! function_exists( 'redux_validate_callback_function' ) ) {
	/**
	 * Custom function for the callback validation referenced above
	 *
	 * @param array $field          Field array.
	 * @param mixed $value          New value.
	 * @param mixed $existing_value Existing value.
	 *
	 * @return array
	 */
	function redux_validate_callback_function( array $field, $value, $existing_value ): array {
		$error   = false;
		$warning = false;

		// Do your validation.
		if ( 1 === (int) $value ) {
			$error = true;
			$value = $existing_value;
		} elseif ( 2 === (int) $value ) {
			$warning = true;
			$value   = $existing_value;
		}

		$return['value'] = $value;

		if ( true === $error ) {
			$field['msg']    = 'your custom error message';
			$return['error'] = $field;
		}

		if ( true === $warning ) {
			$field['msg']      = 'your custom warning message';
			$return['warning'] = $field;
		}

		return $return;
	}
}


if ( ! function_exists( 'dynamic_section' ) ) {
	/**
	 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
	 * Simply include this function in the child themes functions.php file.
	 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
	 * so you must use get_template_directory_uri() if you want to use any of the built-in icons.
	 *
	 * @param array $sections Section array.
	 *
	 * @return array
	 */
	function dynamic_section( array $sections ): array {
		$sections[] = array(
			'title'  => esc_html__( 'Section via hook', 'haqiye' ),
			'desc'   => '<p class="description">' . esc_html__( 'This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.', 'haqiye' ) . '</p>',
			'icon'   => 'el el-paper-clip',

			// Leave this as a blank section, no options just some intro text set above.
			'fields' => array(),
		);

		return $sections;
	}
}

if ( ! function_exists( 'change_arguments' ) ) {
	/**
	 * Filter hook for filtering the args.
	 * Good for child themes to override or add to the args array. Can also be used in other functions.
	 *
	 * @param array $args Global arguments array.
	 *
	 * @return array
	 */
	function change_arguments( array $args ): array {
		$args['dev_mode'] = true;

		return $args;
	}
}

if ( ! function_exists( 'change_defaults' ) ) {
	/**
	 * Filter hook for filtering the default value of any given field. Very useful in development mode.
	 *
	 * @param array $defaults Default value array.
	 *
	 * @return array
	 */
	function change_defaults( array $defaults ): array {
		$defaults['str_replace'] = esc_html__( 'Testing filter hook!', 'haqiye' );

		return $defaults;
	}
}

if ( ! function_exists( 'redux_custom_sanitize' ) ) {
	/**
	 * Function to be used if the field sanitize argument.
	 * Return value MUST be the formatted or cleaned text to display.
	 *
	 * @param string $value Value to evaluate or clean.  Required.
	 *
	 * @return string
	 */
	function redux_custom_sanitize( string $value ): string {
		$return = '';

		foreach ( explode( ' ', $value ) as $w ) {
			foreach ( str_split( $w ) as $k => $v ) {
				if ( ( $k + 1 ) % 2 !== 0 && ctype_alpha( $v ) ) {
					$return .= mb_strtoupper( $v );
				} else {
					$return .= $v;
				}
			}

			$return .= ' ';
		}

		return $return;
	}
}