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
        <!-- Theme style -->
        <link href="<?= base_url();?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script src="<?= base_url();?>assets/jauery/jquery-1.10.2.js" type="text/javascript"></script>
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
                    	Add Category
                        <a href="<?= base_url();?>index.php/category/" style="float: right; margin-right: 10px;">
                        	<i class="btn btn-info btn-sm">Go Back</i>
                         </a>
                    </h1>                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                       
                            <!-- general form elements -->
                            <div class="box box-primary">                                
                                 <?php if($this->session->flashdata('success')){ ?>
                                <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alert!</b> <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <?php } ?>
                                
                                <?php
								echo form_open_multipart('category/save', array('name' => 'create','onsubmit'=>'return validation();')); 
								?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><em class="star_red">*</em> Category :</label>
                                            <input type="text" class="form-control" id="category" name="category" placeholder="Category" require="require">
                                            <?php echo form_error('category', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="category_msg" style="color:#f00;"></span>
                                        </div>
                                        
                                    </div><!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <?php
									echo form_close();
									?>
                            </div>
                        </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
         <script src="<?= base_url();?>assets/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url();?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>        
    </body>
</html>
<script type="text/javascript">	
function isletter(txt) {
	 var iChars = "!@#$^&*()+=-[]\\\';,./{}|\":<>?0123456789";
	 var chk =1;
	 for (var i = 0; i < txt.length; i++) {
		if (iChars.indexOf(txt.charAt(i)) != -1) {
		 chk=0;
			}
		}
	 if(chk){
	 return true;
	 }else{
	 return false;
	 }
}  
function validation() {
	var flag=0;
	var category = document.getElementById("category").value;	
	
	if(category ==""){
		document.getElementById("category_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';	
		flag=1;
	}else {
		document.getElementById("category_msg").innerHTML="";
	}
		
	if(flag==0) {
		return true;
	}
	else{			
		return false;
	}
}

</script>