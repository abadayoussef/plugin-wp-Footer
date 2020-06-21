<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/ahmedBou
 * @since      1.0.0
 *
 * @package    Abufooter
 * @subpackage Abufooter/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Abufooter
 * @subpackage Abufooter/includes
 * @author     ahmed <ahmedboutayeb01@gmail.com>
 */
class Abufooter_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		require_once(ABSPATH . "wp-admin/includes/upgrade.php");
		global $wpdb;
		if (count($wpdb->get_var("show tables like '" . Abufooter_Activator::abuFooter_table() . "'")) == 0) {

			$query = 'CREATE TABLE `' . Abufooter_Activator::abuFooter_table() . '` (
			 	`footer_id` int(11) NOT NULL AUTO_INCREMENT,
 				`footer_text` varchar(128) NOT NULL,
 				`f_facebook` varchar(128) NOT NULL,
				`f_twitter` varchar(255) NOT NULL,
				`f_email` varchar(255) NOT NULL,
				PRIMARY KEY (`footer_id`)
					 ) ' . $wpdb->get_charset_collate();
			dbDelta($query);
			$wpdb->insert(Abufooter_Activator::abuFooter_table(), array(
				"footer_text" => 'All right reserved By Boutayeb &copy; 2020',
				"f_facebook" => "https://www.facebook.com/",
				"f_twitter" => "https://twitter.com/home?lang=fr",
				"f_email" => "ahmed@gmail.com"
			));
		}

	}
	public static function abuFooter_table()
	{
		global $wpdb;
		return $wpdb->prefix . "abuFooter_table";
	}

}
