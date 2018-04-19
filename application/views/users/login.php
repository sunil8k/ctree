
<?php $this->load->view("layout/header");?>
<?php $this->load->view("layout/menu");?>
<section id="contact1">
        <div class="container-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-2" style="height:450px;">
                        <div class="contact-form">
                            <h3>login</h3>
							<div class="form-group">
                            	<span><?php echo $this->session->flashdata('unsuccess');?></span>
                            	<span><?php echo $this->session->flashdata('logout');?></span>
                            </div>

                            <form id="login-form" name="contact-form" method="post" action="<?= base_url();?>index.php/users/loginCheck">
                                <div class="form-group">
                                   <span>Customer</span> <input type="radio" name="user_type" class="form-control1" value="customer" checked="checked">
                                   <span>Agency</span> <input type="radio" name="user_type" class="form-control1" value="agency">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                
                                <button type="submit" class="btn btn-primary1">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<?php $this->load->view("layout/footer");?>