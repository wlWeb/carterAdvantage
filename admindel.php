<?php include('includes/initialize.php'); 
$title = "Admin Page";
$page = "home";

require_once('includes/initialize.php'); ?>

<?php require_login(); ?>

<?php 

if(!isset($_GET['id'])) {
  redirect_to('admin.php');

  
}
$id = $_GET['id'];

if(is_post_request()) {
  $result = delete_admin($id);
  $_SESSION['message'] = 'Admin deleted.';
  redirect_to('admin.php');
} else {
  $admin = find_admin_by_id($id);
}

?>
<?php include('includes/head.php'); ?>
  <body>
<?php include('includes/preload.php'); ?>

    <div class="bg-full-page bg-primary back-fixed">
      <div class="mw-500 absolute-center">
        <div class="card animated zoomInDown animation-delay-5">
          <div class="card-block bg-light">
            <h1 class="color-primary">Delete Admin</h1>
            <div id="content">

  <a class="back-link color-warning" href="<?php echo 'admin.php'; ?>">&laquo; Back to List</a>

  <div class="admin delete color-primary">
    <p class="color-primary">Are you sure you want to delete this admin?</p>
    <p class="item color-primary">Username: <?php echo $admin['username']; ?></p>

    <form action="<?php echo 'admindel.php?id=' . $admin['id']; ?>" method="post">
      <div id="operations">
        <input class="btn btn-lg btn-raised btn-primary" type="submit" name="commit" value="Delete Admin" />
      </div>
    </form>
  </div>

</div>
          </div>
        </div>
        <div class="text-center animated fadeInUp animation-delay-7">
          <a href="index.html" class="btn btn-primary">
            <i class="zmdi zmdi-home"></i> Go Home</a>
        </div>
      </div>
    </div>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/app.min.js"></script>
  </body>
</html>
