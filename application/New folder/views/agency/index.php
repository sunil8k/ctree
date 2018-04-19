<?php $this->load->view("layout/header");?>
<?php $this->load->view("layout/menu");?>
    <section id="services" >
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Our Agencys</h2>
                <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>

            <div class="row">
                <div class="features">
                <?php foreach($agencys as $agency) {?>
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <i class="fa fa-line-chart"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $agency->agency;?></h4>
                                <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
				<?php } ?>
                   
                </div>
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#meet-team-->

<?php $this->load->view("layout/footer");?>