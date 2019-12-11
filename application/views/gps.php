<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("_partials/head.php") ?>
<body class="">
  <?php $this->load->view("_partials/sidebar.php") ?>
  <div class="main-content">
    <?php $this->load->view("_partials/navbar.php") ?>
    <div class="header pb-8 pt-5 pt-md-8 d-flex align-items-center" style="min-height: 150px; background-image: url(assets/img/theme/cover.jpg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-default opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
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
                  <h3 class="mb-0">Data GPS </h3> 
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary p-2" data-toggle="modal" data-target="#modal-form-input">Add GPS</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush" >
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Name</th>
                    <th scope="col">Waranty</th>
                    <th scope="col">Buy Date</th>
                    <th scope="col">Sold Date</th>
                    <th scope="col">Sold To</th>
                    <th scope="col">Photo</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if (!empty($gps)): 
                  foreach ($gps as $row):?>
                    <tr>
                      <th scope="row">
                        <?php echo $row->Brand_GPS; ?>
                      </th>
                      <td>
                        <?php echo $row->Model_GPS; ?>
                      </td>
                      <td>
                        <?php echo $row->GPS_Name; ?>
                      </td>
                      <td>
                        <?php echo $row->Waranty_Month." Month"; ?>
                      </td>
                      <td>
                        <?php echo date('d F Y', strtotime($row->Buy_Date)); ?>
                      </td>
                      <td>
                        <?php echo date('d F Y', strtotime($row->Sold_Date)); ?>
                      </td>
                      <td>
                        <?php echo $row->Sold_To; ?>
                      </td>
                      <td>
                        <div>
                            <img alt="Image placeholder" src="http://localhost/Aplikasi_pendataan_alat_GPS/assets/img/<?php echo $row->Photo; ?>" width="50%">
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" data-toggle="modal" data-target="#modal-form-detail<?php echo $row->Id_GPS; ?>">Detail</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#modal-form<?php echo $row->Id_GPS; ?>">Edit</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#modal-notification<?php echo $row->Id_GPS; ?>">Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach;
                    else: ?>
                    <tr>
                      <td colspan=9>
                        <div class="text-center">
                          DATA KOSONG
                        </div>
                      </td>
                    </tr>
                    <?php endif;?>
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
            <?php echo $pagination; ?>           
            </div>
          </div>
        </div>
      </div>
      <?php $this->load->view("_partials/footer.php") ?>
    </div>
  </div>

 <!-- Modal Input -->  
<div class="modal fade" id="modal-form-input" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
    <div class="modal-content">      	
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-header bg-white pb-3">
            <H3> Add GPS Data</H3>
          </div>
          <div class="card-body px-lg-4 py-lg-4">
            <form action="<?php echo site_url('GPSController/add') ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="form-group mb-3">
                <label>Brand GPS*</label >
                <div class="input-group input-group-alternative">
                  <input autocomplete="off" class="form-control <?php echo form_error('Brand_GPS') ? 'is-invalid':'' ?>" placeholder="Insert Brand GPS" type="text" name="Brand_GPS" required>
                  <div class="invalid-feedback">
                    <?php echo form_error('Brand_GPS') ?>
                  </div>
                </div>
              </div>
              <div class="form-group  mb-3">
                <label>Model GPS*</label >
                <div class="input-group input-group-alternative">
                  <input  autocomplete="off" class="form-control <?php echo form_error('Model_GPS') ? 'is-invalid':'' ?>" placeholder="Insert Model GPS" type="text" name="Model_GPS" required>
                  <div class="invalid-feedback">
                    <?php echo form_error('Model_GPS') ?>
                  </div> 
                </div>
              </div>
              <div class="form-group mb-3">
                <label>GPS Name*</label >
                  <div class="input-group input-group-alternative">
                      <input autocomplete="off" class="form-control <?php echo form_error('GPS_Name') ? 'is-invalid':'' ?>" placeholder="Insert GPS Name" type="text" name="GPS_Name" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('GPS_Name') ?>
                      </div>
                  </div>
              </div>
              <div class="form-group  mb-3">
                <label>Waranty (in Month)*</label >
                  <div class="input-group input-group-alternative">
                      <input autocomplete="off" class="form-control <?php echo form_error('Waranty_Month') ? 'is-invalid':'' ?>" placeholder="Insert with number. ex: 1, 2, 3, etc" type="number" name="Waranty_Month" min="0" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('Waranty_Month') ?>
                      </div>
                  </div>
              </div>
              <div class="form-group mb-3">
                <label>Buy Date*</label >
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input autocomplete="off" class="form-control datepicker bg-white readonly <?php echo form_error('Buy_Date') ? 'is-invalid':'' ?>" data-date-format="yyyy-mm-dd" placeholder="Select Buy Date" type="text" name="Buy_Date" required>
                    <div class="invalid-feedback">
                      <?php echo form_error('Buy_Date') ?>
                    </div>
                  </div>
              </div>
              <div class="form-group  mb-3">
                <label>Sold Date*</label >
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                      <input autocomplete="off" class="form-control datepicker bg-white readonly <?php echo form_error('Sold_Date') ? 'is-invalid':'' ?>" data-date-format="yyyy-mm-dd" placeholder="Select Sold Date" type="text" name="Sold_Date" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('Sold_Date') ?>
                      </div>
                  </div>
              </div>
              <div class="form-group  mb-3">
                <label>Sold To*</label >
                  <div class="input-group input-group-alternative">
                      <input autocomplete="off" class="form-control <?php echo form_error('Sold_To') ? 'is-invalid':'' ?>" placeholder="Insert the name of the buyer" type="text" name="Sold_To" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('Sold_To') ?>
                      </div>
                  </div>
              </div>
              <div class="form-group mb-3">
                <label>Photo</label >
                  <div class="mb-3">
                  <img alt="Image placeholder" src="http://localhost/Aplikasi_pendataan_alat_GPS/assets/img/default.jpg" width="30%" id="photoadd">
                  </div>
                  <div class="input-group input-group-alternative">
                      <input class="form-control" type="file" name="Photo" id="preview_photoadd">
                  </div>
              </div>
              <div class="form-group mb-3">
                <label>GPS Desciption</label >
                <div class="input-group input-group-alternative">
                  <textarea class="form-control <?php echo form_error('Description') ? 'is-invalid':'' ?>" id="exampleFormControlTextarea1" rows="3" placeholder="Description ..." name="Description"></textarea>
                  <div class="invalid-feedback">
                        <?php echo form_error('Description') ?>
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

