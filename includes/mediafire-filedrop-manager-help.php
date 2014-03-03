<?php

/**
 * This file creates a MediaFire Filedrop Manager Help page under the 'FileDrops' top-level menu item
 */

 
/**
 * Add a submenu page for the help documentation
 */

	add_action( 'admin_menu', 'bhww_mediafire_filedrop_manager_submenu_help_page' );

	function bhww_mediafire_filedrop_manager_submenu_help_page() {
		
		// Add the submenu page under the FileDrops top-level menu
		$parent_slug         = 'mediafire-filedrop-manager';
		$submenu_page_title  = 'Linking to Your Files';
		$submenu_title       = 'Linking to Your Files';
		$capability          = 'upload_files';
		$menu_slug           = 'mediafire-filedrop-manager-help';
		$menu_function       = 'bhww_mediafire_filedrop_manager_help_page';
		
		$page = add_submenu_page( $parent_slug, $submenu_page_title, $submenu_title, $capability, $menu_slug, $menu_function );
		
		// Use registered $page handle to hook stylesheet loading
		add_action( 'admin_print_styles-' . $page , 'bhww_mediafire_filedrop_admin_styles' );
		
	}

	

/**
 * Function callback for Help page
 */

	function bhww_mediafire_filedrop_manager_help_page() {
	
		if ( ! current_user_can( 'upload_files' ) ) {
		
			wp_die( 'You do not have sufficient permissions to access this page.' );
			
		}
		
		// Render the HTML for the Help page
		?>
		
		<div class="wrap">
		
			<div id="mediafire-filedrop-icon" class="icon32">
				<br />
			</div>
		
			<h2>Linking to your files after uploading them to MediaFire</h2>
			
			<h2>Access your uploaded files</h2>
			
			<p class="bhww-readable-text">Below each FileDrop there should be a button that looks something like this:</p>

			<p class="bhww-readable-text"><a class="button-primary" href="#">Click here to open this FileDrop in a new tab or window</a></p>

			<p class="bhww-readable-text">Clicking on the button for your FileDrop should open a new tab or window showing the contents of your FileDrop.</p>
			
			<h2>Link to your files</h2>
			
				<ol class="bhww-readable-text">
					<li>Scroll or navigate through the files listed in the FileDrop until you find the file that you want to link to on your website.</li>
					<li>Hover your mouse pointer over the file and a button should appear on the far right side of the file listing, next to the modified date.</li>
					<li>Click on this button to open an actions menu.</li>
					<li>Click on <strong>Share</strong> and then click the <strong>More sharing options...</strong> link.</li>
					<li>Click the <strong>More</strong> tab if necessary, and then click the <strong>Copy Link</strong> button next to the <strong>Download Link</strong> text box.</li>
					<li>A message should appear that says "Copied to Clipboard."</li>
					<li>Alternatively, you can select and copy the download link in the <strong>Download Link</strong> text box.</li>
					<li>Now go to your post, page, or other content and paste the link into your content like you normally would in WordPress.</li>
					<li>The critical thing for this to work is to make sure that the actual file name and type are part of the download link, such as in the following example:</li>
				</ol>
				
			<p class="bhww-readable-text"><strong>Example Download Link:</strong> http://www.mediafire.com/download/tt856hgreu4wekcv/<strong>my-downloadable-file.pdf</strong></p>
		
		</div><!-- /.wrap -->
		
		<?php
	}