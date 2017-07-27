<?php include('includes/initialize.php'); 
$title = "Admin Page";
$page = "home";

?>

<?php require_login(); ?>

<?php 
  $messages_set = find_all_messages();
  $applications_set = find_all_applications();
  $admin_set = find_all_admin();
?>

<?php 
  $modal_set = find_all_messages();
?>


<?php 

if(is_post_request()) {
  $job = [];
  $today = date("Ymd");
  $job['name'] = $_POST['name'] ?? '';
  $job['class'] = $_POST['class'] ?? '';
  $job['type'] = $_POST['type'] ?? '';
  $job['description'] = $_POST['description'] ?? '';
  $job['location'] = $_POST['location'] ?? '';
  $job['date'] = $today ?? '';

  $result = insert_job($job);
  if($result) {
    redirect_to('admin.php');
  }
} 

?>

<?php include('includes/head.php'); ?>

<body>

  <?php include('includes/preload.php'); ?>

  <div class="sb-site-container">

    <header class="ms-header ms-header-white">
      <div class="container container-full">
        <div class="ms-title">
          <a href="index.html">
            <h1 class="animated fadeInRight animation-delay-6">Career
              <span>Advantage</span>
            </h1>
          </a>
        </div>
        <div class="header-right">
          <p class="lead">Admin Page <a href="logout.php">Log Out</a></p>
        </div>
      </div>
    </header>
    <?php include('includes/nav.php'); ?>

    <!-- Admin Header -->
    <div class="ms-hero-page-override ms-hero-img-city ms-bg-fixed ms-hero-bg-dark-light">
      <div class="container">
        <div class="text-center">
          <h3>Welcome <?php echo $_SESSION['first_name'] ?? ''; ?></h3>
          <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mb-6 mt-6  animated zoomInDown animation-delay-5">Administrator
            <span>Functions</span>
          </h1>
        </div>
      </div>
    </div>
    <!-- End Admin Header -->

    <!-- Content Container -->
    <div class="container">
      <?php echo display_session_message(); ?>
      <?php echo display_errors($errors); ?>
      <!-- Tabs Begin -->
      <div class="card mt--40">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-tabs-full nav-tabs-4 shadow-2dp" role="tablist">
          <li role="presentation" class="active"><a class="withoutripple" href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="zmdi zmdi-home"></i> <span class="hidden-xs">Applications</span></a></li>
          <li role="presentation"><a class="withoutripple" href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="zmdi zmdi-email"></i> <span class="hidden-xs">Messages</span></a></li>
          <li role="presentation"><a class="withoutripple" href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="zmdi zmdi-case"></i> <span class="hidden-xs">Add Jobs</span></a></li>
          <li role="presentation"><a class="withoutripple" href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><i class="zmdi zmdi-account-add"></i> <span class="hidden-xs">Change Employees</span></a></li>
        </ul>
        <!-- Nav tabs End -->

        <div class="card-block">
          <!-- Tab panes -->

          <div class="tab-content">

            <!-- applications panel -->
            <div role="tabpanel" class="tab-pane fade active in" id="home">
              <?php while($app = mysqli_fetch_assoc($applications_set)) { ?>
              <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="aheading<?php echo $app['id']; ?>">
                  <h4 class="panel-title ms-rotate-icon">
                    <a class="withripple collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#acollapse<?php echo $app['id']; ?>"
                      aria-expanded="false" aria-controls="acollapse<?php echo $app['id']; ?>">
                                    <i class="zmdi zmdi-attachment-alt"></i> <strong>Applicant</strong> - <?php echo $app['name']; ?> | <strong>Job:</strong> - <?php echo $app['job']; ?>

                                </a>
                  </h4>
                </div>
                <div id="acollapse<?php echo $app['id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="aheading<?php echo $app['id']; ?>">
                  <div class="panel-body">
                    <h3>Name: <strong><?php echo nl2br($app['name']); ?></strong></h3>
                    <h3>Applying for: <strong><?php echo nl2br($app['job']); ?></strong></h3>
                    <h3>Phone: <strong><?php echo nl2br($app['phone']); ?></strong></h3>
                    <h3>Email: <strong><?php echo nl2br($app['email']); ?></strong></h3>
                    <a href="applications/<?php echo $app['resume'] ?>"><?php echo $app['resume'] ?> </a>
                    <p class="whitespace">
                      <?php echo $app['comment']; ?>
                    </p>
                    <a href="#" class="btn btn-lg btn-raised btn-primary" data-toggle="modal" data-target="#myaModal<?php echo $app['id']; ?>"><i class="zmdi zmdi-delete"></i>  Delete</a>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
            <!-- end applications panel -->

            <!-- messages panel -->
            <div role="tabpanel" class="tab-pane fade" id="profile">

              <?php while($messages = mysqli_fetch_assoc($messages_set)) { ?>
              <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="heading<?php echo $messages['id']; ?>">
                  <h4 class="panel-title ms-rotate-icon">
                    <a class="withripple collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $messages['id']; ?>"
                      aria-expanded="false" aria-controls="collapse<?php echo $messages['id']; ?>">
                                    <i class="zmdi zmdi-attachment-alt"></i> <strong>Sender:</strong> - <?php echo $messages['name']; ?> <strong>Subject:</strong> <?php echo $messages['subject']; ?> 

                                </a>
                  </h4>
                </div>
                <div id="collapse<?php echo $messages['id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $messages['id']; ?>">
                  <div class="panel-body">
                    <h3>From: <strong><?php echo nl2br($messages['email']); ?></strong></h3>
                    <p class="whitespace">
                      <?php echo $messages['message']; ?>
                    </p>
                    <a href="#" class="btn btn-lg btn-raised btn-primary" data-toggle="modal" data-target="#myModal<?php echo $messages['id']; ?>"><i class="zmdi zmdi-delete"></i>  Delete</a>
                  </div>
                </div>
              </div>
              <?php } ?>

            </div>
            <!-- end messages panel -->

            <!-- Jobs panel -->
            <div role="tabpanel" class="tab-pane fade" id="messages">

              <form class="form-horizontal" action="admin.php" method="post">
                <fieldset>

                  <div class="form-group">

                    <label for="inputName" class="col-md-2 control-label">Job Title</label>

                    <div class="col-md-9">
                      <input id="inputName" class="form-control" type="text" name="name" value="" />
                    </div>

                  </div>

                  <div class="form-group">

                    <label for="inputClass" class="col-md-2 control-label label-floating">Full or Part time.</label>

                    <div class="col-md-9">
                      <select id="inputClass" class="form-control selectpicker" name="class">
                  <option value="full">Full Time</option>
                  <option value="part">Part Time</option>
                  </select>
                    </div>

                  </div>

                  <div class="form-group">

                    <label for="inputType" class="col-md-2 control-label label-floating">Job Type.</label>

                    <div class="col-md-9">
                      <select id="inputType" class="form-control selectpicker" name="type">
                    <option value="clerical">Clerical</option>
                    <option value="office">Office</option>
                    <option value="industrial">Light Industrial</option>
                    <option value="other">Other</option>
                  </select>
                    </div>

                  </div>

                  <div class="form-group">

                    <label for="inputLocation" class="col-md-2 control-label label-floating">Location</label>

                    <div class="col-md-9">
                      <input id="inputLocation" class="form-control" type="text" name="location" value="" />
                      <p class="help-block">City of job. Not address. For sorting.</p>
                    </div>

                  </div>

                  <div class="form-group">

                    <label id="inputDescription" for="inputDescription" class="col-md-2 control-label label-floating">Job Description</label>

                    <div class="col-md-9">
                      <textarea rows="3" class="form-control" type="text" name="description" value="" placeholder="Job Description"></textarea>
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
            <!-- end jobs panel -->

            <!-- Add Employees -->
            <div role="tabpanel" class="tab-pane fade" id="settings">
              <a href="createadmin.php">Create new Admin</a>
              <div class="card">
                <table class="table table-no-border table-striped .table-striped-primary">
                  <thead>
                    <tr>
                      <th>
                        ID
                      </th>
                      <th>
                        First
                      </th>
                      <th>
                        Last
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Username
                      </th>
                    </tr>
                  </thead>
                    <tbody>
                        <?php while($admin = mysqli_fetch_assoc($admin_set)) { ?>
                          <tr>
                            <td><?php echo $admin['id']; ?></td>
                            <td><?php echo $admin['first_name']; ?></td>
                            <td><?php echo $admin['last_name']; ?></td>
                            <td><?php echo $admin['email']; ?></td>
                            <td><?php echo $admin['username']; ?></td>
                            <td><a class="action" href="<?php echo 'admindel.php?id=' . $admin['id']; ?>">Delete</a></td>
                          </tr>
                        </tbody>
                        <?php } ?>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- Tabs End -->




    </div>
    <!-- End Content Container -->

    <!-- Delete Modal -->
    <?php while($m_modal = mysqli_fetch_assoc($modal_set)) { ?>
    <div class="modal modal-warning" id="myModal<?php echo $m_modal['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $m_modal['id']; ?>">
      <div class="modal-dialog animated zoomIn animated-3x" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
            <h3 class="modal-title" id="myModalLabel<?php echo $m_modal['id']; ?>">Are you sure you want to delete <strong><?php echo $m_modal['subject']; ?></strong>?</h3>
          </div>
          <div class="modal-body">
            <h3>Deleting this message is permanent.</h3>
            <p class="lead">
              <?php echo $m_modal['message']; ?>
            </p>
          </div>
          <div class="modal-footer">

            <form action="<?php echo 'includes/delete.php?id=' . $m_modal['id']; ?>" method="post">
              <fieldset>
                <div class="form-group">
                  <div class="col-md-10 col-md-offset-2">
                    <button type="submit" class="btn btn-raised btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger">Cancel</button>
                  </div>
                </div>
              </fieldset>
            </form>

          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <!-- End Delete Modal -->

    <?php include('includes/footer.php'); ?>