<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Interactive USA Map
 * Plugin URI:        https://github.com/kunal1400/wp-interactive-maps.git
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Kunal Malviya
 * Author URI:        https://github.com/kunal1400/wp-interactive-maps.git
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       interactive-usa-map
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_script(
        "wp_interactive_maps_raphael", 
        plugin_dir_url( __FILE__ ) . 'js/raphael-min.js', 
        array( 'jquery' )
    );
    wp_enqueue_script(
        "wp_interactive_maps_jquery_usmap", 
        plugin_dir_url( __FILE__ ) . 'js/jquery.usmap.min.js', 
        array( 'jquery' )
    );
    wp_enqueue_script(
        "wp_interactive_maps_underscrore", 
        plugin_dir_url( __FILE__ ) . 'js/underscore-min.js', 
        array( 'jquery' )
    );    
    wp_enqueue_script(
        "wp_interactive_maps_custom", 
        plugin_dir_url( __FILE__ ) . 'js/map-custom.js', 
        array( 'jquery' )
    );
    wp_enqueue_script(
        "wp_interactive_maps_popups", 
        plugin_dir_url( __FILE__ ) . 'js/map-popups.js', 
        array( 'jquery' )
    );
    wp_enqueue_style(
        "wp_interactive_maps_css", 
        plugin_dir_url( __FILE__ ) . 'css/interactive-maps.css'
    );
});

add_shortcode( 'vaccination_map', function ( $atts ){	
	return '<div id="nmamap"></div> 
        <div class="map-container">
            <div class="map-left large-4 small-16 columns">
            	<div class="map-key">
            		<p class="key-vaccination">Meningococcal vaccination is required</p>
                    <hr />
            		<p class="key-education">Education about meningococcal disease is required</p>
                    <hr />
            		<p class="key-no-requirements">No requirements</p>
            	</div>               
                <!-- <div class="support-bill">
                	<h3>Support Bill #111</h3>
                    <p>The bill praesent commodo cursus magna, vel scelerisque nisl <a href="#" target="_blank">click here</a>.</p>
                </div>-->
            </div>
        <div class="hide-for-small">
			<div class="map-right large-12 columns">
            	<div id="map" style="width: 720px; height: 465px;"></div>
                <p>Please visit the <a href="http://www.ncsl.org/issues-research/health/meningitis-state-legislation-and-laws.aspx" target="_blank">National Conference of State Legislatures</a> for links to specific state laws.</p>
            </div>
            <div class="clearfix"></div>
            <hr />
            <div class="large-4 columns">
            </div>
            <div class="state-names large-16 columns">
            	<div class="large-4 columns">
                	<a href="#" id="AL">Alabama</a><br />
                	<a href="#" id="AK">Alaska</a><br />
                	<a href="#" id="AZ">Arizona</a><br />
                	<a href="#" id="AR">Arkansas</a><br />
                	<a href="#" id="CA">California</a><br />
                	<a href="#" id="CO">Colorado</a><br />
                	<a href="#" id="CT">Connecticut</a><br />
                	<a href="#" id="DE">Delaware</a><br />
                	<a href="#" id="DC">District of Columbia</a><br />
                	<a href="#" id="FL">Florida</a><br />
                	<a href="#" id="GA">Georgia</a>
                </div>
            	<div class="large-3 columns">
                	<a href="#" id="HI">Hawaii</a><br />
                	<a href="#" id="ID">Idaho</a><br />
                	<a href="#" id="IL">Illinois</a><br />
                	<a href="#" id="IN">Indiana</a><br />
                	<a href="#" id="IA">Iowa</a><br />
                	<a href="#" id="KS">Kansas</a><br />
                	<a href="#" id="KY">Kentucky</a><br />
                	<a href="#" id="LA">Louisana</a><br />
                	<a href="#" id="ME">Maine</a><br />
                	<a href="#" id="MD">Maryland</a><br />
                </div>
            	<div class="large-3 columns">
                	<a href="#" id="MA">Massachusetts</a><br />
                	<a href="#" id="MI">Michigan</a><br />
                	<a href="#" id="MN">Minnesota</a><br />
                	<a href="#" id="MS">Mississippi</a><br />
                	<a href="#" id="MO">Missouri</a><br />
                	<a href="#" id="MT">Montana</a><br />
                	<a href="#" id="NE">Nebraska</a><br />
                	<a href="#" id="NV">Nevada</a><br />
                	<a href="#" id="NH">New Hampshire</a><br />
                	<a href="#" id="NJ">New Jersey</a><br />
                </div>
            	<div class="large-3 columns">
                	<a href="#" id="NM">New Mexico</a><br />
                	<a href="#" id="NY">New York</a><br />
                	<a href="#" id="NC">North Carolina</a><br />
                	<a href="#" id="ND">North Dakota</a><br />
                	<a href="#" id="OH">Ohio</a><br />
                	<a href="#" id="OK">Oklahoma</a><br />
                	<a href="#" id="OR">Oregon</a><br />
                	<a href="#" id="PA">Pennsylvania</a><br />
                	<a href="#" id="RI">Rhode Island</a><br />
                	<a href="#" id="SC">South Carolina</a><br />
                </div>
            	<div class="large-3 columns">
                	<a href="#" id="SD">South Dakota</a><br />
                	<a href="#" id="TN">Tennessee</a><br />
                	<a href="#" id="TX">Texas</a><br />
                	<a href="#" id="UT">Utah</a><br />
                	<a href="#" id="VT">Vermont</a><br />
                	<a href="#" id="VA">Virginia</a><br />
                	<a href="#" id="WA">Washington</a><br />
                	<a href="#" id="WV">West Virginia</a><br />
                	<a href="#" id="WI">Wisconsin</a><br />
                	<a href="#" id="WY">Wyoming</a>
                </div>
            </div>
        </div>
        <div class="clearfloat"></div>
        <div class="clear"></div>
       Last modified: February 4, 2017
        </div><!-- End .main-content -->
    </div>
    </div></div>';
});

