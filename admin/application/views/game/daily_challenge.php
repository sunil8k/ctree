<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crosswords Admin Panel</title>
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
                        Daily Challenge Puzzle
                        <a href="<?= base_url()?>index.php/game/add/?daily=1" style="float: right; margin-right: 10px;">
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
                                            <td style="display:none;" ></td>
                                            	<th>ID</th>
                                                <th>Puzzle</th>
                                                <th>Category</th>
                                                <th>Cost</th>
                                                <th>Last Updated</th>
                                                <th>Change Order</th>
                                                <th>Daily Chalenge</th>
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
                                            <td style="display:none;" ><?php echo $result->orderby; ?></td>
                                            <td ><?php echo $result->id; ?></td>
                                                <td><?php echo $result->game; ?></td>
                                                <td><?php echo $result->category; ?></td>
                                                <td><?php echo $result->cost; ?></td>
                                                <td><?php echo $result->last_updated; ?></td>
                                                <td><a href="<?= base_url();?>index.php/game/changeOrder?id=<?php echo $result->id; ?>&flow=up&daily=1"><img style="width:30px;" src="<?= base_url();?>assets/img/up.png" ></a><a href="<?= base_url();?>index.php/game/changeOrder?id=<?php echo $result->id; ?>&flow=down&daily=1"><img style="width:30px;" src="<?= base_url();?>assets/img/down.png" ></a></td>
                                                <td>
                                                <?php if($result->daily_status) {?>
                                                <a href="#"  title="Already fix Daily Status" ><img src="<?= base_url();?>assets/img/check.png" width="14" ></a> 
                                                <?php } else {?>
                                                <a href="<?= base_url();?>index.php/game/dailyStatus?id=<?php echo $result->id; ?>&view=index&daily=1" onclick="return confirm('Are you sure you want to fix it as Today Puzzle');"  title="Click to fix Daily Status" ><img src="<?= base_url();?>assets/img/uncheck.png" width="14" ></a>
                                                <?php }?>
                                                </td>
                                                <td>
                                			    <a style="cursor:pointer;" title="View" onClick="game(<?php echo $result->id; ?>,'<?php echo $result->game; ?>')" data-toggle="modal" data-target="#compose-modal"><i class="glyphicon glyphicon-search"></i></a>
                                               <?php if($this->session->userdata('type') =='admin'){ ?>
                                                <?php if($result->status){ ?>
                                                <a  href="<?= base_url();?>index.php/game/active?id=<?php echo $result->id; ?>&view=index&daily=1" onclick="return confirm('Are you sure you want to deactivate ?');" title="active" ><i class="glyphicon glyphicon-ok-circle"></i></a>
                                                <?php }else { ?>
                                                <a href="<?= base_url();?>index.php/game/active?id=<?php echo $result->id; ?>&view=index&daily=1" onclick="return confirm('Are you sure you want to activate ?');" title="deactive" ><i class="glyphicon glyphicon-ok-sign"></i></a>
                                                <?php } ?>
                                               <?php } ?>
                                                <a  href="<?= base_url();?>index.php/game/delete?del=<?php echo $result->id; ?>&view=index&daily=1" onclick="return confirm('Are you sure you want to Delete ?');" title="Delete"><i class="glyphicon glyphicon-remove-circle"></i></a>
                                                <a href="<?= base_url();?>index.php/game/edit?id=<?php echo $result->id; ?>&view=index&daily=1" onclick="return confirm('Are you sure you want to Edit ?');" title="Update" ><i class="glyphicon glyphicon-pencil"></i></a>
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
                        <h4 class="modal-title">Puzzle</h4>
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
function game(id,puzzle) {
	$('#datad').html('<img style="margin-left: 230px;margin-top: 100px;margin-bottom: 110px;" src="<?= base_url();?>assets/images/ajax-loader2.gif"/>');
		    $.ajax({
                        url: '<?= base_url();?>index.php/game/view?game_id='+id+'&puzzle='+puzzle,
                         type:'POST',
                       //	dataType: 'json',
                          error: function(){
                          $('#datad').html('<p>goodbye world</p>');
                          },

                         success: function(result){

                       $('#datad').html(result);

                          } // End of success function of ajax form
                          }); // End of ajax call

}
function dailyStatus(val) {
	alert(val);
}
</script>

    </body>
</html>