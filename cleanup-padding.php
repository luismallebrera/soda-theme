<?php
/**
 * One-time cleanup script for corrupted padding data
 * 
 * INSTRUCTIONS:
 * 1. Upload this file to your WordPress root directory
 * 2. Visit: yourdomain.com/cleanup-padding.php in your browser
 * 3. Delete this file after running once
 */

// Load WordPress
require_once('wp-load.php');

// Check if user is admin
if (!current_user_can('manage_options')) {
    die('You must be an administrator to run this script.');
}

// Get current theme mods
$theme_slug = get_option('stylesheet');
$mods = get_theme_mods();

echo '<h2>Current menu_navigation_padding value:</h2>';
echo '<pre>';
print_r(get_theme_mod('menu_navigation_padding'));
echo '</pre>';

// Reset the menu_navigation_padding to clean state
set_theme_mod('menu_navigation_padding', array(
    'padding-top'    => '0px',
    'padding-right'  => '0px',
    'padding-bottom' => '0px',
    'padding-left'   => '0px',
));

echo '<h2>After cleanup:</h2>';
echo '<pre>';
print_r(get_theme_mod('menu_navigation_padding'));
echo '</pre>';

echo '<h3 style="color: green;">✓ Cleanup complete! Now go to Customizer and hard refresh (Ctrl+Shift+R)</h3>';
echo '<p><strong>IMPORTANT:</strong> Delete this file (cleanup-padding.php) from your server now!</p>';
