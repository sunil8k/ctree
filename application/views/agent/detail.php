<?php $this->load->view("layout/header");
//echo $this->session->userdata('email');
//echo $this->session->flashdata('success');
$login = $this->session->userdata('id');
$permission = $this->session->userdata('permission');
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
									<h3>Query Details</h3>
                                    
                                    <div class="form-group">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo $this->session->flashdata('unsuccess'); ?>
                                    </div>
                                    <div class="row">
                                    	<div class="col-sm-3 col-lg-3 col-xl-3 col-md-3"><span>SKU</span></label></div>
                                        <div class="col-sm-6 col-lg-6 col-xl-6 col-md-6"><?php echo $agentLeads['leads']->sku;?></div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-sm-3 col-lg-3 col-xl-3 col-md-3"><span>Section</span></label></div>
                                        <div class="col-sm-6 col-lg-6 col-xl-6 col-md-6"><?php echo $agentLeads['leads']->section;?></div>
                                    </div>
                                    <?php
									foreach($agentLeads['details'] as $detail) {?>
                                    <div class="row">
                                        <div class="col-sm-3 col-lg-3 col-xl-3 col-md-3"><?php echo $detail->lead_key;?></div>
                                    	<div class="col-sm-6 col-lg-6 col-xl-6 col-md-6"><label style="width:200px; text-align:left;"><span><?php echo $detail->lead_value;?></span></label></div>
                                    </div>
                                   <?php }?>
								</div> 
                                <div> 
                                    <hr> 
                                <?php
								
									if((($leadInfo->bid_status == 'open') or ($permission->plan != 'Bronze')) && ($agentLeads['leads']->status)) { ?>
                                    <form action="<?= base_url();?>index.php/agent/bid" name="edit" method="post" >
                                    	<div class="form-group">
											<label style="width:200px; text-align:left;"><span>Your Bid Amount:</span></label>
                                            <input type="text" name="amount" id="amount" value="0" Number >
                                            <select name="company_id" >
                                            <?php foreach($companies as $company) {?>
                                            	<option value="<?php echo $company->id;?>"><?php echo $company->company;?></option>
                                                <?php }?>
                                            </select>
                                            <input type="hidden" name="agent_id" id="agent_id" value="<?php echo $this->session->userdata('id');?>" Number >
                                            <input type="hidden" name="lead_id" id="lead_id" value="<?php echo $agentLeads['leads']->id;?>" Number >
                                         </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="submit">Save Bid</button>
                                        </div>
                                    </form> 
									<?php } 
									else if(((!$agentLeads['bidCount']) and ($permission->plan == 'Bronze')) && ($agentLeads['leads']->status)) {?>
										<form action="<?= base_url();?>index.php/agent/bid" name="edit" method="post" >
                                    	<div class="form-group">
											<label style="width:200px; text-align:left;"><span>Your Bid Amount:</span></label>
                                            <input type="text" name="amount" id="amount" value="0" Number >
                                            
                                            <input type="hidden" name="agent_id" id="agent_id" value="<?php echo $this->session->userdata('id');?>" Number >
                                            <input type="hidden" name="lead_id" id="lead_id" value="<?php echo $agentLeads['leads']->id;?>" Number >
                                         </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="submit">Save Bid</button>
                                        </div>
                                    </form> 
									<?php }
									
									if(count($agentLeads)) {
									foreach($agentLeads['leadInfo'] as $leadInfo ) {	
										?>
                                    <hr>
                                    <div class="form-group">
                                        <label style="width:200px; text-align:left;"><span>Your Bid Amount:</span></label>
                                        <?php echo $leadInfo->amount;?>
                                    </div>
                                    <?php if($leadInfo->company) {?>
                                    <div class="form-group">
                                        <label style="width:200px; text-align:left;"><span>Company:</span></label>
                                        <?php echo $leadInfo->company;?>
                                    </div>
                                    <?php }?>
                                    <div class="form-group">
                                        <label style="width:200px; text-align:left;"><span>Bid Status:</span></label>
                                        <?php echo $leadInfo->bid_status;?>
                                    </div>
									<?php } }?>
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