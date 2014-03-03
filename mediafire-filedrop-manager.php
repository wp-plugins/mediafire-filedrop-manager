<?php

/**
 * Plugin Name: MediaFire FileDrop Manager
 * Plugin URI: http://blackhillswebworks.com/wordpress-plugins/mediafire-filedrop-manager
 * Description: Adds a WordPress admin top-level menu item for easy access to your MediaFire FileDrops
 * Version: 0.3
 * Author: John Sundberg
 * Author URI: http://blackhillswebworks.com
 * License: GPLv2 or later
 */

/*
	Copyright 2013 John Sundberg

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
	
	
	
/**
 * Add a 'Settings' link to the plugin action links
 */

	add_filter( 'plugin_action_links', 'bhww_mediafire_filedrop_manager_plugin_action_links', 10, 2 );

	function bhww_mediafire_filedrop_manager_plugin_action_links( $links, $file ) {
		static $this_plugin;

		if ( ! $this_plugin ) {
		
			$this_plugin = plugin_basename(__FILE__);
			
		}

		if ( $file == $this_plugin ) {
		
			// The "page" query string value must be equal to the slug
			// of the Settings admin page we defined earlier, which in
			// this case equals "myplugin-settings".
			$settings_link = '<a href="' . get_bloginfo( 'wpurl' ) . '/wp-admin/options-general.php?page=mediafire-filedrop-manager-settings">Settings</a>';
			array_unshift( $links, $settings_link );
			
		}

		return $links;
	}

	

/**
 * Add a top-level menu so users can easily find their MediaFire FileDrops
 */
 
	add_action( 'admin_menu', 'bhww_mediafire_filedrop_create_menu' );
	
	function bhww_mediafire_filedrop_create_menu() {
	
		// Create the top-level menu, visible to Authors, Editors, and Administrators
		$page = add_menu_page( 'MediaFire FileDrop Manager', 'FileDrops', 'upload_files', 'mediafire-filedrop-manager', 'bhww_mediafire_filedrop_display_page', plugins_url( 'mediafire-filedrop-manager/images/icon-16.png' ) );
		
		// Use registered $page handle to hook stylesheet loading
		add_action( 'admin_print_styles-' . $page , 'bhww_mediafire_filedrop_admin_styles' );
		
	}
	
	
	
/**
 * Enqueue the plugin stylesheet
 */
 
	function bhww_mediafire_filedrop_admin_styles() {
	
		wp_enqueue_style( 'bhww-mffdm', plugins_url( 'css/mediafire-filedrop-manager-style.css', __FILE__ ), array(), '20130903' );
		
	}

	

