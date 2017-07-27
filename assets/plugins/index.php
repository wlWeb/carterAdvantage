<?php include('../../includes/initialize.php'); ?>
<?php 

function is_logged_inin() {
  // Having a admin_id in the session serves a dual-purpose:
  // - Its presence indicates the admin is logged in.
  // - Its value tells which admin for looking up their record.
  return isset($_SESSION['admin_id']);
}

// Call require_login() at the top of any page which needs to
// require a valid login before granting acccess to the page.
function require_inlogin() {
  if(!is_logged_inin()) {
    redirect_to('../../admin-login.php');
  } else {
    // Do nothing, let the rest of the page proceed
  }
}

require_inlogin(); ?>