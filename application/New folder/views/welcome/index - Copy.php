<?php ini_set('error_reporting', 0);?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Game</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?= base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?= base_url();?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?= base_url();?>assets/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?= base_url();?>assets/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="<?= base_url();?>assets/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?= base_url();?>assets/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?= base_url();?>assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?= base_url();?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        
        <link href="<?= base_url();?>assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">

<?php $this->load->view("layout/header");?>

  <div class="wrapper row-offcanvas row-offcanvas-left">

<?php $this->load->view("layout/left_content");?>

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
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php echo $this->order_model->new_orders(); ?>
                                    </h3>
                                    <p>
                                        New Orders
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?php echo  site_url('order/index');?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                     <?php 
										$kick_amount='0';
										$result = $this->order_model->all_kick();
										foreach($result->result_array() as $order)
										{
											//if($order['kick_back_status'] > 0)
												$kick_amount += $order['kick_back'];
										}
										echo $kick_amount.' $';
										?>
                                    </h3>
                                    <p>
                                        Kick Back
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="<?php echo  site_url('users/selesUser');?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                       <?php echo $this->users_model->new_users(); ?>
                             		</h3>
                                    <p>
                                       New User Registrations
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?php echo  site_url('users/frentUser');?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        65
                                    </h3>
                                    <p>
                                        Unique Visitors
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <!-- top row -->
                    <div class="row">
                        <div class="col-xs-12 connectedSortable">
                            
                        </div><!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-6 connectedSortable"> 
                                
                            
                           
                                                
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="nav-tabs-custom">
                                <!-- Tabs within a box -->
                                <ul class="nav nav-tabs pull-right">
                                   <!-- <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>-->
                                   <!-- <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>-->
                                    <li class="pull-left header"><i class="fa fa-inbox"></i>Sales</li>
                                </ul>
                                <div class="tab-content no-padding">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                                    <!--<div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>-->
                                </div>
                            </div><!-- /.nav-tabs-custom -->

                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="nav-tabs-custom">
                                <!-- Tabs within a box -->
                                <ul class="nav nav-tabs pull-right">
                                   <!-- <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>-->
                                   <!-- <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>-->
                                    <li class="pull-left header"><i class="fa fa-inbox"></i>Users Registration</li>
                                </ul>
                                <div class="tab-content no-padding">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="revenue-chart1" style="position: relative; height: 300px;"></div>
                                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                                </div>
                            </div><!-- /.nav-tabs-custom -->                            
                            
 <!-- Chat box -->
                            <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title"><i class="fa fa-comments-o"></i>Feedback</h3>
