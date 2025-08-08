<?php

namespace UBC\APSC\Site_Settings;

/**
 * Adds the site settings for APSC Sites.
 *
 * @since   1.0.0
 * @package APSC_Site_Settings
 * @author  Rich Tape
 * @license GPL-2.0-or-later
 * @link    https://github.com/ubc/apsc-site-settings
 * @since   1.0.0
 * @class   Site_Settings
 */
class Site_Settings {

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
	 * Colour gradients for APSC
	 *
	 * @var array
	 */
	public $apsc_apsc_gradients = array(
		array(
			'name'     => 'APSC Primary To Transparent From Bottom',
			'slug'     => 'apsc-unit-primary-to-transparent-from-bottom',
			'gradient' => 'linear-gradient(transparent 50%,rgba(12,35,68,.8) 80%)',
		),
		array(
			'name'     => 'APSC Primary to Secondary From Top Right',
			'slug'     => 'apsc-unit-primary-to-secondary-from-top-right',
			'gradient' => 'linear-gradient(to right top, #002145, #002e60, #003b7c, #004899, #0055b7)',
		),
		array(
			'name'     => 'APSC Freeform (3-color)',
			'slug'     => 'apsc-freeform-3-color',
			'gradient' => 'linear-gradient(to left, #00a7e1, #0099dc, #008ad6, #007bce, #006bc5, #015fb6, #0153a8, #004899, #003e83, #00346e, #002b59, #002145)',
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
	 * Colour gradients for Engineering
	 *
	 * @var array
	 */
	public $apsc_engineering_gradients = array(
		array(
			'name'     => 'APSC Primary To Transparent From Bottom',
			'slug'     => 'apsc-unit-primary-to-transparent-from-bottom',
			'gradient' => 'linear-gradient(transparent 50%,rgba(66,25,46,.8) 80%)',
		),
		array(
			'name'     => 'APSC Primary to Secondary From Top Right',
			'slug'     => 'apsc-unit-primary-to-secondary-from-top-right',
			'gradient' => 'linear-gradient(to right top, #a6192e, #ae172e, #b7152e, #bf132e, #c8102e)',
		),
		array(
			'name'     => 'APSC Freeform (3-color)',
			'slug'     => 'apsc-freeform-3-color',
			'gradient' => 'linear-gradient(to right top, #a6192e, #ac182e, #b2162e, #b9152e, #bf132e, #c4142d, #c8152b, #cd162a, #d01b27, #d42024, #d72420, #da291c)',
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
	 * Colour gradients for Nursing
	 *
	 * @var array
	 */
	public $apsc_nursing_gradients = array(
		array(
			'name'     => 'APSC Primary To Transparent From Bottom',
			'slug'     => 'apsc-unit-primary-to-transparent-from-bottom',
			'gradient' => 'linear-gradient(transparent 50%,rgba(51,0,114,.8) 80%)',
		),
		array(
			'name'     => 'APSC Primary to Secondary From Top Right',
			'slug'     => 'apsc-unit-primary-to-secondary-from-top-right',
			'gradient' => 'linear-gradient(to right top, #330072, #3d0d76, #47187a, #4f227f, #582c83)',
		),
		array(
			'name'     => 'APSC Freeform (3-color)',
			'slug'     => 'apsc-freeform-3-color',
			'gradient' => 'linear-gradient(to right top, #330072, #3b0975, #421378, #481b7c, #4f227f, #54247f, #592780, #5e2980, #62277e, #66257c, #6a2279, #6d2077)',
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
	 * Colour gradients for SALA
	 *
	 * @var array
	 */
	public $apsc_sala_gradients = array(
		array(
			'name'     => 'APSC Primary To Transparent From Bottom',
			'slug'     => 'apsc-unit-primary-to-transparent-from-bottom',
			'gradient' => 'linear-gradient(transparent 50%,rgba(29,37,45,.8) 80%)',
		),
		array(
			'name'     => 'APSC Primary to Secondary From Top Right',
			'slug'     => 'apsc-unit-primary-to-secondary-from-top-right',
			'gradient' => 'linear-gradient(to right top, #1d252d, #2c343d, #3b454d, #4b565e, #5b6770)',
		),
		array(
			'name'     => 'APSC Freeform (3-color)',
			'slug'     => 'apsc-freeform-3-color',
			'gradient' => 'linear-gradient(to right top, #1d252d, #283139, #333d45, #3f4951, #4b565e, #566169, #616c74, #6c777f, #79848a, #869096, #949da1, #a2aaad)',
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
	 * Colour gradients for SCARP
	 *
	 * @var array
	 */
	public $apsc_scarp_gradients = array(
		array(
			'name'     => 'APSC Primary To Transparent From Bottom',
			'slug'     => 'apsc-unit-primary-to-transparent-from-bottom',
			'gradient' => 'linear-gradient(transparent 50%,rgba(220,68,5,.8) 80%)',
		),
		array(
			'name'     => 'APSC Primary to Secondary From Top Right',
			'slug'     => 'apsc-unit-primary-to-secondary-from-top-right',
			'gradient' => 'linear-gradient(to right top, #dc4405, #de4805, #e04b05, #e14f05, #e35205)',
		),
		array(
			'name'     => 'APSC Freeform (3-color)',
			'slug'     => 'apsc-freeform-3-color',
			'gradient' => 'linear-gradient(to right top, #dc4405, #dd4705, #df4a05, #e04c05, #e14f05, #e35503, #e45b01, #e66100, #e86c00, #ea7700, #ec8100, #ed8b00)',
		),
	);

	/**
	 * Set up our actions and filters.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function __construct() {

		// The CLF should continue to add its own colours, but we can change the 'default' colours for the unit.
		// Check to make sure the theme has a theme.json file.
		if ( ! wp_theme_has_theme_json() ) {
			return;
		}

		// Add the unit-specific colours.
		add_filter( 'wp_theme_json_data_default', array( $this, 'wp_theme_json_data_default__adjust_colour_palette' ) );

		// Add the unit-specific gradient.
		add_filter( 'wp_theme_json_data_default', array( $this, 'wp_theme_json_data_default__adjust_gradients' ) );
	}//end __construct()

	/**
	 * Modify the theme JSON data by updating the theme's color
	 * palette to be the appropriate values for each unit within APSC or from the custom colour palettes.
	 *
	 * @param object $theme_json The original theme JSON data.
	 * @return object The modified theme JSON data.
	 */
	public function wp_theme_json_data_default__adjust_colour_palette( $theme_json ) {
		// The existing json.
		$current_json = $theme_json->get_data();

		// Bail if the json doesn't exist.
		if ( empty( $current_json ) ) {
			return $theme_json;
		}

		// Also bail if we don't have settings -> color -> palette.
		if ( ! isset( $current_json['settings']['color']['palette'] ) ) {
			return $theme_json;
		}

		// Grab just the color palette.
		$current_palette = $current_json['settings']['color']['palette']['default'];

		// We need to keep black and white to ensure we don't impact everything.
		$defaults_to_keep = array(
			array(
				'name'  => 'Black',
				'slug'  => 'black',
				'color' => '#000000',
			),
			array(
				'name'  => 'White',
				'slug'  => 'white',
				'color' => '#ffffff',
			),
		);

		// Which palette should we keep?
		$selected_unit = $this->get_selected_unit();
		
		// Have custom colours been set?
		$custom_unit_colours = $this->get_custom_colours();

		// Now convert unit to the correct palette.
		$unit_palette_key = 'apsc_' . $selected_unit . '_palette';

		// Now grab this from this class's properties.
		$unit_palette = $this->{$unit_palette_key};
		
		// If custom palettes are set, replace palette with custom colours selection
		if(is_array($custom_unit_colours) && $custom_unit_colours['apsc-custom-unit-colours']) {
			foreach($unit_palette as $key => $values) {
				if(isset($custom_unit_colours[$values['slug']]))
					$unit_palette[$key]['color'] = $custom_unit_colours[$values['slug']];
			}
		}

		// Now merge in the unit's palette.
		$new_palette = array_merge( $unit_palette, $defaults_to_keep );
		
		// Set the new palette.
		$current_json['settings']['color']['palette']['default'] = $new_palette;

		// Set the new json.
		return $theme_json->update_with( $current_json );
	}//end wp_theme_json_data_default__adjust_colour_palette()


	/**
	 * Modify the theme.json to add the unit's gradient. We leave the theme-registered one but we override the
	 * WordPress default with the uit-specific one.
	 *
	 * @param object $theme_json The original theme JSON data.
	 * @return object The modified theme JSON data.
	 */
	public function wp_theme_json_data_default__adjust_gradients( $theme_json ) {

		// The existing json.
		$current_json = $theme_json->get_data();

		// Bail if the json doesn't exist.
		if ( empty( $current_json ) ) {
			return $theme_json;
		}

		// Also bail if we don't have settings -> color -> gradients.
		if ( ! isset( $current_json['settings']['color']['gradients'] ) ) {
			return $theme_json;
		}

		// Grab just the color gradients.
		$current_gradients = $current_json['settings']['color']['gradients']['default'];

		// Not keeping any defaults for now, but have this here for easier change in future.
		$defaults_to_keep = array();

		// Which gradient should we keep?
		$selected_unit = $this->get_selected_unit();

		// Now convert unit to the correct gradient.
		$unit_gradient_key = 'apsc_' . $selected_unit . '_gradients';

		// Now grab this from this class's properties.
		$unit_gradients = $this->{$unit_gradient_key};

		// Now merge in the unit's gradients.
		$new_gradients = array_merge( $unit_gradients, $defaults_to_keep );

		// Set the new gradients.
		$current_json['settings']['color']['gradients']['default'] = $new_gradients;

		// Set the new json.
		return $theme_json->update_with( $current_json );
	}//end wp_theme_json_data_default__adjust_gradients()

	/**
	 * Get the selected unit from the theme's options.
	 * Stored as 'apsc-unit'.
	 *
	 * @since 1.0.0
	 * @return string The selected unit.
	 */
	private function get_selected_unit() {

		// Ensure the \UBC_Collab_Theme_Options class exists.
		if ( ! class_exists( '\UBC_Collab_Theme_Options' ) ) {
			return 'apsc';
		}

		$selected_unit_from_theme_options = esc_html( \UBC_Collab_Theme_Options::get( 'apsc-unit' ) );

		if ( empty( $selected_unit_from_theme_options ) ) {
			$selected_unit_from_theme_options = 'apsc';
		}

		return $selected_unit_from_theme_options;
	}//end get_selected_unit()

	/**
	 * Get the custom colours from the theme's APSC options.
	 *
	 * @since 1.1.0
	 * @return array of custom colours.
	 */
	private function get_custom_colours() {

		// Ensure the \UBC_Collab_Theme_Options class exists.
		if ( ! class_exists( '\UBC_Collab_Theme_Options' ) ) {
			return;
		}

		$apsc_custom_unit_colours['apsc-custom-unit-colours'] = \UBC_Collab_Theme_Options::get( 'apsc-custom-unit-colours' );
		$apsc_custom_unit_colours['apsc-unit-primary'] = sanitize_text_field ( \UBC_Collab_Theme_Options::get( 'apsc-custom-unit-colour-primary' ) );
		$apsc_custom_unit_colours['apsc-unit-secondary'] = sanitize_text_field ( \UBC_Collab_Theme_Options::get( 'apsc-custom-unit-colour-secondary' ) );
		$apsc_custom_unit_colours['apsc-unit-tertiary'] = sanitize_text_field ( \UBC_Collab_Theme_Options::get( 'apsc-custom-unit-colour-tertiary' ) );

		return $apsc_custom_unit_colours;
	}//end get_custom_colours()
}//end class
