<?php
/*
Plugin Name: WP Remove Accents Upload Filename
Plugin URI: https://sps.vn/
Description: Remove accents media filename when uploading media file on wordpress.
Version: 1.0
Author: Quách Quang Ngọc
Author URI: https://sps.vn/
License: GPL2
*/

if ( ! function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

if(is_admin()):
	function wp_rauf_check_filetype_and_ext($wp_filetype, $file, $filename, $mimes) {
    if(!$wp_filetype['proper_filename']) {
      $wp_filetype['proper_filename'] = remove_accents(str_replace('.'.$wp_filetype['ext'], '', $filename)).'.'.$wp_filetype['ext'];
    }
    return $wp_filetype;
  }
  add_filter( 'wp_check_filetype_and_ext', 'wp_rauf_check_filetype_and_ext', 10, 4 );
endif;