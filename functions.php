<?php

/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

define('HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0');

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles()
{

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);
}
add_action('wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20);



/**
 * =======================================================
 * Google Fonts - Ultra ottimizzazione
 * =======================================================
 * Versione ottimizzata del caricamento Google Fonts
 */

// 1. DISABILITA Google Fonts di Elementor
add_filter('elementor/frontend/print_google_fonts', '__return_false');

// 2. Resource hints ottimizzati
add_action('wp_head', function () {
?>
	<!-- Resource hints per Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="dns-prefetch" href="//fonts.googleapis.com">
<?php
}, 1);

// 3. Caricamento asincrono ottimizzato
add_action('wp_head', function () {
?>
	<!-- Caricamento asincrono non-bloccante -->
	<link rel="preload" href="https://fonts.googleapis.com/css2?family=Anton&family=Literata:ital,opsz,wght@0,7..72,400;0,7..72,700;1,7..72,400&family=Source+Sans+3:wght@400;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<noscript>
		<link href="https://fonts.googleapis.com/css2?family=Anton&family=Literata:ital,opsz,wght@0,7..72,400;0,7..72,700;1,7..72,400&family=Source+Sans+3:wght@400;700&display=swap" rel="stylesheet">
	</noscript>

	<!-- Fallback per browser legacy -->
	<script>
		if (!window.FontFace) {
			var link = document.createElement('link');
			link.href = 'https://fonts.googleapis.com/css2?family=Anton&family=Literata:ital,opsz,wght@0,7..72,400;0,7..72,700;1,7..72,400&family=Source+Sans+3:wght@400;700&display=swap';
			link.rel = 'stylesheet';
			document.head.appendChild(link);
		}
	</script>
<?php
}, 2);
