<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if (!class_exists('Redux')) {
    return;
}


// This is your option name where all the Redux data is stored.
$opt_name = "jws_option";

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters('jws_option/opt_name', $opt_name);

/*
 *
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 *
 */

$sampleHTML = '';
if (file_exists(dirname(__FILE__) . '/info-html.html')) {
    Redux_Functions::initWpFilesystem();

    global $wp_filesystem;

    $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
}

// Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns = array();

if (is_dir($sample_patterns_path)) {

    if ($sample_patterns_dir = opendir($sample_patterns_path)) {
        $sample_patterns = array();

        while (($sample_patterns_file = readdir($sample_patterns_dir)) !== false) {

            if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                $name = explode('.', $sample_patterns_file);
                $name = str_replace('.' . end($name), '', $sample_patterns_file);
                $sample_patterns[] = array(
                    'alt' => $name,
                    'img' => $sample_patterns_url . $sample_patterns_file
                );
            }
        }
    }
}

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
    'menu_title' => esc_html__('Theme Setting', 'ailab'),
    'page_title' => esc_html__('Theme Setting', 'ailab'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key' => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography' => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar' => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon' => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Show the time the page took to load, etc
    'update_notice' => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => '',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => 'jws_option',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.
    'show_options_object' => false,
    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints' => array(
        'icon' => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color' => 'lightgray',
        'icon_size' => 'normal',
        'tip_style' => array(
            'color' => 'red',
            'shadow' => true,
            'rounded' => false,
            'style' => '',
        ),
        'tip_position' => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect' => array(
            'show' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'mouseover',
            ),
            'hide' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'click mouseleave',
            ),
        ),
    )
);


Redux::setArgs($opt_name, $args);

/*
 * ---> END ARGUMENTS
 */


/*
 * ---> START HELP TABS
 */

$tabs = array(
    array(
        'id' => 'redux-help-tab-1',
        'title' => esc_html__('Theme Information 1', 'ailab'),
        'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'ailab')
    ),
    array(
        'id' => 'redux-help-tab-2',
        'title' => esc_html__('Theme Information 2', 'ailab'),
        'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'ailab')
    )
);
Redux::setHelpTab($opt_name, $tabs);

// Set the help sidebar
$content = __('<p>This is the sidebar content, HTML is allowed.</p>', 'ailab');
Redux::setHelpSidebar($opt_name, $content);


