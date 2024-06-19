<?php
/** 
 * Plugin Name: WooCommerce Custom for order Email
 * Description: This plugin for vse-pesticidy. Осторожно. Говно-кодер писал.
 * Author: Yaroslav Burashnykov
 * Version: 0.8.5.0
 * 
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * 
*/

if (!defined('ABSPATH')) exit; //Exit if have access

add_filter('woocommerce_email_classes', 'add_new_custom_order_email');

function add_new_custom_order_email ($email_classes) {

    //add new class
    require('includes/class-wc-custom-order-email.php');

    $email_classes['WC_Custom_Pickup_Delivery'] = new WC_Custom_Pickup_Delivery();
    $email_classes['WC_Custom_Cancelled'] = new WC_Custom_Cancelled();
    $email_classes['WC_Custom_SDEK'] = new WC_Custom_SDEK();

    return $email_classes;

}