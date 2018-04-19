
<?php $this->load->view("layout/header");?>
<?php $this->load->view("layout/menu");?>
<section id="contact1">
        <div class="container-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-2" style="min-height:450px;">
                        <div class="contact-form">
                            <h3>New Post</h3>
							<div class="form-group">
                            	<span><?php echo $this->session->flashdata('success');?></span>
                            	<span><?php echo $this->session->flashdata('unsuccess');?></span>
                            	<span><?php echo $this->session->flashdata('logout');?></span>
                            </div>
<?php //print_r($category);?>
                            <form id="apply-form" name="apply-form" method="post" action="<?= base_url();?>index.php/post/applied" enctype="multipart/form-data">
                                
                                <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Title :</label>
                                    <input type="text" name="title" class="form-control" placeholder="Title" required>
                                </div>
                                <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Detail :</label>
                                    <textarea name="detail" class="form-control" ></textarea>
                                </div>
                                <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Upload (CV) :</label>
                                    <input type="file" name="cv" required>
                                </div>
                               
                                <div class="form-group">                                  
                                    <input type="hidden" id="post_id" name="post_id" value="<?php echo $post_id;?>" >   </div>
                                    <button type="submit" class="btn btn-primary">Apply</button>
                                <div class="form-group"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<script src="<?= base_url();?>assets/js/jquery.min.js"></script>
         
<script>
function parentCategory(level,val) {
	if(val !=0) {
		//alert(level);
			deleteSelect(Number(level));
		$.post( "http://localhost/iwant/post/ajax/?level="+level+"&category_id="+val, function( data ) {
			$( "#child_"+level ).html( data );
			//if(data)
			$( "#category_key" ).val( "parent_"+Number(level-1) );
			//$( "#parent_"+Number(level-1)+"_msg" ).empty();
		});
	}
	else {
		deleteSelect(level);
			$( "#category_key" ).val( "parent_"+Number(level-1) );
	}
}
function deleteSelect(level) {
	if(level) {
			var j = Number(level);
			for(var i = j; i<=6; i++) {
				$( "#child_"+i ).empty();
			}
		}
}
</script>
<?php $this->load->view("layout/footer");?>