<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Guest Management</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href= "<?php echo base_url()?>public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href= "<?php echo base_url()?>public/admin/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <style>
    .invalid-feedback{
      display:block;
    }
  </style>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" >
    <!-- Left navbar links -->
    <div><b>Welcome, Employee</b>   </div>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
     <div>
        <div class="dropdown">
          <a class="btn btn-primary mr-2 " href="#" role="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class=" fas fa-bell"></i>
              Notifications <span class=" p-1" ><sub style="background-color: red; color: white; font-size:medium" id="count"></sub></span>
          </a>

          <div class="dropdown-menu" id="shownotification" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#">No new notifications</a>
          </div>
        </div>
     </div>
    
      <li class="nav-item dropdown">
        <a class="nav-link btn btn-success"  href="<?=base_url('admin/employee/logout');?>"><em class="fas fa-sign-out-alt">Logout</em></a>    
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   <div>
    <a href="#" class="brand-link bg-white"> 
      <span class="brand-text ml-4 "><strong>Guest Management</strong></span>
    </a>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?=base_url('admin/employee/index')?>" class="nav-link <?= (!empty($mainModule) && $mainModule=='home')? 'active' : '';?>">
            <i class="fas fa-home nav-icon"></i>
              <p>Home</p>
            </a>
          </li>
        
          <li class="nav-item ">
            <a href="<?=base_url('admin/employee/visitor/').$id?>" class="nav-link <?= (!empty($mainModule) && $mainModule=='meeting')? 'active' : '';?>">
            <i class="fas fa-handshake nav-icon"></i>
              <p>Meetings</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?=base_url('admin/employee/profile/').$id?>" class="nav-link <?= (!empty($mainModule) && $mainModule=='profile')? 'active' : '';?>">
              <i class="fas fa-user nav-icon"></i>
              <p>Profile</p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>