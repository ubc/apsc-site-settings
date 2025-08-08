<?php

namespace UBC\APSC\Site_Settings;

/**
 * Adds the site settings for APSC Sites.
 *
 * @since   1.0.0
 * @package APSC_Theme_Options
 * @author  Rich Tape
 * @license GPL-2.0-or-later
 * @link    https://github.com/ubc/apsc-site-settings
 * @since   1.0.0
 * @class   Theme_Options
 */
class Theme_Options {

	/**
	 * Colour palette for APSC default (blue)
	 *
	 * @var array
	 */
	public $apsc_apsc_palette = array(
		array(
			'name'  => 'APSC Blue Primary',
			'slug'  => 'apsc-unit-primary',
			'color' => '#002145',
		),
		array(
			'name'  => 'APSC Blue Secondary',
			'slug'  => 'apsc-unit-secondary',
			'color' => '#0055B7',
		),
		array(
			'name'  => 'APSC Blue Tertiary',
			'slug'  => 'apsc-unit-tertiary',
			'color' => '#40B4E5',
		),
	);

	/**
	 * Colour palette for APSC Engineering (red)
	 *
	 * @var array
	 */
	public $apsc_engineering_palette = array(
		array(
			'name'  => 'Engineering Red Primary',
			'slug'  => 'apsc-unit-primary',
			'color' => '#A6192E',
		),
		array(
			'name'  => 'Engineering Red Secondary',
			'slug'  => 'apsc-unit-secondary',
			'color' => '#C8102E',
		),
		array(
			'name'  => 'Engineering Red Tertiary',
			'slug'  => 'apsc-unit-tertiary',
			'color' => '#DA291C',
		),
	);

	/**
	 * Colour palette for APSC Nursing (purple)
	 *
	 * @var array
	 */
	public $apsc_nursing_palette = array(
		array(
			'name'  => 'Nursing Purple Primary',
			'slug'  => 'apsc-unit-primary',
			'color' => '#330072',
		),
		array(
			'name'  => 'Nursing Purple Secondary',
			'slug'  => 'apsc-unit-secondary',
			'color' => '#582C83',
		),
		array(
			'name'  => 'Nursing Purple Tertiary',
			'slug'  => 'apsc-unit-tertiary',
			'color' => '#6D2077',
		),
	);

	/**
	 * Colour palette for APSC SALA (grey)
	 *
	 * @var array
	 */
	public $apsc_sala_palette = array(
		array(
			'name'  => 'SALA Grey Primary',
			'slug'  => 'apsc-unit-primary',
			'color' => '#1D252D',
		),
		array(
			'name'  => 'SALA Grey Secondary',
			'slug'  => 'apsc-unit-secondary',
			'color' => '#5B6770',
		),
		array(
			'name'  => 'SALA Grey Tertiary',
			'slug'  => 'apsc-unit-tertiary',
			'color' => '#A2AAAD',
		),
	);

	/**
	 * Colour palette for APSC SCARP (orange)
	 *
	 * @var array
	 */
	public $apsc_scarp_palette = array(
		array(
			'name'  => 'SCARP Orange Primary',
			'slug'  => 'apsc-unit-primary',
			'color' => '#DC4405',
		),
		array(
			'name'  => 'SCARP Orange Secondary',
			'slug'  => 'apsc-unit-secondary',
			'color' => '#E35205',
		),
		array(
			'name'  => 'SCARP Orange Tertiary',
			'slug'  => 'apsc-unit-tertiary',
			'color' => '#ED8B00',
		),
	);

