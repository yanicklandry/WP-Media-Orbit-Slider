<?php
/**
 * Plugin Name: WP Media Orbit Slider
 * Plugin URI: https://github.com/yanicklandry/WP-Media-Orbit-Slider
 * Description: WordPress plugin to use Orbit Image Slider (from Zurb Foundation) with media items.
 * Version: 0.0.1
 * Author: Yanick Landry
 * Author URI: http://www.yanick.cf
 * License: GPL2
 */

/*  Copyright YEAR  Yanick Landry  (email : yanick.landry@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Register Custom Taxonomy
function wp_media_orbit_slider_init() {

	$labels = array(
		'name'                       => _x( 'Orbit Sliders', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Orbit Slider', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Orbit Slider', 'text_domain' ),
		'all_items'                  => __( 'All Sliders', 'text_domain' ),
		'parent_item'                => __( 'Parent Slider', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Slider:', 'text_domain' ),
		'new_item_name'              => __( 'New Slider Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Slider', 'text_domain' ),
		'edit_item'                  => __( 'Edit Slider', 'text_domain' ),
		'update_item'                => __( 'Update Slider', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate sliders with commas', 'text_domain' ),
		'search_items'               => __( 'Search Sliders', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove sliders', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used sliders', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'media_orbit_slider', array( 'attachment' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'wp_media_orbit_slider_init', 0 );

// Add Shortcode
function media_orbit_slider_shortcode( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'slug' => 'default-slider',
		), $atts )
	);

  $term = get_term_by('slug', $atts['slug'], 'media_orbit_slider');
  $post_ids = get_objects_in_term( $term->term_id, 'media_orbit_slider');

  $img_tags = [];
  foreach($post_ids as $post_id) {
    $img_tags[] = wp_get_attachment_image($post_id, 'full');
  }

  $html = '<ul class="example-orbit" data-orbit>';
  foreach($img_tags as $img_tag) {
    $html .= '<li>' . $img_tag . '
      <div class="orbit-caption">
        Caption One.
      </div>
    </li>
    ';
  }
  $html .= '</ul>';

  return($html);
}
add_shortcode( 'media_orbit_slider', 'media_orbit_slider_shortcode' );
