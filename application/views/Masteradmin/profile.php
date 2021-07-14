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
            <h1 class="m-0">Edit your profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url().'Admin/admin/home';?>">Home</a></li>
              <li class="breadcrumb-item active">Edit profile</li>
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
              <div class="card-header bg bg-primary">Edit Details
              </div>
            <form action="<?= base_url().'admin/Admin/profile/'.$arr['id'];?>" name="newadmin" id="newadmin" method="post" enctype="multipart/form-data">
              <div class="card-body">

              <div class="form-group">
              <label for="adminname">Employee Name</label>
              <input type="text" name="name" id="adminname" placeholder="Enter the admin name" value="<?= set_value('name', $arr['name']);?>" class="form-control <?=(form_error('name')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('name');?>
              </div>

              <div class="form-group">
              <label for="phone_no">Phone</label>
              <input type="tel" name="phone" id="phone_no" value="<?= set_value('phone', $arr['phone']);?>" placeholder="Enter phone number" class="form-control <?=(form_error('phone')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('phone');?>
              </div>

              <div class="form-group">
              <label for="address">Address</label>
              <input type="text" name="address" id="address" value="<?= set_value('address',$arr['address']);?>" placeholder="Enter Address" class="form-control <?=(form_error('address')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('address');?>
              </div>   

              <!-- <?php echo validation_errors();?> -->
              <div class="form-row">
                <div class="form-group mr-3">
                  <button type="submit" class="btn btn-primary py-1 px-3">Submit Changes</a>
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
<?php
$this->load->view('footer');
?>