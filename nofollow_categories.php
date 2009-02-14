<?php
/*
Plugin Name: Nofollow Categories
Plugin URI: http://kempwire.com/wordpress-nofollow-categories-plugin
Description: Adds the "nofollow" rel attribute to category links.
Version: 1.0
Author: Jonathan Kemp
Author URI: http://kempwire.com/

Copyright 2009  Jonathan Kemp  (email : jonkemp@comcast.net)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
    
*/

add_filter( 'wp_list_categories', 'nofollow_cats' );

function nofollow_cats( $text ) {
	$text = stripslashes($text);
	$text = preg_replace_callback('|<a (.+?)>|i', 'wp_rel_nofollow_callback', $text);
	return $text;
}