add_action ( 'wp_head', function () {
    echo '<script>
        var ajaxurl = "'.admin_url("admin-ajax.php").'";
        var mapPopovers = '.get_option('dataForMap').';
    </script>';
    echo '<script type="text/template" id="tmpl-map-popover">
        <div class="popover">
            <div class="inner">
                <p><b><%= state %></b>: <%= text %></p>
                <ul class="links">
                    <% _.each( links, function( link ) { %>
                    <li><a href="<%= link.url %>"><%= link.text %></a></li>
                    <% }) %>
                </ul>
            </div>
        </div>
    </script>';
});

add_action( 'admin_menu', function () {
    add_options_page(
        __( 'WP Interactive Map Settings', 'textdomain' ),
        __( 'WP Interactive Map Settings', 'textdomain' ),
        'manage_options',
        'wp_interactive_map_settings',
        'settings_page'
    );
});

/**
 * Settings page display callback.
 */
function settings_page() {
    include_once "partials/ui.php";
}

add_action('admin_enqueue_scripts', function () {
    wp_enqueue_script( 'wp-create-jsons-admin-js', WP_PLUGIN_URL . '/wp-interactive-maps/js/admin.js', array( 'jquery' ) );
});

add_action( 'wp_ajax_nopriv_save_map_data', 'save_map_data' );
add_action( 'wp_ajax_save_map_data', 'save_map_data' );
function save_map_data() {    
    update_option('dataForMap', json_encode($_POST['dataForMap']));
    echo get_option('dataForMap');
    die;
}

