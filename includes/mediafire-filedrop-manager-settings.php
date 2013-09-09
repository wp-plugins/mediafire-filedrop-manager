<?php

/**
 * This file creates a MediaFire Filedrop Manager Settings page under the 'Settings' top-level menu item
 * 
 * This relies heavily on the wp tuts+ series "The Complete Guide to the WordPress Settings API"
 * @link http://wp.tutsplus.com/tutorials/the-complete-guide-to-the-wordpress-settings-api-part-1/
 */

 
/**
 * Add a submenu page for the plugin options
 */

	add_action( 'admin_menu', 'bhww_mediafire_filedrop_manager_submenu_page' );

	function bhww_mediafire_filedrop_manager_submenu_page() {
		
		// Add the submenu page under the Settings top-level menu
		$page_title     = 'MediaFire FileDrop Manager Settings';
		$menu_title     = 'MediaFire FileDrops';
		$capability     = 'manage_options';
		$menu_slug      = 'mediafire-filedrop-manager-settings';
		$menu_function  = 'bhww_mediafire_filedrop_manager_settings_page';
		
		add_options_page( $page_title, $menu_title, $capability, $menu_slug, $menu_function );
		
	}

	

/**
 * Function callback for Settings page
 */

	function bhww_mediafire_filedrop_manager_settings_page() {
	
		if ( ! current_user_can( 'manage_options' ) ) {
		
			wp_die( 'You do not have sufficient permissions to access this page.' );
			
		}
		
		// Render the HTML for the Settings page
		?>
		
		<div class="wrap">
		
			<?php screen_icon(); ?>
			
			<h2>MediaFire FileDrop Manager Plugin Settings</h2>
			
			<p class="bhww-readable-text"><br />Enter the settings for up to five FileDrops here. Only FileDrops with complete settings will be displayed.<br /></p>
			
			<form action="options.php" method="post">
			
				<?php settings_fields( 'bhww_mffdm_options' ); ?>
				
				<?php do_settings_sections( 'bhww_mffdm_one' ); ?>
				<input name="Submit" type="submit" value="Save Changes" />
				
				<?php do_settings_sections( 'bhww_mffdm_two' ); ?>
				<input name="Submit" type="submit" value="Save Changes" />
				
				<?php do_settings_sections( 'bhww_mffdm_three' ); ?>
				<input name="Submit" type="submit" value="Save Changes" />
				
				<?php do_settings_sections( 'bhww_mffdm_four' ); ?>
				<input name="Submit" type="submit" value="Save Changes" />
				
				<?php do_settings_sections( 'bhww_mffdm_five' ); ?>
				<input name="Submit" type="submit" value="Save Changes" />
				
			</form>
			
		</div><!-- /.wrap -->
		
		<?php
	}
	
	
	
