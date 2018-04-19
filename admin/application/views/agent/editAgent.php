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
                       Add Agent
                        <a href="<?= base_url();?>index.php/agent/index" style="float: right; margin-right: 10px;">
                        	<i class="btn btn-info btn-sm">Go Back</i>
                         </a>
                    </h1>
                    <!--<ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">General Elements</li>
                    </ol>-->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                       
                            <!-- general form elements -->
                            <div class="box box-primary">
                               <!-- <div class="box-header">
                                    <h3 class="box-title">Quick Example</h3>
                                </div>-->
                                
                                 <?php if($this->session->flashdata('success')){ ?>
                                <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alert!</b> <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <?php } ?>
                                
                                <?php
								echo form_open_multipart('agent/updateAgent', array('name' => 'create','onSubmit'=>'return validation();')); 
								?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label><em class="star_red">*</em> First Name :</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" require="require" value="<?php echo $result->first_name;?>">
                                           <?php echo form_error('first_name', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                           <span class="php-error" id="first_name_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label><em class="star_red">*</em> Last Name :</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name"  value="<?php echo $result->last_name;?>">
                                            <?php echo form_error('last_name', '<span class="php-error" style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="last_name_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label><em class="star_red">*</em> User Name :</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="User Name" onKeyUp="checkUsername(this.value)"  value="<?php echo $result->username;?>" >
                                            <?php echo form_error('username', '<span class="php-error" style="color:#f00;">', '</span>'); ?>
                                            <span class="" id="username_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label><em class="star_red">*</em> Email :</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail" onKeyUp="checkEmail(this.value)"  value="<?php echo $result->email;?>">
                                            <?php echo form_error('email', '<span class="php-error" style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="email_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label><em class="star_red">*</em> Gender :</label>
                                            <div class="form-group">
                                            <label>Male
                                                <input type="radio" name="gender" class="flat-red" value="<?php echo $result->gender;?>"  <?php echo (trim($result->gender)=='male')?('checked="checked"'):('');?>/>
                                            </label>
                                            <label>Female
                                                <input type="radio" name="gender" class="flat-red"  value="<?php echo $result->gender;?>"  <?php echo (trim($result->gender)=='female')?('checked="checked"'):('');?> />
                                            </label>
                                           	</div>
                                        </div>
                                        <div class="form-group">
                                            <label><em class="star_red">*</em> Profile Image :</label>
                                            <input type="file" class="form-control" id="image" name="image" placeholder="Profile Image">
                                            <?php echo form_error('image', '<span class="php-error" style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="image_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label><em class="star_red">*</em> Country :</label>
                                            <select name="country" id="country" class="form-control" onChange="fillState(this.value,'0');" require="require">
                                                <option value="">Select Country</option>
                                                <?php foreach($countrys as $country) {?>
                                                <option value="<?php echo $country->id;?>" <?php echo (trim($result->country_id)==$country->id)?('selected="selected"'):('');?>><?php echo $country->country;?></option>
                                                <?php }?>
                                            </select>
                                             <?php echo form_error('country', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                             <span class="php-error" id="country_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group" id="memberLevel" style="">
                                        	<label><em class="star_red"></em>State :</label>
                                            <select name="state" id="state" class="form-control" >
                                            	<option value="">Select State</option>
                                            </select>
                                             <?php echo form_error('state', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                             <span class="php-error" id="state_msg" style="color:#f00;"></span>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label><em class="star_red">*</em> City :</label>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $result->city;?>" onKeyUp="continent1('agent','getCity',this.id,'city',this.value,'country')">
                                             <?php echo form_error('city', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                             <span class="php-error" id="city_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label><em class="star_red">*</em> Address :</label>
                                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $result->address;?>" placeholder="Address">
                                            <?php echo form_error('address', '<span class="php-error" style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="address_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label><em class="star_red">*</em> Mobile No :</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $result->mobile;?>" placeholder="Mobile No.">
                                            <?php echo form_error('mobile', '<span class="php-error">', '</span>'); ?>
                                            <span class="php-error" id="mobile_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label><em class="star_red">*</em> Zipcode :</label>
                                            <input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo $result->zipcode;?>" placeholder="Zipcode">
                                            <?php echo form_error('zipcode', '<span class="php-error">', '</span>'); ?>
                                            <span class="php-error" id="zipcode_msg" style="color:#f00;"></span>
                                        </div>
                                        
                                       <input type="hidden" name="id" value="<?php echo $result->id; ?>" >
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
        <!-- AdminLTE for demo purposes --><!--
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>  -->      
    </body>
</html>
        
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<!--AUTO COMPLETE FUNCTIONALITY START HERE--> 
<script src="http://localhost/compareTree/assets/js/auto/autocomplete-0.3.0.js" type="text/javascript"  ></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
<style>
	ui-autocomplete-input {
	z-index:30001 !important; 
	}
</style>
<script type="text/javascript">
	/*AJAX AUTOCOMPLETE VALUE SET HERE START*/
	function continent1(contr,func,id,key,val,county_id) {
		var sUrl = 'http://localhost/compareTree/admin/index.php/'+contr+'/'+func+'?'+key+'='+val+'&country_id='+($('#'+county_id).val());
		var dd = '#'+id;
		$.ajax({
			url: sUrl,
			type:'POST',		
			//	dataType: 'json',
			error: function(){
				//$('#datad').html('<p>goodbye world</p>');
			},		
			success: function(data){
				if(data=="error") {
					//alert('error');
				} 
				else {
					$(dd).autocomplete({
					  source: JSON.parse(data)
					});
				}
			} // End of success function of ajax form
		});
	}
</script>
    <!--AUTO COMPLETE FUNCTIONALITY END HERE--> 
<script type="text/javascript">
	var flag1=0;
	var flag2=0;
	function fillState(country_id,selected=null) {
		var urls = "<?php echo base_url();?>index.php/agent/state?country_id="+country_id+"&selected="+selected;
		if(Number(country_id) !=0) {
			//alert(urls);
			$.ajax({
				url: urls,
				type:'POST',
				//	dataType: 'json',
				error: function(){
					$('#datad').html('<p>goodbye world</p>');
				},
				success: function(results){
					$('#state').html(results );		
				} // End of success function of ajax form
			}); // End of ajax call
		}
	}
	function checkEmail(str){
		var email = $('#email').val();
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(email ==""){
			$('#email_msg').html('');	
		}
		else if(reg.test(email)== false){
			
						$('#email_msg').css('color','#F00');
			$('#email_msg').html('<div class="error-inner">Invalid e-mail address</div>');
		}	
		else{
			var urls = "<?= base_url();?>index.php/agent/checkEmail?email="+email;
			$.ajax({
				url: urls,
				type:'POST',
				//	dataType: 'json',
				error: function(){
					$('#email_msg').html('<p>Error Found</p>');
				},
				success: function(res){
					if(Number(res)) {
						$('#email_msg').css('color','#rgb(27, 171, 85)');	
						$('#email_msg').html('Availble');
						flag1 = 0;
					}
					else {
						$('#email_msg').css('color','#F00');
						$('#email_msg').html('Not Availble');
						flag1 = 1;
					}
				} // End of success function of ajax form
			}); // End of ajax call
		}
	}
	function checkUsername(str){
		var username = $('#username').val();	
		if(username) {
			var urls = "<?= base_url();?>index.php/agent/checkUsername?username="+username;
			$.ajax({
				url: urls,
				type:'POST',
				//	dataType: 'json',
				error: function(){
					$('#username_msg').html('<p>Error Found</p>');
				},
				success: function(res){
					if(Number(res)) {
						$('#username_msg').css('color','#rgb(27, 171, 85)');	
						$('#username_msg').html('Availble');
						flag2 = 0;
					}
					else {
						$('#username_msg').css('color','#F00');
						$('#username_msg').html('Not Availble');
						flag2 = 1;
					}
				} // End of success function of ajax form
			}); // End of ajax call
		}
	}
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
		var username = $('#username').val();	
	    if(username == ''){
			$('#username_msg').html('<div class="error-left"></div><div class="error-inner">This field is required.</div>');	
			flag=1;
		}	
	    else if(flag2){
			$('#username_msg').html('<div class="error-left"></div><div class="error-inner">Not Available.</div>');	
			flag=1;
		}
		else {
			$('#username_msg').html('');
		}
		
	    if($('#first_name').val()==""){
			$('#first_name_msg').html('<div class="error-left"></div><div class="error-inner">This field is required .</div>');	
			flag=1;
		}
		else if(!isletter($('#first_name').val())){
			$('#first_name_msg').html('<div class="error-left"></div><div class="error-inner">Invalid Name.</div>');	
			flag=1;
		}
		else{
			$('#first_name_msg').html('');
		}
		
		if($('#last_name').val()==""){
			$('#last_name_msg').html('<div class="error-left"></div><div class="error-inner">This field is required .</div>');	
			flag=1;
		}
		else if(!isletter($('#last_name').val())){
			$('#last_name_msg').html('<div class="error-left"></div><div class="error-inner">Invalid Name.</div>');	
			flag=1;
		}
		else{
			$('#last_name_msg').html('');
		}
		
		var email = $('#email').val();
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	    if(email ==""){
			$('#email_msg').html('<div class="error-left"></div><div class="error-inner">This field is required .</div>');	
			flag=1;
		}
		else if(reg.test(email)== false){
			$('#email_msg').html('<div class="error-left"></div><div class="error-inner">Invalid e-mail address.</div>');	
			flag=1;
        }
		else if(flag1){
			$('#email_msg').html('<div class="error-left"></div><div class="error-inner">Not Available</div>');	
			flag=1;
        }
		else {
			$('#email_msg').html('');
		}
		
		if($('#address').val()==""){
			$('#address_msg').html('<div class="error-left"></div><div class="error-inner">This field is required.</div>');	
			flag=1;
		}
		else{
			$('#address_msg').html('');
		}
		
		if($('#country').val()==""){
			$('#country_msg').html('<div class="error-left"></div><div class="error-inner">This field is required.</div>');	
			flag=1;
		}
		else{
			$('#country_msg').html('');
		}
		
		if($('#state').val()==""){
			$('#state_msg').html('<div class="error-left"></div><div class="error-inner">This field is required.</div>');	
			flag=1;
		}
		else{
			$('#state_msg').html('');
		}
		
		if($('#city').val()==""){
			$('#city_msg').html('<div class="error-left"></div><div class="error-inner">This field is required.</div>');	
			flag=1;
		}
		else{
			$('#city_msg').html('');
		}
		
		if($('#mobile').val()==""){
			$('#mobile_msg').html('<div class="error-left"></div><div class="error-inner">This field is required.</div>');	
			flag=1;
		}
		else if(isNaN($('#mobile').val())){
			$('#mobile_msg').html('<div class="error-left"></div><div class="error-inner">Invalid Mobile No.</div>');	
			flag=1;
		}
		else{
			$('#mobile_msg').html('');
		}
		
		if($('#zipcode').val() ==""){
			$('#zipcode_msg').html('<div class="error-left"></div><div class="error-inner">This field is required.</div>');	
			flag=1;
		}
		else if(isNaN($('#zipcode').val())){
			$('#zipcode_msg').html('<div class="error-left"></div><div class="error-inner">Invalid Postalcode.</div>');	
			flag=1;
		}
		else{
			$('#zipcode_msg').html('');
		}	
		if(flag==0) {
			return true;
		}
		else{
			return false;
		}
    }
	fillState('<?php echo $result->country_id;?>','<?php echo $result->state_id;?>');
</script>