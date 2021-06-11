<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
 
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Admin Login">
    <meta name="keywords" content="Admin Login">
    <meta name="author" content="ThemeSelect">
    <title>Admin Login</title>
    <link rel="apple-touch-icon"  href="<?php echo base_url();?>app-assets/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon"  href="<?php echo base_url();?>app-assets/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>app-assets/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>app-assets/css/themes/vertical-modern-menu-template/materialize.min.css">
    <link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>app-assets/css/themes/vertical-modern-menu-template/style.min.css">
    <link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>app-assets/css/pages/login.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>app-assets/css/custom/custom.css">
    <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->
  <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 1-column login-bg   blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
    <div class="row">
      <div class="col s12">
        <div class="container"><div id="login-page" class="row">
  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
    <?php if($this->session->flashdata('loginerror')!=''){?>
              <div class="card-alert card gradient-45deg-red-pink">
                <div class="card-content white-text">
                  <p>
                    <i class="material-icons">error</i> Sorry : <?php echo @$this->session->flashdata('loginerror');?></p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <?php }?>

              <?php if($this->session->flashdata('success')!=''){?>
                 <div class="card-alert card gradient-45deg-green-teal">
                <div class="card-content white-text">
                  <p>
                    <i class="material-icons">check</i> SUCCESS : <?php echo @$this->session->flashdata('success');?></p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <?php }?>
    <form class="form-horizontal" action="<?php echo base_url();?>apanel/main/login_validation" method="POST">
      <div class="row">
        <div class="input-field col s12">
          <h5 class="ml-4" style="text-align: center;">Admin control panel</h5>
        </div>
      </div>

      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input type="text"  required="" id="username" placeholder="Username" name="username" value="<?=$this->input->cookie('user');?>">
          <label for="username" class="center-align">Username</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input  id="password" placeholder="Password" name="password" required="" value="<?=$this->input->cookie('pass');?>" type="password">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m12 l12 ml-2 mt-1">
          <p>
            <label>
              <input type="checkbox" id="remember-me" name="remember_me"  value="on" <?php if($this->input->cookie('user')!=''){ ?> checked="checked" <?php } ?>>
              <span>Remember Me</span>
            </label>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login</button>
        </div>
      </div>
      <div class="row">
        
        <div class="input-field col s6 m6 l6">
          <p class="margin right-align medium-small"><a href="<?php echo base_url();?>apanel/main/forgot_password">Forgot password ?</a></p>
        </div>
      </div>
    </form>
  </div>
</div>
        </div>
        <div class="content-overlay"></div>
      </div>
    </div>

    <!-- BEGIN VENDOR JS-->
    <script  src="<?php echo base_url();?>app-assets/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script  src="<?php echo base_url();?>app-assets/js/plugins.min.js"></script>
    <script  src="<?php echo base_url();?>app-assets/js/search.min.js"></script>
    <script  src="<?php echo base_url();?>app-assets/js/custom/custom-script.min.js"></script>
    <script src="<?php echo base_url();?>app-assets/js/scripts/ui-alerts.min.js"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>

</html>