/**
 * Register and define the settings
 */

	add_action( 'admin_init', 'bhww_mffdm_admin_init' );
	
	function bhww_mffdm_admin_init() {
	
		// Validate the fields and register with WordPress
		register_setting(
			'bhww_mffdm_options',
			'bhww_mffdm_options',
			'bhww_mffdm_validate_general_settings'
		);
		
		
		// Register a section for the first FileDrop options
		add_settings_section(
			'bhww_mffdm_first_filedrop',							// ID used to identify this section and with which to register options
			'First FileDrop Settings',								// Title of this section to be displayed on the plugin's Settings page
			'bhww_mffdm_section_text',								// Callback used to render the description of the section
			'bhww_mffdm_one'										// Page on which to add this section of options
		);
		
		add_settings_field(
			'bhww_mffdm_first_filedrop_title',						// ID used to identify this field throughout the plugin
			'FileDrop title',										// The label to the left of the option interface element
			'bhww_mffdm_first_filedrop_title_callback',				// The function responsible for rendering the option interface
			'bhww_mffdm_one',										// Page on which this option will be displayed
			'bhww_mffdm_first_filedrop'								// The section to which this field belongs
		);
		
		add_settings_field(
			'bhww_mffdm_first_filedrop_embed_code',					// ID used to identify this field throughout the plugin
			'FileDrop HTML Embed Code',								// The label to the left of the option interface element
			'bhww_mffdm_first_filedrop_embed_code_callback',		// The function responsible for rendering the option interface
			'bhww_mffdm_one',										// Page on which this option will be displayed
			'bhww_mffdm_first_filedrop'								// The section to which this field belongs
		);
		
		add_settings_field(
			'bhww_mffdm_first_filedrop_link',						// ID used to identify this field throughout the plugin
			'Link to FileDrop',										// The label to the left of the option interface element
			'bhww_mffdm_first_filedrop_link_callback',				// The function responsible for rendering the option interface
			'bhww_mffdm_one',										// Page on which this option will be displayed
			'bhww_mffdm_first_filedrop'								// The section to which this field belongs
		);
		
		
		// Register a section for the second FileDrop options
		add_settings_section(
			'bhww_mffdm_second_filedrop',							// ID used to identify this section and with which to register options
			'Second FileDrop Settings',								// Title of this section to be displayed on the plugin's Settings page
			'bhww_mffdm_section_text',								// Callback used to render the description of the section
			'bhww_mffdm_two'										// Page on which to add this section of options
		);
		
		add_settings_field(
			'bhww_mffdm_second_filedrop_title',						// ID used to identify this field throughout the plugin
			'FileDrop title',										// The label to the left of the option interface element
			'bhww_mffdm_second_filedrop_title_callback',			// The function responsible for rendering the option interface
			'bhww_mffdm_two',										// Page on which this option will be displayed
			'bhww_mffdm_second_filedrop'							// The section to which this field belongs
		);
		
		add_settings_field(
			'bhww_mffdm_second_filedrop_embed_code',				// ID used to identify this field throughout the plugin
			'FileDrop HTML Embed Code',								// The label to the left of the option interface element
			'bhww_mffdm_second_filedrop_embed_code_callback',		// The function responsible for rendering the option interface
			'bhww_mffdm_two',										// Page on which this option will be displayed
			'bhww_mffdm_second_filedrop'							// The section to which this field belongs
		);
		
		add_settings_field(
			'bhww_mffdm_second_filedrop_link',						// ID used to identify this field throughout the plugin
			'Link to FileDrop',										// The label to the left of the option interface element
			'bhww_mffdm_second_filedrop_link_callback',				// The function responsible for rendering the option interface
			'bhww_mffdm_two',										// Page on which this option will be displayed
			'bhww_mffdm_second_filedrop'							// The section to which this field belongs
		);
		
		
		// Register a section for the third FileDrop options
		add_settings_section(
			'bhww_mffdm_third_filedrop',							// ID used to identify this section and with which to register options
			'Third FileDrop Settings',								// Title of this section to be displayed on the plugin's Settings page
			'bhww_mffdm_section_text',								// Callback used to render the description of the section
			'bhww_mffdm_three'										// Page on which to add this section of options
		);
		
		add_settings_field(
			'bhww_mffdm_third_filedrop_title',						// ID used to identify this field throughout the plugin
			'FileDrop title',										// The label to the left of the option interface element
			'bhww_mffdm_third_filedrop_title_callback',				// The function responsible for rendering the option interface
			'bhww_mffdm_three',										// Page on which this option will be displayed
			'bhww_mffdm_third_filedrop'								// The section to which this field belongs
		);
		
		add_settings_field(
			'bhww_mffdm_third_filedrop_embed_code',					// ID used to identify this field throughout the plugin
			'FileDrop HTML Embed Code',								// The label to the left of the option interface element
			'bhww_mffdm_third_filedrop_embed_code_callback',		// The function responsible for rendering the option interface
			'bhww_mffdm_three',										// Page on which this option will be displayed
			'bhww_mffdm_third_filedrop'								// The section to which this field belongs
		);
		
		add_settings_field(
			'bhww_mffdm_third_filedrop_link',						// ID used to identify this field throughout the plugin
			'Link to FileDrop',										// The label to the left of the option interface element
			'bhww_mffdm_third_filedrop_link_callback',				// The function responsible for rendering the option interface
			'bhww_mffdm_three',										// Page on which this option will be displayed
			'bhww_mffdm_third_filedrop'								// The section to which this field belongs
		);
		
		
		// Register a section for the fourth FileDrop options
		add_settings_section(
			'bhww_mffdm_fourth_filedrop',							// ID used to identify this section and with which to register options
			'Fourth FileDrop Settings',								// Title of this section to be displayed on the plugin's Settings page
			'bhww_mffdm_section_text',								// Callback used to render the description of the section
			'bhww_mffdm_four'										// Page on which to add this section of options
		);
		
		add_settings_field(
			'bhww_mffdm_fourth_filedrop_title',						// ID used to identify this field throughout the plugin
			'FileDrop title',										// The label to the left of the option interface element
			'bhww_mffdm_fourth_filedrop_title_callback',			// The function responsible for rendering the option interface
			'bhww_mffdm_four',										// Page on which this option will be displayed
			'bhww_mffdm_fourth_filedrop'							// The section to which this field belongs
		);
		
		add_settings_field(
			'bhww_mffdm_fourth_filedrop_embed_code',				// ID used to identify this field throughout the plugin
			'FileDrop HTML Embed Code',								// The label to the left of the option interface element
			'bhww_mffdm_fourth_filedrop_embed_code_callback',		// The function responsible for rendering the option interface
			'bhww_mffdm_four',										// Page on which this option will be displayed
			'bhww_mffdm_fourth_filedrop'							// The section to which this field belongs
		);
		
		add_settings_field(
			'bhww_mffdm_fourth_filedrop_link',						// ID used to identify this field throughout the plugin
			'Link to FileDrop',										// The label to the left of the option interface element
			'bhww_mffdm_fourth_filedrop_link_callback',				// The function responsible for rendering the option interface
			'bhww_mffdm_four',										// Page on which this option will be displayed
			'bhww_mffdm_fourth_filedrop'							// The section to which this field belongs
		);
		
		
		// Register a section for the fifth FileDrop options
		add_settings_section(
			'bhww_mffdm_fifth_filedrop',							// ID used to identify this section and with which to register options
			'Fifth FileDrop Settings',								// Title of this section to be displayed on the plugin's Settings page
			'bhww_mffdm_section_text',								// Callback used to render the description of the section
			'bhww_mffdm_five'										// Page on which to add this section of options
		);
		
		add_settings_field(
			'bhww_mffdm_fifth_filedrop_title',						// ID used to identify this field throughout the plugin
			'FileDrop title',										// The label to the left of the option interface element
			'bhww_mffdm_fifth_filedrop_title_callback',				// The function responsible for rendering the option interface
			'bhww_mffdm_five',										// Page on which this option will be displayed
			'bhww_mffdm_fifth_filedrop'								// The section to which this field belongs
		);
		
		add_settings_field(
			'bhww_mffdm_fifth_filedrop_embed_code',					// ID used to identify this field throughout the plugin
			'FileDrop HTML Embed Code',								// The label to the left of the option interface element
			'bhww_mffdm_fifth_filedrop_embed_code_callback',		// The function responsible for rendering the option interface
			'bhww_mffdm_five',										// Page on which this option will be displayed
			'bhww_mffdm_fifth_filedrop'								// The section to which this field belongs
		);
		
		add_settings_field(
			'bhww_mffdm_fifth_filedrop_link',						// ID used to identify this field throughout the plugin
			'Link to FileDrop',										// The label to the left of the option interface element
			'bhww_mffdm_fifth_filedrop_link_callback',				// The function responsible for rendering the option interface
			'bhww_mffdm_five',										// Page on which this option will be displayed
			'bhww_mffdm_fifth_filedrop'								// The section to which this field belongs
		);
		
	}
	

	
