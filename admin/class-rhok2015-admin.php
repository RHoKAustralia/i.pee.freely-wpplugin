<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       localhost
 * @since      1.0.0
 *
 * @package    Rhok2015
 * @subpackage Rhok2015/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Rhok2015
 * @subpackage Rhok2015/admin
 * @author     i.pee.freely <i.pee.freely@example.org>
 */
class Rhok2015_Admin {

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

	}

	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */
	public function add_menu_pages() {

		add_menu_page(
			__( 'Locations Settings', 'rhok2015-main' ),
			__( 'Locations', 'rhok2015-main' ),
			'manage_options',
			'rhok2015-main',
			array( $this, 'display_home' )
		);

		add_submenu_page(
			'rhok2015-main',
			'Add Location',
			'Add Location',
			'manage_options',
			'rhok2015-add',
			array( $this, 'display_add' )
		);

		add_submenu_page(
			'rhok2015-main',
			'Edit Location',
			'Edit Location',
			'manage_options',
			'rhok2015-edit',
			array( $this, 'display_edit' )
		);

	}

	/**
	 * Render the index page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_home() {
		wp_enqueue_script( $this->plugin_name + '_home', plugin_dir_url( __FILE__ ) . 'js/index.js', array( 'jquery' ), $this->version, false );
		include_once 'partials/admin-display.php';
	}

	/**
	 * Render the add page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_add() {
		wp_enqueue_script( $this->plugin_name + '_add', plugin_dir_url( __FILE__ ) . 'js/add.js', array( 'jquery' ), $this->version, false );
		include_once 'partials/admin-add.php';
	}

	/**
	 * Render the edit page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_edit() {
		wp_enqueue_script( $this->plugin_name + '_edit', plugin_dir_url( __FILE__ ) . 'js/edit.js', array( 'jquery' ), $this->version, false );
		include_once 'partials/admin-edit.php';
	}

}
