<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0">Event</h3>
            
          </div>
          
        </div>
        <div class="content-body">
          <section id="basic-form-layouts">
   
<div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form-center">Update Event</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <!-- <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div> -->
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        
                        <?php if($this->session->flashdata('error')){?>
                        <div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('error');?></p>
</div>
<?php }?>
                        <?php if($this->session->flashdata('message')){?>
                        <div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('message');?></p>
</div>
<?php }?>

                        <form class="form"  method="post" enctype="multipart/form-data" action="<?php echo base_url();?>apanel/event/event_post/<?php echo $user[0]->id?>">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <div class="form-body">
                                      

                                        <div class="form-group">
                                            <label for="eventInput2">Event Name</label>
                                            <input type="text" id="eventInput2" class="form-control" placeholder="name" name="name" value="<?php echo $user[0]->name;?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput4">Start Date & Time</label>
                                            <input type="datetime-local" id="eventInput4" class="form-control" placeholder="email" name="email" value="<?php echo $user[0]->email;?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="eventInput4">End Date & Time</label>
                                            <input type="datetime-local" id="eventInput4" class="form-control" placeholder="email" name="email" value="<?php echo $user[0]->email;?>" required>
                                        </div>

                                       
                                       

                                    </div>
                                </div>
                            </div>

                            <div class="form-actions center">
                                <a href="<?php echo base_url();?>apanel/event/" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Close
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-square-o"></i> Update Now
                                </button>
                            </div>
                        </form> 

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>