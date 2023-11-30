<?php
/**
 * @package Palabra Censurada
 * @version 1.0.0
 */
/*
Plugin Name: Palabra Censurada
Plugin URI: http://wordpress.org/plugins/Palabra-Censurada/
Description: Este plugin censura las palabras malsonantes en WordPress.
Author: Lucas_dam1
Version: 1.0.0
Author URI: http://ma.tt/
*/

$offensiveWordsList = [
    'puta',
    'puto',
    'putas',
    'putos',
    'cabron',
    'cabrona',
    'cabrones',
    'cabronas',
    'gilipollas'

];
$nonOffensiveWordsList = [
    'promiscua',
    'promiscuo',
    'promiscuas',
    'promiscuos',
    'cabrito',
    'cabrita',
    'cabritos',
    'cabritas',
    'gilipichis'

];
function renym_wordpress_typo_fix( $text ) {
    global $offensiveWordsList, $nonOffensiveWordsList;
    return str_replace( $offensiveWordsList, $nonOffensiveWordsList, $text );
}

add_filter('the_content', 'renym_wordpress_typo_fix');