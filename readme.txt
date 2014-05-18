=== WP Media Orbit Slider ===
Contributors: thamez
Tags: media,orbit,slider,foundation,zurb,carousel,responsive
Tested up to: 3.9.1
License: GPL2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html

WordPress plugin to use Orbit Image Slider (from Zurb Foundation) with media items.

== Description ==
WordPress plugin to use Orbit Image Slider (from Zurb Foundation) with media items.

This plugin is different from other existing plugins with the fact that it integrates only with only integrates with media items (images and captions). If you search for a more general plugin, try WP Orbit Slider :

https://wordpress.org/plugins/wp-orbit-slider/

This plugin does not include the required Foundation framework (from Zurb). It supposes that Foundation is installed in the theme, for example with the excellent FoundationPress theme :

https://github.com/olefredrik/FoundationPress


== Installation ==
Download or clone this repository in the /wp-content/plugins/wp-media-orbit-slider/ folder and Activate the plugin.

More info :
http://codex.wordpress.org/Managing_Plugins#Installing_Plugins

== Frequently Asked Questions ==
Basic usage :

Upload 2 images in Media Library
Edit the first image
On the Orbit Sliders widget (normally on the right), type the name of a new slider
Click Add
Click Update
Edit the second image
On the Orbit Sliders widget, type the name of the same slider
Click Add
Click Update
On Media > Orbit Sliders, copy the generated Slug for the slider.
Edit an existing or a new page or post
On Visual or Text mode, add the following code (replacing YOUR-SLUG by the previously copied slug) :
[media_orbit_slider slug=\"YOUR-SLUG\"]
Click Update or Publish
Click View page
You have your Orbiter Slider !
