
    <div id="main">
      <div class="row">
       <!--  <div class="content-wrapper-before gradient-45deg-indigo-purple"></div> -->
        <div class="breadcrumbs-dark pb-1 " id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <!-- <h5 class="breadcrumbs-title mt-0 mb-0"><span>DataTable</span></h5> -->
                <ol class="breadcrumbs mb-0" >
                  <li class="breadcrumb-item"><a href="<?=base_url();?>apanel/home">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">settings</a>
                  </li>
                  <li class="breadcrumb-item active">Profile update mode
                  </li>
                </ol>
              </div>
              <!-- <div class="col s2 m6 l6"><a class="btn  waves-effect waves-light breadcrumbs-btn right " href="#"><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl">Add user</span></a>
                
              </div> -->
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="container">
            <div class="seaction ">
  

  <!-- Page Length Options -->
  <div class="row">
   
     

<?php if($this->session->flashdata('error')!=''){?>
        
              <div class="card-alert card gradient-45deg-red-pink">
                <div class="card-content white-text">
                  <p>
                    <i class="material-icons">error</i> Sorry : <?php echo $this->session->flashdata('error');?></p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
               
              <?php }?>

              <?php if($this->session->flashdata('message')!=''){?>
                
                 <div class="card-alert card gradient-45deg-green-teal">
                <div class="card-content white-text">
                  <p>
                    <i class="material-icons">check</i> Thank you : <?php echo $this->session->flashdata('message');?></p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
               
              <?php }?>
                        
                         
                           
                    
       
            <!-- Form Advance -->
    <div class="col s12 m12 l12">
      <div id="Form-advance" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Profile information</h4>
          <form class="form"  method="post" enctype="multipart/form-data" action="<?php echo base_url();?>apanel/settings/update_admin_user/<?php echo $admin[0]->id?>">
            <!-- <div class="row">
              <div class="input-field col m6 s12">
                <input id="first_name01" type="text">
                <label for="first_name01">First Name</label>
              </div>
              <div class="input-field col m6 s12">
                <input id="last_name" type="text">
                <label for="last_name">Last Name</label>
              </div>
            </div> -->
            <div class="row">
              <div class="input-field col s6">
                <input type="text" id="eventInput1"  name="username" value="<?php echo $admin[0]->username;?>" required>
                <label for="eventInput1">User Name / ID</label>
              </div>
              <div class="input-field col s6">
                <label for="eventInput2">Name</label>
                                            <input type="text" id="eventInput2"  name="name" value="<?php echo $admin[0]->name;?>" required>
              </div>
            </div>
            
            
            <div class="row">
              <div class="input-field col m6 s12">
                <label for="eventInput4">Email</label>
                                            <input type="email" id="eventInput4"  name="admin_email" value="<?php echo $admin[0]->admin_email;?>" required>
              </div>
              <div class="input-field col m6 s12">
                <label for="eventInput3">Company</label>
                                            <input type="text" id="eventInput3"  name="company" value="<?php echo $admin[0]->company; ?>">
              </div>
              
            </div>
           
            
              <div class="row">
                <div class="input-field col s12">
                  <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Update
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              
            </div>
          </form>
        </div>
      </div>
    </div>
          
     
    
  </div>

  <!-- Scroll - vertical, dynamic height -->

  <!-- Multi Select -->


          </div>
          <div class="content-overlay"></div>
        </div>
      </div>
    </div>
    <script>
function JSalert(str){
// A confirm dialog
alertify.confirm("Are you sure, you want to delete this row?", function (e) {
    if (e) {
        window.location.href="<?php echo base_url();?>apanel/category/product_delete/"+str
    } else {
       
    }
});
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>