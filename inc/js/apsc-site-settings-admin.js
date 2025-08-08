jQuery(document).ready(function() {
	
	var clf_update_custom_colour1_checkbox = true;
	var clf_update_custom_colour2_checkbox = true;
	var clf_update_custom_colour3_checkbox = true;
	
	// Initialize the colour pickers
    jQuery("#apsc-custom-unit-colour-primary").wpColorPicker({
            change: function (event, ui) {
            	// we need to select the radio button
            	if( clf_update_custom_colour1_checkbox ) {
            			jQuery("#ubc-collab-theme-options-apsc-custom-unit-colours").prop('checked', true );
            		}
            	 clf_update_custom_colour1_checkbox = true;
            }
        });
	
    jQuery("#apsc-custom-unit-colour-secondary").wpColorPicker({
            change: function (event, ui) {
            	// we need to select the radio button
            	if( clf_update_custom_colour2_checkbox ) {
            			jQuery("#ubc-collab-theme-options-apsc-custom-unit-colours").prop('checked', true );
            		}
            	 clf_update_custom_colour2_checkbox = true;
            }
        });
	
    jQuery("#apsc-custom-unit-colour-tertiary").wpColorPicker({
            change: function (event, ui) {
            	// we need to select the radio button
            	if( clf_update_custom_colour3_checkbox ) {
            			jQuery("#ubc-collab-theme-options-apsc-custom-unit-colours").prop('checked', true );
            		}
            	 clf_update_custom_colour3_checkbox = true;
            }
        });


	// Listen for changes on the unit select, update the colour palettes based on the selected unit if they are not marked as customised
	jQuery("select[name='ubc-collab-theme-options[apsc-unit]']").on("change", function() {
		var isCustomChecked = jQuery("#ubc-collab-theme-options-apsc-custom-unit-colours").is(":checked");
		if (!isCustomChecked) {
			updateColourPalettes();
		}
	});

	// Listen for changes on the standard CLF colours, update the custom colour palettes accordingly
	jQuery("#colour-ubc-blue").on("change", function() {
		clf_update_colour();
	});

	// Listen for changes on the standard CLF colours, update the custom colour palettes accordingly
	jQuery("#colour-ubc-grey").on("change", function() {
		clf_update_colour();
	});
	
	// Standard CLF Colour Options, activates custom colours and set the custom primary colour to matching CLF colour
    function clf_update_colour () {
    	if ( jQuery("#ubc-grey input").is(':checked') ) {
			jQuery("#ubc-collab-theme-options-apsc-custom-unit-colours").prop('checked', true );
			jQuery("#apsc-custom-unit-colour-primary").wpColorPicker("color", '#2F5D7C');
			toggleCustomColourPickers();
    	}
    	else if (jQuery("#ubc-blue input").is(':checked')) {
			jQuery("#ubc-collab-theme-options-apsc-custom-unit-colours").prop('checked', true );
			jQuery("#apsc-custom-unit-colour-primary").wpColorPicker("color", '#002145');
			toggleCustomColourPickers();
    	}
    }

	// Resets to selected unit's default colours 
	jQuery("#apsc-custom-unit-colour-reset").on("click", function(event) {
		event.preventDefault(); // Prevent the default link behavior
		updateColourPalettes(); // Call the function to update colours
	});

	
	// Function to toggle the visibility of the custom colour pickers
	function toggleCustomColourPickers() {
		var isChecked = jQuery("#ubc-collab-theme-options-apsc-custom-unit-colours").is(":checked");
		jQuery("#apsc-custom-unit-colour-palettes").toggle(isChecked);
	}

	// Function to update the colour palettes based on the selected unit
	// This function makes an AJAX call to get the colours for the selected unit
	// and updates the colour pickers accordingly.
	function updateColourPalettes() {
		var selectedUnit = jQuery("select[name='ubc-collab-theme-options[apsc-unit]']").val();

		jQuery.ajax({
			url: ajax_callback_get_unit_colours_obj.ajax_url, // Localized in PHP
			type: "POST",
			dataType: "json",
			data: {
				action: "ajax_callback_get_unit_colours",
				unit: selectedUnit,
				nonce: ajax_callback_get_unit_colours_obj.nonce // Nonce for security
			},
			success: function(response) {
				if (response.success && response.data) {
					// Update the colour pickers
					clf_update_custom_colour1_checkbox = false;
					clf_update_custom_colour2_checkbox = false;
					clf_update_custom_colour3_checkbox = false;
					jQuery("#clf-unit-colour").wpColorPicker("color", response.data[0].color); // set primary colour on UBC CLF tab colour picker
					jQuery("#apsc-custom-unit-colour-primary").wpColorPicker("color", response.data[0].color);
					jQuery("#apsc-custom-unit-colour-secondary").wpColorPicker("color", response.data[1].color);
					jQuery("#apsc-custom-unit-colour-tertiary").wpColorPicker("color", response.data[2].color);
				}
			}
		});
	}

	jQuery("#clf-default-colour").prop('disabled', true).addClass("transparent");
	// Wait until .wp-picker-container exists before adding the message
	var intervalId = setInterval(function() {
		var $container = jQuery("#clf-unit-colour-box .wp-picker-container");
		if ($container.length) {
			$container.prepend('<div id="apsc-colours-managed">Custom colours managed by <a href="#apsc-theme-options" id="apsc-theme-options-link" onclick="event.preventDefault(); jQuery(\'a[href=\\\'#apsc-theme-options\\\']\').trigger(\'click\');">APSC Options</a></div>');
			clearInterval(intervalId);
		}
	}, 100);
});
