<?php
/*
Plugin Name: Time Left To Post
Plugin URI: https://wordpress.org/plugins/wp-time-left-bar-master
Description: Shows to the user a progress bar with how much time left to read the post
Version: 1.0
Author: Batz Bar
Author URI: https://amaze.website/
License: GPLv2
Text Domain: wp_tlbm
*/
/* Copyright 2016 Time Left To Pos
This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License */
define( 'WP_TLBM_VERSION', '1.0' );
define( 'WP_TLBM_MINIMUM_WP_VERSION', '3.2' );
define( 'WP_TLBM_PRE_FIX', "wp_tlbm_");
define( 'WP_TLBM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WP_TLBM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WP_TLBM_DELETE_LIMIT', 100000 );


include(WP_TLBM_PLUGIN_DIR . '/includes/functions.php');
include(WP_TLBM_PLUGIN_DIR . '/includes/admin/admin-functions.php');