/**
 * Draw the section header
 */

	function bhww_mffdm_section_text() {
	
		// Maybe add some text here in the future?
		
	}
	
	
	
/**
 * Callbacks for the first FileDrop
 */
	
	// Display and fill the form field for the FileDrop title
	function bhww_mffdm_first_filedrop_title_callback() {
	
		// First, read the plugin options collection
		$options = get_option( 'bhww_mffdm_options' ); 
		
		// Next, make sure the element is defined in the options. If not, we'll set an empty string.
		$summary = '';
		if ( isset( $options['bhww_mffdm_first_filedrop_title'] ) ) {
		
			$summary = $options['bhww_mffdm_first_filedrop_title'];
			
		}
		
		// Render the output
		$html = '<input type="text" size="100" id="bhww_mffdm_first_filedrop_title" name="bhww_mffdm_options[bhww_mffdm_first_filedrop_title]" value="' . $options['bhww_mffdm_first_filedrop_title'] . '" />';
		$html .= '<br /><p>Enter the title of this FileDrop to display on the FileDrops page</p>';
		
		echo $html;
		
	}
	
	// Display and fill the form field for the FileDrop embed code
	function bhww_mffdm_first_filedrop_embed_code_callback() {
	
		// First, read the plugin options collection
		$options = get_option( 'bhww_mffdm_options' ); 
		
		// Next, make sure the element is defined in the options. If not, we'll set an empty string.
		$summary = '';
		if ( isset( $options['bhww_mffdm_first_filedrop_embed_code'] ) ) {
		
			$summary = $options['bhww_mffdm_first_filedrop_embed_code'];
			
		}
		
		// Render the output
		$html = '<textarea class="large-text" rows="5" id="bhww_mffdm_first_filedrop_embed_code" name="bhww_mffdm_options[bhww_mffdm_first_filedrop_embed_code]">' . $options['bhww_mffdm_first_filedrop_embed_code'] . '</textarea>';
		$html .= '<br /><p>Enter the HTML Embed Code from the MediaFire FileDrop settings</p>';
		
		echo $html;
		
	}
	
	// Display and fill the form field for the FileDrop direct link
	function bhww_mffdm_first_filedrop_link_callback() {
	
		// First, read the plugin options collection
		$options = get_option( 'bhww_mffdm_options' ); 
		
		// Next, make sure the element is defined in the options. If not, we'll set an empty string.
		$summary = '';
		if ( isset( $options['bhww_mffdm_first_filedrop_link'] ) ) {
		
			$summary = $options['bhww_mffdm_first_filedrop_link'];
			
		}
		
		// Render the output
		$html = '<input type="text" size="100" id="bhww_mffdm_first_filedrop_link" name="bhww_mffdm_options[bhww_mffdm_first_filedrop_link]" value="' . $options['bhww_mffdm_first_filedrop_link'] . '" />';
		$html .= '<br /><p>Enter the direct link to this FileDrop<br /><strong>For example:</strong> http://www.mediafire.com/folder/8xj73b7qrbd2u/Sample_FileDrop</p>';
		
		echo $html;
		
	}
	
	
	
