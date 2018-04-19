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
        <!-- Theme style -->
        <link href="<?= base_url();?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php $this->load->view("layout/header");?>
          <div class="wrapper row-offcanvas row-offcanvas-left">
        <?php $this->load->view("layout/left_content");?>

        
            

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Permissions
                        <a href="<?= base_url();?>index.php/admin/" style="float: right; margin-right: 10px;">
                        	<i class="btn btn-info btn-sm">Go Back</i>
                         </a>
                        <!--<small>Preview</small>-->
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <?php if($this->session->flashdata('success')){ ?>
                                <div class="alert alert-success alert-dismissable" style="width:98%;">
                                    <i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Alert!</b> <?php echo $this->session->flashdata('success'); ?>
                                </div>
                                <?php } ?>
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Module</th>
                                                <th>Show</th>
                                                <th>Add</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                                <th>All</th>
                                            </tr>
                                        </thead>
                                         <tbody id="tblPerm">
									  <?php
                                          if($results){
											  //print_r($results);
                                          foreach($results as $result){
                                          ?>   
                                            <tr>
                                                <td><?php echo $result->module; ?></td>
                                                <td><a onClick="btnChange('<?php echo $result->id;?>','show_perm','<?php echo $result->show_perm;?>')"><?php echo $result->show_perm?'<i class="glyphicon glyphicon-ok-sign"></i>':'<i class="glyphicon glyphicon-remove-circle"></i>'; ?></a></td>
                                                <td><a onClick="btnChange('<?php echo $result->id;?>','add_perm','<?php echo $result->add_perm;?>')"><?php echo $result->add_perm?'<i class="glyphicon glyphicon-ok-sign"></i>':'<i class="glyphicon glyphicon-remove-circle"></i>'; ?></a></td>
                                                <td><a onClick="btnChange('<?php echo $result->id;?>','edit_perm','<?php echo $result->edit_perm;?>')"><?php echo $result->edit_perm?'<i class="glyphicon glyphicon-ok-sign"></i>':'<i class="glyphicon glyphicon-remove-circle"></i>'; ?></a></td>
                                                <td><a onClick="btnChange('<?php echo $result->id;?>','delete_perm','<?php echo $result->delete_perm;?>')"><?php echo $result->delete_perm?'<i class="glyphicon glyphicon-ok-sign"></i>':'<i class="glyphicon glyphicon-remove-circle"></i>'; ?></a></td>
                                                <td><a onClick="btnChange('<?php echo $result->id;?>','all_perm','<?php echo $result->all_perm;?>')"><?php echo $result->all_perm?'<i class="glyphicon glyphicon-ok-sign"></i>':'<i class="glyphicon glyphicon-remove-circle"></i>'; ?></a></td>
                                            </tr>
                                           
                                        
                                         <?php } }else{?>
                                        <tr style="border:none;">
                                            <td colspan="6"  align="center" style="padding-top:5px;"><span style="color:#666;"><strong>Data Not Found</strong></span></td> 
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
                                </div>                              
                            </div>                         
                        </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url();?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>  
        
        <script type="text/javascript">
			function btnChange(id,col,status){
				$.ajax({
					url: "http://<?php echo $_SERVER['HTTP_HOST'];?><?php echo base_url();?>index.php/permission/editPermission?id="+id+"&col="+col+"&status="+status+"&admin_id=<?php echo $_REQUEST['id'];?>",
						success: function(result){
						$("#tblPerm").html(result);
					}
				});
			}
		</script>      
    </body>
</html>