	/**
	 * Set up our actions and filters.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function __construct() {

		// Register the settings tab and the settings fields that will be displayed on that tab.
		add_action( 'admin_init', array( $this, 'admin_init__register_theme_options' ) );

		// Set up the default values for the theme options.
		add_filter( 'ubc_collab_default_theme_options', array( $this, 'ubc_collab_default_theme_options__default_values' ), 10, 1 );

		// Validate the theme options.
		add_filter( 'ubc_collab_theme_options_validate', array( $this, 'ubc_collab_theme_options_validate__validate' ), 10, 2 );

		// Now set the colour options based on what has been selected in the APSC specific settings.
		// The Arts/Faculty plugins do this on 'init' meaning it will be saving the option _on every page load_ which we don't want.
		// So we run on updated_option which means it's only adjusted when the theme options are saved.
		add_action( 'updated_option', array( $this, 'updated_option__set_colour_options' ), 15, 3 );

		// Also set the 'Is your unit part of a faculty' setting.
		//add_action( 'updated_option', array( $this, 'updated_option__set_is_faculty' ), 15, 3 );

		// And set the clf-unit-faculty setting to be 'applied_science'.
		add_action( 'updated_option', array( $this, 'updated_option__set_clf_unit_faculty' ), 15, 3 );

		// Load the google fonts if the options are selected.
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts__load_google_fonts' ) );

		// Load the apsc custom colours selection.
		add_action( 'admin_enqueue_scripts', array( $this, 'wp_enqueue_scripts__load_apsc_custom_colours_admin_ui' ) );
		
		// Ajax callback for providing the colour palette to front end JS
		add_action( 'wp_ajax_ajax_callback_get_unit_colours', array( $this, 'ajax_callback_get_unit_colours' ) );
	
		// Add the preconnect to the enqueued google fonts if we're using them.
		add_filter( 'style_loader_tag', array( $this, 'style_loader_tag__add_preconnect' ), 10, 2 );

		// Add the class to the body if we're hiding the address bar.
		add_filter( 'body_class', array( $this, 'body_class__add_hide_address_bar' ) );
	}//end __construct()

	/**
	 * Register the theme options.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function admin_init__register_theme_options() {

		add_settings_section(
			'apsc-theme-options',
			'APSC Options',
			'__return_false',
			'theme_options'
		);

		// Add Colour options.
		add_settings_field(
			'faculty-selection',
			'APSC Unit Selection',
			array( $this, 'apsc_unit_selection_field' ),
			'theme_options',
			'apsc-theme-options'
		);

		// Add use Open Sans checkbox.
		add_settings_field(
			'use-open-sans',
			'Use Open Sans',
			array( $this, 'use_open_sans_field' ),
			'theme_options',
			'apsc-theme-options'
		);

		// Add use Lora checkbox.
		add_settings_field(
			'use-lora',
			'Use Lora',
			array( $this, 'use_lora_field' ),
			'theme_options',
			'apsc-theme-options'
		);

		// Add hiding the CLF address bar.
		add_settings_field(
			'hide-clf-address-bar',
			'Hide CLF Address Bar',
			array( $this, 'hide_clf_address_bar_field' ),
			'theme_options',
			'apsc-theme-options'
		);

		// Register a new text field for the APSC Design System URL.
		add_settings_field(
			'apsc-design-system-url',
			'APSC Design System URL',
			array( $this, 'apsc_design_system_url_field' ),
			'theme_options',
			'apsc-theme-options'
		);
		
		// Register a new text field for APSC custom colour palettes.
		add_settings_field(
			'apsc-custom-colours',
			'Define custom colours<p>&emsp;Primary colour</p><p>&emsp;Secondary colour</p><p>&emsp;Tertiary colour</p>',
			array( $this, 'apsc_design_system_colour_fields' ),
			'theme_options',
			'apsc-theme-options'
		);
	}//end admin_init__register_theme_options()

	/**
	 * The dropdown field for which APSC Unit this site is for.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function apsc_unit_selection_field() {

		?>

		<div class="explanation"><a href="#" class="explanation-help">Info</a>
			<div><p>Select which unit this website is for, and the website will deploy unit-specific style and options.</p></div>
		</div>
		<div id="unit-selection-box">
			<select name="ubc-collab-theme-options[apsc-unit]">
			<?php
			foreach ( $this->unit_list() as $unit ) {
				\UBC_Collab_Theme_Options::option( 'apsc-unit', $unit['value'], $unit['label'] );
			}
			?>
			</select>

		</div>

			<?php
	}//end apsc_unit_selection_field()


	/**
	 * The checkbox field for whether to use Open Sans.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function use_open_sans_field() {

		?>
		<div class="explanation"><a href="#" class="explanation-help">Info</a>
			<div><p>Selecting this will mean that the Open Sans font is used by default for items that use a sans serif font.</p></div>
		</div>
		<div id="use-open-sans-box">
			<?php \UBC_Collab_Theme_Options::checkbox( 'use-open-sans', 1, 'Use Open Sans Font' ); ?>
		</div>
		<?php
	}//end use_open_sans_field()

	/**
	 * The checkbox field for whether to use Lora.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function use_lora_field() {

		?>
		<div class="explanation"><a href="#" class="explanation-help">Info</a>
			<div><p>Selecting this will mean that the Lora font is used by default for items that use a serif font.</p></div>
		</div>
		<div id="use-lora-box">
			<?php \UBC_Collab_Theme_Options::checkbox( 'use-lora', 1, 'Use Lora Font' ); ?>
		</div>
		<?php
	}//end use_lora_field()

	/**
	 * The checkbox field for hiding the CLF Address Bar.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function hide_clf_address_bar_field() {
		?>
		<div class="explanation"><a href="#" class="explanation-help">Info</a>
			<div><p>Selecting this will hide the CLF Address Bar by setting its display to none.</p></div>
		</div>
		<div id="hide-clf-address-bar-box">
			<?php \UBC_Collab_Theme_Options::checkbox( 'hide-clf-address-bar', 1, 'Hide CLF Address Bar' ); ?>
		</div>
		<?php
	}//end hide_clf_address_bar_field()

	/**
	 * The text field for the APSC Design System URL.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function apsc_design_system_url_field() {
		?>
		<div class="explanation"><a href="#" class="explanation-help">Info</a>
			<div><p>URL for the APSC Design System CSS file.</p></div>
		</div>
		<div id="apsc-design-system-url-box">
			<?php \UBC_Collab_Theme_Options::text( 'apsc-design-system-url', 'APSC Design System URL' ); ?>
		</div> 
		<?php
	}
	
	/**
	 * The text field for the APSC custom colour set.
	 *
	 * @since 1.1.0
	 * @return void
	 */
	public function apsc_design_system_colour_fields() {
		?>
		<div class="explanation"><a href="#" class="explanation-help">Info</a>
			<div><p>Custom colours for the APSC unit.</p></div>
		</div>
		<div id="apsc-design-system-custom-colours-box">
		<?php 
			\UBC_Collab_Theme_Options::checkbox( 'apsc-custom-unit-colours', 1, 'Set custom colours' );
			?>
			<div id="apsc-custom-unit-colour-palettes">
			<?php
				// Display the colour pickers for primary, secondary, and tertiary colours.
				\UBC_Collab_Theme_Options::color_picker( 'apsc-custom-unit-colour-primary' );
				\UBC_Collab_Theme_Options::color_picker( 'apsc-custom-unit-colour-secondary' );
				\UBC_Collab_Theme_Options::color_picker( 'apsc-custom-unit-colour-tertiary' );
			// offer the option to reset to the current unit colours (AJAX call)
			?>
			<div class="wp-block-button button is-style-apsc-default"><a href='#' id="apsc-custom-unit-colour-reset" class="wp-block-button__link wp-element-button">Reset to current unit colours</a></div>
			</div>
		</div> 
		<?php  
		
	}

