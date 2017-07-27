    <nav class="navbar navbar-static-top yamm ms-navbar ms-navbar-dark">
      <div class="container container-full">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.html">
            <!-- <img src="assets/img/demo/logo-navbar.png" alt=""> -->
            <!-- <span class="ms-title">Material
                <strong>Style</strong>
              </span> -->
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown <?php echo ($page == "home" ? "active" : "")?>">
              <a href="index.html" class="dropdown-toggle animated fadeIn animation-delay-4" data-hover="dropdown" data-name="home">Home                 
                </a>
            </li>
            <li class="dropdown <?php echo ($page == "location" ? "active" : "")?>">
              <a href="locations.html" class="dropdown-toggle animated fadeIn animation-delay-5" data-hover="dropdown" data-name="page">Locations                  
                </a>
            </li>
            <li class="<?php echo ($page == "jobs" ? "active" : "")?>">
              <a href="jobs.php" class="dropdown-toggle animated fadeIn animation-delay-5" data-hover="dropdown" data-name="page">Job Posts                  
                </a>
            </li>
            <li class="dropdown <?php echo ($page == "about" ? "active" : "")?>">
              <a href="aboutus.html" class="dropdown-toggle animated fadeIn animation-delay-6" data-hover="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false" data-name="component">About Us                 
                </a>
            </li>
            <li class="dropdown <?php echo ($page == "faq" ? "active" : "")?>">
              <a href="faq.html" class="dropdown-toggle animated fadeIn animation-delay-7" data-hover="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false" data-name="blog">FAQ                 
                </a>
            </li>
            <li class="dropdown <?php echo ($page == "contact" ? "active" : "")?>">
              <a href="contact.php" class="dropdown-toggle animated fadeIn animation-delay-8" data-hover="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false" data-name="portfolio">Contact Us
                </a>
            </li>
            <?php if(isset($_SESSION['username'])) { ?>
            <li>
                
                <a href="admin.php" class="animated fadeIn animation-delay-8" role="button" aria-haspopup="true"
                aria-expanded="false" ><i class="zmdi zmdi-account"></i>  <?php echo $_SESSION['username'] ?? ''; ?>
                </a>
                
            </li>
            <?php } ?>
            <!-- <li class="btn-navbar-menu"><a href="javascript:void(0)" class="sb-toggle-left"><i class="zmdi zmdi-menu"></i></a></li> -->
          </ul>
        </div>
        <!-- navbar-collapse collapse -->
        <a href="javascript:void(0)" class="sb-toggle-left btn-navbar-menu">
            <i class="zmdi zmdi-menu"></i>
          </a>
      </div>
      <!-- container -->
    </nav>
    