<?php

/**
 * Fired during plugin activation
 *
 * @link       localhost
 * @since      1.0.0
 *
 * @package    Rhok2015
 * @subpackage Rhok2015/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Rhok2015
 * @subpackage Rhok2015/includes
 * @author     i.pee.freely <i.pee.freely@example.org>
 */
class Rhok2015_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */

	public static function activate() {
		Rhok2015_Activator::create_feedback_table();
		Rhok2015_Activator::create_location_table();
		Rhok2015_Activator::create_location_request_table();
	}

	public static function create_feedback_table() {
		global $wpdb;
		$ipf_feedback = $wpdb->prefix . 'ipf_feedback';

		if($wpdb->get_var("show tables like '$ipf_feedback'") != $ipf_feedback)
		{
			$sql = "CREATE TABLE " . $ipf_feedback . " (
				feedbackID INT(32) NOT NULL auto_increment,
				trackingID INT(32),
				locationID INT(32),
				datetime DATETIME,
				feedbackClean INT(12),
				feedbackAccessible INT(12),
				feedbackComments LONGTEXT,
				userAgent LONGTEXT,
				primary KEY (feedbackID)
			);";

			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
	}

	public static function create_location_table() {
		global $wpdb;
		$ipf_location = $wpdb->prefix . 'ipf_location';

		if($wpdb->get_var("show tables like '$ipf_location'") != $ipf_location)
		{
			$sql = "CREATE TABLE " . $ipf_location . " (
				locationID INT(32) NOT NULL auto_increment,
				locationLat VARCHAR(255),
				locationLong VARCHAR(255),
				name VARCHAR(255),
				streetAddress VARCHAR(255),
				suburb VARCHAR(255),
				state VARCHAR(255),
				postcode VARCHAR(255),
				primary KEY (locationID)
			);";

			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
	}

	public static function create_location_request_table() {
		global $wpdb;
		$ipf_location_request = $wpdb->prefix . 'ipf_location_request';

		if($wpdb->get_var("show tables like '$ipf_location_request'") != $ipf_location_request)
		{
			$sql = "CREATE TABLE " . $ipf_location_request . " (
				requestID INT(32) NOT NULL auto_increment,
				trackingID INT(32),
				locationID INT(32),
				requestLat VARCHAR(255),
				requestLong VARCHAR(255),
				currentLat VARCHAR(255),
				currentLong VARCHAR(255),
				userAgent LONGTEXT,
				primary KEY (requestID)
			);";

			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
	}
}