	/**
	 * Add 'apsc-hide-address-bar' class to the body tag if the option is enabled.
	 *
	 * @since 1.0.0
	 * @param array $classes Existing body classes.
	 * @return array Modified body classes.
	 */
	public function body_class__add_hide_address_bar( $classes ) {

		if ( \UBC_Collab_Theme_Options::get( 'hide-clf-address-bar' ) ) {
			$classes[] = 'apsc-hide-address-bar';
		}
		return $classes;
	}//end body_class__add_hide_address_bar()


	/**
	 * Sets the default values for the APSC Theme Options.
	 *
	 * @since 1.0.0
	 * @param array $options The default values for the APSC Theme Options.
	 * @return array The default values for the APSC Theme Options added to the existing options.
	 */
	public function ubc_collab_default_theme_options__default_values( $options ) {

		if ( ! is_array( $options ) ) {
			$options = array();
		}

		$defaults = array(
			'apsc-unit'              => 'apsc',
			'use-open-sans'          => false,
			'use-lora'               => false,
			'hide-clf-address-bar'   => false,
			'apsc-design-system-url' => 'https://apsc-design-system.netlify.app/apsc-base.min.css',
			'apsc-custom-unit-colours'   => false,
			'apsc-custom-unit-colour-primary' => '#002145',
			'apsc-custom-unit-colour-secondary' => '#0055B7',
			'apsc-custom-unit-colour-tertiary' => '#40B4E5',
		);

		$options = array_merge( $options, $defaults );

		return $options;
	}//end ubc_collab_default_theme_options__default_values()

