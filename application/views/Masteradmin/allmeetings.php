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
            <h1 class="m-0">Meetings Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url().'Admin/admin/home';?>">Home</a></li>
              <li class="breadcrumb-item active">View Meetings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
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
              <div class="table-responsive">
              <table class="table table-bordered" id="tabledata">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Visitor's Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Purpose</th>
                    <th scope="col">Meeting With</th>
                    <th scope="col">Status</th>
                    <th scope="col">Meeting Time</th>
                    </tr>
                  </thead>
                  <tbody>
            <?php
              if(!empty($visitors)){
                foreach($visitors as $visitor){
            ?>
                    <tr>
                    <td><?= $visitor['id'];?></td>
                    <td><?= $visitor['phone'];?></td>
                    <td><?= $visitor['name'];?></td>
                    <td><?= $visitor['address'];?></td>
                    <td><?= $visitor['purpose'];?></td>
                    <td><?= $visitor['emp_name'];?></td>

                    <td>
                      <?php if($visitor['status']==0){?> <!--0 for jst visited -->
                      <span class="badge badge-info px-2 py-1">Awating Approval</span>
                      <?php } else if($visitor['status']==1){?>
                      <span class="badge badge-success px-2 py-1">Ongoing</span>
                      <?php } else if($visitor['status']==2){?>
                      <span class="badge badge-warning px-2 py-1">Scheduled</span>
                      <?php }else{?>
                      <span class="badge badge-danger px-2 py-1">Closed</span>
                      <?php } ?>
                    </td>
                    <td><?=date("h:i a d-M-Y", strtotime($visitor['created']))?></td>
                    </tr>
                    <?php
            }
          }
          else{
            ?>
              <tr>
                <td colspan="8" class="text-center alert alert-danger">Records not found</td>
              </tr>
              <?php }

?>
            </tbody>
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