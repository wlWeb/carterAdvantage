<?php
require_once('includes/initialize.php');

$title = "Admin Login";

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if(is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if(empty($errors)) {
    // Using one variable ensures that msg is the same
    $login_failure_msg = "Log in was unsuccessful.";

    $admin = find_admin_by_username($username);
    if($admin) {

      if(password_verify($password, $admin['hashed_password'])) {
        // password matches
        log_in_admin($admin);
        redirect_to('admin.php');
      } else {
        // username found, but password does not match
        $errors[] = $login_failure_msg;
      }

    } else {
      // no username found
      $errors[] = $login_failure_msg;
    }

  }

}

?>

<?php include('includes/head.php'); ?>
  <body>
<?php include('includes/preload.php'); ?>

    <div class="bg-full-page bg-primary back-fixed">
      <div class="mw-500 absolute-center">
        <div class="card animated zoomInDown animation-delay-5">
          <div class="card-block">
            <h1 class="color-primary animated slideInLeft animation-delay-5">Login</h1>
            <?php echo display_session_message(); ?>
            <?php echo display_errors($errors); ?>
            <form action="admin-login.php" method="post">
              <fieldset>
                <div class="form-group label-floating">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="zmdi zmdi-account"></i>
                    </span>
                    <label class="control-label" for="ms-form-user">Username</label>
                    <input name="username" type="text" id="ms-form-user" class="form-control animated slideInRight animation-delay-3"> </div>
                </div>
                <div class="form-group label-floating">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="zmdi zmdi-lock"></i>
                    </span>
                    <label class="control-label" for="ms-form-pass">Password</label>
                    <input name="password" type="password" id="ms-form-pass" class="form-control animated fadeInDown animation-delay-8"> </div>
                </div>
                <div class="row text-center">
                  <div class="col-md-6 col-md-offset-3">
                    <input type="submit" class="btn btn-raised btn-primary animated fadeInUp animation-delay-12" value="Log In" >
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
        <div class="text-center animated fadeInUp animation-delay-18">
          <a href="index.html" class="btn btn-white">
            <i class="zmdi zmdi-home"></i> Go Home</a>
        </div>
      </div>
    </div>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/app.min.js"></script>
  </body>
</html>