	/**
	 * Validation function for each of the APSC Theme Options.
	 *
	 * @since 1.0.0
	 * @param array $output The sanitized theme options so far.
	 * @param array $input Unknown values.
	 * @return array Sanitized theme options ready to be stored in the database.
	 */
	public function ubc_collab_theme_options_validate__validate( $output, $input ) {

		// Grab default values as base.
		$defaults = $this->ubc_collab_default_theme_options__default_values( array() );

		$defaults['apsc-unit']              = \UBC_Collab_Theme_Options::validate_text( $input['apsc-unit'], $defaults['apsc-unit'] );
		$defaults['use-open-sans']          = (bool) $input['use-open-sans'];
		$defaults['use-lora']               = (bool) $input['use-lora'];
		$defaults['hide-clf-address-bar']   = (bool) $input['hide-clf-address-bar'];
		$defaults['apsc-design-system-url'] = esc_url( $input['apsc-design-system-url'] );
		$defaults['apsc-custom-unit-colours'] = (bool) $input['apsc-custom-unit-colours'];
		$defaults['apsc-custom-unit-colour-primary'] = $input['apsc-custom-unit-colour-primary'];
		$defaults['apsc-custom-unit-colour-secondary'] = $input['apsc-custom-unit-colour-secondary'];
		$defaults['apsc-custom-unit-colour-tertiary'] = $input['apsc-custom-unit-colour-tertiary'];

		$output = array_merge( $output, $defaults );

		return $output;
	}//end ubc_collab_theme_options_validate__validate()

