<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/ahmedBou
 * @since      1.0.0
 *
 * @package    Abufooter
 * @subpackage Abufooter/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Abufooter
 * @subpackage Abufooter/admin
 * @author     ahmed <ahmedboutayeb01@gmail.com>
 */
class Abufooter_Admin {

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
	private $table;

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
		require_once plugin_dir_path(__FILE__) . '../includes/class-abufooter-activator.php';
		$this->table = Abufooter_Activator::abuFooter_table();

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style("bootstrap.min.css", plugin_dir_url(__FILE__) . 'css/bootstrap.min.css', array(), $this->version, 'all');

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script("bootstrap.min.js", plugin_dir_url(__FILE__) . 'js/bootstrap.min.js', array('jquery'), $this->version, true);
		wp_enqueue_script("validate.min.js", plugin_dir_url(__FILE__) . 'js/jquery.validate.min.js', array('jquery'), $this->version, true);
		wp_enqueue_script("custom.js", plugin_dir_url(__FILE__) . 'js/custom.js', array('jquery'), $this->version, true);
		// handle ajax request
		wp_localize_script("custom.js", "abufooter_ajax_url", admin_url("admin-ajax.php"));
		//remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

	}
	function abufooter_menu_sections()
	{
		$page_title = "Abu Footer";
		$menu_title = "Abu Footer";
		$capability = "manage_options";
		$menu_slug = "abu-footer-menus";
		$function = "manage_footer";
		$icon = "dashicons-nametag";
		$position = 30;
		add_menu_page($page_title, $menu_title, $capability, $menu_slug , array($this, $function), $icon, $position);
	}
	function manage_footer(){
		include_once(ABUFOOTER_PLUGIN_DIR ."/admin/partials/update-footer.php");
		
	}
	public function abuData_ajax_hundler_fn(){
		global $wpdb;
		$param = isset($_REQUEST['param']) ? $_REQUEST['param'] : "";
		if(!empty($param) && $param == "save_refresh"){
			$wpdb->update($this->table, array(
				"footer_text" => $_REQUEST['footer_text'],
				"f_facebook" => $_REQUEST['facebook'],
				"f_twitter" => $_REQUEST['twitter'],
				"f_email" => $_REQUEST['coordinate'],
			), array( 'footer_id' => 1 ), array( '%s','%s','%s', '%s'), array( '%d' ));
		}
		
		echo "updated successfully :)";
		wp_die();

	}
	}


