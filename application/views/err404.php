<?php $this->load->view("layout/header");
$login = $this->session->userdata('id');
?>
<body class="at-page site itemid-101 at-home">
    	<div id="at-page-wrapper">
    		<?php $this->load->view("layout/header_menu");?>
            <?php //print_r($this->session->userdata('permission'));?>
  			
  			<section id="banner-wrap">
  				<div class="container">
  					<div class="inner-block at-paddingT15 at-paddingB15 at-paddingT50 at-paddingB100">
  						<div class="row"> 
<h1>Page Not Find.</h1>
</div>
</div>
</div>
</section>
</div>
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