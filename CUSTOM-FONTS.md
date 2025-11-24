# Custom Fonts Integration

This theme supports custom fonts from Elementor and other custom font plugins through integration with Kirki's Typography field.

## Supported Plugins

1. **[Custom Fonts](https://wordpress.org/plugins/custom-fonts/)** - The plugin used by Elementor for custom fonts
2. **[Custom Typekit Fonts](https://wordpress.org/plugins/custom-typekit-fonts/)** - For Adobe Typekit integration

## Setup Instructions

### 1. Install a Custom Fonts Plugin

Install and activate one of the supported plugins:
- **Custom Fonts** (recommended, used by Elementor)
- **Custom Typekit Fonts**

### 2. Add Your Custom Fonts

#### Using Custom Fonts Plugin:
1. Go to **Appearance > Custom Fonts** in WordPress admin
2. Click **Add New Font**
3. Enter your font name
4. Upload your font files (WOFF2, WOFF, TTF, etc.)
5. Assign font weights
6. Publish

#### Using Custom Typekit Fonts:
1. Go to **Appearance > Custom Typekit Fonts**
2. Enter your Typekit Project ID
3. Add font details (family name, slug, weights)
4. Save changes

### 3. Use Custom Fonts in Kirki Typography Fields

Once fonts are added, they will automatically appear in Kirki Typography fields under:
- **Custom Fonts** category (for Custom Fonts plugin)
- **TypeKit Fonts** category (for Custom Typekit Fonts plugin)

## Example: Adding a Typography Field with Custom Fonts

```php
new \Kirki\Field\Typography(
    array(
        'settings' => 'my_typography_setting',
        'label'    => esc_html__( 'Typography', 'soda-theme' ),
        'section'  => 'my_section',
        'default'  => array(
            'font-family'    => 'Inter',
            'variant'        => 'regular',
            'font-size'      => '16px',
            'line-height'    => '1.6',
            'letter-spacing' => '0',
            'text-transform' => 'none',
        ),
        'choices'  => apply_filters(
            'soda_theme_fonts_choices', 
            array(
                'variant' => array(
                    '300',
                    'regular',
                    '500',
                    '600',
                    '700',
                ),
            )
        ),
        'output'   => array(
            array(
                'element' => 'body',
            ),
        ),
    )
);
```

## How It Works

The theme includes a custom fonts integration class (`inc/custom-fonts.php`) that:

1. Detects installed custom font plugins
2. Retrieves custom fonts from those plugins
3. Adds them to Kirki's font list via the `soda_theme_fonts_list` filter
4. Makes them available in Typography fields through the `soda_theme_fonts_choices` filter

### Filter Usage

**For theme developers** - When adding Typography fields, always include the custom fonts filter:

```php
'choices' => apply_filters(
    'soda_theme_fonts_choices', 
    array(
        'variant' => array(
            'regular',
            '500',
            '600',
            '700',
        ),
    )
),
```

This ensures custom fonts from plugins are available in your Typography field.

## Technical Details

### Filters Available

- `soda_theme_fonts_list` - Modifies the fonts list array structure
- `soda_theme_fonts_choices` - Adds custom fonts to Kirki Typography field choices

### Font Structure

Custom fonts are stored in the following structure:

```php
array(
    'families' => array(
        'custom_fonts' => array(
            'text'     => 'Custom Fonts',
            'children' => array(
                array(
                    'id'   => 'My Custom Font',
                    'text' => 'My Custom Font',
                ),
            ),
        ),
    ),
    'variants' => array(
        'My Custom Font' => array( '100', '200', '300', '400', '500', '600', '700', '800', '900' ),
    ),
)
```

## Troubleshooting

### Debug Mode

If fonts aren't appearing, enable debug mode to see what's detected:

1. Add this line to your `functions.php` (temporarily):
```php
add_action( 'admin_notices', 'soda_theme_debug_custom_fonts' );
```

2. Go to WordPress admin - you'll see a debug notice showing:
   - Whether Elementor is loaded
   - How many font posts are found
   - What fonts are stored in options
   - Which font families are detected

3. Remove the debug line when done

### Common Issues

**Elementor fonts not appearing?**
1. **Check Elementor Pro is active** - Custom fonts require Elementor Pro
2. Go to **Elementor > Custom Fonts** and verify fonts are added
3. Make sure font status is "Published", not "Draft"
4. Try re-saving your fonts in Elementor
5. Clear Elementor cache: **Elementor > Tools > Regenerate CSS & Data**

**Custom Fonts plugin fonts not appearing?**
1. Make sure the Custom Fonts plugin is installed and activated
2. Verify you've added fonts in **Appearance > Custom Fonts**
3. Check that font posts are published
4. Clear any caching (browser, WordPress, CDN)

**Fonts appear in customizer but not loading on frontend?**
1. Check that font files are properly uploaded in Elementor/Custom Fonts
2. Verify font weights are assigned correctly
3. Inspect browser console for any 404 or loading errors
4. Ensure the output CSS selector is correct in your Typography field

**Fonts work in Elementor but not in Kirki?**
1. Make sure you're using the `soda_theme_fonts_choices` filter in your Typography field
2. Check the debug output to see if fonts are detected
3. Try clearing all caches and regenerating Elementor CSS

### Still Having Issues?

Enable debug mode (see above) and check:
- `elementor_loaded` should be `true` if Elementor is active
- `elementor_font_posts` should show count > 0 if you have fonts
- `families_detected` should include `elementor_fonts` or `custom_fonts`

If fonts are detected in debug but not showing in customizer, it's likely a caching issue.

## Credits

Custom fonts integration adapted from [VLThemes Add Custom Fonts To Kirki](https://github.com/vlthemes/VLThemes-Add-Custom-Fonts-To-Kirki)
