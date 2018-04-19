<?php $this->load->view("layout/header");
$login = $this->session->userdata('id');
?>
    <body class="at-page site itemid-101 at-home">
    	<div id="at-page-wrapper">
    		<?php $this->load->view("layout/header_menu");?>
  			<section id="banner-wrap">
  				<div class="container">
  					<div class="inner-block at-paddingT15 at-paddingB15 at-paddingT50 at-paddingB100">
  						<div class="row">							
  							<div class="col-sm-3 col-lg-3 col-xl-3 col-md-3">
    							<?php $this->load->view("layout/left_content_agent");?>
                            </div>
  							<div class="col-sm-9 col-lg-9 col-xl-9 col-md-9">  								
  								<div class="insurance-content-wrap">
									<h3>Add New User</h3>
                                    <form action="<?= base_url();?>index.php/agent/saveUser" name="edit" method="post" onSubmit="return validation();" >
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Username:</strong> </label><input type="text" class="form-control" name="username" id="username" value="<?php echo $profiles->username;?>" onChange="checkUsername(this.value)" ><span id="username_txt"></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Password:</strong> </label><input type="password" class="form-control" name="password" id="password" min="3" maxlength="30" value="<?php echo $profiles->password;?>" onChange="checkPassword()" ><span id="password_txt"></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Re-Type Password:</strong> </label><input type="password" class="form-control" name="repassword" id="repassword" min="3" maxlength="30" value="<?php echo $profiles->password;?>" onChange="checkPassword()" ><span id="repassword_txt"></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Email:</strong> </label><input type="text" class="form-control" name="email" id="email" value="<?php echo $profiles->email;?>" onChange="checkEmail(this.value)" ><span id="email_txt"></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>First Name:</strong> </label><input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $profiles->first_name;?>" ><span id="first_name_txt"></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Last Name:</strong> </label><input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $profiles->last_name;?>" ><span id="last_name_txt"></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Mobile:</strong> </label><input type="text" class="form-control" name="mobile" id="mobile" maxlength="12" value="+1<?php echo $profiles->mobile;?>" ><span id="mobile_txt"></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Gender:</strong> </label>
                                        <select name="gender" class="form-control">
                                        	<option value="male">Male</option>
                                        	<option value="female">female</option>
                                        </select>
                                        <span></span>
                                    </div>
                                    <div class="row">
                                    	<div class="action-buttons at-marginT20">
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $profiles->id;?>" >
                                            <button type="submit" class="btn btn-primary" name="submit">Save &amp; Continue</button>
                                        </div>
                                    </div>
                                    </form>
								</div>
  							</div>
  						</div>
  					</div>
  				</div>
  			</section>
  			<section id="top-below-wrap">
                <footer id="footer" class="BlackColor1 whiteColor">	    	
                    <section class="copyright">
                        <div class="container">
                            <div class="inner-block border-bottom">
                                <div class="row">
                                    <div class="grey-spacer1-10"></div>
                                    <div class="col-sm-12 col-lg-12 col-xl-12 col-md-12 at-paddingT20 at-paddingB20 text-center">
                                        
                                        <p class="grayColor"><small>&copy; 2017 Smartfinancial.com Ins LLC DBA SmartFinancial Insurance. All rights reserved.</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </footer>
        
	<?php $this->load->view("layout/header");?>
    <script type="application/javascript">
	var url = ('<?php echo base_url();?>');
	var uName = 0;
	var uEmail = 0;
	function checkUsername(val) {
		$('#username_txt').html('<img style="margin-left: 230px;margin-top: 100px;margin-bottom: 110px;" src="<?= base_url();?>assets/images/ajax-loader2.gif"/>');
		$.ajax({
			url: '<?= base_url();?>index.php/agent/checkUser?username='+val,
			type:'POST',
			//	dataType: 'json',
			error: function(){
				$('#username_txt').html('<p>goodbye world</p>');
			},
			success: function(result){
				if(result=='Available.') {
					uName = 1;
				}
				else {
					uName = 0;
				}
				$('#username_txt').html(result);
			} // End of success function of ajax form
		}); // End of ajax call
	}
	function checkEmail(email) {
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
			$('#email_txt').html('<img style="margin-left: 230px;margin-top: 100px;margin-bottom: 110px;" src="<?= base_url();?>assets/images/ajax-loader2.gif"/>');
			$.ajax({
				url: '<?= base_url();?>index.php/agent/checkUserEmail?email='+email,
				type:'POST',
				//	dataType: 'json',
				error: function(){
					$('#email_txt').html('<p>goodbye world</p>');
				},
				success: function(result){
					if(result=='Available.') {
						uEmail = 1;
					}
					else {
						uEmail = 0;
					}
					$('#email_txt').html(result);
				} // End of success function of ajax form
			}); // End of ajax call
		}
		else {
			alert('frt');
			$('#email_txt').html('Invalid formate');
		}
	}
	function validation() {
		var status = 1;
		if($('#username').val()) {
			$('#username_txt').html('');
		}
		else {
			$('#username_txt').html('required field.');
			status = 0;
		}
		if($('#password').val()) {
			$('#password_txt').html('');
		}
		else {
			$('#password_txt').html('required field.');
			status = 0;
		}
		if($('#repassword').val() && ($('#repassword').val()==$('#password').val()) ) {
			$('#repassword_txt').html('');
		}
		else {
			$('#repassword_txt').html('Password not matched');
			status = 0;
		}
		
		if($('#first_name').val()) {
			$('#first_name_txt').html('');
		}
		else {
			$('#first_name_txt').html('required field.');
			status = 0;
		}
		
		if($('#last_name').val()) {
			$('#last_name_txt').html('');
		}
		else {
			$('#last_name_txt').html('required field.');
			status = 0;
		}
		
		if($('#email').val()) {
			$('#email_txt').html('');
		}
		else {
			$('#email_txt').html('required field.');
			status = 0;
		}
		
		if($('#mobile').val().length>=12) {
			$('#mobile_txt').html('');
		}
		else {
			$('#mobile_txt').html('required field.');
			status = 0;
		}
		if(status && uEmail && uName) {
			return true;
		}
		else {
			return false;
		}
	}
	</script>
    </body>
</html>