/**
 * Callbacks for the second FileDrop
 */
	
	// Display and fill the form field for the FileDrop title
	function bhww_mffdm_second_filedrop_title_callback() {
	
		// First, read the plugin options collection
		$options = get_option( 'bhww_mffdm_options' ); 
		
		// Next, make sure the element is defined in the options. If not, we'll set an empty string.
		$summary = '';
		if ( isset( $options['bhww_mffdm_second_filedrop_title'] ) ) {
		
			$summary = $options['bhww_mffdm_second_filedrop_title'];
			
		}
		
		// Render the output
		$html = '<input type="text" size="100" id="bhww_mffdm_second_filedrop_title" name="bhww_mffdm_options[bhww_mffdm_second_filedrop_title]" value="' . $options['bhww_mffdm_second_filedrop_title'] . '" />';
		$html .= '<br /><p>Enter the title of this FileDrop to display on the FileDrops page</p>';
		
		echo $html;
		
	}
	
	// Display and fill the form field for the FileDrop embed code
	function bhww_mffdm_second_filedrop_embed_code_callback() {
	
		// First, read the plugin options collection
		$options = get_option( 'bhww_mffdm_options' ); 
		
		// Next, make sure the element is defined in the options. If not, we'll set an empty string.
		$summary = '';
		if ( isset( $options['bhww_mffdm_second_filedrop_embed_code'] ) ) {
		
			$summary = $options['bhww_mffdm_second_filedrop_embed_code'];
			
		}
		
		// Render the output
		$html = '<textarea class="large-text" rows="5" id="bhww_mffdm_second_filedrop_embed_code" name="bhww_mffdm_options[bhww_mffdm_second_filedrop_embed_code]">' . $options['bhww_mffdm_second_filedrop_embed_code'] . '</textarea>';
		$html .= '<br /><p>Enter the HTML Embed Code from the MediaFire FileDrop settings</p>';
		
		echo $html;
		
	}
	
	// Display and fill the form field for the FileDrop direct link
	function bhww_mffdm_second_filedrop_link_callback() {
	
		// First, read the plugin options collection
		$options = get_option( 'bhww_mffdm_options' ); 
		
		// Next, make sure the element is defined in the options. If not, we'll set an empty string.
		$summary = '';
		if ( isset( $options['bhww_mffdm_second_filedrop_link'] ) ) {
		
			$summary = $options['bhww_mffdm_second_filedrop_link'];
			
		}
		
		// Render the output
		$html = '<input type="text" size="100" id="bhww_mffdm_second_filedrop_link" name="bhww_mffdm_options[bhww_mffdm_second_filedrop_link]" value="' . $options['bhww_mffdm_second_filedrop_link'] . '" />';
		$html .= '<br /><p>Enter the direct link to this FileDrop<br /><strong>For example:</strong> http://www.mediafire.com/folder/8xj73b7qrbd2u/Sample_FileDrop</p>';
		
		echo $html;
		
	}
	
	
	
