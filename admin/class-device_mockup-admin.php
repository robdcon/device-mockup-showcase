<?php

if (!defined('MYPLUGIN_THEME_DIR'))
    define('MYPLUGIN_THEME_DIR', ABSPATH . 'wp-content/themes/' . get_template());

if (!defined('MYPLUGIN_PLUGIN_NAME'))
    define('MYPLUGIN_PLUGIN_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));

if (!defined('MYPLUGIN_PLUGIN_DIR'))
    define('MYPLUGIN_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . MYPLUGIN_PLUGIN_NAME);

if (!defined('MYPLUGIN_PLUGIN_URL'))
    define('MYPLUGIN_PLUGIN_URL', WP_PLUGIN_URL . '/' . MYPLUGIN_PLUGIN_NAME);

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       robdcon.co.uk
 * @since      1.0.0
 *
 * @package    Device_mockup
 * @subpackage Device_mockup/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Device_mockup
 * @subpackage Device_mockup/admin
 * @author     Rob Connolly <robdcon@gmail.com>
 */
class Device_mockup_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Device_mockup_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Device_mockup_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/device_mockup-admin.css', array(), $this->version, 'all' );

	}

	public function display_admin_page() {
		add_menu_page( 
			'Device Mockup Admin Page', // string $page_title, 
			'Device Mockup', // string $menu_title, 
			'manage_options', // string $capability, 
			'device-mockup-admin', // string $menu_slug, 
			array($this, 'device_mockup_options_page'), // callable $function = '', 
			'', // string $icon_url = '', 
			'3.0' // int $position = null 
		);
	}

	public function show_page() {
		include plugins_url('admin/partials/device_mockup-admin-display.php');
		//echo 'HELLO WORLD!!!';
	}

	function device_mockup_options_page()
	{
	?>
	<div>
		<?php screen_icon(); ?>
		<h2>My Plugin Page Title</h2>
		<form method="post" action="options.php">
		<?php settings_fields( 'device_mockup_options_group' ); ?>
		<h3>Device Mockup Option Page</h3>
		<p>Some text here.</p>
		<table>
		<tr valign="top">
		<th scope="row"><label for="device_mockup_option_name">Label</label></th>
		<td><input type="text" id="device_mockup_option_name" name="device_mockup_option_name" value="<?php echo get_option('device_mockup_option_name'); ?>" /></td>
		</tr>
		</table>

		<input id="background_image" type="text" name="background_image" value="<?php echo get_option('background_image'); ?>" />
		<input id="upload_image_button" type="button" class="button-primary" value="Insert Image" />

		<?php  submit_button(); ?>
		</form>
		</div>
	<?php
	} 

	function media_uploader_enqueue() {
    	wp_enqueue_media();
    	wp_register_script('media-uploader', plugins_url('media-uploader.js' , __FILE__ ), array('jquery'));
    	wp_enqueue_script('media-uploader');
	}
	
   

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Device_mockup_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Device_mockup_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/device_mockup-admin.js', array( 'jquery' ), $this->version, false );

	}

	

}
