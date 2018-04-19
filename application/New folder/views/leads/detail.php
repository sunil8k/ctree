<?php $this->load->view("layout/header");?>
<?php $this->load->view("layout/menu");?>
    <section id="about">
        <div class="container">
<?php //print_r($posts);?>
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown"><?php echo $posts[0]->title;?></h2>
                <p class="text-center wow fadeInDown"></p>
            </div>

            <div class="row">
                <!--<div class="col-sm-6 wow fadeInLeft">
                    <h3 class="column-title">Video Intro</h3>
                    <!-- 16:9 aspect ratio -->
                   <!-- <div class="">
                        <img src="<?= base_url();?><?php echo $posts[0]->image;?>" />
                    </div>
                </div>-->

                <div class="col-sm-12 wow fadeInRight">
                    <h3 class="column-title"><?php echo $posts[0]->category;?></h3>
                    <p><?php echo $posts[0]->post;?></p>

                    <div class="row">
                        <div class="col-sm-12">
                                <?php if($posts[0]->image) { ?><img src="<?php echo base_url().$posts[0]->image;?>" class="img-responsive"  /><?php }?>
                            <ul class="nostyle">
                                <?php if($posts[0]->doc) { ?><li><i class="fa fa-check-square"></i> <a href="<?php echo base_url().$posts[0]->doc;?>">Attached</a></li><?php }?>
                            </ul>
                        </div>
                    </div>
					
			<?php	if($this->session->userdata['user_type']=="customer") {	
						if(!$applied) {?>
							<a class="btn btn-primary" href="<?php echo base_url();?>index.php/post/apply/?post_id=<?php echo $posts[0]->id;?>">Apply</a>
						<?php } else { ?>
							<a class="btn btn-primary" href="#">Applied</a>
				<?php	}
                    }
                    else if($this->session->userdata['user_type']=="agency") { ?>
                        <a class="btn btn-primary" href="#">Edit</a>
            <?php	} ?>
				
                </div>
            </div>
        </div>
    </section><!--/#meet-team-->

<?php $this->load->view("layout/footer");?>