/**
 * Callbacks for the third FileDrop
 */
	
	// Display and fill the form field for the FileDrop title
	function bhww_mffdm_third_filedrop_title_callback() {
	
		// First, read the plugin options collection
		$options = get_option( 'bhww_mffdm_options' ); 
		
		// Next, make sure the element is defined in the options. If not, we'll set an empty string.
		$summary = '';
		if ( isset( $options['bhww_mffdm_third_filedrop_title'] ) ) {
		
			$summary = $options['bhww_mffdm_third_filedrop_title'];
			
		}
		
		// Render the output
		$html = '<input type="text" size="100" id="bhww_mffdm_third_filedrop_title" name="bhww_mffdm_options[bhww_mffdm_third_filedrop_title]" value="' . $options['bhww_mffdm_third_filedrop_title'] . '" />';
		$html .= '<br /><p>Enter the title of this FileDrop to display on the FileDrops page</p>';
		
		echo $html;
		
	}
	
	// Display and fill the form field for the FileDrop embed code
	function bhww_mffdm_third_filedrop_embed_code_callback() {
	
		// First, read the plugin options collection
		$options = get_option( 'bhww_mffdm_options' ); 
		
		// Next, make sure the element is defined in the options. If not, we'll set an empty string.
		$summary = '';
		if ( isset( $options['bhww_mffdm_third_filedrop_embed_code'] ) ) {
		
			$summary = $options['bhww_mffdm_third_filedrop_embed_code'];
			
		}
		
		// Render the output
		$html = '<textarea class="large-text" rows="5" id="bhww_mffdm_third_filedrop_embed_code" name="bhww_mffdm_options[bhww_mffdm_third_filedrop_embed_code]">' . $options['bhww_mffdm_third_filedrop_embed_code'] . '</textarea>';
		$html .= '<br /><p>Enter the HTML Embed Code from the MediaFire FileDrop settings</p>';
		
		echo $html;
		
	}
	
	// Display and fill the form field for the FileDrop direct link
	function bhww_mffdm_third_filedrop_link_callback() {
	
		// First, read the plugin options collection
		$options = get_option( 'bhww_mffdm_options' ); 
		
		// Next, make sure the element is defined in the options. If not, we'll set an empty string.
		$summary = '';
		if ( isset( $options['bhww_mffdm_third_filedrop_link'] ) ) {
		
			$summary = $options['bhww_mffdm_third_filedrop_link'];
			
		}
		
		// Render the output
		$html = '<input type="text" size="100" id="bhww_mffdm_third_filedrop_link" name="bhww_mffdm_options[bhww_mffdm_third_filedrop_link]" value="' . $options['bhww_mffdm_third_filedrop_link'] . '" />';
		$html .= '<br /><p>Enter the direct link to this FileDrop<br /><strong>For example:</strong> http://www.mediafire.com/folder/8xj73b7qrbd2u/Sample_FileDrop</p>';
		
		echo $html;
		
	}
	
	
	
