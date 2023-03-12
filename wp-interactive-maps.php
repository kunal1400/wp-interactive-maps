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

function wpdocs_enqueue_custom_style() {
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
}
add_action( 'wp_enqueue_scripts', 'wpdocs_enqueue_custom_style' );

/*state map*/
function get_state_map( $atts ){	
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
            	<div id="map" style="width: 100%; height: 468px;"></div>
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
}
add_shortcode( 'vaccination_map', 'get_state_map' );


add_action ( 'wp_head', 'hook_inHeader' );
function hook_inHeader() {
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
}