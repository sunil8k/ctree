<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title?$title:'CompareTree Admin Panel';?></title>
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
                        Section
                        <a href="<?= base_url();?>index.php/section/addSection" style="float: right; margin-right: 10px;">
                        	<img src="<?php echo base_url().'assets/images/add.jpg';?>" width="30" height="30" style="cursor:pointer;">
                         </a>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                           
                            
                            <div class="box">
                                <?php if($this->session->flashdata('success')){ ?>
                                <div class="alert alert-success alert-dismissable" style="width:98%;">
                                    <i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Success!</b> <?php echo $this->session->flashdata('success'); ?>
                                </div>
								<?php }
                                if($this->session->flashdata('unsuccess')){ ?>
                                <div class="alert alert-danger alert-dismissable" style="width:98%;">
                                    <i class="fa fa-ban"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Warning!</b> <?php echo $this->session->flashdata('unsuccess'); ?>
                                </div>
                                <?php } ?>
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>image</th>
                                                <th>url</th>
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
                                                <td><?php echo $i; ?></td>
                                                <td><img src="http://localhost/compareTree/admin/<?php echo $result ?>" width="100"></td>
                                                <td><?php echo "http://localhost/compareTree/admin/".$result ?></td>
                                                <td>
                                			    
                                              
                                                </td>
                                            </tr>
                                           
                                        
                                         <?php } }else{?>
                                        <tr style="border:none;">
                                            <td colspan="7"  align="center" style="padding-top:5px;"><span style="color:#666;"><strong>Data Not Found</strong></span></td>
                                            
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
                $("#example1").dataTable({
					"iDisplayLength": 50,
					"aLengthMenu": [[2, 5, 10, 20, 50, 100, -1], [2, 5, 10, 20, 50, 100, "All"]]
				});
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