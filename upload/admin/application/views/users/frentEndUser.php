<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>iWant Admin Panel</title>
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
                        Customer 
                        <a href="<?= base_url();?>index.php/users/adduser?view=frentUser" style="float: right; margin-right: 10px;"><img src="<?php echo base_url().'assets/images/add.jpg';?>" width="30" height="30" style="cursor:pointer;"></a>
                        <!--<small>advanced tables</small>-->
                    </h1>
                    <!--<ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables</li>
                    </ol>-->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                           
                            
                            <div class="box">
                                <div class="box-header">
                                                                        
                                </div><!-- /.box-header -->
                                
                               
                                <?php if($this->session->flashdata('success')){ ?>
                                <div class="alert alert-success alert-dismissable" style="width:98%;">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alert!</b> <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <?php } ?>
                                     <?php if($this->session->flashdata('delete')){ ?>
                                <div class="alert alert-danger alert-dismissable" style="width:98%;">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alert!</b> <?php echo $this->session->flashdata('delete'); ?>
                                    </div>
                                    <?php } ?>
                                    
                                    <?php if($this->session->flashdata('unsuccess')){ ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alert!</b> <?php echo $this->session->flashdata('unsuccess'); ?>
                                    </div>
                                    <?php } ?>
 
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Join Date</th>
                                                <th>User Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                         <tbody>
									  <?php
                                          $i=0;
                                          if($results){
                                          foreach($results as $result){
                                          $i++; 
                                          ?>                                       
                                        
                                       
                                            <tr>
                                                <td><?php echo $result->username; ?></td>
                                                <td><?php echo $result->email; ?></td>
                                                <td><?php echo date ("j M Y - h:i a",strtotime($result->date_time));?></td>
                                                <td><?php echo $result->userType; ?></td>
                                                <td>
                                                <a title="View" onClick="profile(<?php echo $result->id; ?>)" data-toggle="modal" data-target="#compose-modal"><i class="glyphicon glyphicon-search"></i></a>
                                                <?php if($result->status==1){ ?>
                                                <!--<a  href="#" onclick="active(<?php // echo $result->id; ?>)" title="Publish un-publish" ><i class="glyphicon glyphicon-ok-circle"></i></a>-->
                                                <a  href="<?= base_url();?>index.php/users/active?id=<?php echo $result->id; ?>&view=frentUser" onclick="return confirm('Are you sure you want to Un-publish ?');" title="Un-publish" ><i class="glyphicon glyphicon-ok-circle"></i></a>
                                                <?php }else { ?>
                                                <!--<a href="#" onclick="active(<?php //echo $result->id; ?>)" title="Publish un-publish" ><i class="glyphicon glyphicon-ok-sign"></i></a>-->
                                                <a href="<?= base_url();?>index.php/users/active?id=<?php echo $result->id; ?>&view=frentUser" onclick="return confirm('Are you sure you want to Publish ?');" title="Publish" ><i class="glyphicon glyphicon-ok-sign"></i></a>
                                                <?php } ?>
                                                <a href="<?= base_url();?>index.php/users/editUser?id=<?php echo $result->id; ?>&view=frentUser" onclick="return confirm('Are you sure you want to Update ?');" title="Update" ><i class="glyphicon glyphicon-pencil"></i></a> 
                                                <a  href="<?php echo site_url('users/deleteUser?id='.$result->id);?>" onclick="return confirm('Are you sure you want to Delete ?');" title="Delete"><i class="glyphicon glyphicon-remove-circle"></i></a>
                                               <!-- <i class="glyphicon glyphicon-pencil"></i>
                                               <i class="glyphicon glyphicon-share"></i>-->
                                                </td>
                                            </tr>
                                            
                                        
                                         <?php } }else{?>
                                        <tr style="border:none;">
                                            <td colspan="5"  align="center" style="padding-top:5px;"><span style="color:#666;"><strong>Data Not Found</strong></span></td>
                                            <td  style="padding-top:5px;display:none;"></td>
                                            <td  style="padding-top:5px;display:none;"></td>
                                            <td  style="padding-top:5px;display:none;"></td>
                                            <td  style="padding-top:5px;display:none;"></td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                       <!-- <tfoot>
                                            <tr>
                                                <th>Rendering engine</th>
                                                <th>Browser</th>
                                                <th>Platform(s)</th>
                                                <th>Engine version</th>
                                                <th>CSS grade</th>
                                            </tr>
                                        </tfoot>-->
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
<!--POPUP FORM-->
  <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-envelope-o"></i>User View</h4>
                    </div>
                    
                    
                    <div id="datad">      </div>
                    
                    
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
<!--POPUP FORM-->

        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?= base_url();?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?= base_url();?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url();?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
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

	function profile(id)
	{
	$('#datad').html('<img style="margin-left: 230px;margin-top: 100px;margin-bottom: 110px;" src="<?= base_url();?>assets/images/ajax-loader2.gif"/>');
			$.ajax({
						url: '<?= base_url();?>index.php/users/view?id='+id,
						 type:'POST',
					   //	dataType: 'json',
						  error: function(){
						  $('#datad').html('<p>goodbye world</p>');
						  },
	
						 success: function(results11){
	
						//alert(results);
					   $('#datad').html(results11);
	
						  } // End of success function of ajax form
						  }); // End of ajax call
	
	}
</script>

    </body>
</html>