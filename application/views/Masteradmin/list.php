<?php
$this->load->view('masteradmin/header');
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
            <h1 class="m-0">Employee Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url().'Admin/admin/home';?>">Home</a></li>
              <li class="breadcrumb-item active">View Employee</li>
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
              <div class="card-header">
                
                <div class="card-tools">
                  <a href="<?= base_url().'admin/Admin/create';?>" class="btn btn-primary px-3"><i class="fas fa-plus">Create New Admin</i></a>
                </div>
              </div>
              <div class="card-body">
              <!--table-->
              <table class="table table-bordered">
                
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Mail Id</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                    </tr>
                
            <?php
              if(!empty($arr)){
                foreach($arr as $arr){
            ?>
                <tbody>
                    <tr>
                    <td><?= $arr['id'];?></td>
                    <td><?= $arr['name'];?></td>
                    <td><?= $arr['email'];?></td>
                    <td><?= $arr['phone'];?></td>
                    <td>
                      <?php if($arr['role']==0){?>
                      <span class="badge badge-success px-2 py-1">Admin</span>
                      <?php } else if($arr['role']==1){?>
                      <span class="badge badge-info px-2 py-1">Employee</span>
                      <?php }else{?>
                      <span class="badge badge-secondary px-2 py-1">Receptionist</span>
                      <?php } ?>
                    </td>
                    <td>
                    <a href="<?= base_url().'admin/Admin/edit/'.$arr['id'];?>" class="btn btn-primary" style="width:80px;">Edit</a>
                    <a href="<?= base_url().'admin/Admin/delete/'.$arr['id'];?>" class="btn btn-danger" style="width:80px;">Delete</a>
                    </td>
                    </tr>
                </tbody>
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
              </table>
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