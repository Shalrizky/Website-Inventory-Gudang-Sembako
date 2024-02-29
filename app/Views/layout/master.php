<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title ?> </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/template/vendors/feather/feather.css">
  <link rel="stylesheet" href="/template/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="/template/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="/template/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="/template/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/template/vendors/jquery-toast-plugin/jquery.toast.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="/template/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="/template/js/select.dataTables.min.css">
  <link rel="stylesheet" href="/template/css/vertical-layout-light/my.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/template/images/logo_jbs_title.png" />

  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
</head>

<body class="with-welcome-text">
  <div class="container-scroller">
    <?= $this->include('layout/navbar') ?>
    <div class="container-fluid page-body-wrapper">
      <?= $this->include('layout/sidebar') ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <?= $this->renderSection('content') ?>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <footer class="footer">
          <?= $this->include('layout/footer') ?>
        </footer>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="/template/vendors/js/vendor.bundle.base.js"></script>
  <script src="/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="/template/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="/template/vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
  <script src="/template/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="/template/vendors/js/dataTables.select.min.js"></script>
  <script src="/template/js/my.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="/template/js/off-canvas.js"></script>
  <script src="/template/js/hoverable-collapse.js"></script>
  <script src="/template/js/template.js"></script>
  <script src="/template/js/settings.js"></script>
  <script src="/template/js/toastDemo.js"></script>
  <script src="/template/js/modal-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/template/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="/template/js/dashboard.js"></script>
  <script src="/template/js/paginate.js"></script>
  <!-- <script src="../../js/Chart.roundedBarCharts.js"></script> -->
  <!-- End custom js for this page-->
</body>

</html>