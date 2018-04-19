
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
                            	<span><?php echo $this->session->flashdata('unsuccess');?></span>
                            	<span><?php echo $this->session->flashdata('logout');?></span>
                            </div>
<?php //print_r($category);?>
                            <form id="login-form" name="contact-form" method="post" action="<?= base_url();?>index.php/post/savePost" enctype="multipart/form-data">
                                
                                <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Title :</label>
                                    <input type="text" name="title" class="form-control" placeholder="Title" required>
                                </div>
                                <div class="form-group" id="child_1">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Category :</label>
                                            <select name="parent_1" id="parent_1" class="form-control" onchange="parentCategory('2',this.value);">
                                              <option value="0">Main Category</option>
                                              <?php foreach($category as $cat) {?>
                                              <option value="<?php echo $cat->id;?>"><?php echo $cat->category;?></option><?php } ?>
                                            </select>
                                             <span class="php-error" id="parent_1_msg" style="color:#f00;"></span>
                                </div>
                               
                                <div class="form-group" id="child_2"></div>
                                <div class="form-group" id="child_3"></div>
                                <div class="form-group" id="child_4"></div>
                                <div class="form-group" id="child_5"></div>
                                
                                <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Post :</label>
                                	<textarea name="post" class="form-control" required ></textarea>
                                </div>
                                
                                <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Image :</label>
                                	<input type="file" name="imgfile" class="form-group" />
                                </div>
                                <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Attachment :</label>
                                	<input type="file" name="docfile" class="form-group" />
                                </div>
                                <div class="form-group">                                  
                                    <input type="hidden" id="category_key" name="category_key" value="parent_1" >   </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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