<?php

class Helper {
	
	/**
	 * Checks to see if the plugin is currently network active
	 * 
	 * @return boolean
	 */
	public function is_network_active() {
		
		if( !is_multisite() )
			return false;

		$plugin = get_site_option( 'active_sitewide_plugins');

		if( array_key_exists( 'password-protected/password-protected.php', $plugin ) )
			return true;
		else
			return false;

	}

	/**
	 * Gets data from the options table from the key specified
	 * and checks if user is using multisite
	 * 
	 * @param  string  $key     name of option to get
	 * @param  boolean $default value to return if option does not exist
	 * @return mixed            value of option or false if option does not exist
	 */
	function password_protected_get_option( $key, $default = false ) {
		return ( is_multisite() && $this->is_network_active() ) ? get_site_option( $key, $default ) : get_option( $key, $default );
	}

	/**
	 * Updates the options table with the the key/value pairs 
	 * and checks if the user has multisite enabled
	 * 
	 * @param  string $key   name of key to store
	 * @param  string $value value content to store
	 * @return boolean		 true if updated, false if it did not   
	 */
	function password_protected_update_option( $key, $value ) {
		return ( is_multisite() && $this->is_network_active() ) ? update_site_option( $key, $value ) : update_option( $key, $value );
	}
	
}