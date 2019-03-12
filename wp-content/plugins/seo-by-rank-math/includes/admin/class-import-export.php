<?php
/**
 * The Import Export Class
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Admin
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Admin;

use RankMath\Runner;
use RankMath\Traits\Ajax;
use RankMath\Traits\Hooker;
use RankMath\Helper as GlobalHelper;
use RankMath\Admin\Importers\Detector;

defined( 'ABSPATH' ) || exit;

/**
 * Import_Export class.
 */
class Import_Export implements Runner {

	use Hooker, Ajax;

	/**
	 * Register hooks.
	 */
	public function hooks() {
		$this->action( 'init', 'register_page', 1 );
		$this->action( 'rank_math/importers/settings/pre_import', 'run_backup', 10, 0 );

		$this->ajax( 'create_backup', 'create_backup' );
		$this->ajax( 'delete_backup', 'delete_backup' );
		$this->ajax( 'restore_backup', 'restore_backup' );
		$this->ajax( 'clean_plugin', 'clean_plugin' );
		$this->ajax( 'import_plugin', 'import_plugin' );
	}

	/**
	 * Register admin pages for plugin.
	 */
	public function register_page() {
		$uri = rank_math()->plugin_url() . 'assets/admin/';
		new Page( 'rank-math-import-export', esc_html__( 'Import &amp; Export', 'rank-math' ), array(
			'position' => 99,
			'parent'   => 'rank-math',
			'render'   => Helper::get_view( 'import-export/main' ),
			'onsave'   => array( $this, 'handler' ),
			'assets'   => array(
				'styles'  => array(
					'cmb2-styles'      => '',
					'rank-math-common' => '',
					'rank-math-cmb2'   => '',
				),
				'scripts' => array( 'rank-math-import-export' => $uri . 'js/import-export.js' ),
			),
		));

		rank_math()->add_json( 'importConfirm', esc_html__( 'Are you sure you want to import settings into Rank Math? Don\'t worry, your current configuration will be saved as a backup.', 'rank-math' ) );
		rank_math()->add_json( 'restoreConfirm', esc_html__( 'Are you sure you want to restore this backup? Your current configuration will be overwritten.', 'rank-math' ) );
		rank_math()->add_json( 'deleteBackupConfirm', esc_html__( 'Are you sure you want to delete this backup?', 'rank-math' ) );
		rank_math()->add_json( 'cleanPluginConfirm', esc_html__( 'Are you sure you want erase traces of plugin?', 'rank-math' ) );
	}

	/**
	 * Handle import or export.
	 */
	public function handler() {

		if ( ! isset( $_POST['object_id'] ) ) {
			return;
		}

		if ( 'export-plz' === $_POST['object_id'] ) {
			$this->export();
		}

		if ( isset( $_FILES['import-me'] ) && 'import-plz' === $_POST['object_id'] ) {
			$this->import();
		}
	}

	/**
	 * Handles AJAX plugin run clean.
	 */
	public function clean_plugin() {

		$this->verify_nonce( 'rank-math-ajax-nonce' );

		$result = Detector::run_by_slug( $_POST['pluginSlug'], 'cleanup' );

		if ( $result['status'] ) {
			/* translators: Plugin name */
			$this->success( sprintf( esc_html__( 'Cleanup of %s data successfully done.', 'rank-math' ), $result['importer']->get_plugin_name() ) );
		}

		/* translators: Plugin name */
		$this->error( sprintf( esc_html__( 'Cleanup of %s data failed.', 'rank-math' ), $result['importer']->get_plugin_name() ) );
	}

	/**
	 * Handles AJAX plugin run import.
	 */
	public function import_plugin() {

		$this->verify_nonce( 'rank-math-ajax-nonce' );

		$this->has_cap_ajax( 'general' );

		$perform = isset( $_POST['perform'] ) ? $_POST['perform'] : false;
		if ( ! $perform || ! in_array( $perform, array( 'settings', 'postmeta', 'termmeta', 'usermeta', 'redirections', 'deactivate' ) ) ) {
			$this->error( esc_html__( 'Action not allowed.', 'rank-math' ) );
		}

		try {
			$result = Detector::run_by_slug( $_POST['pluginSlug'], 'import', $perform );
			$this->success( $result );
		} catch ( \Exception $e ) {
			$this->error( $e->getMessage() );
		}

	}

	/**
	 * Handles AJAX create backup.
	 */
	public function create_backup() {

		$this->verify_nonce( 'rank-math-ajax-nonce' );

		$key = $this->run_backup();
		if ( is_null( $key ) ) {
			$this->error( esc_html__( 'Unable to create backup this time.', 'rank-math' ) );
		}

		$this->success( array(
			'key'     => $key,
			/* translators: Backup formatted date */
			'backup'  => sprintf( esc_html__( 'Backup: %s', 'rank-math' ), date( 'M jS Y, H:i a', $key ) ),
			'message' => esc_html__( 'Backup created successfully.', 'rank-math' ),
		));
	}

	/**
	 * Handles AJAX delete backup.
	 */
	public function delete_backup() {

		$this->verify_nonce( 'rank-math-ajax-nonce' );

		$key = isset( $_POST['key'] ) ? $_POST['key'] : false; // WPCS: sanitization ok.
		if ( ! $key ) {
			$this->error( esc_html__( 'No backup key found to delete.', 'rank-math' ) );
		}

		$this->run_backup( 'delete', $key );
		$this->success( esc_html__( 'Backup successfully deleted.', 'rank-math' ) );
	}

