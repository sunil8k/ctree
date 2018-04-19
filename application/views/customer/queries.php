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
									<h4>My Queries</h4>
                                    
                                    <div class="form-group">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo $this->session->flashdata('unsuccess'); ?>
                                    </div>
                                    <div class="row">
                                    	<div class="col-sm-3 col-lg-3 col-xl-3 col-md-3"><strong>SKU</strong></div>
                                        <div class="col-sm-3 col-lg-3 col-xl-3 col-md-3"><strong>View</strong></div>
                                    	<div class="col-sm-3 col-lg-3 col-xl-3 col-md-3"><strong>Staus</strong></div>
                                    </div>
                                    <?php
									foreach($queries as $query) {?>
                                    <div class="row">
                                    <?php	
										$dt = (mktime(date('H'),date('i'),date('s'),date('m'),date('d')-1,date('Y')));
										$dtt = $query->create_date;
									?>
                                    	<div class="col-sm-3 col-lg-3 col-xl-3 col-md-3"><label style="width:200px; text-align:left;"><a href="<?=base_url()?>index.php/customer/myLead?lead_id=<?php echo $query->id;?>"><span><?php echo $query->sku;?></span></a></label></div>
                                    	<div class="col-sm-3 col-lg-3 col-xl-3 col-md-3"><a href="<?=base_url()?>index.php/customer/deal?lead_id=<?php echo $query->id;?>">View Deals</a></div>
                                        <div class="col-sm-3 col-lg-3 col-xl-3 col-md-3"><strong><?php echo ((strtotime($dtt)) > (trim($dt)))?(($query->status)?('Running'):('Close')):("<span style='color:#F00;'>Exp</span>");?> </strong></div>
                                    </div>
                                   <?php }?>
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