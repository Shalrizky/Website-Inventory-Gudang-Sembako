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
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/template/images/logo_jbs_title.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="/template/images/logo_jbs.png" alt="logo" class="mb-3">
                <h3 class="fs-500">Jaya Bangun Sembako</h3>
              </div>
              <!-- Display validation errors -->
              <?php if ($validation->getErrors()) : ?>
                <div class="alert alert-danger">
                  <ul>
                    <?php foreach ($validation->getErrors() as $error) : ?>
                      <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                  </ul>
                </div>
              <?php endif; ?>

              <?php if (session()->has('error')) : ?>
                <p style="color: red;"><?= session('error') ?></p>
              <?php endif; ?>
              <h6 class="fw-light">Sign in to continue.</h6>

              <form class="pt-3" action="<?= base_url('/login/authenticate') ?>" method="post">
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg <?= session('errors.username') ? 'is-invalid' : '' ?>" id="exampleInputEmail1" placeholder="Username" value="<?= old('username') ?>" required>
                  <?php if (session('errors.username')) : ?>
                    <div class="invalid-feedback"><?= session('errors.username') ?></div>
                  <?php endif; ?>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg <?= session('errors.password') ? 'is-invalid' : '' ?>" id="exampleInputPassword1" placeholder="Password" required>
                  <?php if (session('errors.password')) : ?>
                    <div class="invalid-feedback"><?= session('errors.password') ?></div>
                  <?php endif; ?>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                </div>
              </form>
              <!-- ... -->

            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="/template/vendors/js/vendor.bundle.base.js"></script>
  <script src="/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="/template/js/off-canvas.js"></script>
  <script src="/template/js/hoverable-collapse.js"></script>
  <script src="/template/js/template.js"></script>
  <script src="/template/js/settings.js"></script>
  <script src="/template/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>