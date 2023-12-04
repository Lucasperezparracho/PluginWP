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
function inicioPlugin(){
    createTable();
    insertData();
}
/**
 * Carga tabla Wp_dam
 * Con las palabras malsonantes
 */
function createTable(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wp_dam';
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'wp_dam';
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        tabu varchar(255) NOT NULL,
        eufemismo varchar(255) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
/**
 * Inserta datos en la tabla
 */
function insertData() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'wp_dam';
    $wpdb->insert(
        $table_name,
        array(
            'tabu' => 'puta',
            'eufemismo' => 'promiscua'
        )
    );
    $wpdb->insert(
        $table_name,
        array(
            'tabu' => 'puto',
            'eufemismo' => 'promiscuo'
        )
    );
    $wpdb->insert(
        $table_name,
        array(
            'tabu' => 'putas',
            'eufemismo' => 'promiscuas'
        )
    );
    $wpdb->insert(
        $table_name,
        array(
            'tabu' => 'putos',
            'eufemismo' => 'promiscuos'
        )
    );
    $wpdb->insert(
        $table_name,
        array(
            'tabu' => 'cabron',
            'eufemismo' => 'cabrito'
        )
    );
    $wpdb->insert(
        $table_name,
        array(
            'tabu' => 'cabrona',
            'eufemismo' => 'cabrita'
        )
    );
    $wpdb->insert(
        $table_name,
        array(
            'tabu' => 'cabrones',
            'eufemismo' => 'cabritos'
        )
    );
    $wpdb->insert(
        $table_name,
        array(
            'tabu' => 'cabronas',
            'eufemismo' => 'cabritas'
        )
    );
    $wpdb->insert(
        $table_name,
        array(
            'tabu' => 'gilipollas',
            'eufemismo' => 'gilipichis'
        )
    );
}
add_action('plugin_loaded', 'inicioPlugin');


function renym_wordpress_typo_fix($text) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'wp_dam';
    $results = $wpdb->get_results( "SELECT * FROM $table_name" );
    foreach ($results as $row) {
        $text = str_replace($row->tabu, $row->eufemismo, $text);
    }
    return $text;

}

add_filter('the_content', 'renym_wordpress_typo_fix');