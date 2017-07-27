<?php include('includes/initialize.php'); 
$title = "Admin Page";
$page = "home";
?>
<?php require_login(); ?>
<?php

if(is_post_request()) {
  $admin = [];
  $admin['first_name'] = $_POST['first_name'] ?? '';
  $admin['last_name'] = $_POST['last_name'] ?? '';
  $admin['email'] = $_POST['email'] ?? '';
  $admin['username'] = $_POST['username'] ?? '';
  $admin['password'] = $_POST['password'] ?? '';
  $admin['confirm_password'] = $_POST['confirm_password'] ?? '';

  $result = insert_admin($admin);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'Admin created.';
    redirect_to('admin.php');
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $admin = [];
  $admin["first_name"] = '';
  $admin["last_name"] = '';
  $admin["email"] = '';
  $admin["username"] = '';
  $admin['password'] = '';
  $admin['confirm_password'] = '';
}

?>




<?php include('includes/head.php'); ?>

  <body>

<?php include('includes/preload.php'); ?>

    </div>
    <div class="sb-site-container">



<?php include('includes/nav.php'); ?>

      <div class="container">
        
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="card card-primary animated fadeInUp animation-delay-7">
              <div class="card-block">
                <a href="admin.php"><< Back</a>
                <form action="<?php echo 'createadmin.php'; ?>" method="post" class="form-horizontal">
                  <fieldset>
                    <h1 class="color-primary text-center">Register new Admin</h1>
                    <?php echo display_session_message(); ?>
                    <?php echo display_errors($errors); ?>
                    <div class="form-group">

                      <label for="inputName" class="col-md-2 control-label">First Name</label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" id="inputName" name="first_name" value="<?php echo $admin['first_name']; ?>" placeholder="First Name"> 
                        <p class="help-block">Must contain between 2 and 255 characters</p>  
                      </div>

                    </div>

                    <div class="form-group">

                      <label for="inputLast" class="col-md-2 control-label">Last Name</label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" id="inputLast" name="last_name" value="<?php echo $admin['last_name']; ?>" placeholder="Last Name">
                        <p class="help-block">Must contain between 2 and 255 characters</p>  
                      </div>

                    </div>

                    <div class="form-group">

                      <label for="inputUser" class="col-md-2 control-label">Username</label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" id="inputUser" name="username" value="<?php echo $admin['username']; ?>" placeholder="Username">
                        <p class="help-block">Must be at least 6 characters and a unique username.</p>  
                      </div>

                    </div>

                    <div class="form-group">

                      <label for="inputEmail" class="col-md-2 control-label">Email</label>
                      <div class="col-md-10">
                        <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $admin['email']; ?>" placeholder="Email"> 
                      </div>

                    </div>

                    <div class="form-group">

                      <label for="inputPassword" class="col-md-2 control-label label-floating">Password</label>
                      <div class="col-md-10">
                        <input type="password" class="form-control" id="inputPassword" name="password" value="" placeholder="Password"> 
                      <p class="help-block">Password must contain at least 10 characters, one uppercase, one lowercase, and one special character.</p>
                        </div>
                    </div>

                    <div class="form-group">

                      <label for="inputConfirmPassword" class="col-md-2 control-label label-floating">Confirm Password</label>
                      <div class="col-md-10">
                        <input type="password" class="form-control" id="inputConfirmPassword" name="confirm_password" value="" placeholder="Password">
                        <p class="help-block">Confirm Password and Password must match.</p> 
                      </div>

                    </div>
                    
                    <div class="row">
                      <div class="col-md-offset-2 col-md-10">
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">

                              <input type="submit" class="btn btn-raised btn-primary" value="Create Admin" />

                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- container -->
<?php include('includes/footer.php'); ?>