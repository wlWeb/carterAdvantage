    <footer class="ms-footer">
      <div class="container">
        <p>&copy; <?php echo date('Y'); ?> wlWebSolutions </p>
      </div>
    </footer>

    <div class="btn-back-top">
        <a href="#" data-scroll id="back-top" class="btn-circle btn-circle-primary btn-circle-sm btn-circle-raised ">
          <i class="zmdi zmdi-long-arrow-up"></i>
        </a>
    </div>
</div>

<?php include('slidebar.php'); ?>

<script src="assets/js/plugins.min.js"></script>
<script src="assets/js/app.min.js"></script>
<script src="assets/js/ecommerce.js"></script>
</body>
</html>

<?php
    db_disconnect($db);
?>