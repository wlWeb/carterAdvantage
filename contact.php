<?php include('includes/initialize.php'); 
$title = "Contact Us";
$page = "contact";

?>

<?php 

if(is_post_request()) {
  $message = [];
  $message['name'] = $_POST['name'] ?? '';
  $message['email'] = $_POST['email'] ?? '';
  $message['subject'] = $_POST['subject'] ?? '';
  $message['message'] = $_POST['message'] ?? '';

  $result = insert_message($message);
  if($result) {
    redirect_to('thankyou.php');
  }
} 

?>

<?php include('includes/head.php'); ?>

<body>

  <?php include('includes/preload.php'); ?>

  <div class="sb-site-container">

    <?php include('includes/tophead.php'); ?>
    <?php include('includes/nav.php'); ?>

    <div class="ms-hero-page-override ms-hero-img-team ms-hero-bg-primary">
      <div class="container">
        <div class="text-center">
          <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">Contact Us</h1>
          <p class="lead lead-lg color-light text-center center-block mt-2 mw-800 text-uppercase fw-300 animated fadeInUp animation-delay-7">Are you ready for the next step?
            <br>Let us know how we can help you become one of our many partners.</p>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="card card-hero animated fadeInUp animation-delay-7">
        <div class="card-block">

          <form class="form-horizontal" action="contact.php" method="post">
            <fieldset>

              <div class="form-group">

                <label for="inputName" class="col-md-2 control-label">Name</label>

                <div class="col-md-9">
                  <input id="inputName" class="form-control" type="text" name="name" value="" />
                </div>

              </div>

              <div class="form-group">

                <label for="inputEmail" class="col-md-2 control-label">Email</label>

                <div class="col-md-9">
                  <input id="inputEmail" class="form-control" type="email" name="email" value="" />
                </div>

              </div>

              <div class="form-group">

                <label for="inputSubject" class="col-md-2 control-label">Subject</label>

                <div class="col-md-9">
                  <input id="inputSubject" class="form-control" type="text" name="subject" value="" />
                </div>

              </div>

              <div class="form-group">

                <label id="inputMessage" for="inputMessage" class="col-md-2 control-label">Message</label>

                <div class="col-md-9">
                  <textarea rows="5" class="form-control" type="text" name="message" value="" placeholder="Your message..."></textarea>
                </div>

              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-5">
                  <div id="operations">
                    <input type="submit" class="btn btn-raised btn-primary" value="Submit Message" />
                  </div>
                </div>
              </div>

            </fieldset>
          </form>



        </div>
      </div>
      <div class="card card-primary">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-5">
            <div class="card-block wow fadeInUp">
              <div class="mb-2">
                <span class="ms-logo ms-logo-sm mr-1">CA</span>
                <h3 class="no-m ms-site-title">Career
                  <span>Advantage</span>
                </h3>
              </div>
              <address class="no-mb">
                <p>
                  <i class="color-danger-light zmdi zmdi-pin mr-1"></i> 6004 Market Street</p>
                <p>
                  <i class="color-warning-light zmdi zmdi-map mr-1"></i> Youngstown, Oh 44512</p>
                <p>
                  <i class="color-info-light zmdi zmdi-email mr-1"></i>
                  <a href="mailto:joe@example.com">kimberlygabriel@careeradvantageonline.com</a>
                </p>
                <p>
                  <i class="color-royal-light zmdi zmdi-phone mr-1"></i>330-788-2328 </p>
                <p>
                  <i class="color-success-light fa fa-fax mr-1"></i>330-788-2491</p>
              </address>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-7">
            <iframe width="100%" height="340" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3009.422494323156!2d-80.66550068458503!3d41.0378889792978!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8833fae8d646f5fd%3A0x823564ed9d35329e!2s6004+Market+St%2C+Youngstown%2C+OH+44512!5e0!3m2!1sen!2sus!4v1497848386651"></iframe>
          </div>
        </div>
      </div>
    </div>

    <?php include('includes/footer.php'); ?>