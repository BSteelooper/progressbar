<?php
//This is a module for pluck, an opensource content management system
//Website: http://www.pluck-cms.org

//MODULE NAME: blog
//DESCRIPTION: this module lets the user create an own blog
//LICENSE: GPLv3
//This module is included with pluck

//Make sure the file isn't accessed directly
defined('IN_PLUCK') or exit('Access denied!');

function progressbar_info() {
	global $lang;
	$module_info = array(
		'name'          => $lang['progressbar']['name'],
		'intro'         => $lang['progressbar']['intro'],
		'version'       => '0.1',
		'author'        => $lang['progressbar']['author'],
		'website'       => 'http://xobit.nl',
		'icon'          => 'images/icon.png',
		'compatibility' => '4.7'
	);
	return $module_info;
}
 
?>