	/**
	 * Handles AJAX restore backup.
	 */
	public function restore_backup() {

		$this->verify_nonce( 'rank-math-ajax-nonce' );

		$key = isset( $_POST['key'] ) ? $_POST['key'] : false; // WPCS: sanitization ok.
		if ( ! $key ) {
			$this->error( esc_html__( 'No backup key found to restore.', 'rank-math' ) );
		}

		if ( ! $this->run_backup( 'restore', $key ) ) {
			$this->error( esc_html__( 'Backup does not exist.', 'rank-math' ) );
		}

		$this->success( esc_html__( 'Backup restored successfully.', 'rank-math' ) );
	}

	/**
	 * Run backup actions
	 *
	 * @param  string $action Action to perform.
	 * @param  array  $key    Key to backup.
	 * @return mixed
	 */
	public function run_backup( $action = 'add', $key = null ) {
		$backups = get_option( 'rank_math_backups', array() );

		// Restore.
		if ( 'restore' === $action ) {
			if ( ! isset( $backups[ $key ] ) ) {
				return false;
			}

			$this->do_import_data( $backups[ $key ], true );

			return true;
		}

		// Add.
		if ( 'add' === $action ) {
			$key     = current_time( 'U' );
			$backups = array( $key => $this->get_export_data() ) + $backups;
		}

		// Delete.
		if ( 'delete' === $action && isset( $backups[ $key ] ) ) {
			unset( $backups[ $key ] );
		}

		update_option( 'rank_math_backups', $backups );

		return $key;
	}

	/**
	 * Handle export.
	 */
	private function export() {
		$panels   = $_POST['panels'];
		$data     = $this->get_export_data( $panels );
		$filename = 'rank-math-settings-' . date( 'Y-m-d-H-i-s' ) . '.json';

		header( 'Content-Type: application/txt' );
		header( 'Content-Disposition: attachment; filename=' . $filename );
		header( 'Cache-Control: no-cache, no-store, must-revalidate' );
		header( 'Pragma: no-cache' );
		header( 'Expires: 0' );

		echo wp_json_encode( $data );
		exit;
	}

	/**
	 * Handle import.
	 */
	private function import() {

		// Handle file upload.
		$file = wp_handle_upload( $_FILES['import-me'], array( 'mimes' => array( 'json' => 'application/json' ) ) );
		if ( is_wp_error( $file ) ) {
			rank_math()->add_error( esc_html__( 'Settings could not be imported:', 'rank-math' ) . ' ' . $file->get_error_message() );
			return false;
		}

		if ( is_array( $file ) && isset( $file['error'] ) ) {
			rank_math()->add_error( esc_html__( 'Settings could not be imported:', 'rank-math' ) . ' ' . $file['error'] );
			return false;
		}

		if ( ! isset( $file['file'] ) ) {
			rank_math()->add_error( esc_html__( 'Settings could not be imported:', 'rank-math' ) . ' ' . esc_html__( 'Upload failed.', 'rank-math' ) );
			return false;
		}

		// Parse Options.
		$wp_filesystem = Helper::get_filesystem();
		$settings      = $wp_filesystem->get_contents( $file['file'] );
		$settings      = json_decode( $settings, true );

		\unlink( $file['file'] );

		if ( $this->do_import_data( $settings ) ) {
			rank_math()->add_error( esc_html__( 'Settings successfully imported. Your old configuration has been saved as a backup.', 'rank-math' ), 'success' );
			return;
		}

		rank_math()->add_error( esc_html__( 'No settings found to be imported.', 'rank-math' ) );
	}

	/**
	 * Does import data.
	 *
	 * @param  array $data           Import data.
	 * @param  bool  $suppress_hooks Suppress hooks or not.
	 * @return bool
	 */
	private function do_import_data( array $data, $suppress_hooks = false ) {
		$down = false;
		$hash = array(
			'modules' => 'rank_math_modules',
			'general' => 'rank-math-options-general',
			'titles'  => 'rank-math-options-titles',
			'sitemap' => 'rank-math-options-sitemap',
		);

		$this->run_import_hooks( 'pre_import', $data, $suppress_hooks );

		foreach ( $hash as $key => $option_key ) {
			if ( isset( $data[ $key ] ) && ! empty( $data[ $key ] ) ) {
				$down = true;
				update_option( $option_key, $data[ $key ] );
			}
		}

		// Import capabilities.
		if ( isset( $data['role-manager'] ) && ! empty( $data['role-manager'] ) ) {
			$down = true;
			GlobalHelper::set_capabilities( $data['role-manager'] );
		}

		$this->run_import_hooks( 'after_import', $data, $suppress_hooks );

		return $down;
	}

	/**
	 * Run import hooks
	 *
	 * @param string $hook     Hook to fire.
	 * @param array  $data     Import data.
	 * @param bool   $suppress Suppress hooks or not.
	 */
	private function run_import_hooks( $hook, $data, $suppress ) {
		if ( ! $suppress ) {
			/**
			 * Fires while importing settings.
			 *
			 * @since 0.9.0
			 *
			 * @param array $data Import data.
			 */
			$this->do_action( 'importers/settings/' . $hook, $data );
		}
	}

	/**
	 * Gets export data.
	 *
	 * @param array $panels Which panels do you want to export. It will export all panels if this param is empty.
	 * @return array
	 */
	private function get_export_data( array $panels = array() ) {
		if ( ! $panels ) {
			$panels = array( 'general', 'titles', 'sitemap', 'role-manager' );
		}

		$settings = rank_math()->settings->all_raw();

		foreach ( $panels as $panel ) {
			if ( isset( $settings[ $panel ] ) ) {
				$data[ $panel ] = $settings[ $panel ];
			}
		}

		if ( \in_array( 'role-manager', $panels ) ) {
			$data['role-manager'] = GlobalHelper::get_roles_capabilities();
		}

		$data['modules'] = rank_math()->manager->get_active_modules();

		return $data;
	}
}
