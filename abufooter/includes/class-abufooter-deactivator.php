<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/ahmedBou
 * @since      1.0.0
 *
 * @package    Abufooter
 * @subpackage Abufooter/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Abufooter
 * @subpackage Abufooter/includes
 * @author     ahmed <ahmedboutayeb01@gmail.com>
 */
class Abufooter_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		global $wpdb;
		$wpdb->query("drop table if exists " . $wpdb->prefix ."abuFooter_table");
	}

}
