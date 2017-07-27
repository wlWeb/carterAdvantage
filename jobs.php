<?php include('includes/initialize.php'); 
$title = "Job Postings";
$page = "jobs"; ?>

<?php 
  $jobs_set = find_all_jobs();
?>


<?php include('includes/head.php'); ?>

<body>

  <?php include('includes/preload.php'); ?>

  <div class="sb-site-container">

    <?php include('includes/tophead.php'); ?>

    <?php include('includes/nav.php'); ?>

    <div class="ms-hero ms-hero-img-wall ms-bg-fixed mb-6 pb-4">
      <div class="text-center color-white mt-6 mb-6 index-1">
        <h1>Career<strong>Advantage</strong> Career Listing</h1>
        <p class="lead lead-lg">Welcome to the Career Advantage Career Link page, where you will find your best fit.</p>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Filter List</h3>
            </div>
            <div class="card-block">
              <div class="row">
                <div class="col-md-8">
                  <form class="form-horizontal" id="Filters">
                    <div class="row">
                      <div class="col-md-6">
                        <fieldset>
                          <h4 class="mb-1 no-mt">Job Type</h4>
                          <div class="form-group no-mt">
                            <div class="checkbox ml-2">
                              <label>
                                  <input type="checkbox" value=".clerical"> Clerical </label>
                            </div>
                            <div class="checkbox  ml-2">
                              <label>
                                  <input type="checkbox" value=".office"> Office </label>
                            </div>
                            <div class="checkbox  ml-2">
                              <label>
                                  <input type="checkbox" value=".industrial"> Industrial</label>
                            </div>
                            <div class="checkbox  ml-2">
                              <label>
                                  <input type="checkbox" value=".other"> Other </label>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                      <div class="col-md-6">
                        <fieldset>
                          <h4 class="mb-1">Classification</h4>
                          <div class="form-group no-mt">
                            <div class="checkbox  ml-2">
                              <label>
                                  <input type="checkbox" value=".full"> Full-time </label>
                            </div>
                            <div class="checkbox  ml-2">
                              <label>
                                  <input type="checkbox" value=".part"> Part-time </label>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-4">
                  <form class="form-horizontal">
                    <h4>Sort by</h4>
                    <select id="SortSelect" class="form-control selectpicker">
                        <option value="random">Popular</option>
                        <option value="date:asc">Release ASC</option>
                        <option value="date:desc">Release DESC</option>
                      </select>
                  </form>
                  <button class="btn btn-danger btn-block no-mb mt-2" id="Reset">
                      <i class="zmdi zmdi-delete"></i> Clear Filters</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row" id="Container">

            <?php while($job = mysqli_fetch_assoc($jobs_set)) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mix <?php echo $job['type']; ?> <?php echo $job['class']; ?>" data-price="999.99"
              data-date="<?php echo $job['date']; ?>">
              <div class="card ms-feature">
                <div class="card-block text-center">
                  <a href="#">
                    <div class="ms-thumbnail-container">
                      <figure class="ms-thumbnail ms-thumbnail-center ms-thumbnail-light">
                        <img src="assets/img/jobs/<?php echo $job['type']; ?>.jpeg" alt="" class="img-responsive">
                        <figcaption class="ms-thumbnail-caption text-center">
                          <div class="ms-thumbnail-caption-content">
                            <h3 class="ms-thumbnail-caption-title">
                              <?php echo $job['name']; ?>
                            </h3>
                            <form action="<?php echo 'apply.php?id=' . $job['id']; ?>" method="post">
                              <fieldset>
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary btn-sm btn-block btn-raised mt-2 no-mb">
                          <i class="zmdi zmdi-shopping-case"></i> Apply</button>
                              </fieldset>
                            </form>
                            </div>
                        </figcaption>
                      </figure>
                      </div>
                  </a>
                  <h3 class="text-normal text-center">
                    <?php echo $job['name']; ?>
                  </h3>
                  <h4 class="text-normal text-center">
                    <?php echo $job['location']; ?>
                  </h4>
                  <p>
                    <?php echo $job['description']; ?>
                  </p>
                  <div class="mt-2">
                    <span class="ms-tag ms-tag-success">Posted: <?php echo $job['date']; ?></span>
                  </div>
                  <form action="<?php echo 'apply.php?id=' . $job['id']; ?>" method="post">
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
          </div>
        </div>

        <?php include('includes/footer.php'); ?>