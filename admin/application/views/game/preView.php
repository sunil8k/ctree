<?php
//print_r($results);
?>
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
                            <div class="col-xs-12">                                    
                                    <div class="box  box-primary">
                                       
                                        <div class="form-group">
                                        	<div class="celContainer">
                                        	<?php
											for($i=0; $i<=12; $i++) {
												echo "<div id='cell".$i."' >";
												for($j=0; $j<=12; $j++) {
													echo "<div id='cell".$i."_".$j."' class='cellRow' style='color:#000;' onClick='cell(".$i.",".$j.")'>".$results[$i][$j]."</div>";
												}
												echo "</div>";
											}
											?>
                                            </div>
                                        </div>
                                    </div><!-- /.box-body -->
                            </div>
                        </div>
                </section>
                
        <link href="<?= base_url();?>assets/css/game.css" rel="stylesheet" type="text/css" />