<?php $this->load->view("layout/header");
//echo $this->session->userdata('email');
//echo $this->session->flashdata('success');
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
  								<div class="form-box" id="login-box">
         
           <?php
				echo form_open('agent/updatePassword', array('name' => 'login','id' => 'changePasswordForm',"onSubmit"=>"return checkPassword();"));    
			?>
                <div class="body bg-gray col-sm-6 col-lg-6 col-xl-6 col-md-6">
            <h3>Change Password</h3>
                    <div class="form-group">
                    	<?php echo $this->session->flashdata('success'); ?>
                    	<?php echo $this->session->flashdata('unsuccess'); ?>
                    </div>
                    <div class="form-group">
                    <label>Old Password</label>
                        <input type="password" name="password_old" id="password_old" class="form-control" placeholder="Password Old"/>
                    </div>
                    <div class="form-group">
                    <label>New Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                    <label>Re-Type Password</label>
                        <input type="password" name="password_new" id="password_new" class="form-control" placeholder="Password New"/>
                    </div>
                    <div>
                    <button type="submit" class="btn bg-olive btn-block">Update</button> 
                    </div>
                </div>
                <div class="footer">                                                            
                    
                    
                    <!--<a href="register.html" class="text-center">Register a new membership</a>-->
                </div>
            <?php
				echo form_close();
			?>
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
		function checkPassword() {
			if($('#password_old').val() == '') {
				alert('Old password can not be NULL');
				return false;				
			}
			else if($('#password').val() == '' ||  $('#password_new').val() =='') {
				alert('Password and Re-Type password can not be NULL.');
				return false;								
			}
			else if(($('#password').val() != $('#password_new').val()) || $('#password').val() == '' ) {
				alert('Re-Type password not matched.');
				return false;
			}
			else {
				return true;	
			}
		}
	</script>
<!-- 	<script type="text/javascript">
		window.players = function($elem) {
    var top = parseInt($elem.css("top"));
    var temp = -1 * $('.phone-quotes > li').height();
    if(top < temp) {
        top = $('.phone-quotes').height()
        $elem.css("top", top);
    }
    $elem.animate({ top: (parseInt(top)-70) }, 600, function () {
      window.players($(this))
    });
}
$(document).ready(function() {
    var i = 0;
    $(".phone-quotes > li").each(function () {
          $(this).css("top", i);
          i += 70;
          window.players($(this));
    });
});
	</script> -->
	<script type="text/javascript">
		$(document).ready(function(){
		    $("#testimonial-slider").owlCarousel({
		        items:1,
		        itemsDesktop:[1000,1],
		        itemsDesktopSmall:[980,1],
		        itemsTablet:[768,1],
		        itemsMobile:[650,1],
		        pagination:true,
		        navigation:false,
		        slideSpeed:1000,
		        autoPlay:true
		    });
		});
	</script>
    </body>
</html>