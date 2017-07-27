<?php include('includes/initialize.php');
$page = "contact";
$title = "Thank you!";
$id = $_GET['id'];

$back = find_job_by_id($id);

?>



<?php include('includes/head.php'); ?>

  <body>

<?php include('includes/preload.php'); ?>

    <div class="sb-site-container">

<?php include('includes/nav.php'); ?>

      <div class="ms-hero-page-override ms-hero-img-city ms-hero-bg-dark-light">
        <div class="container">
          <div class="text-center">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="card card-hero card-primary animated fadeInUp animation-delay-7">
              <div class="card-block">
                <h1 class="color-primary text-center">Your Application to <?php echo $back['name']; ?> was not submitted.</h1>
                <p class="lead color-primary text-center">The file for your resume you chose was of the wrong type. Click <a href="<?php echo 'apply.php?id=' . $back['id']; ?>">here </a> to resubmit.</p>           
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- container -->

<?php include('includes/footer.php'); ?>