<?php
/*
Plugin Name: Tiny Username Changer
*/
function username_changer_register_my_custom_menu_page() { add_menu_page("Username changer","Username changer","manage_options","tiny-username-changer/tiny-username-changer-form.php","","",6); }
add_action( 'admin_menu', 'username_changer_register_my_custom_menu_page' );