	/**
	 * When the theme options are saved, set the colour options based on what has been selected in the APSC specific settings.
	 *
	 * @param string $option    Name of the updated option.
	 * @param mixed  $old_value The old option value.
	 * @param mixed  $value     The new option value.
	 * @return void
	 */
	public function updated_option__set_colour_options( $option, $old_value, $value ) {

		// Only do this if we're updating the theme options which is 'ubc-collab-theme-options'.
		if ( 'ubc-collab-theme-options' !== $option ) {
			return;
		}

		$custom_colours_selected = \UBC_Collab_Theme_Options::get( 'apsc-custom-unit-colours' );

		$clf_theme_options_key_to_save = 'clf-unit-colour';
		
		if($custom_colours_selected) {
			// update clf-unit-colour field to match the custom primary colour selected in APSC Options
			$custom_primary_colour = \UBC_Collab_Theme_Options::get( 'apsc-custom-unit-colour-primary' );
			\UBC_Collab_Theme_Options::update( $clf_theme_options_key_to_save, sanitize_text_field( $custom_primary_colour ) );
		} else {
			//reset custom colours to the ones from the palette
			$selected_unit = sanitize_text_field( \UBC_Collab_Theme_Options::get( 'apsc-unit' ) );
			
			// OK, so we're saving theme options. So we need to set the 'default-colour' option to be
			// the appropriate colour for the selected unit.
			$palette_key = $this->get_palette_key_from_unit( $selected_unit );

			$unit_palette = $this->{$palette_key};

			$primary_colour = $unit_palette[0]['color'];
			$secondary_colour = $unit_palette[1]['color'];
			$tertiary_colour = $unit_palette[2]['color'];
			
			\UBC_Collab_Theme_Options::update( $clf_theme_options_key_to_save, sanitize_text_field( $primary_colour ) );
			\UBC_Collab_Theme_Options::update( 'apsc-custom-unit-colour-primary', sanitize_text_field( $primary_colour ) );
			\UBC_Collab_Theme_Options::update( 'apsc-custom-unit-colour-secondary', sanitize_text_field( $secondary_colour ) );
			\UBC_Collab_Theme_Options::update( 'apsc-custom-unit-colour-tertiary', sanitize_text_field( $tertiary_colour ) );
			
		}
		
	}//end updated_option__set_colour_options()


	/**
	 * When the theme options are saved, set the 'Is your unit part of a faculty' setting to be yes.
	 * !-- NOTE: Disabled to allow hiding faculty label, as of July 2025 --
	 * @param string $option    Name of the updated option.
	 * @param mixed  $old_value The old option value.
	 * @param mixed  $value     The new option value.
	 * @return void
	 */
	public function updated_option__set_is_faculty( $option, $old_value, $value ) {

		// Only do this if we're updating the theme options which is 'ubc-collab-theme-options'.
		if ( 'ubc-collab-theme-options' !== $option ) {
			return;
		}

		$clf_theme_options_key_to_save = 'clf-administrative';
		
		\UBC_Collab_Theme_Options::update( $clf_theme_options_key_to_save, 'yes' );
		
	}//end updated_option__set_is_faculty()


	/**
	 * When the theme options are saved, set the 'Faculty Name' setting to be 'applied_science'.
	 *
	 * @param string $option    Name of the updated option.
	 * @param mixed  $old_value The old option value.
	 * @param mixed  $value     The new option value.
	 * @return void
	 */
	public function updated_option__set_clf_unit_faculty( $option, $old_value, $value ) {

		// Only do this if we're updating the theme options which is 'ubc-collab-theme-options'.
		if ( 'ubc-collab-theme-options' !== $option ) {
			return;
		}

		$clf_theme_options_key_to_save = 'clf-unit-faculty';
		
		\UBC_Collab_Theme_Options::update( $clf_theme_options_key_to_save, 'applied_science' );
		
	}//end updated_option__set_clf_unit_faculty()

	/**
	 * Get the palette key based on the APSC Unit.
	 *
	 * @param string $unit The APSC Unit.
	 * @return string The palette key.
	 */
	public function get_palette_key_from_unit( $unit ) {

		switch ( $unit ) {

			case 'apsc':
				$palette_key = 'apsc_apsc_palette';
				break;
			case 'engineering':
				$palette_key = 'apsc_engineering_palette';
				break;
			case 'sala':
				$palette_key = 'apsc_sala_palette';
				break;
			case 'scarp':
				$palette_key = 'apsc_scarp_palette';
				break;
			case 'nursing':
				$palette_key = 'apsc_nursing_palette';
				break;
		}

		return $palette_key;
	}//end get_palette_key_from_unit()

	/**
	 * Get the list of APSC Units.
	 *
	 * @since 1.0.0
	 * @return array The list of APSC Units.
	 */
	private function unit_list() {

		$units = array(
			'apsc'        => array(
				'value' => 'apsc',
				'label' => 'APSC',
			),
			'engineering' => array(
				'value' => 'engineering',
				'label' => 'Engineering',
			),
			'sala'        => array(
				'value' => 'sala',
				'label' => 'SALA',
			),
			'scarp'       => array(
				'value' => 'scarp',
				'label' => 'SCARP',
			),
			'nursing'     => array(
				'value' => 'nursing',
				'label' => 'Nursing',
			),
		);

		return $units;
	}//end unit_list()

