<?php include('includes/initialize.php'); 
$title = "Apply Now!";
$page = "jobs"; ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$job = find_job_by_id($id);

$related = find_three_jobs();

?>


<?php include('includes/head.php'); ?>

  <body ng-app>

    <?php include('includes/preload.php'); ?>

    <div class="sb-site-container">

      <?php include('includes/tophead.php'); ?>
      
      <?php include('includes/nav.php'); ?>

      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div id="carousel-product" class="ms-carousel ms-carousel-thumb carousel slide animated zoomInUp animation-delay-5" data-ride="carousel">
              <div class="card card-block">
                <!-- Wrapper for Picture -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <img src="assets/img/jobs/<?php echo $job['type']; ?>.jpeg" alt="..."> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card animated zoomInDown animation-delay-5">
              <div class="card-block">
                <h2><?php echo $job['name']; ?></h2>
                <div class="mb-2 mt-4">
                  <div class="row">
                    <div class="col-sm-6">
                      <span class="mr-2">
                        Posted:
                      </span>
                    </div>
                    <div class="col-sm-6 text-center">
                      <h4 class="color-success no-m text-normal"><?php echo $job['date']; ?></h4>
                    </div>
                  </div>
                </div>
                <p class="lead"><?php echo $job['description']; ?></p>
                <ul class="list-unstyled">
                  <li>
                    <strong>Type: </strong><?php echo $job['type']; ?></li>
                    <li>
                    <strong>Class: </strong><?php echo $job['class'] . "-time"; ?></li>
                    <li>
                    <strong>Location: </strong><?php echo $job['location']; ?></li>
                  <li>
                    <h2><strong>Apply Here!</strong></h2>
                  </li>
                  <form name="myform" class="form-horizontal" enctype="multipart/form-data" action="includes/appsubmit.php?id=<?php echo $id; ?>" method="post" novalidate>
                    <fieldset>
                  <li>
                    <div class="form-group label-floating">
                    <label class="control-label" for="focusedName">Name</label>
                    <input class="form-control" id="focusedName" name="name" type="text" ng-model="user.name"
                    ng-required="true"
                    ng-minlength="2"> 
                    </div>
                    <p class="help-block color-danger" 
                    ng-show="myform.name.$invalid && myform.name.$touched">Enter your name.</p>
                  </li>
                  <li>
                    <div class="form-group label-floating">
                    <label class="control-label" for="focusedPhone">Phone Number</label>
                    <input class="form-control" id="focusedPhone" name="phone" type="number"
                    ng-model="user.phone"
                    ng-required="true"
                    ng-minlength="10"
                    ng-maxlength="11">
                     </div>
                    <p class="help-block color-danger"
                    ng-show="myform.phone.$invalid && myform.phone.$touched">Please enter your phone number. Do not include () parenthesis or - dashes.</p>
                  </li>
                  <li>
                    <div class="form-group label-floating">
                    <label class="control-label" for="focusedEmail">Email</label>
                    <input class="form-control" id="focusedEmail" name="email" type="email"
                    ng-model="email"
                    ng-required="true"
                    ng-minlength="6"
                    ng-maxlength="255"> 
                    </div>
                    <p class="help-block color-danger"
                    ng-show="myform.email.$invalid && myform.email.$touched">Please enter your email address. emailaddress@email.com</p>
                  </li>
                  <li>
                    <div class="form-group label-floating">
                    <label class="control-label" for="focusedComment">A bit about yourself</label>
                    <textarea rows="3" class="form-control" id="focusedComment" name="comment" type="text"
                    ng-model="comment"
                    ng-required="true"></textarea> 
                    </div>
                    <p class="help-block"
                    ng-show="myform.comment.$invalid && myform.comment.$touched">Please give a brief description of yourself, work experience and why you believe this job is the right fit for you.</p>
                  </li>
                  <li>
                    
                    <div class="form-group">

                      <label for="inputFile" class="control-label">Resume File</label>
                        <input type="text" readonly="" class="form-control" name="resume" placeholder="Include Your Resume Here">
                        <input type="file" id="inputFile" name="resume" 
                         required accept=".doc,.docx">
                        
                        
                    </div>
                    
                    <p class="help-block">
                          Upload your resume.  Only word files (extension .doc, .docx) are accepted. No pdf. 
                    </p>

                  </li>
                  <li>
                    <input type="submit" class="btn btn-raised btn-primary" value="Submit Application" 
                    ng-disabled="myform.$invalid">
                    
                    </fieldset>
                    </form>
                  </li>
                </ul>
                  
              </div>
            </div>
          </div>
        </div>


        <h2 class="mt-4 mb-4 right-line">Related Careers</h2>
        <div class="row">
          <?php while($rel = mysqli_fetch_assoc($related)) { ?>
          <div class="col-md-4">
            <div class="card ms-feature wow zoomInUp animation-delay-3">
              <div class="card-block text-center">
                <a href="javascript:void(0)">
                  <img src="assets/img/jobs/<?php echo $rel['type']; ?>.jpeg" alt="" class="img-responsive center-block">
                </a>
                <h4 class="text-normal text-center"><?php echo $rel['name']; ?></h4>
                <p><?php echo $rel['description']; ?></p>
                <div class="mt-2">
                <p>Class: <?php echo $rel['class']; ?></p>
                <p>Location: <?php echo $rel['location']; ?></p>
                </div>
                <form action="<?php echo 'apply.php?id=' . $rel['id']; ?>" method="post">
                  <fieldset>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-sm btn-block btn-raised mt-2 no-mb">
                                          <i class="zmdi zmdi-shopping-case"></i> Apply</button>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>

      <!-- container -->

<?php include('includes/footer.php'); ?>