// -> START 
Redux::setSection($opt_name, array(
    'title' => esc_html__('General', 'ailab'),
    'id' => 'general',
    'customizer_width' => '300px',
    'icon' => 'el el-wrench',
    'fields' => array(
        array(
        	'id'      => 'note',
            'type'    => 'info',
        	'title'   => esc_html__( 'NOTE: If the HEADER, FOOTER, COLOR, CHATBOT are NOT working on some pages when you set in Theme Option please click to edit page -> scroll to bottom of page and change at Page Option like this image https://prnt.sc/w073gy', 'ailab' ),
        	'default' =>  false,
        	),
        array(
        	'id'      => 'enable_less',
        	'type'    => 'switch',
        	'title'   => esc_html__( 'Enable Less Option', 'ailab' ),
        	'default' =>  false,
        	),
        array(
            'id'        => 'favicon',
            'type'      => 'media',
            'url'       => true,
            'title'     => esc_html__('Favicon', 'ailab' ),
            'compiler'  => 'false',
            'subtitle'  => esc_html__('Upload your favicon', 'ailab' ),
        ),
        array(
            'id'        => 'logo',
            'type'      => 'media',
            'url'       => true,
            'title'     => esc_html__('Logo', 'ailab' ),
            'compiler'  => 'false',
            'subtitle'  => esc_html__('Upload your logo', 'ailab' ),
        ),
        array(
            'id' => 'logo_text',
            'type' => 'text',
            'title' => esc_html__('Logo Text', 'ailab'),
        ),
        array(
            'id'        => 'logo_canvas',
            'type'      => 'media',
            'url'       => true,
            'title'     => esc_html__('Show logo on canvas', 'ailab' ),
            'compiler'  => 'false',
            'subtitle'  => esc_html__('Show logo on canvas', 'ailab' ),
        ),
        array(
            'id'       => 'loading',
            'type'     => 'switch', 
            'title'    => esc_html__('Loading Page', 'ailab'),
            'default'  => true,
        ),
        array(
            'id'        => 'logo_loading',
            'type'      => 'media',
            'url'       => true,
            'title'     => esc_html__('Logo Loading', 'ailab' ),
            'compiler'  => 'false',
            'subtitle'  => esc_html__('Upload your logo loading', 'ailab' ),
            'required' => array('loading', '=', true),
            'default'  => 'ailab',
            
        ),
        array(
            'id' => 'logo_text_loading',
            'type' => 'text',
            'title' => esc_html__('Logo Text Loading', 'ailab'),
        ),
        array(
            'id'        => 'empty_image',
            'type'      => 'media',
            'url'       => true,
            'title'     => esc_html__('Empty Image', 'ailab' ),
            'compiler'  => 'false',
            'subtitle'  => esc_html__('Show the empty image when blog or product no image', 'ailab' ),
        ),
        array(
            'id' => 'link_verify_email',
            'type' => 'text',
            'default' => 'http://ailab.jwsuperthemes.com/verify-mail',
            'title' => esc_html__('Link verify email', 'ailab'),
        ),
        array(
            'id' => 'login_form_redirect',
            'type' => 'text',
            'default' => 'http://ailab.jwsuperthemes.com/my-account',
            'title' => esc_html__('Login form redirect', 'ailab'),
        ),
        array(
            'id' => 'website_name',
            'type' => 'text',
            'default' => 'ailab',
            'title' => esc_html__('Name of your Website', 'ailab'),
            'subtitle' => esc_html__('Use this name to show when send mail verify account', 'ailab'),
        ),
        array(
            'id'       => 'chatbot',
            'type'     => 'switch', 
            'title'    => esc_html__('Turn on chatbot', 'ailab'),
            'default'  => true,
        ),
        array(
            'id' => 'add_script_chatbot',
            'type' => 'text',
            'required' => array('chatbot', '=', true),
            'title' => esc_html__('Add chatbot script', 'ailab'),
            'default' => ' <script src="https://account.snatchbot.me/script.js"></script><script>window.sntchChat.Init(119447)</script> '
        ),
    )
));
// -> START Header Fields
Redux::setSection($opt_name, array(
    'title' => esc_html__('Header', 'ailab'),
    'id' => 'header',
    'desc' => esc_html__('Custom Header', 'ailab'),
    'customizer_width' => '400px',
    'icon' => 'el el-road',
    'fields' => array(
         array(
            'id' => 'select-header',
            'type' => 'select',
            'data' => 'posts',
            'args' => array('post_type' => array('hf_template'), 'posts_per_page' => -1),
            'title' => esc_html__('Select layout for header', 'ailab'),
            'desc' => esc_html__('Select layout for header from: ', 'ailab') . '<a href="' . esc_url(admin_url('/edit.php?post_type=hf_template')) . '" target="_blank">Header Footer Template</a>',
        ),
    )
));

