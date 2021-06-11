
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
                  <li class="breadcrumb-item"><a href="<?=base_url();?>apanel/user">user list</a>
                  </li>
                  <li class="breadcrumb-item active">user update mode
                  </li>
                </ol>
              </div>
              <div class="col s2 m6 l6"><a class="btn  waves-effect waves-light breadcrumbs-btn right " href="#"><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl">Add user</span></a>
                
              </div>
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
          <h4 class="card-title">User information</h4>
          <form action="<?=base_url();?>apanel/user/user_edit_post/<?=$user_info[0]->user_id;?>" method="post">
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
              <div class="input-field col s12">
                <input id="password6" name="name" type="text" value="<?=$user_info[0]->name;?>" required>
                <label for="password">Name</label>
              </div>
            </div>
            
            
            <div class="row">
              <div class="input-field col m6 s12">
                <input id="email5" type="email" value="<?=$user_info[0]->username;?>" readonly="">
                <label for="email">Email/username</label>
              </div>
              <div class="input-field col m6 s12">
                <select name="active" required="">
                  <option value="" disabled selected>Choose status</option>
                  <option <?php if($user_info[0]->active==1){echo"selected";}?> value="1">Active</option>
                  <option <?php if($user_info[0]->active==0){echo"selected";}?> value="0">Deactive</option>
                  
                </select>
                <label for="email">User status</label>
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