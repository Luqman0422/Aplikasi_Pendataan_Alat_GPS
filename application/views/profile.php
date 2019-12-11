<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/head.php") ?>

<body class="">
  <?php $this->load->view("_partials/sidebar.php") ?>
  <div class="main-content">
    
    <?php $this->load->view("_partials/navbar.php") ?>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 150px; background-image: url(assets/img/theme/cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
          <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                    <img src="assets/img/<?php echo $user->User_Photo; ?>" class="rounded" height="150px"> 
                </div>
              </div>
            </div>
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" data-toggle="modal" data-target="#modal-form-password" class="btn btn-sm btn-primary p-2 m-2">Change Password</a>
                  <a href="#!" data-toggle="modal" data-target="#modal-form" class="btn btn-sm btn-primary p-2 m-2">Edit Profile</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                <?php if ($this->session->flashdata('success')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-inner--text"><?php echo $this->session->flashdata('success'); ?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php elseif ($this->session->flashdata('failed')): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-inner--text"><?php echo $this->session->flashdata('failed'); ?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input readonly type="text" id="input-username" class="form-control form-control-alternative bg-white" value="<?php echo $user->User_Name; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input readonly type="email" id="input-email" class="form-control form-control-alternative bg-white" value="<?php echo $user->User_Email; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Sex</label>
                        <input readonly type="text" id="input-first-name" class="form-control form-control-alternative bg-white" value="<?php echo $user->User_Sex; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Birthday</label>
                        <input readonly type="text" id="input-last-name" class="form-control form-control-alternative bg-white" value="<?php echo date('d F Y', strtotime($user->User_Birthday)); ?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input readonly id="input-address" class="form-control form-control-alternative bg-white" value="<?php echo $user->User_Address; ?>" type="text">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php $this->load->view("_partials/footer.php") ?>
    </div>
  </div>


<!-- Modal Edit -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
    <div class="modal-content">      	
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-header bg-white pb-3">
            <H3> Edit User Data</H3>
          </div>
          <div class="card-body px-lg-4 py-lg-4">
            <form action="<?php echo site_url('ProfileController/edit_profile/'.$user->User_Id) ?>" method="post" enctype="multipart/form-data" role="form">
              <input class="form-control" type="hidden" name="User_Id" value="<?php echo $user->User_Id; ?>">                    
              <div class="form-group mb-3">
                <label>Name*</label >
                  <div class="input-group input-group-alternative">
                      <input class="form-control <?php echo form_error('User_Name') ? 'is-invalid':'' ?>" placeholder="Please Insert Your Name" type="text" name="User_Name" value="<?php echo $user->User_Name; ?>" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('User_Name') ?>
                      </div>
                  </div>
              </div>
              <div class="form-group  mb-3">
                <label>Email*</label >
                  <div class="input-group input-group-alternative">
                      <input class="form-control <?php echo form_error('User_Email') ? 'is-invalid':'' ?>" placeholder="Please Insert Your Email" type="email" name="User_Email" value="<?php echo $user->User_Email; ?>" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('User_Email') ?>
                      </div> 
                  </div>
              </div>
              <div class="form-group mb-3">
                <label>Address*</label >
                  <div class="input-group input-group-alternative">
                      <input class="form-control <?php echo form_error('User_Address') ? 'is-invalid':'' ?>" placeholder="Please Insert Your Address" type="text" name="User_Address" value="<?php echo $user->User_Address; ?>" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('User_Address') ?>
                      </div>
                  </div>
              </div>
              <div class="form-group mb-3">
                <label>Sex*</label >
                  <div class="custom-control custom-radio mb-3">
                    <input name="User_Sex" class="custom-control-input" id="customRadio5" <?php if($user->User_Sex == "Laki-laki"): echo "checked=''"; endif;  ?> type="radio" value="Laki-laki">
                    <label class="custom-control-label" for="customRadio5">Laki-laki</label>
                  </div>
                  <div class="custom-control custom-radio mb-3">
                    <input name="User_Sex" class="custom-control-input" id="customRadio6" <?php if($user->User_Sex == "Perempuan"): echo "checked=''"; endif;  ?>type="radio" value="Perempuan">
                    <label class="custom-control-label" for="customRadio6">Perempuan</label>
                  </div>
                  <div class="invalid-feedback">
                    <?php echo form_error('User_Sex') ?>
                  </div>
              </div>
              <div class="form-group mb-3">
                <label>Birthday*</label >
                  <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                      </div>
                      <input class="form-control datepicker bg-white readonly <?php echo form_error('User_Birthday') ? 'is-invalid':'' ?>" data-date-format="yyyy-mm-dd" type="text" name="User_Birthday" value="<?php echo $user->User_Birthday; ?>" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('User_Birthday') ?>
                      </div>
                    </div>
              </div>
              <div class="form-group mb-3">
                <label>Photo</label >
                  <div class="mb-3">
                  <img alt="Image placeholder" src="assets/img/<?php echo $user->User_Photo; ?>" width="30%">
                  </div>
                  <div class="input-group input-group-alternative">
                      <input value="<?php echo $user->User_Photo ?>" type="hidden" name="Old_Photo">
                      <input class="form-control" type="file" name="User_Photo">
                  </div>
              </div>
              <div class="text-right">
                <button type="button" class="btn btn-danger my-4" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success my-4">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>                          
</div>



<!-- Modal Edit Password -->
<div class="modal fade" id="modal-form-password" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
    <div class="modal-content">      	
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-header bg-white pb-3">
            <H3> Change Password</H3>
          </div>
          <div class="card-body px-lg-4 py-lg-4">
            <form action="<?php echo site_url('ProfileController/change_password/'.$user->User_Id) ?>" method="post" enctype="multipart/form-data" role="form">
              <input class="form-control" type="hidden" name="User_Id" value="<?php echo $user->User_Id; ?>">                    
              <div class="form-group mb-3">
                <label>Current Password*</label >
                  <div class="input-group input-group-alternative">
                      <input class="form-control <?php echo form_error('Current_Password') ? 'is-invalid':'' ?>" placeholder="Please Insert Your Old Password" type="password" name="Current_Password" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('Current_Password') ?>
                      </div>
                  </div>
              </div>
              <div class="form-group  mb-3">
                <label>New Password*</label >
                  <div class="input-group input-group-alternative">
                      <input class="form-control <?php echo form_error('New_Password') ? 'is-invalid':'' ?>" placeholder="Please Insert Your New Password" type="password" name="New_Password" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('New_Password') ?>
                      </div> 
                  </div>
              </div>
              <div class="form-group mb-3">
                <label>Confirmation New Password*</label >
                  <div class="input-group input-group-alternative">
                      <input class="form-control <?php echo form_error('Confirmation_New_Password') ? 'is-invalid':'' ?>" placeholder="Please Confirmation New Password" type="password" name="Confirmation_New_Password" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('Confirmation_New_Password') ?>
                      </div>
                  </div>
              </div>
              
              <div class="text-right">
                <button type="button" class="btn btn-danger my-4" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success my-4">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>                          
</div>

  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="<?php echo base_url().'assets/js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'?>"></script>
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });

      
    $('form input[type=text]').on('change invalid', function() {
        var textfield = $(this).get(0);
        
        // hapus dulu pesan yang sudah ada
        textfield.setCustomValidity('');
        
        if (!textfield.validity.valid) {
          textfield.setCustomValidity('This form cannot be empty!');  
        }
    });
    $('form input[type=password]').on('change invalid', function() {
        var textfield = $(this).get(0);
        
        // hapus dulu pesan yang sudah ada
        textfield.setCustomValidity('');
        
        if (!textfield.validity.valid) {
          textfield.setCustomValidity('This form cannot be empty!');  
        }
    });
    $('form input[type=email]').on('change invalid', function() {
        var textfield = $(this).get(0);
        
        // hapus dulu pesan yang sudah ada
        textfield.setCustomValidity('');
        
        if (!textfield.validity.valid) {
          textfield.setCustomValidity('Please insert email! with @ and .com, .id or etc!');  
        }
    });
    $(".readonly").on('keydown paste', function(e){
      e.preventDefault();
  });
  </script>
</body>

</html>