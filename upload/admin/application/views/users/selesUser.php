<?php ini_set('error_reporting', 0);?>
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
                        Sales User 
                        <a href="<?= base_url();?>index.php/users/adduser?view=salesUser" style="float: right; margin-right: 10px;"><img src="<?php echo base_url().'assets/images/add.jpg';?>" width="30" height="30" style="cursor:pointer;"></a> 
                       <!-- <small>advanced tables</small>-->
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
                                <div class="box-header" >
                                                                       
                                </div><!-- /.box-header -->
                                
                               
                                <?php if($this->session->flashdata('success')){ ?>
                                <div class="alert alert-success alert-dismissable" style="width:98%;">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alert!</b> <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <?php } ?>
                                    
                                     <?php if($this->session->flashdata('successful')){ ?>
                                <div class="alert alert-danger alert-dismissable" style="width:98%;">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alert!</b> <?php echo $this->session->flashdata('successful'); ?>
                                    </div>
                                    <?php } ?>
                                    
                                    
                                    <?php if($this->session->flashdata('unsuccess')){ ?>
                                    <div class="alert alert-danger alert-dismissable" style="width:98%;">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alert!</b> <?php echo $this->session->flashdata('unsuccess'); ?>
                                    </div>
                                    <?php } ?>
 
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Sales User</th>
                                                <th>Email</th>
                                                <th>Promo Code</th>
                                                <th>Kick-back</th>
                                                <th>Kick-back Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                         <tbody>
									  <?php
                                          $i=0;
										  
                                          if($results){
											  
	                                        foreach($results as $result){
												$a=0;
												$kick_back = '';
												$order_id= '';
												//echo $result->promo_code;
												$results11 = $this->users_model->kick_back($result->promo_code) ;
												
												if($results11){
													foreach($results11 as $resu){
														$a +=  $resu->kick_back;
														if($resu->kick_back_status > 0)
															$order_id[] = $resu->id;
														if($resu->kick_back_status == '1')
															$kick_back = '1';
														/*if($resu->kick_back_status == '2')
															$kick_back = '2';	*/	
													}
												}else{
												$a=0;  
											}
											$ids = implode(',',$order_id);
                                          $i++; 
                                          ?>                                       
                                        <?php
										/* $data = $this->users_model->kickBackAmount($result->id);
										 //echo "<pre>";
										 echo $data[0]['kick_back'];*/
										 ?>
                                         

                                            <tr>
                                                <td><?php echo $result->id; ?></td>
                                                <td><?php echo $result->username; ?></td>
                                                <td><?php echo $result->email; ?></td>
                                                <td><?php echo $result->promo_code;?></td>
                                                <td><?php echo $a ?></td>
                                               <td>
                                                <?php if($kick_back==1){ ?>
                                               <strong>Pending -></strong><a href="kickBackCompliteStatus?id=<?php echo $result->id; ?>">Send</a>
                                               <?php }else{ ?>
                                               <strong>Complete</strong>
                                               <?php } ?>
                                                </td>
                                                
                                                <td>
                                                
                                                 <a href="#" onclick="profile(<?php echo $result->id; ?>)" data-toggle="modal" data-target="#compose-modal1" class="button" title="View"><i class="glyphicon glyphicon-search"></i></a>
                                                <?php if($result->status==1){ ?>
                                                <!--<a  href="#" onclick="active(<?php // echo $result->id; ?>)" title="Publish un-publish" ><i class="glyphicon glyphicon-ok-circle"></i></a>-->
                                                <a  href="<?= base_url();?>index.php/users/active?id=<?php echo $result->id; ?>&view=salesUser" onclick="return confirm('Are you sure you want to Un-publish ?');" title="Un-publish" ><i class="glyphicon glyphicon-ok-circle"></i></a>
                                                <?php }else { ?>
                                                <!--<a href="#" onclick="active(<?php //echo $result->id; ?>)" title="Publish un-publish" ><i class="glyphicon glyphicon-ok-sign"></i></a>-->
                                                <a href="<?= base_url();?>index.php/users/active?id=<?php echo $result->id; ?>&view=salesUser" onclick="return confirm('Are you sure you want to Publish ?');" title="Publish" ><i class="glyphicon glyphicon-ok-sign"></i></a>
                                                <?php } ?>
                                                <a href="<?= base_url();?>index.php/users/editUser?id=<?php echo $result->id; ?>&view=salesUser" onclick="return confirm('Are you sure you want to Update ?');" title="Update" ><i class="glyphicon glyphicon-pencil"></i></a> 
                                                <a  href="<?= base_url();?>index.php/users/delete?del=<?php echo $result->id; ?>&view=salesUser" onclick="return confirm('Are you sure you want to Delete ?');" title="Delete"><i class="glyphicon glyphicon-remove-circle"></i></a>
                                                <a title="Kick-back Status" onClick="kick_back(<?php echo '\''.$ids.'\''; ?>)" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-fw fa-mail-reply"></i></a>
                                               <!-- <i class="glyphicon glyphicon-pencil"></i>
                                               <i class="glyphicon glyphicon-share"></i>-->
                                               
                                                </td>
                                            </tr>
                                            
                                        
                                         <?php } }else{?>
                                        <tr style="border:none;">
                                            <td colspan="7"  align="center" style="padding-top:5px;"><span style="color:#666;"><strong>Data Not Found</strong></span></td>
                                            <td  style="padding-top:5px;display:none;"></td>
                                            <td  style="padding-top:5px;display:none;"></td>
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
                        <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Kick-back Status</h4>
                    </div>
                    
                    
                    <div id="datad">      </div>
                    
                    
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
<!--POPUP FORM-->
<!--POPUP FORM-->
  <div class="modal fade" id="compose-modal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"> Sales User View</h4>
                    </div>
                    
                    
                    <div id="datag">      </div>
                    
                    
                    
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
        </script>
        
<script type='text/javascript' language='javascript'>
function kick_back(ids)
{
	//alert(ids);
	$('#datad').html('<img style="margin-left: 230px;margin-top: 100px;margin-bottom: 110px;" src="<?= base_url();?>assets/images/ajax-loader2.gif"/>');
		    $.ajax({
                        url: '<?= base_url();?>index.php/users/salesView?ids='+ids,
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
<script type='text/javascript' language='javascript'>
function profile(id)
{
	$('#datag').html('<img style="margin-left: 230px;margin-top: 100px;margin-bottom: 110px;" src="<?= base_url();?>assets/images/ajax-loader2.gif"/>');
		    $.ajax({
                        url: '<?= base_url();?>index.php/users/view?id='+id,
                         type:'POST',
                       //	dataType: 'json',
                          error: function(){
                          $('#datag').html('<p>goodbye world</p>');
                          },

                         success: function(results11){

                        //alert(results);
                       $('#datag').html(results11);

                          } // End of success function of ajax form
                          }); // End of ajax call

}
</script>

    </body>
</html>