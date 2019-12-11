<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view("_partials/head.php") ?>
<body class="">
  <?php $this->load->view("_partials/sidebar.php") ?>
  <div class="main-content">
    <?php $this->load->view("_partials/navbar.php") ?>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-md-8 d-flex align-items-center" style="min-height: 150px; background-image: url(assets/img/theme/cover.jpg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-default opacity-8"></span>
    <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
          <div class="card shadow">
          <div class="card-header border-0">
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
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Data User </h3> 
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary p-2" data-toggle="modal" data-target="#modal-form">Add User</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Role</th>
                    <th scope="col">Photo</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php if (!empty($users)): 
                  foreach ($users as $row):?>
                  <tr>
                    <th scope="row">
                      <?php echo $row->User_Name; ?>
                    </th>
                    <td>
                      <?php echo $row->User_Email; ?>
                    </td>
                    <td>
                      <?php echo $row->User_Sex; ?>
                    </td>
                    <td>
                      <?php echo date('d F Y', strtotime($row->User_Birthday)); ?>
                    </td>
                    <td>
                      <?php echo $row->User_Role; ?>
                    </td>
                    <td>
                        <div class="avatar-group">
                            <img alt="Image placeholder" src="http://localhost/Aplikasi_pendataan_alat_GPS/assets/img/<?php echo $row->User_Photo; ?>" width="50%">
                        </div>
                        </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" data-toggle="modal" data-target="#modal-form-detail<?php echo $row->User_Id; ?>"">Detail</a>
                          <a class="dropdown-item" data-toggle="modal" data-target="#modal-form<?php echo $row->User_Id; ?>">Edit</a>
                          <a class="dropdown-item" data-toggle="modal" data-target="#modal-notification<?php echo $row->User_Id; ?>">Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php endforeach;
                  else: ?>
                  <tr>
                    <td colspan=9>
                      <div class="text-center">
                        Data Kosong
                      </div>
                    </td>
                  </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              
              <?php echo $pagination; ?>
                         
            </div>
          </div>
        </div>
      </div>
      
      <!-- Footer --> 
      <?php $this->load->view("_partials/footer.php") ?>
    </div>
  </div>


<!-- Modal Input -->  
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
    <div class="modal-content">      	
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-header bg-white pb-3">
            <H3> Add User Data</H3>
          </div>
          <div class="card-body px-lg-4 py-lg-4">
            <form action="<?php echo site_url('UsersController/add') ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="form-group mb-3">
                <label>Name*</label >
                  <div class="input-group input-group-alternative">
                    <input class="form-control <?php echo form_error('User_Name') ? 'is-invalid':'' ?>" placeholder="Please Insert User Name" type="text" name="User_Name" required>
                    <div class="invalid-feedback">
                      <?php echo form_error('User_Name') ?>
                    </div>
                  </div>
              </div>
              <div class="form-group  mb-3">
                <label>Email*</label >
                  <div class="input-group input-group-alternative">
                    <input class="form-control <?php echo form_error('User_Email') ? 'is-invalid':'' ?>" placeholder="Please Insert User Email. ex:john@mail.com" type="email" name="User_Email" required>
                    <div class="invalid-feedback">
                      <?php echo form_error('User_Email') ?>
                    </div> 
                  </div>
              </div>
              <div class="form-group mb-3">
                <label>Address*</label >
                  <div class="input-group input-group-alternative">
                    <input class="form-control <?php echo form_error('User_Address') ? 'is-invalid':'' ?>" placeholder="Please Insert User Address" type="text" name="User_Address" required>
                    <div class="invalid-feedback">
                      <?php echo form_error('User_Address') ?>
                    </div>
                  </div>
              </div>
              <div class="form-group  mb-3">
                <label>Sex*</label >
                    <div class="custom-control custom-radio mb-3">
                      <input name="User_Sex" class="custom-control-input" cheked id="customRadio5" checked="" type="radio" value="Laki-laki">
                      <label class="custom-control-label" for="customRadio5">Laki-laki</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                      <input name="User_Sex" class="custom-control-input" id="customRadio6" type="radio" value="Perempuan">
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
                    <input class="form-control datepicker bg-white readonly <?php echo form_error('User_Birthday') ? 'is-invalid':'' ?>" data-date-format="yyyy-mm-dd" placeholder="Select Date" type="text" name="User_Birthday" required>
                    <div class="invalid-feedback">
                      <?php echo form_error('User_Birthday') ?>
                    </div>
                  </div>
              </div>
              <div class="form-group  mb-3">
                <label>Password*</label >
                  <div class="input-group input-group-alternative">
                      <input class="form-control <?php echo form_error('User_Password') ? 'is-invalid':'' ?>" placeholder="Password" type="password" name="User_Password" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('User_Password') ?>
                      </div>
                  </div>
              </div>
              <input class="form-control <?php echo form_error('User_Role') ? 'is-invalid':'' ?>" value="user" type="hidden" name="User_Role">
              <div class="form-group mb-3">
                <label>Photo</label >
                  <div class="mb-3">
                    <img alt="Image placeholder" src="http://localhost/Aplikasi_pendataan_alat_GPS/assets/img/default.jpg" width="30%" id="photoadd">
                  </div>
                  <div class="input-group input-group-alternative">
                      <input class="form-control" type="file" name="User_Photo" id="preview_photoadd">
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

<!-- Modal Edit -->
<?php foreach ($users as $row): ?>
<div class="modal fade" id="modal-form<?php echo $row->User_Id; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
    <div class="modal-content">      	
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-header bg-white pb-3">
            <H3> Edit User Data</H3>
          </div>
          <div class="card-body px-lg-4 py-lg-4">
            <form action="<?php echo site_url('UsersController/edit/'.$row->User_Id) ?>" method="post" enctype="multipart/form-data" role="form">
              <input class="form-control" type="hidden" name="User_Id" value="<?php echo $row->User_Id; ?>">                    
              <div class="form-group mb-3">
                <label>Name*</label >
                  <div class="input-group input-group-alternative">
                      <input class="form-control <?php echo form_error('User_Name') ? 'is-invalid':'' ?>" placeholder="Please Insert User Name" type="text" name="User_Name" value="<?php echo $row->User_Name; ?>" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('User_Name') ?>
                      </div>
                  </div>
              </div>
              <div class="form-group  mb-3">
                <label>Email*</label >
                  <div class="input-group input-group-alternative">
                      <input class="form-control <?php echo form_error('User_Email') ? 'is-invalid':'' ?>" placeholder="Please Insert User Email" type="email" name="User_Email" value="<?php echo $row->User_Email; ?>" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('User_Email') ?>
                      </div> 
                  </div>
              </div>
              <div class="form-group mb-3">
                <label>Address*</label >
                  <div class="input-group input-group-alternative">
                      <input class="form-control <?php echo form_error('User_Address') ? 'is-invalid':'' ?>" placeholder="Please Insert User Address" type="text" name="User_Address" value="<?php echo $row->User_Address; ?>" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('User_Address') ?>
                      </div>
                  </div>
              </div>
              <div class="form-group mb-3">
                <label>Sex*</label >
                  <div class="custom-control custom-radio mb-3">
                    <input name="User_Sex" class="custom-control-input" id="customRadio5" <?php if($row->User_Sex == "Laki-laki"): echo "checked=''"; endif;  ?> type="radio" value="Laki-laki">
                    <label class="custom-control-label" for="customRadio5">Laki-laki</label>
                  </div>
                  <div class="custom-control custom-radio mb-3">
                    <input name="User_Sex" class="custom-control-input" id="customRadio6" <?php if($row->User_Sex == "Perempuan"): echo "checked=''"; endif;  ?>type="radio" value="Perempuan">
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
                      <input class="form-control datepicker bg-white readonly <?php echo form_error('User_Birthday') ? 'is-invalid':'' ?>" data-date-format="yyyy-mm-dd" type="text" name="User_Birthday" value="<?php echo $row->User_Birthday; ?>" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('User_Birthday') ?>
                      </div>
                  </div>
              </div>
              <div class="form-group  mb-3">
                <label>Password*</label >
                  <div class="input-group input-group-alternative">
                      <input class="form-control <?php echo form_error('User_Password') ? 'is-invalid':'' ?>" type="password" name="User_Password" value="<?php echo $row->User_Password; ?>" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('User_Password') ?>
                      </div>
                  </div>
              </div>
              <input class="form-control <?php echo form_error('User_Role') ? 'is-invalid':'' ?>" value="<?php echo $row->User_Role ?>" type="hidden" name="User_Role">
              <div class="form-group mb-3">
                <label>Photo</label >
                  <div class="mb-3">
                    <img alt="Image placeholder" src="http://localhost/Aplikasi_pendataan_alat_GPS/assets/img/<?php echo $row->User_Photo; ?>" width="30%" id="photoedit">
                  </div>
                  <div class="input-group input-group-alternative">
                      <input value="<?php echo $row->User_Photo ?>" type="hidden" name="Old_Photo">
                      <input class="form-control" type="file" name="User_Photo" id="preview_photoedit">
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
<?php endforeach; ?>

<!-- Modal Detail -->
<?php foreach ($users as $row): ?>
<div class="modal fade" id="modal-form-detail<?php echo $row->User_Id; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">      	
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-header bg-white pb-3">
            <H3> Detail User</H3>
          </div>
          <div class="card-body px-lg-4 py-lg-4">
          <div class="row">
              <div class="col-4">
                <img alt="Image placeholder" src="http://localhost/Aplikasi_pendataan_alat_GPS/assets/img/<?php echo $row->User_Photo; ?>" width="100%">                        
              </div>
              <div class="col-8">    
                <div class="mb-2">
                  Id User : <?php echo $row->User_Id; ?>
                </div>
                <div class="mb-2">
                  Username : <?php echo $row->User_Name; ?>
                </div>
                <div class="mb-2">
                  Email : <?php echo $row->User_Email; ?>
                </div>
                <div class="mb-2">
                  Sex  : <?php echo $row->User_Sex; ?>
                </div>
                <div class="mb-2">
                  Birthday   : <?php echo date('d F Y', strtotime($row->User_Birthday)); ?>
                </div>
                <div class="mb-2">
                  Role  : <?php echo $row->User_Role; ?>
                </div>
                <div class="mb-2">
                  Password : <?php echo $row->User_Password; ?>
                </div>
                <div class="mb-2">
                  Address   : <?php echo $row->User_Address; ?>
                </div>
              </div>
            </div>            
            <div class="text-right">
              <button type="button" class="btn btn-danger my-4" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>                          
</div>
<?php endforeach; ?>

<?php foreach ($users as $row): ?>
<div class="modal fade" id="modal-notification<?php echo $row->User_Id; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
  <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
    <div class="modal-content bg-primary">
      <div class="modal-body">
        <div class="py-3 text-center">
          <i class="ni ni-bell-55 ni-3x"></i>
          <h4 class="heading mt-4">Attention!</h4>
          <p>Are You Sure to Delete This Data?</p>
        </div>                
      </div>      
      <div class="modal-footer">
        <button type="button" class="btn btn-link text-white" data-dismiss="modal">Cancel</button> 
        <a href="<?php echo site_url('UsersController/delete/'.$row->User_Id) ?>"><button type="button" class="btn btn-white ml-auto">Yes, Delete it</button></a>
      </div>            
    </div>
  </div>
</div>
<?php endforeach; ?>

  <!--   Core   -->
  <script src="<?php echo base_url().'assets/js/plugins/jquery/dist/jquery.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js'?>"></script>
  <!--   Optional JS   -->
  <script src="<?php echo base_url().'assets/js/plugins/chart.js/dist/Chart.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/plugins/chart.js/dist/Chart.extension.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'?>"></script>
  <!--   Argon JS   -->
  <script src="<?php echo base_url().'assets/js/argon-dashboard.min.js?v=1.1.0'?>"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });

    $('#modal-form').on('hidden.bs.modal', function (e) {
      $(this)
        .find("input,textarea,select")
            .val('')
            .end()
        .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "")
            .end();
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

    function previewadd(input) {
   if (input.files && input.files[0]) {
      var reader = new FileReader();
 
      reader.onload = function (e) {
          $('#photoadd').attr('src', e.target.result);
      }
 
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#preview_photoadd").change(function(){
   previewadd(this);
  });

  function previewedit(input) {
   if (input.files && input.files[0]) {
      var reader = new FileReader();
 
      reader.onload = function (e) {
          $('#photoedit').attr('src', e.target.result);
      }
 
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#preview_photoedit").change(function(){
   previewedit(this);
  });

  $(".readonly").on('keydown paste', function(e){
      e.preventDefault();
  });
  </script>
</body>

</html>