<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crosswords</title>
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
                    	Add Puzzle
                        <a href="<?= base_url();?>index.php/game" style="float: right; margin-right: 10px;">
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
								echo form_open_multipart('game/saveGame', array('name' => 'create','onsubmit'=>'return validation();')); 
								?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Game</label>
                                            <input type="text" class="form-control" id="game" name="game" placeholder="Game" require="require" value="<?php echo $results[0]['game'];?>">
                                           <?php echo form_error('games', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                           <span class="php-error" id="games_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Category</label>
                                            <select name="category" id="category" require="require" class="form-control">
                                            	<option value="0" >Category</option>
                                          <?php
												foreach($categorys as $result) {?>
													<option value="<?php echo $result->id;?>" <?php echo (($result->id)==($results[0]['category_id']))?("selected"):("");?> ><?php echo $result->category;?></option>		
										  <?php }
										  ?>
                                            </select>
                                             <span class="php-error" id="category_msg" style="color:#f00;"></span>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Cost</label>
                                            <input type="text" class="form-control" id="cost" name="cost" placeholder="Cost" require="require" value="<?php echo $results[0]['cost'];?>">
                                           <?php echo form_error('costs', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                           <span class="php-error" id="costs_msg" style="color:#f00;"></span>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                    <input type="hidden" name="id" value="<?php echo $results[0]['id'];?>" >
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <?php
									echo form_close();
									?>
                                <!--</form>-->
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
<script>
function parentCategory(level,val) {
	if(val !=0) {
		//alert(level);
			deleteSelect(Number(level));
		$.post( "http://localhost/iwant/admin/category/ajax/?level="+level+"&category_id="+val, function( data ) {
			$( "#child_"+level ).html( data );
			//if(data)
			$( "#category_key" ).val( "parent_"+Number(level-1) );
			//$( "#parent_"+Number(level-1)+"_msg" ).empty();
		});
	}
	else {
		deleteSelect(level);
			$( "#category_key" ).val( "parent_"+Number(level-1) );
	}
}
function deleteSelect(level) {
	if(level) {
			var j = Number(level);
			for(var i = j; i<=6; i++) {
				$( "#child_"+i ).empty();
			}
		}
}
</script>
<script>
	
	function isletter(txt)
		{
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
	if(category==0){
		document.getElementById("category_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';	
		flag=1;
	}
	else {
		document.getElementById("category_msg").innerHTML="";
	}
	if(document.getElementById("game").value == ''){
		document.getElementById("games_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';		
		flag=1;
	}
	else {
		document.getElementById("games_msg").innerHTML="";
	}
	if(document.getElementById("cost").value == ''){
		document.getElementById("costs_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';		
		flag=1;
	}
	else {
		document.getElementById("costs_msg").innerHTML="";
	}		
	if(flag==0) {
		return true;
	}
	else{			
		return false;
	}
}

</script>