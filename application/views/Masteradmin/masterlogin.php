<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?= base_url().'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback';?>">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url().'public/admin/plugins/fontawesome-free/css/all.min.css';?>">
  <!-- Theme style adminLTE -->
  <link rel="stylesheet" href="<?= base_url().'public/admin/dist/css/adminlte.min.css';?>">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="<?= base_url().'assets/css/bootstrap.min.css';?>">
  <!-- Theme css -->
  <link rel="stylesheet" type="text/css" href="../assets/css/color14.css" media="screen" id="color">

<style>
.text-black{
  color:black
}*/
.b-none{
  border-style: none;
  border-radius:5px;
}
body{
    overflow-x: hidden;
}
/*.bg-black{
  background-color: black;
}*/
/*.bg-cream{
    background-color: #ffa5004f;
}*/

</style>
</head>
<body class=" bg-cream">
    <div class="container">
    <?php
        $fail=$this->session->flashdata('fail');
        if($fail!="")
        {
    ?>
    <div class="alert alert-danger text-center"><?php echo $fail;}?></div>
    
    <div class="d-flex row pt-5 my-5 justify-content-center">
    
    <div class ="col-11 col-md-5 col-lg-4">
        <h4 class="text-center"> Welcome To Ajatus</h4>
    <div class="card p-4 bg-black">

    <h5 class=" mb-3 text-black">Login to your account</h5>
    <!-- <img src="<?= base_url().'assets/images/farming/logo.png';?>" class="img-fluid mx-auto" alt="logo" style="max-width:120px;"> -->
    <form action="<?= base_url().'login/authenticate'?>" name="loginform" id="loginform" method="post">
    <div class="input-group mb-3">
        <input type="email" name="email" placeholder="Enter your email id" class="form-control">
        <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-envelope"></i>
            </div>
        </div>
    </div>
    <?=form_error('email');?>
    <div class="input-group mb-3">
        <!--<i class= "fas fa-envelope"></i>-->
        <input type="password" name="password" placeholder="Enter your password" class="form-control">
        <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-lock"></i>
            </div>
        </div>
    </div>
    <?=form_error('password');?>
    <div class="row">

        <div class="col-12 col-md-4 col-lg-7">
            <input type="submit" value ="Login" class="btn btn-success btn-sm btn-block mb-2">
        </div>

       
          <!-- /.col -->
          
          <!-- /.col -->
    </div>
    </form>
    </div>
    </div>
    
    </div>
</body>  
</html>
