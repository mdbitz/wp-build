<?php
/**
 * Includes
 *
 * The $theme_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 */
$uttheme_includes = array(
    'functions/utils.php',           // Utility functions
    'functions/init.php',            // Initial theme setup and constants
    'functions/sidebar.php',         // Sidebar class
    'functions/config.php',          // Configuration
    'functions/options.php',         // Options Page(s)
    'functions/scripts.php',         // Scripts and stylesheets
    'functions/security.php',         // Security focused settings
);

foreach ($uttheme_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'uttheme'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);