// -> START footer Fields
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer', 'ailab'),
    'id' => 'footer',
    'desc' => esc_html__('Custom Footer', 'ailab'),
    'customizer_width' => '400px',
    'icon' => 'el el-foursquare',
    'fields' => array(
        array(
            'id' => 'select-footer',
            'type' => 'select',
            'data' => 'posts',
            'args' => array('post_type' => array('hf_template'), 'posts_per_page' => -1),
            'title' => esc_html__('Select layout for footer', 'ailab'),
            'desc' => esc_html__('Select layout for footer from: ', 'ailab') . '<a href="' . esc_url(admin_url('/edit.php?post_type=hf_template')) . '" target="_blank">Header Footer Template</a>',
        ),
    )
));
// -> START Color Fields
Redux::setSection($opt_name, array(
    'title' => esc_html__('Color Styling', 'ailab'),
    'id' => 'global-color',
    'desc' => esc_html__('These are really color fields!', 'ailab'),
    'customizer_width' => '400px',
    'icon' => 'el el-adjust'
));
Redux::setSection($opt_name, array(
    'title' => esc_html__('Color', 'ailab'),
    'id' => 'color-styling',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'button-start',
            'type' => 'color',
            'subtitle' => esc_html__('Button background gradient start.', 'ailab'),
            'title' => esc_html__('Button Background', 'ailab'),
            'default' => '#36d1dc',
        ),
        array(
            'id' => 'button-end',
            'type' => 'color',
            'subtitle' => esc_html__('Button background gradient end.', 'ailab'),
            'title' => esc_html__('Button Background', 'ailab'),
            'default' => '#5b86e5',
        ),

        array(
            'id' => 'text-color-start',
            'type' => 'color',
            'subtitle' => esc_html__('Button text color gradient start.', 'ailab'),
            'title' => esc_html__('Button Text Color', 'ailab'),
            'default' => '#03b5a9',
        ),
        array(
            'id' => 'text-color-end',
            'type' => 'color',
            'subtitle' => esc_html__('Button text color gradient end.', 'ailab'),
            'title' => esc_html__('Button Text Color', 'ailab'),
            'default' => '#1fbd75',
        ),

        array(
            'id' => 'main_color',
            'type' => 'color',
            'subtitle' => esc_html__('Main color', 'ailab'),
            'title' => esc_html__('Main color apply for title, heading', 'ailab'),
            'default' => '#1e1666',
        ),
        array(
            'id' => 'body_color',
            'type' => 'color',
            'subtitle' => esc_html__('Body color', 'ailab'),
            'title' => esc_html__('Apply for paragraphs', 'ailab'),
            'default' => '#57647c',
        ),
        array(
            'id' => 'price_color',
            'type' => 'color',
            'subtitle' => esc_html__('Price color', 'ailab'),
            'title' => esc_html__('Apply for price color', 'ailab'),
            'default' => '#fe6187',
        ),
        array(
            'id' => 'text_hover_color',
            'type' => 'color',
            'subtitle' => esc_html__('Text Hover Color in Button', 'ailab'),
            'title' => esc_html__('Apply for text when hover in button, in Footer and in boxes have background color is different with white color ', 'ailab'),
            'default' => '#ffffff',
        ),
        
    ),
));
// -> START Title Bar Fields
Redux::setSection($opt_name, array(
    'title' => esc_html__('Title Bar', 'ailab'),
    'id' => 'title_bar',
    'desc' => esc_html__('Custom title bar', 'ailab'),
    'customizer_width' => '400px',
    'icon' => 'el el-road',
    'fields' => array(
        array(
            'id'       => 'title-bar-switch',
            'type'     => 'switch', 
            'title'    => esc_html__('Switch On Title Bar', 'ailab'),
            'subtitle' => esc_html__('Look, it\'s on!', 'ailab'),
            'default'  => true,
        ),
        array(         
            'id'       => 'bg_titlebar',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'ailab'),
            'subtitle' => esc_html__('background with image, color, etc.', 'ailab'),
            'desc'     => esc_html__('This is the description field, again good for additional info.', 'ailab'),
            'default'  => array(
                'background-color' => '#333333',
            ),
            'output' => array('.jws-title-bar-wrap'),
        ),
        array(
            'id'             => 'titlebar-spacing',
            'type'           => 'spacing',
            'output'         => array('.jws-title-bar-wrap'),
            'mode'           => 'padding',
            'units'          => array('em', 'px'),
            'units_extended' => 'false',
            'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'ailab'),
            'default'            => array(
                'padding-top'     => '150px', 
                'padding-right'   => '15px', 
                'padding-bottom'  => '100px', 
                'padding-left'    => '15px',
                'units'          => 'px', 
         ),
         
        
    ),
    array(
        'id'             => 'breadcrumb_page',
        'type'     => 'switch', 
        'title'    => esc_html__('Page Breadcrumb', 'ailab'),
        'subtitle' => esc_html__('Show breadcrumb on title bar', 'ailab'),
        'default'  => true,
    
    ),
)));

// -> START BLOG
Redux::setSection($opt_name, array(
    'title' => esc_html__('BLOG', 'ailab'),
    'id' => 'blog',
    'desc' => esc_html__('Blog setting.', 'ailab'),
    'customizer_width' => '300px',
    'icon' => 'el el-shopping-cart-sign',
));
Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog Listing Page', 'ailab'),
    'id' => 'blog_listing_page',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'blog_image_size',
            'type' => 'text',
            'title' => esc_html__('Image Size', 'ailab'),
            'default' => '370x250',
        ),
    )
));
Redux::setSection($opt_name, array(
    'title' => esc_html__('Single Blog', 'ailab'),
    'id' => 'single_blog',
    'subsection' => true,
    'fields' => array(
        array(
            'id'             => 'show_title_bar_single_blog',
            'type'     => 'switch', 
            'title'    => esc_html__('Show title bar', 'ailab'),
            'subtitle' => esc_html__('Show title bar on single blog', 'ailab'),
            'default'  => true,
        
        ),
        array(
            'id'       => 'show_image_feature_in_title_bar',
            'type'     => 'switch', 
            'title'    => esc_html__('Show feauture image in background image title bar', 'ailab'),
            'default'  => false,
        ),
        array(
            'id'             => 'show_sidebar_single_blog',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Sidebar', 'ailab'),
            'subtitle' => esc_html__('Show Sidebar on single blog', 'ailab'),
            'default'  => false,
        
        ),
        array(
            'id'             => 'show_share_single_blog',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Share Post', 'ailab'),
            'subtitle' => esc_html__('Show Share Post', 'ailab'),
            'default'  => true,
        
        ),
        
        array(
            'id'             => 'show_tag_single_blog',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Tags Post', 'ailab'),
            'subtitle' => esc_html__('Show Tags Post', 'ailab'),
            'default'  => true,
        
        ),
        array(
            'id'             => 'show_author_single_blog',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Author Post', 'ailab'),
            'subtitle' => esc_html__('Show Author Post', 'ailab'),
            'default'  => true,
        
        ),
        array(
            'id'             => 'show_comment_single_blog',
            'type'     => 'switch', 
            'title'    => esc_html__('Show comment', 'ailab'),
            'subtitle' => esc_html__('Show comment in blog', 'ailab'),
            'default'  => true,
        
        ),
        array(
            'id'             => 'show_related_single_blog',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Retated blog', 'ailab'),
            'subtitle' => esc_html__('Show Retated blog on single blog', 'ailab'),
            'default'  => true,
        
        ),
    )
));

