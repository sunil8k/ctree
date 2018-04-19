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
                        Mail Outbox
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
                                <!--<div class="box-header">
                                    <a href="<?= base_url();?>index.php/coupon/addCoupon"><h3 class="box-title">ADD NEW PRODUCT</h3></a>                                    
                                </div>--><!-- /.box-header -->
                                
                               
                                <?php if($this->session->flashdata('success')){ ?>
                                <div class="alert alert-success alert-dismissable" style="width:98%;">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alert!</b> <?php echo $this->session->flashdata('success'); ?>
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
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>On Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                         
									  <?php
                                          $i=0;
										  //$results = $this->product_model->show();
                                            if($results){
											  foreach($results as $result){
											  $i++; 
                                          
										 
										  ?>                                       
                                        
                                       
                                            <tr>
                                                <td><?php echo $result->from; ?></td>
                                                <td><?php echo substr($result->to ,0, 30); ?></td>
                                                <td><?php echo $result->subject; ?></td>
                                                <td><?php echo substr(strip_tags($result->message),0,30); ?></td>
                                                <td><?php echo date ("j M Y",strtotime($result->date_time));?></td>
                                                <td>
                                               <a onclick="profile(<?php echo $result->id; ?>)" class="button" title="View"  data-toggle="modal" data-target="#compose-modal"><i class="glyphicon glyphicon-search"></i></a>
                                                <?php if($result->status==1){ ?>
                                                <a  href="<?= base_url();?>index.php/users/activeMail?id=<?php echo $result->id; ?>&view=outBoxMail" onclick="return confirm('Are you sure you want to Un-publish ?');" title="Un-publish" ><i class="glyphicon glyphicon-ok-circle"></i></a>
                                                <?php }else { ?>
                                                <a href="<?= base_url();?>index.php/users/activeMail?id=<?php echo $result->id; ?>&view=outBoxMail" onclick="return confirm('Are you sure you want to Publish ?');" title="Publish" ><i class="glyphicon glyphicon-ok-sign"></i></a>
                                                <?php } ?>
                                                
                                                <a  href="<?= base_url();?>index.php/users/deletemail?del=<?php echo $result->id; ?>&view=outBoxMail" onclick="return confirm('Are you sure you want to Delete ?');" title="Delete"><i class="glyphicon glyphicon-remove-circle"></i></a>
                                               
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
                        <h4 class="modal-title"> Mail View</h4>
                    </div>
                    
                    
                    <div id="datad">      </div>
                    
                    
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
<!--POPUP FORM-->









        <!-- jQuery 2.0.2 -->
        <script src="<?= base_url();?>assets/js/jquery.min.js"></script>
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
function profile(id)
{
	$('#datad').html('<img src="<?= base_url();?>assets/images/ajax-loader2.gif"/>');

		    $.ajax({
                        url: '<?= base_url();?>index.php/users/viewMail?id='+id,
                         type:'POST',
                   
                          error: function(){
                          $('#datad').html('<p>goodbye world</p>');
                          },

                         success: function(results11){

                       
                       $('#datad').html(results11);

                          } 
                          }); 

}
</script> 
<script type='text/javascript' language='javascript'>
function record(str)
{
	alert(str);
   var value =	document.getElementById("dropdown").value;
	/*try {
		document.getElementById("noPage").value = str;
	}
	catch(e) {
		
	}*/
	document.searchForm.submit();
		 alert(value);  
}
</script> 
<script type='text/javascript' language='javascript'>
    function sendCoupon(couponId)
{
	//alert(couponId);
	document.getElementById("couponId").value = Number(couponId);
	document.getElementById("pageNo").value = Number(document.getElementById("page").value)*Number(document.getElementById("dropdown").value);
	if(confirm('Are you sure you want to Send Coupon ?')) {
		document.searchForm.submit(); 
	}else{
		
	}
	 
}    
</script> 
    </body>
</html>