/**
 * Callbacks for the fourth FileDrop
 */
	
	// Display and fill the form field for the FileDrop title
	function bhww_mffdm_fourth_filedrop_title_callback() {
	
		// First, read the plugin options collection
		$options = get_option( 'bhww_mffdm_options' ); 
		
		// Next, make sure the element is defined in the options. If not, we'll set an empty string.
		$summary = '';
		if ( isset( $options['bhww_mffdm_fourth_filedrop_title'] ) ) {
		
			$summary = $options['bhww_mffdm_fourth_filedrop_title'];
			
		}
		
		// Render the output
		$html = '<input type="text" size="100" id="bhww_mffdm_fourth_filedrop_title" name="bhww_mffdm_options[bhww_mffdm_fourth_filedrop_title]" value="' . $options['bhww_mffdm_fourth_filedrop_title'] . '" />';
		$html .= '<br /><p>Enter the title of this FileDrop to display on the FileDrops page</p>';
		
		echo $html;
		
	}
	
	// Display and fill the form field for the FileDrop embed code
	function bhww_mffdm_fourth_filedrop_embed_code_callback() {
	
		// First, read the plugin options collection
		$options = get_option( 'bhww_mffdm_options' ); 
		
		// Next, make sure the element is defined in the options. If not, we'll set an empty string.
		$summary = '';
		if ( isset( $options['bhww_mffdm_fourth_filedrop_embed_code'] ) ) {
		
			$summary = $options['bhww_mffdm_fourth_filedrop_embed_code'];
			
		}
		
		// Render the output
		$html = '<textarea class="large-text" rows="5" id="bhww_mffdm_fourth_filedrop_embed_code" name="bhww_mffdm_options[bhww_mffdm_fourth_filedrop_embed_code]">' . $options['bhww_mffdm_fourth_filedrop_embed_code'] . '</textarea>';
		$html .= '<br /><p>Enter the HTML Embed Code from the MediaFire FileDrop settings</p>';
		
		echo $html;
		
	}
	
	// Display and fill the form field for the FileDrop direct link
	function bhww_mffdm_fourth_filedrop_link_callback() {
	
		// First, read the plugin options collection
		$options = get_option( 'bhww_mffdm_options' ); 
		
		// Next, make sure the element is defined in the options. If not, we'll set an empty string.
		$summary = '';
		if ( isset( $options['bhww_mffdm_fourth_filedrop_link'] ) ) {
		
			$summary = $options['bhww_mffdm_fourth_filedrop_link'];
			
		}
		
		// Render the output
		$html = '<input type="text" size="100" id="bhww_mffdm_fourth_filedrop_link" name="bhww_mffdm_options[bhww_mffdm_fourth_filedrop_link]" value="' . $options['bhww_mffdm_fourth_filedrop_link'] . '" />';
		$html .= '<br /><p>Enter the direct link to this FileDrop<br /><strong>For example:</strong> http://www.mediafire.com/folder/8xj73b7qrbd2u/Sample_FileDrop</p>';
		
		echo $html;
		
	}
	
	
	