// -> START Shop
Redux::setSection($opt_name, array(
    'title' => esc_html__('Shop', 'ailab'),
    'id' => 'shop',
    'desc' => esc_html__('Shop Setting.', 'ailab'),
    'customizer_width' => '300px',
    'icon' => 'el el-shopping-cart-sign',
));
Redux::setSection($opt_name, array(
    'title' => esc_html__('Shop Page', 'ailab'),
    'id' => 'shop_page',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'shop_post_number',
            'type' => 'text',
            'title' => esc_html__('Product Per Page', 'ailab'),
            'default' => '-1',
        ),
        array(
            'id' => 'shop_columns',
            'type' => 'select',
            'title' => esc_html__('Select Columns', 'ailab'),
            'options' => array(
                '6' => '2 Columns',
                '4' => '3 Columns',
                '3' => '4 Columns',
            ),
            'default' => '3',
        )
    )
));

// -> START Typography
Redux::setSection($opt_name, array(
    'title' => esc_html__('Typography', 'ailab'),
    'id' => 'typography',
    'desc' => esc_html__('For full documentation on this field, visit: ', 'ailab') . '<a href="//docs.reduxframework.com/core/fields/typography/" target="_blank">docs.reduxframework.com/core/fields/typography/</a>',
    'icon' => 'el el-font',
    'fields' => array(
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'subtitle' => esc_html__('H1 tag aplly for title page and title post.', 'ailab'),
            'title' => esc_html__('Font H1', 'ailab'),
            'google' => true,
            'output' => array('h1'),
            'default' => array(
                'font-size' => '48px',
                'font-family' => 'Nunito',
                'font-weight' => '800',
                'line-height' => '56px'
            ),
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => esc_html__('Font H2', 'ailab'),
            'subtitle' => esc_html__('H2 tag apply for Headding Titles in each sections.', 'ailab'),
            'google' => true,
            'output' => array('body h2'),
            'default' => array(
                'font-size' => '40px',
                'font-family' => 'Nunito',
                'font-weight' => '800',
                'line-height' => '48px'
            ),
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => esc_html__('Font H3', 'ailab'),
            'subtitle' => esc_html__('H3 tag apply for Blog Title in list blog and Title in a listing.', 'ailab'),
            'google' => true,
            'output' => array('body h3'),
            'default' => array(
                'font-size' => '24px',
                'font-family' => 'Nunito',
                'font-weight' => '800',
                'line-height' => '28px'
            ),
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => esc_html__('Font H4', 'ailab'),
            'subtitle' => esc_html__('H4 tag apply for Blog Title in list blog and Title in a listing.', 'ailab'),
            'google' => true,
            'output' => array('body h4'),
            'default' => array(
                'font-size' => '20px',
                'font-family' => 'Nunito',
                'font-weight' => '800',
                'line-height' => '28px'
            ),
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => esc_html__('Font H5', 'ailab'),
            'subtitle' => esc_html__('H5', 'ailab'),
            'google' => true,
            'output' => array('body h5'),
            'default' => array(
                'font-size' => '18px',
                'font-family' => 'Nunito',
                'font-weight' => '800',
                'line-height' => '28px'
            ),
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => esc_html__('Font H6', 'ailab'),
            'subtitle' => esc_html__('H6.', 'ailab'),
            'google' => true,
            'output' => array('body h6'),
            'default' => array(
                'font-size' => '16px',
                'font-family' => 'Nunito',
                'font-weight' => '800',
                'line-height' => '28px'
            ),
        ),
        array(
            'id' => 'font_paragraph',
            'type' => 'typography',
            'title' => esc_html__('Paragraph', 'ailab'),
            'subtitle' => esc_html__('Font Paragraph apply for paragraphs.', 'ailab'),
            'google' => true,
            'default' => array(
                'font-size' => '16px',
                'font-family' => 'Nunito',
                'font-weight' => '700',
                'line-height' => '28px'
            ),
        ),
              array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => esc_html__('Body', 'ailab'),
            'subtitle' => esc_html__('Basic font.', 'ailab'),
            'google' => true,
            'output' => array('body'),
            'default' => array(
                'font-size' => '15px',
                'font-family' => 'Nunito',
                'font-weight' => '400',
                'line-height' => '28px'
            ),
        ),
        array(
            'id' => 'font-button',
            'type' => 'typography',
            'title' => esc_html__('Font button and link', 'ailab'),
            'subtitle' => esc_html__('Button font of the site.', 'ailab'),
            'google' => true,
            'default' => array(
                'color' => '#ffffff',
                'font-size' => '15px',
                'font-family' => 'Nunito',
                'font-weight' => '800',
                'line-height' => '28px'
            ),
        ),
        array(
            'id'       => 'themecheck_style',
            'type'     => 'switch', 
            'title'    => esc_html__('Developers Code', 'ailab'),
            'default'  => true,
            'desc' => esc_html__('Functions for developers, Function used to edit code. You should turn off the feature so when using theme','ailab'),
        ),
    )
));


