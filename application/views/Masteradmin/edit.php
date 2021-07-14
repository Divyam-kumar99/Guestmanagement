<?php
$this->load->view('masteradmin/header',$id);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Employee Info</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url().'Admin/admin/home';?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url().'admin/admin/index';?>">Manage Employee</a></li>
              <li class="breadcrumb-item active">Edit Employee</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header bg bg-primary">Edit Employee
              </div>
            <form action="<?= base_url().'admin/Admin/edit/'.$arr['id'];?>" name="newadmin" id="newadmin" method="post" enctype="multipart/form-data">
              <div class="card-body">

              <div class="form-group">
              <label for="adminname">Employee Name</label>
              <input type="text" name="name" id="adminname" placeholder="Enter the admin name" value="<?= set_value('name', $arr['name']);?>" class="form-control <?=(form_error('name')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('name');?>
              </div>

              <div class="form-group">
              <label for="email">Mail Id</label>
              <input type="email" name="email" id="email" value="<?= set_value('email', $arr['email']);?>" placeholder="Enter the admin mail id" class="form-control <?=(form_error('email')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('email');?>
              </div>

              <div class="form-group">
              <label for="phone_no">Phone</label>
              <input type="number" name="phone" id="phone_no" value="<?= set_value('phone', $arr['phone']);?>" placeholder="Enter phone number" class="form-control <?=(form_error('phone')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('phone');?>
              </div>

              <div class="form-group">
              <label for="address">Address</label>
              <input type="text" name="address" id="address" value="<?= set_value('address',$arr['address']);?>" placeholder="Enter Address" class="form-control <?=(form_error('adress')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('address');?>
              </div>   

              <label for="status">Select Designaton</label><br>
              <div class="form-row">
                <div class="form-group mr-3">
                  <input type="radio" id="admin" name="status" value="0" <?= ($arr['role']==0)? 'checked' : ''; ?>>
                  <label for="active">Admin</label>
                </div>
                <div class="form-group mr-3">
                  <input type="radio" id="inactive" name="status" value="1" <?= ($arr['role']==1)? 'checked' : ''; ?>>
                  <label for="inactive">Employee</label>
                </div>
                <div class="form-group">
                  <input type="radio" id="inactive" name="status" value="2" <?= ($arr['role']==2)? 'checked' : ''; ?>>
                  <label for="inactive">Receptionist</label>
                </div>
              </div>
              
              <div class="form-row">
                <div class="form-group mr-3">
                  <button type="submit" class="btn btn-primary py-1 px-3">Submit</a>
                </div>
                <div class="form-group">
                  <a href="<?= base_url().'Admin/admin/index';?>" class="btn btn-secondary py-1 px-3">Back</a>
                </div>
              </div>

              </div>
            </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
<?php
$this->load->view('footer');
?>