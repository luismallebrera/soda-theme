# Soda Theme - AI Coding Instructions

## Project Overview
WordPress theme based on Underscores (_s) starter theme with custom header layouts, sticky header functionality, and extensive Customizer options. Built for PHP 5.6+ and modern WordPress development.

## Architecture & Key Components

### Function Prefixing Convention
All functions, hooks, and global variables use `soda_theme_` prefix (not `_s_`). Constants use `_S_` prefix (e.g., `_S_VERSION`). Update `phpcs.xml.dist` if changing prefixes.

### Header System (Primary Feature)
The theme uses a **modular header layout system** with 4 distinct layouts:
- **Layout files**: `template-parts/layout-{1-4}.php` (not standard WordPress template parts)
- **Header routing**: `header.php` loads layouts via `get_theme_mod('header_layout_style')` and `get_template_part()`
- **Sticky header**: Managed by `js/sticky-header.js` with jQuery scroll detection at 100px threshold
- **Logo swapping**: Supports separate regular/sticky logos via Customizer, swapped dynamically in JS

When modifying headers:
1. Edit layout files in `template-parts/`, not `header.php` directly
2. Header behavior controlled by body classes: `has-sticky-header`, `has-fixed-header`, `has-transparent-header`
3. Logo styles injected via `soda_theme_logo_styles()` in `inc/customizer.php`

### Theme Customizer Integration
Extensive Customizer API usage in `inc/customizer.php`:
- **4 custom sections**: Logo Settings, Header Layout, Header Behavior, Header Spacing
- **Live preview**: Settings use `transport => 'postMessage'` with `js/customizer.js`
- **Dynamic CSS**: Generated in `soda_theme_logo_styles()` hook, not compiled SASS
- **Sanitization**: Custom callbacks like `soda_theme_sanitize_header_layout()` validate user input

### File Structure & Loading
- **Template tags**: Reusable display functions in `inc/template-tags.php` (e.g., `soda_theme_posted_on()`)
- **Template functions**: WordPress hooks/filters in `inc/template-functions.php` (e.g., body classes)
- **Custom header**: Legacy WordPress custom header API in `inc/custom-header.php`
- **Dependencies loaded conditionally**: Jetpack file only loads if `JETPACK__VERSION` is defined

## Development Workflow

### CSS Development (SASS-based)
**Note**: This theme expects SASS source files in a `sass/` directory that currently doesn't exist in the workspace.
- Compile: `npm run compile:css` (compiles SASS → CSS, runs stylelint)
- Watch: `npm run watch` (auto-recompiles on changes)
- RTL: `npm run compile:rtl` (generates `style-rtl.css`)
- Direct CSS edits to `style.css` will be overwritten if SASS workflow is set up

### PHP Code Quality
- **Linting**: `composer lint:wpcs` (WordPress Coding Standards via PHPCS)
- **Syntax check**: `composer lint:php` (PHP parallel-lint)
- **Standards**: Follows `WPThemeReview` and `WordPress` rulesets
- **Min PHP version**: 5.6 (configured in `phpcs.xml.dist` and `composer.json`)

### JavaScript
- **jQuery dependency**: Sticky header requires jQuery (enqueued in `functions.php`)
- **Linting**: `npm run lint:js` (uses `@wordpress/scripts`)
- **ES5 compatibility**: Navigation and customizer scripts use vanilla JS/jQuery patterns

### Translation & i18n
- Text domain: `soda-theme` (search/replace across all files if changing)
- Generate POT: `composer make-pot` → `languages/soda-theme.pot`
- All user-facing strings must use `esc_html__()`, `esc_html_e()`, `esc_html_x()` with `soda-theme` domain

### Distribution
- Create ZIP: `npm run bundle` (excludes dev files, outputs to parent directory)
- Clean build excludes: node_modules, vendor, sass/, git files, config files

## Common Patterns

### Adding Customizer Settings
1. Add setting + control in `soda_theme_customize_register()` hook
2. For live preview: set `transport => 'postMessage'`, add JS handler in `js/customizer.js`
3. For CSS output: add logic to `soda_theme_logo_styles()` function
4. Sanitize with custom callback functions (see existing examples)

### Enqueuing Assets
All enqueues happen in `soda_theme_scripts()` hook:
```php
wp_enqueue_script( 'handle', get_template_directory_uri() . '/js/file.js', array('jquery'), _S_VERSION, true );
```
Use `_S_VERSION` constant for cache busting, not hardcoded version numbers.

### Creating Template Parts
- Content templates: `template-parts/content-{type}.php` (WordPress standard)
- Header layouts: `template-parts/layout-{number}.php` (theme-specific convention)
- Load with: `get_template_part('template-parts/content', 'page')`

### Body Class Modifications
Add conditional classes via `soda_theme_body_classes()` filter in `inc/template-functions.php`:
```php
if ( condition ) {
    $classes[] = 'custom-class';
}
```

## Integration Points

### WordPress Hooks Used
- `after_setup_theme`: Theme setup, feature support registration
- `widgets_init`: Sidebar registration
- `wp_enqueue_scripts`: Asset loading
- `customize_register`: Customizer options
- `customize_preview_init`: Customizer live preview JS
- `wp_head`: Inline CSS injection, pingback headers
- `body_class`: Conditional body classes

### External Dependencies
- **Optional**: Jetpack plugin support (`inc/jetpack.php` loaded conditionally)
- **Dev only**: WordPress Scripts (@wordpress/scripts) for linting
- **Build**: node-sass, rtlcss, PHP CodeSniffer with WordPress rules

## Testing & Debugging
- **Local environment**: Typically Local by Flywheel (path structure: `Local Sites/fugutheme/app/public/wp-content/themes/`)
- **Check errors**: Look for PHP notices in theme files, especially escaping issues flagged by PHPCS
- **Customizer testing**: Use selective refresh partials to avoid full page reloads
- **Sticky header**: Test scroll behavior at various scroll positions (threshold: 100px)

## Critical Files
- `functions.php`: Main theme setup and file loader
- `inc/customizer.php`: All Customizer logic and dynamic CSS generation
- `inc/template-functions.php`: WordPress hook integrations and body classes
- `header.php`: Header layout router (don't add header markup here)
- `template-parts/layout-*.php`: Actual header markup for each layout variant
