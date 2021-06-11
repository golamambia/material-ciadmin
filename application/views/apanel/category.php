 
    <div id="main">
      <div class="row">
        <!-- <div class="content-wrapper-before gradient-45deg-indigo-purple"></div> -->
        <div class="breadcrumbs-dark pb-0 " id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <!-- <h5 class="breadcrumbs-title mt-0 mb-0"><span>DataTable</span></h5> -->
                <ol class="breadcrumbs mb-0" >
                  <li class="breadcrumb-item"><a href="<?=base_url();?>apanel/home">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="<?=base_url();?>apanel/category">Service</a>
                  </li>
                  <li class="breadcrumb-item active">Service list
                  </li>
                </ol>
              </div>
              <div class="col s2 m6 l6"><a class="btn  waves-effect waves-light breadcrumbs-btn right modal-trigger" href="#modal1"><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl">Add Service</span></a>
                
              </div>
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="container">
            <div class="section section-data-tables">
  
  

  <!-- Page Length Options -->
  <div class="row">
    <div class="col s12">
      <div class="card">

<?php if($this->session->flashdata('error')!=''){?>
        
              <div class="card-alert card gradient-45deg-red-pink">
                <div class="card-content white-text">
                  <p>
                    <i class="material-icons">error</i> Sorry : <?php echo $this->session->flashdata('loginerror');?></p>
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
                        
                         
                            <!-- <div class="col s6 text-right">
                                <a class="waves-effect waves-light btn modal-trigger mb-2 mr-1" href="#modal1">Add category</a>
                            </div> -->
                       <div id="modal1" class="modal">
                  <div class="modal-content">
                    
                <h5 class="modal-title">Add Service</h5>
                
      
         <form  method="post" action="<?php echo base_url();?>apanel/category/product_post"  enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col s12">
                 <input type="text"   name="service_name" required>
                <label for="fn">Title</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                 <input type="text"   name="service_description" required>
                <label for="email">Description</label>
              </div>
            </div>
            <div class="row">
              <div class="input-file col s12">
                 <input type="file"  id="Icon" accept="image/*" name="cat_file" required="" placeholder="sdf">
                <label for="password">Image</label>
              </div>
            </div>
            <div class="row">
              
              <div class="row">
                <div class="input-field col s12">
                  <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        
                  </div>
                  
                </div>
                    
        <div class="card-content">
         <!--  <h4 class="card-title">Page Length Options</h4> -->

          <div class="row">
            <div class="col s12">
              <table id="page-length-option" class="display">
                <thead>
                  <tr>
                  <th>#</th>
                  <th>Title</th>
                   <th>Description</th>
                  
                           <th>Image</th>    
                  <th class="float-centre">Action</th>
                  <!-- <th></th> -->
                </tr>
                </thead>
                <tbody>
                  <?php 
               $i=0;
               foreach ($hm_product as $key => $value) {
                //print_r($value)
                $i++;
               ?>
                 <tr>
                  <td><?=$i;?></td>
                  <td><?=$value->service_name;?></td>
                  <td><?=$value->service_description;?></td>
                  
                   <td>
                                            
                                            <img id="Image1" src="<?=base_url();?>uploads/<?=$value->service_image;?>" alt="<?=$value->service_name;?>" class="rounded mr-3" height="48">
                                        </td>
                  <td >

                <a class="modal-trigger " href="#modal_edit<?=$value->service_id;?>"><i class="material-icons">edit</i></a>
                <a href="javascript:void(0)" onclick="return JSalert('<?=$value->service_id;?>')"><i class="material-icons">delete</i>
            </a>
                

                   </td>
                 
                </tr>

<div id="modal_edit<?=$value->service_id;?>" class="modal">
                  <div class="modal-content">
                    
                <h5 class="modal-title">Update Service</h5>
                
      
         <form  method="post" action="<?php echo base_url();?>apanel/category/product_edit/<?=$value->service_id;?>"  enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col s12">
                 <input type="text"  value="<?=$value->service_name;?>"  name="service_name" required>
                <label for="fn">Title</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                 <input type="text"  value="<?=$value->service_description;?>"   name="service_description" required>
                <label for="email">Description</label>
              </div>
            </div>
            <div class="row">
              <div class="input-file col s6">
                 <input type="file"  accept="image/*" name="cat_file"  placeholder="sdf">
                <label for="password">Image</label>
              </div>
              <div class="input-file col s6">
                  <img src="<?=base_url();?>uploads/<?=$value->service_image;?>"  height="50" width="150">
              </div>
            </div>
            <div class="row">
              
              <div class="row">
                <div class="input-field col s12">
                  <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Update
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        
                  </div>
                  
                </div>

                      <?php  }?>
                  
                </tbody>
                
              </table>
            </div>
          </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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

