<?php
foreach($results as $result){
                                          ?>   
                                            <tr>
                                                <td><?php echo $result->module; ?></td>
                                                <td><a onClick="btnChange('<?php echo $result->id;?>','show_perm','<?php echo $result->show_perm;?>')"><?php echo $result->show_perm?'<i class="glyphicon glyphicon-ok-sign"></i>':'<i class="glyphicon glyphicon-remove-circle"></i>'; ?></a></td>
                                                <td><a onClick="btnChange('<?php echo $result->id;?>','add_perm','<?php echo $result->add_perm;?>')"><?php echo $result->add_perm?'<i class="glyphicon glyphicon-ok-sign"></i>':'<i class="glyphicon glyphicon-remove-circle"></i>'; ?></a></td>
                                                <td><a onClick="btnChange('<?php echo $result->id;?>','edit_perm','<?php echo $result->edit_perm;?>')"><?php echo $result->edit_perm?'<i class="glyphicon glyphicon-ok-sign"></i>':'<i class="glyphicon glyphicon-remove-circle"></i>'; ?></a></td>
                                                <td><a onClick="btnChange('<?php echo $result->id;?>','delete_perm','<?php echo $result->delete_perm;?>')"><?php echo $result->delete_perm?'<i class="glyphicon glyphicon-ok-sign"></i>':'<i class="glyphicon glyphicon-remove-circle"></i>'; ?></a></td>
                                                <td><a onClick="btnChange('<?php echo $result->id;?>','all_perm','<?php echo $result->all_perm;?>')"><?php echo $result->all_perm?'<i class="glyphicon glyphicon-ok-sign"></i>':'<i class="glyphicon glyphicon-remove-circle"></i>'; ?></a></td>
                                            </tr>
                                           
                                        
                                         <?php }
										 ?>