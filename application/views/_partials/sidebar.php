  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a>
        <img src="<?php echo base_url().'assets/img/logonew.png'?>" width="80%" >
      </a>
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="<?php echo base_url().'assets/img/'.$user->User_Photo; ?>" width="100%" height="100%" >
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <?php if($this->session->userdata("User_Role")=="user"): ?>
            <a href="<?php echo site_url("ProfileController"); ?>" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <?php endif; ?>
            <div class="dropdown-divider"></div>
            <a href="<?php echo site_url("LoginController/logout"); ?>" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <li class="nav-item <?php if($nav=="Dashboard"): echo "active"; endif; ?>">
          <a class=" nav-link <?php if($nav=="Dashboard"): echo "active"; endif; ?> " href="<?php echo base_url() ?>"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item <?php if($nav=="GPS"): echo "active"; endif; ?>">
            <a class="nav-link <?php if($nav=="GPS"): echo "active"; endif; ?>" href="<?php echo base_url() ?>GPSController">
              <i class="ni ni-square-pin text-orange"></i> GPS
            </a>
          </li>
          <?php if($this->session->userdata("User_Role")=="admin"): ?>
          <li class="nav-item <?php if($nav=="User"): echo "active"; endif; ?>">
            <a class="nav-link <?php if($nav=="User"): echo "active"; endif; ?>" href="<?php echo base_url() ?>UsersController">
              <i class="fas fa-users text-blue"></i> Users
            </a>
          </li>
          <?php endif; ?>
          <?php if($this->session->userdata("User_Role")=="user"): ?>
          <li class="nav-item <?php if($nav=="Profile"): echo "active"; endif; ?>">
            <a class="nav-link <?php if($nav=="Profile"): echo "active"; endif; ?>" href="<?php echo base_url() ?>ProfileController">
              <i class="ni ni-single-02 text-yellow"></i> User profile
            </a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>