<!--                                    <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                                        <div class="btn-group" data-toggle="btn-toggle" >
                                            <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>                                            
                                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="box-body chat" id="chat-box">
								<?php 
                              	  $Reviews = $this->users_model->product_reviews();
                                	foreach($Reviews->result_array() as $review){?>
                          			 <!-- chat item -->
                                        <div class="item">
                                            <img src="<?= base_url();?>assets/img/avatar2.png" alt="user image" class="offline"/>
                                            <p class="message">
                                                <a href="#" class="name">
                                                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?php echo $review['review_time'];?></small>
                                                    <?php echo ($review['fname']?$review['fname'].' '.$review['lname']:$review['username'])?>
                                                </a>
                                                <?php 
												echo 'Product Name : '.$review['pro_name']."<br/>";
												echo $review['review'];
												?>
                                            </p>
                                        </div><!-- /.item -->
                                <?php	}
                                ?> 

                                </div><!-- /.chat -->
                            </div><!-- /.box (chat box) -->
                           

                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-6 connectedSortable">
                            <!-- Map box -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">                                        
                                        <!--<button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>-->
                                        <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                                    </div><!-- /. tools -->

                                    <i class="fa fa-map-marker"></i>
                                    <h3 class="box-title">
                                        Users
                                    </h3>
                                </div>
                                <div class="box-body no-padding">
                                    <div id="world-map" style="height: 300px;"></div>
                                    <div class="table-responsive">
                                        <!-- .table - Uses sparkline charts-->
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Country</th>
                                                <th>Total Users</th>
                                                <th>Online Users</th>
                                            </tr>
                                            <?php 
												$object=array();
												$result = $this->users_model->country_by_group();
                                            	foreach($result->result_array() as $row){
													$online = $this->users_model->online_users('1',$row['country']);
												        if($row['country'] !='NA'){
													$coun_iso=$this->users_model->country_iso($row['country']);
													foreach($coun_iso->result_array() as $coun)
														$iso=$coun;
													$object[$iso['iso_2']] = $row['count'];
                                                                                                        }
											?>
                                            <tr>
                                                <td><a href="#"><?php echo ($row['country'] !='NA'? $row['country']:'Not Mentioned');?></a></td>
                                                <td><?php echo $row['count'];?></td>
                                                <td><?php echo $online; ?></td>
                                            </tr>
                                            <?php } 
											?>
                                        </table><!-- /.table -->
                                           <script type="text/javascript">
												var map_val = <?php echo json_encode($object) ?>;
											</script>
                                    </div>
                                </div><!-- /.box-body-->
                            </div>
                            <!-- /.box -->

                            <!-- quick email widget -->
                            <div class="box box-info">
                                <div class="box-header">
                                    <i class="fa fa-envelope"></i>
                                    <h3 class="box-title">Quick Email</h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                    </div><!-- /. tools -->
                                </div>
                                 <?php if($this->session->flashdata('success')){ ?>
                                <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alert!</b> <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <?php } ?>
                                
                                <?php
								echo form_open_multipart('users/adminMail', array('name' => 'create','onsubmit'=>'return validation();')); 
								?>
                                <div class="box-body">
                                    
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="to" id="to" placeholder="Email to:" required="required"/>
                                            <?php echo form_error('to', '<span class="php-error" style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="to_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required="required">
                                            <?php echo form_error('subject', '<span class="php-error" style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="subject_msg" style="color:#f00;"></span>
                                        </div>
                                        <div>
                                            <textarea class="textarea" name="editor1" id="editor1" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                             <?php echo form_error('message', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="message_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="box-footer clearfix">
                                            <button  type="submit" class="pull-right btn btn-default">Send <i class="fa fa-arrow-circle-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
							 <?php
									echo form_close();
							?>
                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside>
            <?php $this->load->view("layout/footer");?>
 <?php 
 	
	for($year = 2012;$year <= date('Y');$year++){
		$orders = $this->order_model->sales($year);
		if($year == date('Y'))
			$array_for_object .= '{y: \''.$year.'\', item1: \''.$orders.'\'}';	
		else
			$array_for_object .= '{y: \''.$year.'\', item1: \''.$orders.'\'}, ';	
	}
	$sales_data = '['.$array_for_object.']';		
?>
 <?php 
 	
	for($year = 2012;$year <= date('Y');$year++){
		$users = $this->users_model->users_chart($year);
		if($year == date('Y'))
			$user_array_for_object .= '{y: \''.$year.'\', item1: \''.$users.'\'}';	
		else
			$user_array_for_object .= '{y: \''.$year.'\', item1: \''.$users.'\'}, ';	
	}
	$users_data = '['.$user_array_for_object.']';	
	
 
?> 
           
<script type="text/javascript">
var users = <?php echo $users_data ?>;
var sales = <?php echo $sales_data ?>;
</script>


<!-- jQuery 2.0.2 --> 
<script src="<?= base_url();?>assets/js/jquery.min.js"></script> 
<!-- Bootstrap --> 
<script src="<?= base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script> 
<!-- DATA TABES SCRIPT --> 
<script src="<?= base_url();?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script> 
<script src="<?= base_url();?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script> 
<!-- AdminLTE App --> <!--
<script src="<?= base_url();?>assets/js/AdminLTE/app.js" type="text/javascript"></script> -->
<!-- AdminLTE for demo purposes --> 
<script src="js/AdminLTE/demo.js" type="text/javascript"></script> 
<!-- page script --> 
<script type="text/javascript">
            $(function() {
               $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script> 

<script type="text/javascript">
	function valdate3() {
		var st = false;
		if(document.getElementById('level_id').value) {
			if(document.getElementById('level').value) {
				document.getElementById('frm_level').action = 'edit_level/';
				st = true;
			}
			else {
				st = false;
			}
		}
		else if(document.getElementById('level').value) {
			document.getElementById('frm_level').action = 'add_level/';
			st = true;
		}
		else {
			st = false;
		}
		return st;
	}
	function referesh() {
		window.location.href = "level";
	}
</script>
</body>
</html>

