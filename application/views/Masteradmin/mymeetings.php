<?php
$this->load->view('masteradmin/header',$id);
?>
<!-- Content Wrapper. Contains page content -->
<style>
th,td{
  text-align:center;
}
.btn-navy{
  background-color: navy!important;
  color:white;
}
.btn-navy:hover{
  color:#f9f9f3;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Meetings Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url().'Admin/admin/home';?>">Home</a></li>
              <li class="breadcrumb-item active">View MY Meetings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- Modal -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          <?php
          $success=$this->session->flashdata('success');
          if($success!=""){?>
          <div class="alert alert-success alert-dismissible fade show text-center"><?= $success;?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
          <?php } ?>
            <div class="card">
             
              <div class="card-body">
              <!--table-->
              <div class="table-bordered">
              <table class="table table-bordered">
                
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Visitor's Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Purpose</th>
                    
                    <th scope="col">Status</th>
                    <th scope="col">Meeting Time</th>
                    <th scope="col">Action</th>
                    </tr>
                
            <?php 
              if(!empty($visitors)){
                foreach($visitors as $visitor){
                  if($visitor['status']!=3){
            ?>
                <tbody>
                    <tr>
                    <td><?= $visitor['id'];?></td>
                    <td><?= $visitor['phone'];?></td>
                    <td><?= $visitor['name'];?></td>
                    <td><?= $visitor['address'];?></td>
                    <td><?= $visitor['purpose'];?></td>
                    
                    <td id="change<?= $visitor['id'];?>">
                      <?php if($visitor['status']==0){?> <!--0 for jst visited -->
                      <span class="badge badge-info px-2 py-1">Awating Approval</span>
                      <?php } else if($visitor['status']==1){?>
                      <span class="badge badge-success px-2 py-1">Ongoing</span>
                      <?php } else if($visitor['status']==2){?>
                      <span class="badge badge-warning px-2 py-1">Scheduled</span>
                      <?php }?>
                    </td>
                    <td><?=date("h:i a d-M-Y", strtotime($visitor['created']))?></td>
                    <td>  
              
                      <select name="status22" id="status<?= $visitor['id'];?>" class="status22" onchange=changestatusadmin(<?=$visitor['id']?>)>
                      
                      <option value="#">--- Choose ---</option> 
                      <option value="1">Accept</option>
                      <option value="2">Reschedule</option>
                      <option value="3">Cancel</option>
                    
                      </select>  
                    </td>
                    
                    <div class="modal fade" id="schedulemodal<?=$visitor['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="<?= base_url('admin/admin/reschedule/').$visitor['id']?>" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="datetime-local" class="form-control" name="date"  required placeholder="Reschedule Meeting Timing">
                              </div>  
                          </div>
                          <div class="modal-footer">
                            <div class="form-group">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                            </div>
                            <div class="form-group">
                              <input type="submit" class=" btn btn-success" value="submit">
                            </div>
                          </div>
                            </form>
                        </div>
                      </div>
                    </div>  
                  </tr>
                </tbody>
            <?php }
            }
          }
            else{
            ?>
              <tr>
              <td colspan="8" class="text-center alert alert-danger">Records not found</td>
              </tr>
            <?php }

            ?>
              </table>
              </div>
              <!---table end-->
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
<?php
$this->load->view('footer');
?>