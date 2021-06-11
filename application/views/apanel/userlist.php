
    <div id="main">
      <div class="row">
       <!--  <div class="content-wrapper-before gradient-45deg-indigo-purple"></div> -->
        <div class="breadcrumbs-dark pb-0 " id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <!-- <h5 class="breadcrumbs-title mt-0 mb-0"><span>DataTable</span></h5> -->
                <ol class="breadcrumbs mb-0" >
                  <li class="breadcrumb-item"><a href="<?=base_url();?>apanel/home">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="<?=base_url();?>apanel/user">user</a>
                  </li>
                  <li class="breadcrumb-item active">user list
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
               foreach ($datatable as $key => $value) {
                //print_r($value)
                $i++;
               ?>
                 <tr>
                  <td><?=$i;?></td>
                  <td><?=$value->name;?></td>
                  <td><?=$value->username;?></td>
                  
                   <td>
                                            
                                            
                                        </td>
                  <td >

                <a class="modal-trigger " href="<?=base_url();?>apanel/user/user_edit?data=<?=base64_encode($value->user_id);?>"><i class="material-icons">edit</i></a>
                <a href="javascript:void(0)" onclick="return JSalert('<?=$value->user_id;?>')"><i class="material-icons">delete</i>
            </a>
                

                   </td>
                 
                </tr>



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
    <script>
function JSalert(str){
// A confirm dialog
alertify.confirm("Are you sure, you want to delete this row?", function (e) {
    if (e) {
        window.location.href="<?php echo base_url();?>apanel/user/user_delete/"+str
    } else {
       
    }
});
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>