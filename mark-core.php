
<?php
/**
 * Plugin Name: Mark
 * Description: Mark is test Plugin
 * Plugin URI: https://mosfequr.com/
 * Version: 1.1.0
 * Author: Mosfequr
 * Author URI: https://mosfequr.com/
 * Text Domain: elementor
 */
function mark_activation_hook(){

}
register_activation_hook( __FILE__, array("mark_activation_hook","") );

function mark_deactivation_hook(){
    
}
register_deactivation_hook( __FILE__, array("mark_deactivation_hook","")