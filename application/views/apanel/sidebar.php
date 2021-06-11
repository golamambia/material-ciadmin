<?php 
 $page_con=$this->router->fetch_class(); 
$page_fun=$this->router->fetch_method(); 
$color_get= $this->General_model->show_data_id('theme_customizer',1,'tc_id','get','');
?>

<aside class="sidenav-main nav-expanded nav-lock nav-collapsible <?php if($color_get[0]->tc_menu_dark!=0){echo'sidenav-dark';}else{echo 'sidenav-light';}?> <?=$color_get[0]->tc_menu_select;?>">

      <div class="brand-sidebar">

        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img class="hide-on-med-and-down" src="<?=base_url();?>app-assets/images/logo/materialize-logo-color.png" alt="materialize logo"/><img class="show-on-medium-and-down hide-on-med-and-up" src="<?=base_url();?>app-assets/images/logo/materialize-logo.png" alt="materialize logo"/><span class="logo-text hide-on-med-and-down">Materialize</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>

      </div> 

      <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">

        <li class="active bold"><a <?php if($page_con =='home' && $page_fun =='index'){echo 'class="active '.$color_get[0]->tc_menu_color.'"';}?> class="collapsible-header waves-effect waves-cyan " href="<?php echo base_url() ?>apanel/home"><i class="material-icons">dashboard</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>

          

        </li>

       

        <li class="navigation-header"><a class="navigation-header-text">Applications</a><i class="navigation-header-icon material-icons">more_horiz</i>

        </li>

        

       <li class="bold <?php if($page_con =='user'){echo " active open";}?>"><a class=" <?php if($page_con =='user' && $page_fun =='user_edit'){echo 'active';}?> collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">group</i><span class="menu-title" data-i18n="eCommerce">User</span></a>

          <div class="collapsible-body">

            <ul class="collapsible collapsible-sub" data-collapsible="accordion">

              <li <?php if($page_con =='user' && $page_fun =='index'){echo 'class="active"';}?>><a <?php if($page_con =='user' && $page_fun =='index'){echo 'class="active '.$color_get[0]->tc_menu_color.'"';}?> href="<?php echo base_url() ?>apanel/user"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Products Page">user list</span></a>

              </li>

              

            </ul>

          </div>

        </li>

        <li class="bold <?php if($page_con =='category'){echo " active open";}?>"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">pages</i><span class="menu-title" data-i18n="eCommerce">Service</span></a>

          <div class="collapsible-body">

            <ul class="collapsible collapsible-sub" data-collapsible="accordion">

              <li <?php if($page_con =='category' && $page_fun =='index'){echo 'class="active"';}?>><a <?php if($page_con =='category' && $page_fun =='index'){echo 'class="active '.$color_get[0]->tc_menu_color.'"';}?> href="<?php echo base_url() ?>apanel/category"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Products Page">Service list</span></a>

              </li>

              

            </ul>

          </div>

        </li>

         <li class="bold <?php if($page_con =='settings'){echo " active open";}?>"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings</i><span class="menu-title" data-i18n="eCommerce">Settings</span></a>

          <div class="collapsible-body">

            <ul class="collapsible collapsible-sub" data-collapsible="accordion">

              <li <?php if($page_con =='settings' && $page_fun =='profile'){echo 'class="active"';}?>><a <?php if($page_con =='settings' && $page_fun =='profile'){echo 'class="active '.$color_get[0]->tc_menu_color.'"';}?> href="<?php echo base_url() ?>apanel/settings/profile"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Products Page">Profile</span></a>

              </li>

              <li <?php if($page_con =='settings' && $page_fun =='general'){echo 'class="active"';}?>><a <?php if($page_con =='settings' && $page_fun =='general'){echo 'class="active '.$color_get[0]->tc_menu_color.'"';}?> href="<?php echo base_url() ?>apanel/settings/general"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Products Page">General Setting</span></a>

              </li>
              <li <?php if($page_con =='settings' && $page_fun =='change_password'){echo 'class="active"';}?>><a <?php if($page_con =='settings' && $page_fun =='change_password'){echo 'class="active '.$color_get[0]->tc_menu_color.'"';}?> href="<?php echo base_url() ?>apanel/settings/change_password"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Products Page">Change Password</span></a>

              </li>

            </ul>

          </div>

        </li>

       

       

      

       <!--  <li class="navigation-header"><a class="navigation-header-text">Misc </a><i class="navigation-header-icon material-icons">more_horiz</i>

        </li>

        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">photo_filter</i><span class="menu-title" data-i18n="Menu levels">Menu levels</span></a>

          <div class="collapsible-body">

            <ul class="collapsible collapsible-sub" data-collapsible="accordion">

              <li><a href="JavaScript:void(0)"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Second level">Second level</span></a>

              </li>

              <li><a class="collapsible-header waves-effect waves-cyan" href="JavaScript:void(0)"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Second level child">Second level child</span></a>

                <div class="collapsible-body">

                  <ul class="collapsible" data-collapsible="accordion">

                    <li><a href="JavaScript:void(0)"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Third level">Third level</span></a>

                    </li>

                  </ul>

                </div>

              </li>

            </ul>

          </div>

        </li> -->

        

      </ul>

      <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>

    </aside>