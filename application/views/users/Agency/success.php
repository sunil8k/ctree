<?php $this->load->view("layout/header");?>
<?php $this->load->view("layout/menu");?>
<section id="meet-team">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Successfully signup</h2>
                <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-12">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                        <div class="team-img">
                            <img class="img-responsive" src="images/team/04.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <h3><?php echo $this->session->userdata('success');?></h3>
                            <span></span>
                        </div>
                        <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
                       
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php $this->load->view("layout/footer");?>