        <!--  Jquery  -->
    <script src="assets/js/jquery.min.js"></script>
    <!--  Bootstrap Bundle with Popper -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
   <!--  custom js file -->
    <script src="assets/js/custom.js"></script>
       <!--  owl carousel js file -->
       <script src="assets/js/owl.carousel.min.js"></script>

    <!-- AlertifyJS -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>


<script>
  // Set alertify notification position
  alertify.set('notifier', 'position', 'top-right');
  
    <?php
    if (isset($_SESSION['message']))
    {
        ?>
        // Display a record add notification
        alertify.success('<?= $_SESSION['message']; ?>');
        <?php
        unset($_SESSION['message']);
    }
    ?>

</script>
  </body>
</html>