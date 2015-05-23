<?php
/**
 * @package Goodbye security is a fork of  Hello_Security
 * @version 1.0.0
 */
/*
Plugin Name: Goodbye Security
Plugin URI: https://planetzuda.com
Description: Built using the base code of Hello Security, this plugin gives
users the ability to understand everything can be cracked, so goodbye security. This will not damage your site.
Version: 1.0
Author: Michele Butcher
Author URI: https://planetzuda.com
License: GPLv2
*/

function hello_security_get_quote() {
	/** These are the quotes used */
	$quotes = "Install WordPress, goodbye security
	Install a plugin, goodbye security.
	Use premium code, goodbye security.
	Use free code, goodbye security.
	Hello XSS,Sql injections,RCE,CSRF, SOME, goodbye security.
	Use a contact form that doesn't filter posted data, goodbye security. 
	Use javascript, goodbye security. 
	Use htmlspecialchars, goodbye security.
	Don't do SQL properly, goodbye database.
	 $_get system(), hello RCE. 
	Hack all the things!
	Hack the planet!
	Hack everything.";

		// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_security() {
	$chosen = hello_security_get_quote();
	echo "<p id='security'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_security' );

// We need some CSS to position the paragraph
function security_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#security {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'security_css' );

?>
