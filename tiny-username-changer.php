<?php
/*
Plugin Name: Tiny Username Changer
*/
function username_changer_register_my_custom_menu_page() {
    add_menu_page( "Username changer", "Username changer", "manage_options", "tiny-username-changer","tiny_username_changer_form","",6);
}
add_action( 'admin_menu', 'username_changer_register_my_custom_menu_page' );

function tiny_username_changer_form() {
  require 'tiny-username-changer-form.php';
}