if (file_exists(dirname(__FILE__) . '/../README.md')) {
    $section = array(
        'icon' => 'el el-list-alt',
        'title' => esc_html__('Documentation', 'ailab'),
        'fields' => array(
            array(
                'id' => '17',
                'type' => 'raw',
                'markdown' => true,
                'content_path' => dirname(__FILE__) . '/../README.md', // FULL PATH, not relative please
                //'content' => 'Raw content here',
            ),
        ),
    );
    Redux::setSection($opt_name, $section);
}
/*
 * <--- END SECTIONS
 */


/*
 *
 * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
 *
 */

/*
*
* --> Action hook examples
*
*/

// If Redux is running as a plugin, this will remove the demo notice and links
//add_action( 'redux/loaded', 'remove_demo' );

// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
//add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

// Change the arguments after they've been declared, but before the panel is created
//add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

// Change the default value of a field after it's been set, but before it's been useds
//add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

// Dynamically add a section. Can be also used to modify sections/fields
//add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

/**
 * This is a test function that will let you see when the compiler hook occurs.
 * It only runs if a field    set with compiler=>true is changed.
 * */
if (!function_exists('compiler_action')) {
    function compiler_action($options, $css, $changed_values)
    {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r($changed_values); // Values that have changed since the last save
        echo "</pre>";
        //print_r($options); //Option values
        //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }
}

/**
 * Custom function for the callback validation referenced above
 * */
if (!function_exists('redux_validate_callback_function')) {
    function redux_validate_callback_function($field, $value, $existing_value)
    {
        $error = false;
        $warning = false;

        //do your validation
        if ($value == 1) {
            $error = true;
            $value = $existing_value;
        } elseif ($value == 2) {
            $warning = true;
            $value = $existing_value;
        }

        $return['value'] = $value;

        if ($error == true) {
            $field['msg'] = 'your custom error message';
            $return['error'] = $field;
        }

        if ($warning == true) {
            $field['msg'] = 'your custom warning message';
            $return['warning'] = $field;
        }

        return $return;
    }
}

/**
 * Custom function for the callback referenced above
 */
if (!function_exists('redux_my_custom_field')) {
    function redux_my_custom_field($field, $value)
    {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
}

/**
 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 * so you must use get_template_directory_uri() if you want to use any of the built in icons
 * */
if (!function_exists('dynamic_section')) {
    function dynamic_section($sections)
    {
        //$sections = array();
        $sections[] = array(
            'title' => esc_html__('Section via hook', 'ailab'),
            'desc' => esc_html__('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'ailab'),
            'icon' => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array()
        );

        return $sections;
    }
}

/**
 * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
 * */
if (!function_exists('change_arguments')) {
    function change_arguments($args)
    {
        //$args['dev_mode'] = true;

        return $args;
    }
}

/**
 * Filter hook for filtering the default value of any given field. Very useful in development mode.
 * */
if (!function_exists('change_defaults')) {
    function change_defaults($defaults)
    {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }
}