/**
 * Callbacks for the fifth FileDrop
 */
	
	// Display and fill the form field for the FileDrop title
	function bhww_mffdm_fifth_filedrop_title_callback() {
	
		// First, read the plugin options collection
		$options = get_option( 'bhww_mffdm_options' ); 
		
		// Next, make sure the element is defined in the options. If not, we'll set an empty string.
		$summary = '';
		if ( isset( $options['bhww_mffdm_fifth_filedrop_title'] ) ) {
		
			$summary = $options['bhww_mffdm_fifth_filedrop_title'];
			
		}
		
		// Render the output
		$html = '<input type="text" size="100" id="bhww_mffdm_fifth_filedrop_title" name="bhww_mffdm_options[bhww_mffdm_fifth_filedrop_title]" value="' . $options['bhww_mffdm_fifth_filedrop_title'] . '" />';
		$html .= '<br /><p>Enter the title of this FileDrop to display on the FileDrops page</p>';
		
		echo $html;
		
	}
	
	// Display and fill the form field for the FileDrop embed code
	function bhww_mffdm_fifth_filedrop_embed_code_callback() {
	
		// First, read the plugin options collection
		$options = get_option( 'bhww_mffdm_options' ); 
		
		// Next, make sure the element is defined in the options. If not, we'll set an empty string.
		$summary = '';
		if ( isset( $options['bhww_mffdm_fifth_filedrop_embed_code'] ) ) {
		
			$summary = $options['bhww_mffdm_fifth_filedrop_embed_code'];
			
		}
		
		// Render the output
		$html = '<textarea class="large-text" rows="5" id="bhww_mffdm_fifth_filedrop_embed_code" name="bhww_mffdm_options[bhww_mffdm_fifth_filedrop_embed_code]">' . $options['bhww_mffdm_fifth_filedrop_embed_code'] . '</textarea>';
		$html .= '<br /><p>Enter the HTML Embed Code from the MediaFire FileDrop settings</p>';
		
		echo $html;
		
	}
	
	// Display and fill the form field for the FileDrop direct link
	function bhww_mffdm_fifth_filedrop_link_callback() {
	
		// First, read the plugin options collection
		$options = get_option( 'bhww_mffdm_options' ); 
		
		// Next, make sure the element is defined in the options. If not, we'll set an empty string.
		$summary = '';
		if ( isset( $options['bhww_mffdm_fifth_filedrop_link'] ) ) {
		
			$summary = $options['bhww_mffdm_fifth_filedrop_link'];
			
		}
		
		// Render the output
		$html = '<input type="text" size="100" id="bhww_mffdm_fifth_filedrop_link" name="bhww_mffdm_options[bhww_mffdm_fifth_filedrop_link]" value="' . $options['bhww_mffdm_fifth_filedrop_link'] . '" />';
		$html .= '<br /><p>Enter the direct link to this FileDrop<br /><strong>For example:</strong> http://www.mediafire.com/folder/8xj73b7qrbd2u/Sample_FileDrop</p>';
		
		echo $html;
		
	}
	

	
