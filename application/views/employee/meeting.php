<?php
$this->load->view('employee/header',$id);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Schedule Meeting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url().'Admin/employee/index';?>">Home</a></li>
              <li class="breadcrumb-item active">Schedule Meeting</li>
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
              <div class="card-header bg bg-primary">Visitors Details
                  <div class="card-tools">
                    <a href="<?= base_url().'admin/employee/meeting/'.$id;?>" method="post" class="btn btn-secondary px-3"><i class="far fa-eye mr-1"></i>See all Meetings</a>
                  </div> 
              </div>
            <form action="<?= base_url().'admin/employee/visitor';?>" name="newadmin" id="newadmin" method="post" enctype="multipart/form-data">
              <div class="card-body">
              <label for="phone_no">Visitor Phone no.</label>
              <div class='input-group mb-0'>
                <input type="number" name="phone" id="phone_no" value="<?= set_value('phone');?>" placeholder="Enter phone number" class="form-control <?=(form_error('phone')!= "" ) ?'is-invalid' :'';?>">
                <div class="input-group-append">
                  <button type="button" class="input-group-text" id="ajaxcall1">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
                <?= form_error('phone');?>
              </div>

              <div class="form-group">
              <label for="adminname">Visitor Name</label>
              <input type="text" name="name" id="name" placeholder="Enter the Emlpoyee name" value="<?= set_value('name');?>" class="form-control <?=(form_error('name')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('name');?>
              </div>

              <div class="form-group">
              <label for="address">Address</label>
              <input type="text" name="address" id="address" value="<?= set_value('address');?>" placeholder="Enter Address" class="form-control <?=(form_error('address')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('address');?>
              </div>   
              <div class="form-group">
              <label for="purpose">Purpose of Meeting</label>
              <input type="text" name="purpose" id="purpose" value="<?= set_value('purpose');?>" placeholder="Purpose of meeting" class="form-control <?=(form_error('purpose')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('purpose');?>
              </div>                
              <div class="form-group">
              <label for="date">Meeting Date & Time</label>
              <input type="datetime-local" name="date" id="date" placeholder="Meeting Timing" value="<?= set_value('date');?>" class="form-control <?=(form_error('date')!= "" ) ?'is-invalid' :'';?>">
              <?= form_error('date');?>
              </div>             
              
              <div class="form-row">
                <div class="form-group mr-3">
                  <button type="submit" class="btn btn-primary py-1 px-3">Submit</a>
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