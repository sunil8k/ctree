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
           <!-- daterange picker -->
        <link href="<?= base_url();?>assets/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- daterange picker -->
        <link href="<?= base_url();?>assets/css/datepicker/datepicker.css" rel="stylesheet" type="text/css" />

      
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
                        My Kick-back
                        
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
                                    <?php if($results){ ?>
                                    <div class="form-group" style="position:absolute; margin-left:20%; margin-top:10px; z-index: 1000;">
                                   <!--<div class="form-group">-->
                                   <?php echo form_open_multipart('users/myKickBack', array('name' => 'create','onsubmit'=>'return validation();')); ?>
                                        <!-- <label for="exampleInputEmail1"> Start Date </label>-->
                                        <input type="text" name="StartDate" id="StartDate" placeholder="Start Date" style="padding-left:5px; margin-right:100px; width:210px;" value="<?php echo $_REQUEST['StartDate']; ?>">
                     					<!-- <span class="fa fa-calendar"></span>-->
                                         <!--<label for="exampleInputEmail1"> End Date </label>-->
                                        <input type="text" name="EndDate" id="EndDate" placeholder="End Date" style="padding-left:5px; width:210px;" value="<?php echo $_REQUEST['EndDate']; ?>">
                                        <button type="submit" style="margin-left:50px;">Submit</button>
                                  <?php echo form_close();?>
									
									
                                    </div>
                                     <?php }?>
 
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kick-back</th>
                                                <th>Order ID</th>
                                                <th>User ID</th>
                                                <th>Email</th>
                                                <!--<th>Product</th>
                                                <th>Category</th>-->
                                                <th>Order-Value</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                         <tbody>
									  <?php
                                         
										  
                                          if($results){
	                                        foreach($results as $result){?> 
												                                      
                                        <?php
										 $proName = $this->users_model->productName($result->product_id);
										 //print_r($proName);die;
										 ?>
                                         

                                            <tr>
                                                <td><?php echo $result->kick_back; ?></td>
                                                <td><?php echo $result->id; ?></td>
                                            	<td><?php echo $result->username; ?></td>
                                                <td><?php echo $result->email; ?></td>
                                                <!--<td><?php //echo $proName[0]['name']; ?></td>
                                                <td><?php //echo $proName[0]['title']; ?></td>-->
                                                <td><?php echo $result->grande_amount;?></td>
                                                <td><?php
												
												 if($result->kick_back_status==0){
													 echo "Not Paid";
												 }else if($result->kick_back_status==1){
													  echo "Pending";
												 }else{
													  echo "Complete";
												 }
												 
												 ?>
                                                
                                                </td>
                                               
                                            </tr>
                                            
                                        
                                         <?php } }else{?>
                                        <tr style="border:none;">
                                            <td colspan="6"  align="center" style="padding-top:5px;"><span style="color:#666;"><strong>Data Not Found</strong></span></td>
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
        <script src="<?= base_url();?>assets/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
         <script src="<?= base_url();?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?= base_url();?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!--<script src="<?= base_url();?>assets/js/AdminLTE/app.js" type="text/javascript"></script> -->      
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
        
        <script src="<?= base_url();?>assets/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="<?= base_url();?>assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="<?= base_url();?>assets/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!-- date-range-picker -->
        <script src="<?= base_url();?>assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <script src="<?= base_url();?>assets/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- bootstrap color picker -->
        <script src="<?= base_url();?>assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        <!-- bootstrap time picker -->
        <script src="<?= base_url();?>assets/js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        
        <!-- AdminLTE App -->
        <script src="<?= base_url();?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>      
        
         <script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "yyyy/mm/dd"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "yyyy/mm/dd"});
                //Money Euro
                $("[data-mask]").inputmask();
				 $('#StartDate').datepicker({
                    format: "yyyy/mm/dd"
                });  
				 $('#EndDate').datepicker({
                    format: "yyyy/mm/dd"
                }); 
                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                'Last 7 Days': [moment().subtract('days', 6), moment()],
                                'Last 30 Days': [moment().subtract('days', 29), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                            },
                            startDate: moment().subtract('days', 29),
                            endDate: moment()
                        },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                );

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
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