<!-- Modal Edit -->
<?php foreach ($gps as $row): ?>
<div class="modal fade" id="modal-form<?php echo $row->Id_GPS; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
    <div class="modal-content">      	
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-header bg-white pb-3">
            <H3> Edit GPS Data</H3>
          </div>
          <div class="card-body px-lg-4 py-lg-4">
            <form action="<?php echo site_url('GPSController/edit/'.$row->Id_GPS) ?>" method="post" enctype="multipart/form-data" role="form">
              <input class="form-control" type="hidden" name="Id_GPS" value="<?php echo $row->Id_GPS; ?>">                    
              <div class="form-group mb-3">
                <label>Brand GPS*</label >
                  <div class="input-group input-group-alternative">
                      <input autocomplete="off" class="form-control <?php echo form_error('Brand_GPS') ? 'is-invalid':'' ?>" placeholder="Insert Brand GPS" type="text" name="Brand_GPS" value="<?php echo $row->Brand_GPS; ?>" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('Brand_GPS') ?>
                      </div>
                  </div>
              </div>
              <div class="form-group mb-3">
                <label>Model GPS*</label >
                  <div class="input-group input-group-alternative">
                      <input autocomplete="off" class="form-control <?php echo form_error('Model_GPS') ? 'is-invalid':'' ?>"  placeholder="Insert Model GPS" type="text" name="Model_GPS" value="<?php echo $row->Model_GPS; ?>" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('Model_GPS') ?>
                      </div> 
                  </div>
              </div>
              <div class="form-group mb-3">
                <label>GPS Name*</label >
                  <div class="input-group input-group-alternative">
                      <input autocomplete="off" class="form-control <?php echo form_error('GPS_Name') ? 'is-invalid':'' ?>"  placeholder="Insert GPS Name" type="text" name="GPS_Name" value="<?php echo $row->GPS_Name; ?>" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('GPS_Name') ?>
                      </div>
                  </div>
              </div>
              <div class="form-group  mb-3">
                <label>Waranty (in Month)</label >
                  <div class="input-group input-group-alternative">
                      <input autocomplete="off" class="form-control <?php echo form_error('Waranty_Month') ? 'is-invalid':'' ?>" placeholder="Insert with number. ex: 1, 2, 3, etc" type="number" name="Waranty_Month" value="<?php echo $row->Waranty_Month; ?>" min="0" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('Waranty_Month') ?>
                      </div>
                  </div>
              </div>
              <div class="form-group mb-3">
                <label>Buy Date*</label >
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input autocomplete="off" class="form-control datepicker bg-white readonly <?php echo form_error('Buy_Date') ? 'is-invalid':'' ?>" data-date-format="yyyy-mm-dd" type="text" name="Buy_Date" value="<?php echo $row->Buy_Date; ?>" required>
                    <div class="invalid-feedback">
                      <?php echo form_error('Buy_Date') ?>
                    </div>
                  </div>
              </div>
              <div class="form-group  mb-3">
                <label>Sold Date*</label >
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                      <input autocomplete="off" class="form-control datepicker bg-white readonly <?php echo form_error('Sold_Date') ? 'is-invalid':'' ?>" data-date-format="yyyy-mm-dd" type="text" name="Sold_Date" value="<?php echo $row->Sold_Date; ?>" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('Sold_Date') ?>
                      </div>
                  </div>
              </div>
              <div class="form-group  mb-3">
                <label>Sold To*</label >
                  <div class="input-group input-group-alternative">
                      <input autocomplete="off" class="form-control <?php echo form_error('Sold_To') ? 'is-invalid':'' ?>" placeholder="Insert the name of the buyer" type="text" name="Sold_To" value="<?php echo $row->Sold_To; ?>" required>
                      <div class="invalid-feedback">
                        <?php echo form_error('Sold_To') ?>
                      </div>
                  </div>
              </div>
              <div class="form-group mb-3">
                <label>Photo</label >
                  <div class="mb-3">
                  <img alt="Image placeholder" src="http://localhost/Aplikasi_pendataan_alat_GPS/assets/img/<?php echo $row->Photo; ?>" width="30%" id="photoedit">
                  </div>
                  <div class="input-group input-group-alternative">
                    <input class="form-control" type="hidden" name="Old_Photo" value="<?php echo $row->Photo ?>">
                    <input class="form-control" type="file" name="Photo" id="preview_photoedit">
                  </div>
              </div>
              <div class="form-group mb-3">
                <label>GPS Description</label >
                <div class="input-group input-group-alternative">
                  <textarea class="form-control <?php echo form_error('Description') ? 'is-invalid':'' ?>" id="exampleFormControlTextarea1" rows="3" placeholder="Description ..." name="Description"><?php echo $row->Description; ?></textarea>
                  <div class="invalid-feedback">
                        <?php echo form_error('Description') ?>
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
<?php endforeach; ?>