/**
 * Validate user input
 */

	function bhww_mffdm_validate_general_settings( $input ) {

		// Create an array for storing the validated options
		$output = array();
		
		// Loop through each of the incoming options
		foreach ( $input as $key => $value ) {
			
			// Check to see if the current option has a value. If so, process it.
			if ( isset ( $input[ $key ] ) ) {
			
				// Strip all HTML and PHP tags and properly handle quoted strings
				$output[ $key ] = strip_tags( stripslashes( $input[ $key ] ) );
				
			}
			
		}
		
		// Specific validation for certain fields
	
		// first FileDrop link validation
		$output['bhww_mffdm_first_filedrop_link'] = esc_url_raw( $input['bhww_mffdm_first_filedrop_link'] );
		
			if ( $output['bhww_mffdm_first_filedrop_link'] != $input['bhww_mffdm_first_filedrop_link'] ) {
			
				add_settings_error(
					'bhww_mffdm_first_filedrop_link',	
					'bhww_mffdm_first_filedrop_link_error',
					'The URL you entered for the FileDrop link does not appear to be valid. We have attempted to correct it, but you really should check it again to be sure that it is correct.',
					'error'
				);
				
			}
			
		// second FileDrop link validation
		$output['bhww_mffdm_second_filedrop_link'] = esc_url_raw( $input['bhww_mffdm_second_filedrop_link'] );
		
			if ( $output['bhww_mffdm_second_filedrop_link'] != $input['bhww_mffdm_second_filedrop_link'] ) {
			
				add_settings_error(
					'bhww_mffdm_second_filedrop_link',	
					'bhww_mffdm_second_filedrop_link_error',
					'The URL you entered for the FileDrop link does not appear to be valid. We have attempted to correct it, but you really should check it again to be sure that it is correct.',
					'error'
				);
				
			}
			
		// third FileDrop link validation
		$output['bhww_mffdm_third_filedrop_link'] = esc_url_raw( $input['bhww_mffdm_third_filedrop_link'] );
		
			if ( $output['bhww_mffdm_third_filedrop_link'] != $input['bhww_mffdm_third_filedrop_link'] ) {
			
				add_settings_error(
					'bhww_mffdm_third_filedrop_link',	
					'bhww_mffdm_third_filedrop_link_error',
					'The URL you entered for the FileDrop link does not appear to be valid. We have attempted to correct it, but you really should check it again to be sure that it is correct.',
					'error'
				);
				
			}
			
		// fourth FileDrop link validation
		$output['bhww_mffdm_fourth_filedrop_link'] = esc_url_raw( $input['bhww_mffdm_fourth_filedrop_link'] );
		
			if ( $output['bhww_mffdm_fourth_filedrop_link'] != $input['bhww_mffdm_fourth_filedrop_link'] ) {
			
				add_settings_error(
					'bhww_mffdm_fourth_filedrop_link',	
					'bhww_mffdm_fourth_filedrop_link_error',
					'The URL you entered for the FileDrop link does not appear to be valid. We have attempted to correct it, but you really should check it again to be sure that it is correct.',
					'error'
				);
				
			}
			
		// fifth FileDrop link validation
		$output['bhww_mffdm_fifth_filedrop_link'] = esc_url_raw( $input['bhww_mffdm_fifth_filedrop_link'] );
		
			if ( $output['bhww_mffdm_fifth_filedrop_link'] != $input['bhww_mffdm_fifth_filedrop_link'] ) {
			
				add_settings_error(
					'bhww_mffdm_fifth_filedrop_link',	
					'bhww_mffdm_fifth_filedrop_link_error',
					'The URL you entered for the FileDrop link does not appear to be valid. We have attempted to correct it, but you really should check it again to be sure that it is correct.',
					'error'
				);
				
			}
			
		// FileDrop embed code textarea validation
		$output['bhww_mffdm_first_filedrop_embed_code']     = esc_textarea( $input['bhww_mffdm_first_filedrop_embed_code'] );
		$output['bhww_mffdm_second_filedrop_embed_code']    = esc_textarea( $input['bhww_mffdm_second_filedrop_embed_code'] );
		$output['bhww_mffdm_third_filedrop_embed_code']     = esc_textarea( $input['bhww_mffdm_third_filedrop_embed_code'] );
		$output['bhww_mffdm_fourth_filedrop_embed_code']    = esc_textarea( $input['bhww_mffdm_fourth_filedrop_embed_code'] );
		$output['bhww_mffdm_fifth_filedrop_embed_code']     = esc_textarea( $input['bhww_mffdm_fifth_filedrop_embed_code'] );

		
		// Return the array processing any additional functions filtered by this action
		return apply_filters( 'bhww_mffdm_validate_general_settings', $output, $input );

	}