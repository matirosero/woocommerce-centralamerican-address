<?php
/*
Plugin Name: WooCommerce Centralamerican Address
Plugin URI: http://matilderosero.com
Description: Adds Costa Rican provinces, changes label names in shipping address, and makes zip codes not
obligatory. Based in part on https://github.com/alexasomba/woocommerce-nigeria-states
Version: 1.0
Author: Matilde Rosero
Author URI: http://matilderosero.com
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/
/**
 * Copyright (c) 2015 Matilde Rosero. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

add_action('plugins_loaded', 'wc_cam_address_load_textdomain');
function wc_cam_address_load_textdomain() {
	load_plugin_textdomain( 'wc-centralamerican-address', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
}


add_filter( 'woocommerce_states' , 'wc_cam_address_add_states'  );
function wc_cam_address_add_states ( $states ) {
	$states ['CR' ] = array (
		'SJ' => 'San José' ,
		'HE' => 'Heredia' ,
		'AL' => 'Alajuela' ,
		'CA' => 'Cartago' ,
		'GU' => 'Guanacaste' ,
		'PU' => 'Puntarenas' ,
		'LI' => 'Limón' ,
		);
	return $states;
}


add_filter('woocommerce_get_country_locale', 'wc_cam_address_change_locale');
function wc_cam_address_change_locale($locale){

    $locale['CR']['state']['label'] = __('Province', 'wc-centralamerican-address');
    $locale['CR']['city']['label'] = __('Canton', 'wc-centralamerican-address');

    $locale['PA']['state']['label'] = __('Province', 'wc-centralamerican-address');
    $locale['PA']['city']['label'] = __('District', 'wc-centralamerican-address');

    $locale['NI']['state']['label'] = __('Department', 'wc-centralamerican-address');
    $locale['NI']['city']['label'] = __('Municipality', 'wc-centralamerican-address');

    $locale['HN']['state']['label'] = __('Department', 'wc-centralamerican-address');
    $locale['HN']['city']['label'] = __('Municipality', 'wc-centralamerican-address');

    $locale['SV']['state']['label'] = __('Department', 'wc-centralamerican-address');
    $locale['SV']['city']['label'] = __('Municipality', 'wc-centralamerican-address');

    $locale['GT']['state']['label'] = __('Department', 'wc-centralamerican-address');
    $locale['GT']['city']['label'] = __('Municipality', 'wc-centralamerican-address');


    $locale['CR']['postcode']['required'] = false;
    $locale['GT']['postcode']['required'] = false;
    $locale['SV']['postcode']['required'] = false;
    $locale['HN']['postcode']['required'] = false;
    $locale['NI']['postcode']['required'] = false;
    $locale['PA']['postcode']['required'] = false;
    return $locale;
}

