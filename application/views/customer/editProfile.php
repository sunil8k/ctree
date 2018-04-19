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
                                <div class="insurance-content-wrap">
                                    <h3>My Account</h3>
                                    <ul style="list-style:none;">
                                    	<li><a href="<?= base_url();?>index.php/customer/index?id=<?php echo $profiles->id;?>" >My Profile</a></li>
                                    	<li><a href="<?= base_url();?>index.php/customer/queries?id=<?php echo $profiles->id;?>" >My Queries</a></li>
                                    	<li><a href="<?= base_url();?>index.php/customer/myContact">My Contacts</a></li>
                                    	<li><a href="<?= base_url();?>index.php/customer/getNotifications">Notifications</a></li>
                                    	<li><a href="<?= base_url();?>index.php/customer/changePassword">Change Password</a></li>
                                    	<li><a href="<?= base_url();?>index.php/customer/logout">Logout</a></li>
                                    </ul>                                   
                                </div>
                            
                            </div>
  							<div class="col-sm-9 col-lg-9 col-xl-9 col-md-9">  								
  								<div class="insurance-content-wrap">
									<h3>My Profile</h3>
                                    <form action="<?= base_url();?>index.php/customer/update" name="edit" method="post" >
                                    <div class="row">
                                    	<label style="width:200px;"><strong>First Name:</strong> </label><input type="text" class="form-control" name="first_name" value="<?php echo $profiles->first_name;?>" ><span></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Last Name:</strong> </label><input type="text" class="form-control" name="last_name" value="<?php echo $profiles->last_name;?>" ><span></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Username:</strong> </label><input type="text" readonly class="form-control" name="username" value="<?php echo $profiles->username;?>" ><span></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Email:</strong> </label><input type="text" class="form-control" readonly name="email" value="<?php echo $profiles->email;?>" ><span></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Mobile:</strong> </label><input type="text" class="form-control" name="mobile" value="<?php echo $profiles->mobile;?>" ><span></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Country:</strong> </label>
                                        <select name="country" id="country"  class="form-control" onChange="fillState(this.value)">
                                                                    <option value="0">Choose Country</option>
                                                                   <?php
																   foreach($countrys as $country) {
																	   ?>
                                                                    <option value="<?php echo $country->id;?>" <?php echo (($country->id)==($profiles->country_id))?('selected'):('');?>><?php echo $country->country;?></option>
                                                                    <?php } ?>
                                                                    </select>
                                        <!--<input type="text" class="form-control" name="country" value="<?php echo $profiles->country;?>" >--><span></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>City:</strong> </label><input type="text" class="form-control" name="city" value="<?php echo $profiles->city;?>" ><span></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Zip:</strong> </label><input type="text" class="form-control" name="zipcode" value="<?php echo $profiles->zipcode;?>" ><span></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Address:</strong> </label><input type="text" class="form-control" name="address" value="<?php echo $profiles->address;?>" ><span></span>
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
	<script src="<?= base_url();?>assets/js/jquery.lettering.js"></script>
    <script type="application/javascript">
	//alert('<?php echo base_url();?>');
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