# APSC Site Settings

This plugin adds several APSC-specific theme settings in a new 'APSC Options' tab in Appearance > Theme Options.

## APSC Unit Selection

A drop-down field allowing a site administrator to select which unit this site represents. By choosing an appropriate unit and saving the theme options this will automatically change the Colour Palette and Gradients that are available within the editor. This will also automatically adjust any unit-specific colours within block patterns to be the appropriate colour for the chosen unit.

Default Value: APSC

## Use Open Sans Font

A checkbox which, when selected, will load the Open Sans font from Google Fonts on the front-end of the site.

Default Value: Unchecked (i.e. not loaded)

## Use Lora Font

A checkbox which, when selected, will load the Lora font from Google Fonts on the front-end of the site.

Default Value: Unchecked (i.e. not loaded)

--

_Note_: If both the Open Sans and Lora font options are selected, then the URL is combined ensuring only one remote hit is made helping improve performance.

## Hide CLF Address Bar

A checkbox which, when selected, will add a `hide-clf-address-bar` class to the body tag. Additionally some inline css is loaded which will then hide both the address bar and 'to top' link container.

Default Value: Unchecked (i.e. footer not hidden)

## APSC Design System URL

A text entry field which will be used as the URL to load the APSC Design System. If this is left blank, then the URL from the `UBC_APSCBLOCKS_DESIGN_SYSTEM_URL` constant will be loaded, and if that is blank, then it will default to https://apsc-design-system.netlify.app/design-system.min.css

Default Value: https://apsc-design-system.netlify.app/design-system.min.css

see `get_design_system_url()` in APSC Blocks plugin for how this logic is detailed.