/**
 * Generate the content for the MediaFire FileDrops admin page
 */
 
	function bhww_mediafire_filedrop_display_page() {
	
		// Get the options from the plugin's settings page
		$bhww_mffdm_options             = get_option( 'bhww_mffdm_options' );
		
		$first_filedrop_title           = $bhww_mffdm_options['bhww_mffdm_first_filedrop_title'];
		$first_filedrop_embed_code      = $bhww_mffdm_options['bhww_mffdm_first_filedrop_embed_code'];
		$first_filedrop_link            = $bhww_mffdm_options['bhww_mffdm_first_filedrop_link'];
		
		$second_filedrop_title          = $bhww_mffdm_options['bhww_mffdm_second_filedrop_title'];
		$second_filedrop_embed_code     = $bhww_mffdm_options['bhww_mffdm_second_filedrop_embed_code'];
		$second_filedrop_link           = $bhww_mffdm_options['bhww_mffdm_second_filedrop_link'];
		
		$third_filedrop_title           = $bhww_mffdm_options['bhww_mffdm_third_filedrop_title'];
		$third_filedrop_embed_code      = $bhww_mffdm_options['bhww_mffdm_third_filedrop_embed_code'];
		$third_filedrop_link            = $bhww_mffdm_options['bhww_mffdm_third_filedrop_link'];
		
		$fourth_filedrop_title          = $bhww_mffdm_options['bhww_mffdm_fourth_filedrop_title'];
		$fourth_filedrop_embed_code     = $bhww_mffdm_options['bhww_mffdm_fourth_filedrop_embed_code'];
		$fourth_filedrop_link           = $bhww_mffdm_options['bhww_mffdm_fourth_filedrop_link'];
		
		$fifth_filedrop_title           = $bhww_mffdm_options['bhww_mffdm_fifth_filedrop_title'];
		$fifth_filedrop_embed_code      = $bhww_mffdm_options['bhww_mffdm_fifth_filedrop_embed_code'];
		$fifth_filedrop_link            = $bhww_mffdm_options['bhww_mffdm_fifth_filedrop_link'];
		
		?>
		
		<div class="wrap">
		
			<div id="mediafire-filedrop-icon" class="icon32">
				<br />
			</div>
		
			<h2>MediaFire FileDrops</h2>
			
			<p class="bhww-readable-text">Use the MediaFire FileDrops on this page to upload files that you want to provide as downloads for your website users and visitors.</p>
			
			<p class="bhww-readable-text">To upload a file, either:</p>
				<ol class="bhww-readable-text">
					<li>Drag and drop it onto the FileDrop and then click the "Start Uploading Files" link, or </li>
					<li>Click the "Select Files" link to select and upload your file.</li>
				</ol>
			
			<p class="bhww-readable-text">After uploading your file(s), click on the button below the FileDrop to access all the files in that FileDrop.</p>
			
			<?php
			
			// Display the first FileDrop IF the title, embed code, and direct link are not empty
			if ( ! empty ( $first_filedrop_title ) && ! empty ( $first_filedrop_embed_code ) && ! empty ( $first_filedrop_link ) ) { ?>
				
				<div class="filedrop-container">
				
					<h2><?php echo esc_html( $first_filedrop_title ) ?></h2>
					
					<p><?php echo htmlspecialchars_decode( esc_html( $first_filedrop_embed_code ) ) ?></p>
					
					<p><a href="<?php echo esc_url( $first_filedrop_link ) ?>" target="_blank" class="button-primary">Click here to open this FileDrop in a new tab or window</a></p>
			
				</div>
				
				<?php		
			} 
			
			
			// Display the second FileDrop IF the title, embed code, and direct link are not empty
			if ( ! empty ( $second_filedrop_title ) && ! empty ( $second_filedrop_embed_code ) && ! empty ( $second_filedrop_link ) ) { ?>
				
				<div class="filedrop-container">
				
					<h2><?php echo esc_html( $second_filedrop_title ) ?></h2>
					
					<p><?php echo htmlspecialchars_decode( esc_html( $second_filedrop_embed_code ) ) ?></p>
					
					<p><a href="<?php echo esc_url( $second_filedrop_link ) ?>" target="_blank" class="button-primary">Click here to open this FileDrop in a new tab or window</a></p>
			
				</div>
			
				<?php		
			} 
			
			
			// Display the third FileDrop IF the title, embed code, and direct link are not empty
			if ( ! empty ( $third_filedrop_title ) && ! empty ( $third_filedrop_embed_code ) && ! empty ( $third_filedrop_link ) ) { ?>
				
				<div class="filedrop-container">
				
					<h2><?php echo esc_html( $third_filedrop_title ) ?></h2>
					
					<p><?php echo htmlspecialchars_decode( esc_html( $third_filedrop_embed_code ) ) ?></p>

					<p><a href="<?php echo esc_url( $third_filedrop_link ) ?>" target="_blank" class="button-primary">Click here to open this FileDrop in a new tab or window</a></p>
			
				</div>
			
				<?php		
			}
			
			
			// Display the fourth FileDrop IF the title, embed code, and direct link are not empty
			if ( ! empty ( $fourth_filedrop_title ) && ! empty ( $fourth_filedrop_embed_code ) && ! empty ( $fourth_filedrop_link ) ) { ?>
				
				<div class="filedrop-container">
				
					<h2><?php echo esc_html( $fourth_filedrop_title ) ?></h2>
					
					<p><?php echo htmlspecialchars_decode( esc_html( $fourth_filedrop_embed_code ) ) ?></p>
					
					<p><a href="<?php echo esc_url( $fourth_filedrop_link ) ?>" target="_blank" class="button-primary">Click here to open this FileDrop in a new tab or window</a></p>
			
				</div>
			
				<?php		
			} 
			
			
			// Display the fifth FileDrop IF the title, embed code, and direct link are not empty
			if ( ! empty ( $fifth_filedrop_title ) && ! empty ( $fifth_filedrop_embed_code ) && ! empty ( $fifth_filedrop_link ) ) { ?>
				
				<div class="filedrop-container">
				
					<h2><?php echo esc_html( $fifth_filedrop_title ) ?></h2>
					
					<p><?php echo htmlspecialchars_decode( esc_html( $fifth_filedrop_embed_code ) ) ?></p>

					<p><a href="<?php echo esc_url( $fifth_filedrop_link ) ?>" target="_blank" class="button-primary">Click here to open this FileDrop in a new tab or window</a></p>
			
				</div>
			
				<?php		
			} ?>
		
		</div><!-- /.wrap -->
		
		<?php
		
	}
	
	
	
/**
 * Load the other files as needed
 */
	
	if ( is_admin() ) {
				
		// Settings page
		include_once( 'includes/mediafire-filedrop-manager-settings.php' );
		
		// Help page
		include_once( 'includes/mediafire-filedrop-manager-help.php' );

	}