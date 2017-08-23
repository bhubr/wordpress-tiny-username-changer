<h3>Tiny Username Changer</h3>
<?php
if( $_SERVER["REQUEST_METHOD"] === "POST" ) {
  if( ! current_user_can("manage_options")) {
    http_response_code(403);
    die("Forbidden");
  }
  wp_verify_nonce( $_REQUEST["nonce"], "username_change" );
  if( isset($_POST['username']) && ! empty($_POST['username']) && ! empty($_POST['user']) ) {
    global $wpdb;
    $user_id = $_POST['user'];
    $user_login = $_POST['username'];
    $query = "UPDATE {$wpdb->prefix}users SET user_login='$user_login' WHERE ID=$user_id";
    echo $query;
    $result = $wpdb->get_results($query);
    var_dump($result);
  }
}
$nonce = wp_create_nonce( "username_change" );
$users = get_users();
?>
<form method="POST">
<input type="hidden" name="nonce" value="<?php echo $nonce; ?>" /><br>
<?php foreach($users as $user): ?>
<input id="user-<?php echo $user->ID; ?>" type="radio" name="user" value="<?php echo $user->ID; ?>" />
<label for="user-<?php echo $user->ID; ?>"><?php echo $user->user_login; ?> &lt;<?php echo $user->user_email; ?>&gt;</label><br>
<?php endforeach; ?>
<input type="text" name="username" placeholder="new username" /><br>
<input type="submit" value="Submit" />
</form>