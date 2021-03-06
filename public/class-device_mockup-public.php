<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       robdcon.co.uk
 * @since      1.0.0
 *
 * @package    Device_mockup
 * @subpackage Device_mockup/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Device_mockup
 * @subpackage Device_mockup/public
 * @author     Rob Connolly <robdcon@gmail.com>
 */
class Device_mockup_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/device_mockup-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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
		wp_enqueue_script('tweenmax', "https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js");
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/device_mockup-public.js', array( 'jquery' ), $this->version, false );

	}
	////////////////
	public function the_content( $post_content ) {
		
        return $post_content;
	}
////////////////////////
	function display_mockup()
	{
		$content = '<div class="rwd-row">';

			$content .= '<div data-animated class="rwd-container rwd-col">';

				$content .= '<div class="img-container">';

					$content .= '<img class="placeholder" src="'.plugin_dir_url( __FILE__ ).'img/devices.png" alt="responsive web design devices">';
					$content .= '<img src="'.plugin_dir_url( __FILE__ ).'img/devices.png" alt="responsive web design devices">';
						
							$content .= '<div class="desktop-screen">';
							$content .= 	'<div class="moving-screen moving-screen-desktop">';
							$content .= 		'<img src="'.plugin_dir_url( __FILE__ ).'img/corkacademyofhairdressing-desktop.png" alt="desktop view">';
								$content .= '</div>';
						$content .= 	'</div>';
						$content .= '	<div class="tablet-screen">';
							$content .= 	'<div class="moving-screen moving-screen-tablet">';
								$content .= 	'<img src="'.plugin_dir_url( __FILE__ ).'img/corkacademyofhairdressing-tablet" alt="tablet view">';
								$content .= '</div>';
						$content .= 	'</div>	';
						$content .= 	'<div class="mobile-screen">';
						$content .= 		'<div class="moving-screen moving-screen-mobile">';
						$content .= 			'<img src="'.plugin_dir_url( __FILE__ ).'img/corkacademyofhairdressing-mobile" alt="mobile view">';
						$content .= 		'</div>';
						$content .= 	'</div>';	

				$content .= 	'</div>';

				

			$content .= '</div><!-- rwd-col-->';

			$content .= '<div class="rwd-text-container rwd-col">';
				$content .= '<h3  data-animated class="rwd-info rwd-title">SEE EXAMPLES OF MY WORK</h3>';
				$content .= '<p  data-animated class="rwd-info rwd-caption">Visit some of my clients sites to see what to expect</p>';
				$content .= '<a href="#" class="rwd-link" target="_blank"><button  data-animated class="rwd-info rwd-button">VISIT SITE</button></a>';
			$content .= '</div><!--rwd-text-container rwd-col-->';

		$content .= '</div><!-- rwd-row-->';

		return $content;

	}
	private function define_hooks() {
        $this->loader->add_action( 'init', $plugin_public, 'register_shortcodes' );
    }
    public function register_shortcodes() 
    {
	    add_shortcode( 'device_mockup', array( $this, 'display_mockup') );

	    // add_shortcode( 'anothershortcode', array( $this, 'another_shortcode_function') );
    }
    

}