$sampleJson = json_encode("{'AL':{text:'Disease and prevention education required for 6th through 12th grade whenever other health information is provided.',links:''},'AK':{text:'Disease and prevention education required for college students living on campus.',links:''},'AZ':{text:'Meningococcal vaccination required for 6th grade entry.',links:''},'AR':{text:'Meningococcal vaccination is required for 7th and 12th grade entry. Disease and prevention education required for college students living on campus.',links:''},'CA':{text:'Disease and prevention education required for college students living on campus.',links:''},'CO':{text:'Disease and prevention education required for college students living on campus.',links:''},'CT':{text:'Meningococcal vaccination required for 7th grade entry and for college students living on campus.',links:''},'DE':{text:'Disease and prevention education required for college students.',links:''},'DC':{text:'Meningococcal vaccination required for 6th through 12th grade. Disease and prevention education required for college students living on campus.',links:''},'FL':{text:'Meningococcal vaccination required for college students living on campus.',links:''},'GA':{text:'Meningococcal vaccination required for 7th grade entry. Disease and prevention education required for college students living on campus.',links:''},'ID':{text:'Meningococcal vaccination required for 7th grade entry.',links:''},'IL':{text:'Meningococcal vaccination required for 6th and 12th grade entry. Disease and prevention education required for college students at public universities.',links:''},'IN':{text:'Meningococcal vaccination required for 6th and 12th grade entry. Disease and prevention education required for college students at public universities.',links:''},'IA':{text:'Meningococcal vaccination is required for 7th and 12th grade entry.',links:''},'KS':{text:'Meningococcal vaccination required for college students living on campus.',links:''},'KY':{text:'Meningococcal vaccination is required for 6th or 7th grade entry. Disease and prevention education required for 6th grade and college students living on campus.',links:''},'LA':{text:'Meningococcal vaccination required for 6th grade entry and for college students.',links:''},'MA':{text:'Meningococcal vaccination required for 9-12th grade boarding school students and college students. Disease and prevention education required for nonresidential high school students.',links:''},'MD':{text:'Meningococcal vaccination required for 7th grade entry and college students living on campus.',links:''},'ME':{text:'Disease and prevention education required for college students living on campus.',links:''},'MI':{text:'Meningococcal vaccination required for 6th grade entry.',links:''},'MN':{text:'Meningococcal vaccination required for 7th grade entry. Disease and prevention education required for college students living on campus.',links:''},'MS':{text:'Disease and prevention education required for college students.',links:''},'MO':{text:'Meningococcal vaccination required for 8th and 12th grade entry and for college students living on campus at public universities.',links:''},'NE':{text:'Disease and prevention education required for college students living on campus.',links:''},'NV':{text:'Meningococcal vaccination required for students living on campus under the age of 23.',links:''},'NJ':{text:'Meningococcal vaccination required for 6th grade entry and college students living on campus.',links:''},'NY':{text:'Meningococcal vaccination required for 7th and 12th grade entry. Disease and prevention education required for college students.',links:''},'NC':{text:'Meningococcal vaccination is required for 7th and 12th grade entry. Disease and prevention education required for college students living on campus.',links:''},'ND':{text:'Meningococcal vaccination required for middle school entry and college students living on campus under the age of 21.',links:''},'OH':{text:'Meningococcal vaccination required for 7th and 12th grade entry. Disease and prevention education and disclosure of vaccination status required for college students living on campus at public universities.',links:''},'OK':{text:'Meningococcal vaccination required for college students living on campus. Disease and prevention education required for 6th through 12th grade students.',links:''},'PA':{text:'Meningococcal vaccination required for 7th grade entry and college students living on campus.',links:''},'RI':{text:'Meningococcal vaccination required for 7th and 12th grade entry. Disease and prevention education required for college students.',links:''},'SC':{text:'Disease and prevention education required for college students living on campus.',links:''},'SD':{text:'Meningococcal vaccination required for middle school entry.',links:''},'TN':{text:'Meningococcal vaccination required for college students living on campus. Disease and prevention education required for kindergarten through 12th grade.',links:''},'TX':{text:'Meningococcal vaccination required for 7th grade entry and college students.',links:''},'UT':{text:'Meningococcal vaccination required for 7th grade entry.',links:''},'VT':{text:'Meningococcal vaccination required for 7th through 12th grade students at residential schools and college students living on campus.',links:''},'VA':{text:'Meningococcal vaccination required for college students at public universities.',links:''},'WA':{text:'Disease and prevention education required for 6th through 12th grade and college students living on campus.',links:''},'WV':{text:'Meningococcal vaccination required for 7th and 12th grade entry.',links:''},'WI':{text:'Disease and prevention education required for college students.',links:''}}");