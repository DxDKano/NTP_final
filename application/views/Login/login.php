<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login NTP</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?='assets/img/favicon_bolmut.png'?>" rel="icon">
  <link href="<?='assets/img/apple-touch-icon_bolmut.png'?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <!-- <link href="https://fonts.gstatic.com" rel="preconnect"> -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->

  <!-- Vendor CSS Files -->
  <link href="<?='assets/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">
  <link href="<?='assets/vendor/bootstrap-icons/bootstrap-icons.css'?>" rel="stylesheet">
  <link href="<?='assets/vendor/boxicons/css/boxicons.min.css'?>" rel="stylesheet">
  <link href="<?='assets/vendor/quill/quill.snow.css'?>" rel="stylesheet">
  <link href="<?='assets/vendor/quill/quill.bubble.css'?>" rel="stylesheet">
  <link href="<?='assets/vendor/remixicon/remixicon.css'?>" rel="stylesheet">
  <link href="<?='assets/vendor/simple-datatables/style.css'?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?='assets/css/style.css'?>" rel="stylesheet">

  <!-- Vendor JS Files -->
  <script src="<?='assets/vendor/apexcharts/apexcharts.min.js'?>"></script>
  <script src="<?='assets/vendor/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
  <script src="<?='assets/vendor/chart.js/chart.umd.js'?>"></script>
  <script src="<?='assets/vendor/echarts/echarts.min.js'?>"></script>
  <script src="<?='assets/vendor/quill/quill.min.js'?>"></script>
  <script src="<?='assets/vendor/simple-datatables/simple-datatables.js'?>"></script>
  <script src="<?='assets/vendor/tinymce/tinymce.min.js'?>"></script>
  <script src="<?='assets/vendor/php-email-form/validate.js'?>"></script>

  <!-- Template Main JS File -->
  <script src="<?='assets/js/main.js'?>"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  * Edited: D.D
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <img src="<?'assets/img/logo_bolmut_fix.png'?>" alt="">
                <a class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block">NTP Bapelitbang</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p></p>
                  </div>

                  <div>
                    <?php echo $this->session->flashdata('error')?>
                  </div>

                  <form method="POST" class="row g-3 needs-validation" action="<?=base_url('Login/log_in')?>">

                    <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="username" placeholder="username" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
          <div class="credits text-center">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Hak Cipta &copy; Bapelitbang Bolaang Mongondow Utara <br> Semua Hak Dilindungi
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

</html>