	/**
	 * If the theme options are set to load the google fonts, load them.
	 *
	 * @return void
	 */
	public function wp_enqueue_scripts__load_google_fonts() {

		// Determine if we're loading Open Sans.
		$use_open_sans = \UBC_Collab_Theme_Options::get( 'use-open-sans' );

		// Determine if we're loading Lora.
		$use_lora = \UBC_Collab_Theme_Options::get( 'use-lora' );

		$use_only_open_sans_url = 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap';
		$use_only_lora_url      = 'https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap';

		// Weird bug here, this doesn't seem to work from one URL. Had to enqueue them separately. Leaving this here in case this gets worked out.
		$use_both_url = 'https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap';

		if ( ! $use_open_sans && ! $use_lora ) {
			return;
		}

		if ( $use_open_sans && $use_lora ) {
			wp_enqueue_style( 'apsc-gfont-open-sans', $use_only_open_sans_url );
			wp_enqueue_style( 'apsc-gfont-lora', $use_only_lora_url );
			return;
		}

		if ( $use_open_sans ) {
			wp_enqueue_style( 'apsc-gfont-open-sans', $use_only_open_sans_url );
			return;
		}

		if ( $use_lora ) {
			wp_enqueue_style( 'apsc-gfont-lora', $use_only_lora_url );
			return;
		}
	}
	
	/**
	 * Load the custom colour selection for APSC options.
	 *
	 * @return void
	 */
	public function wp_enqueue_scripts__load_apsc_custom_colours_admin_ui() {
		
		// include css file
        wp_enqueue_style('apsc-option-style', plugins_url('/css/apsc-site-settings-admin.css', __FILE__ ));
		
		// load colour picker
		wp_register_script('apsc-option-script', plugins_url('/js/apsc-site-settings-admin.js', __FILE__));
		wp_enqueue_script('apsc-option-script');
		
	   $title_nonce = wp_create_nonce( 'apsc_option_script' );
	   wp_localize_script(
		  'apsc-option-script',
		  'ajax_callback_get_unit_colours_obj',
		  array(
			 'ajax_url' => admin_url( 'admin-ajax.php' ),
			 'nonce'    => $title_nonce,
		  )
	   );
	}
	/**
	 * Load the custom colour selection for APSC options.
	 *
	 * @return void
	 */
	public function ajax_callback_get_unit_colours() {
		// Check the nonce for security.
		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'apsc_option_script' ) ) {
			wp_send_json_error( 'Invalid nonce.' );
		}
		$unit = $_POST['unit'];
		$palette = $this->get_palette_key_from_unit($unit);

		// Return the palette array dynamically using the property name in $palette
		if ( property_exists( $this, $palette ) ) {
			$colour_palette = $this->{$palette};
			wp_send_json_success( $colour_palette );
		} else {
			wp_send_json_error( 'Palette not found.' );
		}
		wp_die();
	}

	/**
	 * Add the preconnect tag to the style loader.
	 *
	 * @since 1.0.0
	 * @param string $tag The style loader tag.
	 * @param string $handle The style loader handle.
	 * @return string The style loader tag.
	 */
	public function style_loader_tag__add_preconnect( $tag, $handle ) {

		// If the $tag string does not contain 'apsc-gfont-' then we bail.
		if ( false === strpos( $tag, 'apsc-gfont-' ) ) {
			return $tag;
		}

		$rel_preconnect = "rel='stylesheet preconnect'";

		return str_replace(
			"rel='stylesheet'",
			$rel_preconnect,
			$tag
		);
	}//end style_loader_tag__add_preconnect()
}//end class
