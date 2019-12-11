<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view("_partials/head.php") ?>
<body class="">
  <?php $this->load->view("_partials/sidebar.php") ?>
  <div class="main-content">
    <?php $this->load->view("_partials/navbar.php") ?>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-md-8 d-flex align-items-center"  style="min-height: 150px; background-image: url(assets/img/theme/cover.jpg); background-size: cover; background-position: center top;">
      <span class="mask bg-gradient-default opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">GPS</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $gps->total_gps; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="ni ni-square-pin"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php if($this->session->userdata("User_Role")=="admin"): ?>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Users</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $users->total_user; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Welcome! Aplikasi Pendataan Alat GPS </h3>
            </div>
            <p class="p-4">
              Aplikasi pendataan alat GPS merupakan aplikasi yang digunakan untuk melakukan pendataan alat GPS pada PT. Integrasia Utama.
            </p>
          </div>
        </div>
      </div>
      <!-- Footer --> 
      <?php $this->load->view("_partials/footer.php") ?>
    </div>
  </div>
  <!--   Core   -->
  <script src="<?php echo base_url().'assets/js/plugins/jquery/dist/jquery.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js'?>"></script>
  <!--   Optional JS   -->
  <script src="<?php echo base_url().'assets/js/plugins/chart.js/dist/Chart.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/plugins/chart.js/dist/Chart.extension.js'?>"></script>
  <!--   Argon JS   -->
  <script src="<?php echo base_url().'assets/js/argon-dashboard.min.js?v=1.1.0'?>"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>