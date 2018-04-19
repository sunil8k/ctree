<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crosswords Admin Panel</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?= base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?= base_url();?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?= base_url();?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php $this->load->view("layout/header");?>
          <div class="wrapper row-offcanvas row-offcanvas-left">
        <?php $this->load->view("layout/left_content");?>

        
            

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Game
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                       
                            <!-- general form elements -->
                                 <?php if($this->session->flashdata('success')){ ?>
                                <div class="alert alert-success alert-dismissable" style="width:98%;">
                                    <i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Alert!</b> <?php echo $this->session->flashdata('success'); ?>
                                </div>
                                <?php } ?>
                            <div class="col-xs-8">                                    
                                    <div class="box  box-primary">
                                       
                                        <div class="form-group">
                                        	<div class="celContainer">
                                        	<?php
											for($i=0; $i<=12; $i++) {
												echo "<div id='cell".$i."' >";
												for($j=0; $j<=12; $j++) {
													echo "<div id='cell".$i."_".$j."' class='cellRow' onClick='cell(".$i.",".$j.")'></div>";
												}
												echo "</div>";
											}
											?>
                                            </div>
                                        </div>
                                        
                                        
                                    </div><!-- /.box-body -->
									<div id="loader"></div>
                            </div>
                            <div class="col-xs-3">
                                 <?php
									echo form_open_multipart('game/add', array('name' => 'change','onsubmit'=>'return validation();')); 
									?>
                                    
                                    <div class="box  box-primary">
                                    	<div class="form-group">
                                            <button type="button" class="btn btn-primary" onClick="setBlock('add')">Add Block</button>
                                            <button type="button" class="btn btn-primary" onClick="setBlock('select')">Edit Block</button>
                                        </div> 
                                        <div class="form-group"><!--
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Category :</label>-->
                                            <select name="category" id="categoryId" class="form-control" style="display:none;" >
                                            <option value="0">Category</option>
                                            <?php foreach($results['cat'] as $result) {
											?>                                            
                                            <option value="<?php echo $result['id'];?>" <?php echo ($result['id']==$results['category'][0]['id'])?("selected='selected'"):('');?>  ><?php echo $result['category']?></option>
                                            <?php
											}
											?>
                                            </select>
                                            <?php echo form_error('title', '<span class="php-error" style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="title_msg" style="color:#f00;"></span>
                                        </div>
                                       
                                        	
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Category : <?php echo $results['category'][0]['category']; ?></label>
                                        </div>
                                        	
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Question Serial Name :</label>
                                            <input type="text" id="serial" name="serial"  class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Puzzle : <?php echo $results['game'][0]['game']; ?></label>
                                            <input type="text" name="game" class="form-control" style="display:none;" value="<?php echo $results['game'][0]['game']; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Question :</label>
                                            <input type="text" id="questionId" name="question" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Answer :</label>
                                            <input type="text" id="answerId" name="answer" onKeyUp="textwrite()" maxlength="4"  class="form-control">
                                        </div>
                                        <div class="box-footer"><!--
                                            <button type="button" class="btn btn-primary" onClick="rClass()">De Select</button>-->
                                            <button type="button" class="btn btn-primary" onClick="removeBlock()">Delete Block</button>
                                            <button type="button" class="btn btn-primary" onClick="resetPuzzle()">Reset</button>
                                            <button type="button" id="target" class="btn btn-primary">Save</button> 
                                        </div>   
                                        <input type="hidden" id="view" name="view" value="<?php echo $this->input->get_post('view'); ?>">
                                        <input type="hidden"  id="gameId" name="game_id" value="<?php echo $results['game'][0]['id']; ?>">
                                        <input type="hidden" id="view" name="view" value="<?php echo $this->input->get_post('view'); ?>">
                                    </div><!-- /.box-body -->
                                    <?php
									echo form_close();
									?>
                                <!--</form>-->
                                <div id="datad"></div>
                            </div>
                         
                        </div>
                       
                    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url();?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script> 
        <!-- GAME JS AND CSS INTEGRATED -->   
        <script src="<?= base_url();?>assets/js/game.js" type="text/javascript"></script>
        <link href="<?= base_url();?>assets/css/game.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript">
			getGameData();
			
		</script>
    </body>
</html>
