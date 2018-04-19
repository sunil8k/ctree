    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="<?= base_url();?>assets/images/logo.png" alt="logo"></a>
                </div>
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="<?= base_url();?>index.php">Home</a></li>
                        <li class="scroll"><a href="<?= base_url();?>index.php/post">Jobs</a></li>
                        <li class="scroll"><a href="<?= base_url();?>index.php/agency">Agencys</a></li>
                        <li class="scroll"><a href="#about">About</a></li>
                        <li class="scroll"><a href="#get-in-touch">Contact</a></li>
                        <?php if($this->session->userdata('username')) {?>
                        <li class="scroll1"><a href="<?= base_url();?>index.php/users/myAccount">WelCome &nbsp;<?php echo $this->session->userdata('username');?></a></li>
                        <li class="scroll1"><a href="<?= base_url();?>index.php/users/logout">logout</a></li>
                        <?php }
						else {?>
                        <li class="scroll"><a href="<?= base_url();?>index.php/users/login">Login</a></li>     
                        <li class="scroll"><a href="<?= base_url();?>index.php/users/signup">SignUp</a></li> 
							
						<?php }?>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
