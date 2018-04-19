<header id="main-header-wrap">
    <section id="top-bar">
        <div class="container">
            <div class="inner-block at-paddingT15 at-paddingB15">
                <div class="row">
                    <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                        <div class="at-top-call-wrap">
                            <span class="txt1">Talking to an Agent :</span><span class="txt2"> 855.214.2291</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                    
                        <div style="float:right;">
                            <ul style="margin-left:20px; list-style:none;">
                            <?php if(!($this->session->userdata('id'))) { ?>
                                <li><a href="<?= base_url();?>index.php/users/signup">Register</a> | <a href="<?= base_url();?>index.php/customer/login">Login</a></li><?php } else { ?>
                                <li><a href="<?= base_url();?>index.php/<?php echo ($this->session->userdata('type')=='seeker')?('customer'):('agent');?>/index"><?php echo $this->session->userdata('name');?></a> | <a href="<?= base_url();?>index.php/customer/logout">Logout</a></li><?php }?>
                            </ul>
                        </div>
                        <div class="at-top-social-wrap">
                            <ul>
                                <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="second-top-bar">
        <div class="container">
            <div class="inner-block at-paddingT15 at-paddingB15">
                <div class="row">
                    <div class="col-sm-12 col-lg-4 col-xl-4 col-md-4">
                        <div class="brand-logo-wrap">
                            <a class="navbar-brand" href="<?= base_url();?>index.php"><img src="<?= base_url();?>assets/images/logo.png" class="img-fluid" alt="Compare Tree"></a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-8 col-xl-8 col-md-8">
                        <nav class="navbar navbar-expand pull-right">				    					
                             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                             <span class="navbar-toggler-icon"></span>
                             </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul id="menu-primary_navigation" class=" menu menu-horizontal nav navbar-nav">
                                    <li class="menu-item"><a class="menu-link" href="index.html">Home</a></li>
                                    <li class="menu-item"><a class="menu-link" href="<?= base_url();?>index.php/aboutus">About us</a></li>
                                    <li class="menu-item"><a class="menu-link" href="<?= base_url();?>index.php/contactus">Contact us</a></li>
                                    <li class="menu-item"><a class="menu-link" href="javascript:void(0)">Find an Agent</a></li>
                                    <li class="menu-item nav-item dropdown"><a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-labelledby="navbarDropdown">Insurance</a>
                                        <div class="child-menu level1 dropdown-menu">
                                            <ul class="sub-menu">
                                                <li class="menu-item"><a class="menu-link" href="javascript:void(0)">Auto Insurance</a></li>
                                                <li class="menu-item"><a class="menu-link" href="javascript:void(0)">Home Insurance</a></li>
                                                <li class="menu-item"><a class="menu-link" href="javascript:void(0)">Renters Insurance</a></li>
                                                <li class="menu-item"><a class="menu-link" href="javascript:void(0)">Health Insurance</a></li>
                                                <li class="menu-item"><a class="menu-link" href="javascript:void(0)">Life Insurance</a></li>
                                                <li class="menu-item"><a class="menu-link" href="javascript:void(0)">Commercial Insurance</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="menu-item"><a class="menu-link" href="javascript:void(0)">Insurance by State</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>