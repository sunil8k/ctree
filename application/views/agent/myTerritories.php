<?php $this->load->view("layout/header");
//echo $this->session->userdata('email');
//echo $this->session->flashdata('success');
$login = $this->session->userdata('id');
?>
    <body class="at-page site itemid-101 at-home">
    	<style type="text/css">
			a.red {
				color:#F00;
			}
			a.green {
				color:#093;
			}
		</style>
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
									<h3>My Territories</h3>
                                    
                                    <div class="form-group">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo $this->session->flashdata('unsuccess'); ?>
                                    </div>
                                    <form action="<?= base_url();?>index.php/agent/updateTerritories" method="post" name="update" >
									<div class="row">
									<?php $permission = ($this->session->userdata('permission'));//print_r( $permission);?>
                                    <?php
									if(count($territories)) {
										foreach($territories as $territory) {?>
										<div class="col-sm-3 col-lg-3 col-xl-3 col-md-3" style="border:1px solid #CCC;">
                                        	<label style="width:88%; text-align:left;"><span><?php echo $territory->territory;?></span></label>
                                        	<input type="checkbox" id="<?php echo $territory->id;?>" name="territory[]" value="<?php echo $territory->id;?>" <?php echo (in_array($territory->id,$myTerritories['territories']))?('checked=checked'):('');?> onChange="chk('<?php echo $territory->id;?>')" >
                                        	<label style="width:88%; text-align:left;"><span>Default territory</span></label>
                                        	<input type="radio" name="default_territory" value="<?php echo $territory->id;?>" <?php echo ($myTerritories['default_territory'][$territory->id])?('checked=checked'):('');?> ><?php echo $territory->default_territory;?>
                                        </div>
								   <?php }
									}?>	
									</div>
                                    <div class="row">
                                        <div class="form-group">
                                            <input type="hidden" name="plan_id" value="<?php echo $plan->id;?>" >
                                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
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
	function chk(id) {
		var perm1 = "<?php echo $permission->no_of_territory;?>";
		if(($('input:checkbox:checked').length)>Number(perm1)) {
			$('#'+id).attr('checked', false);
			alert('You can not add more than '+perm1+' territories');	
		}
	}
	</script>
    </body>
</html>