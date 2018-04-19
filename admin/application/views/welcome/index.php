<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CompareTree Admin Panel</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?= base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?= base_url();?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="<?= base_url();?>assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?= base_url();?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="skin-blue">   
	<?php $this->load->view("layout/header");?>
      
	<div class="wrapper row-offcanvas row-offcanvas-left">
	<?php $this->load->view("layout/left_content");?>
  
  <!-- Right side column. Contains the navbar and content of the page -->
  <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                       <!-- <small>Control panel</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content" style="height:250px !important;">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                        <a href="<?= base_url();?>index.php/users">
                            <i class="fa fa-fw fa-user"  style="font-size:48px;"></i>
                        </a>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                        <a href="<?= base_url();?>index.php/category">
                    		<i class="fa fa-fw fa-sitemap" style="font-size:48px;"></i>
                        </a>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                        <a href="<?= base_url();?>index.php/leads">
                    		<i class="fa fa-fw fa-calendar" style="font-size:48px;"></i>
                        </a>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                        <a href="<?= base_url();?>index.php/section">
                            <i class="fa fa-fw fa-gamepad" style="font-size:48px;"></i>
                        </a>
                        </div>
                        
                    </div> <!-- Small boxes (Stat box) -->
                    <div class="row">
                        
                    </div>
               </section>
                   
           </aside>
  <!-- /.right-side --> 
</div>
<!-- ./wrapper --> 

<!-- jQuery 2.0.2 --> 
<script src="<?= base_url();?>assets/js/jquery.min.js"></script> 
<!-- Bootstrap --> 
<script src="<?= base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script> 
<!-- AdminLTE App --> 
<script src="<?= base_url();?>assets/js/AdminLTE/app.js" type="text/javascript"></script> 
<!-- AdminLTE for demo purposes --> <!--
<script src="js/AdminLTE/demo.js" type="text/javascript"></script> -->
</body>
</html>