<!-- Modal Detail -->
<?php foreach ($gps as $row): ?>
<div class="modal fade" id="modal-form-detail<?php echo $row->Id_GPS; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">      	
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-header bg-white pb-3">
            <H3> Detail GPS</H3>
          </div>
          <div class="card-body px-lg-4 py-lg-4">
            <div class="row">
              <div class="col-4">
                <img alt="Image placeholder" src="http://localhost/Aplikasi_pendataan_alat_GPS/assets/img/<?php echo $row->Photo; ?>" width="100%">                        
              </div>
              <div class="col-8">    
                <div class="mb-2">
                  Brand GPS : <?php echo $row->Brand_GPS; ?>
                </div>
                <div class="mb-2">
                  Model GPS : <?php echo $row->Model_GPS; ?>
                </div>
                <div class="mb-2">
                  GPS Name  : <?php echo $row->GPS_Name; ?>
                </div>
                <div class="mb-2">
                  Waranty   : <?php echo $row->Waranty_Month; ?> Month
                </div>
                <div class="mb-2">
                  Buy Date  : <?php echo date('d F Y', strtotime($row->Buy_Date)); ?>
                </div>
                <div class="mb-2">
                  Sold Date : <?php echo date('d F Y', strtotime( $row->Sold_Date)); ?>
                </div>
                <div class="mb-2">
                  Sold To   : <?php echo $row->Sold_To; ?>
                </div>
                <div class="mb-2">
                  Description   : <?php echo $row->Description; ?>
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


<?php foreach ($gps as $row): ?>
<div class="modal fade" id="modal-notification<?php echo $row->Id_GPS; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
        <a href="<?php echo site_url('GPSController/delete/'.$row->Id_GPS) ?>"><button type="button" class="btn btn-white ml-auto">Yes, Delete it</button></a>
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

    $('#modal-form-input').on('hidden.bs.modal', function (e) {
      $(this)
        .find("input,textarea,select")
            .val('')
            .end()
        .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "")
            .end();
    });

    $('form input[type=text],input[type=password],input[type=number]').on('change invalid', function() {
        var textfield = $(this).get(0);
        
        // hapus dulu pesan yang sudah ada
        textfield.setCustomValidity('');
        
        if (!textfield.validity.valid) {
          textfield.setCustomValidity('This form cannot be empty!');  
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