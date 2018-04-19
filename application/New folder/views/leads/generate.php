<?php $this->load->view("layout/header");?>
<body id="body_leads" class="at-page site itemid-102 at-quote">
    	<div id="at-page-wrapper">
            <div class="row" id="flex-container">
                <div id="main-left-container" class="col-sm-3 col-lg-3 col-xl-3 col-md-3 left-sidebar mCustomScrollbar">
                    <div class="inner-left-sidebar">
                        <div class="inner-block">
                            <div class="quate-left-header-wrap text-center at-paddingT20 at-paddingB20">
                                <img src="<?= base_url();?>assets/images/white_logo.png" class="img-fluid" alt="Compare Tree" width="250px">
                            </div>
                        </div>
                        <div id="left-sectioninfo">
                        <p></p>
                        </div>
                    	
                    </div>
                </div>
                <div id="main-right-container" class="col-sm-12 col-lg-9 col-xl-9 col-md-9 right-content">
                    <div class="inner-right-content">
                        <div class="inner-block at-paddingB15">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:100%"> 100% Complete </div>
                        </div> 
                        
                        <div id="question-container" class="row">
                        <p>Your Lead Generate Successfully.</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    	</div>
        <?php $this->load->view("layout/footer");?>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" async defer src="<?=base_url()?>assets/js/leadform.js"></script>
    </body>
</html>