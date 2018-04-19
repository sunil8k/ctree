<?php $this->load->view("layout/header");
//echo $this->session->userdata('email');
//echo $this->session->flashdata('success');
$login = $this->session->userdata('id');
//echo $this->session->userdata('type');
?>
    <body class="at-page site itemid-101 at-home">
    	<div id="at-page-wrapper">
    		<?php $this->load->view("layout/header_menu");?>
            <?php //print_r($this->session->userdata('permission'));?>
  			<section id="banner-wrap">
  				<div class="container">
  					<div class="inner-block at-paddingT15 at-paddingB15 at-paddingT50 at-paddingB100">
  						<div class="row">  							
  							<div class="col-sm-3 col-lg-3 col-xl-3 col-md-3">
    							<?php $this->load->view("layout/left_content_agent");?>
                            </div>
  							<div class="col-sm-9 col-lg-9 col-xl-9 col-md-9">  								
  								<div class="insurance-content-wrap">
									<h3>My Account</h3>
                                    
                                    <div class="form-group">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo $this->session->flashdata('unsuccess'); ?>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>First Name:</strong> </label><span><?php echo $profiles->first_name;?></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Last Name:</strong> </label><span><?php echo $profiles->last_name;?></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Username:</strong> </label><span><?php echo $profiles->username;?></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Email:</strong> </label><span><?php echo $profiles->email;?></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Mobile:</strong> </label><span><?php echo $profiles->mobile;?></span>
                                    </div>
                                    <?php if($this->session->userdata('type') == 'provider') { ?>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Country:</strong> </label><span><?php echo $profiles->country;?></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>City:</strong> </label><span><?php echo $profiles->city;?></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Zip:</strong> </label><span><?php echo $profiles->zipcode;?></span>
                                    </div>
                                    <div class="row">
                                    	<label style="width:200px;"><strong>Address:</strong> </label><span><?php echo $profiles->address;?></span>
                                    </div>
                                    <?php } ?>
                                    <div class="row">
                                    	<div class="action-buttons at-marginT20">
                                            <a href="<?=base_url()?>index.php/agent/editProfile?id=<?php echo $profiles->id;?>" class="btn btn-primary">Edit &amp; Continue</a>
                                        </div>
                                    </div>
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