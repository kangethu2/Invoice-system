<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <h4 class="modal-title" id="myModalLabel"></h4>
                                        </div>
                                        <div class="modal-body">
                            <form  method="post" enctype="multipart/form-data">
                                <div class="alert alert-info"><strong><center>Add Member </center></strong></div>
                                <hr>
                
                <div class="control-group">
                                    <label class="control-label">Names:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"name="fn" id="inputEmail" placeholder="Name's">
                                    </div>
                                </div>
                              
                                <div class="control-group">
                                    <label class="control-label" >Username:</label>
                                    <div class="controls">
                                        <input type="text" name="un"  class = "form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password:</label>
                                    <div class="controls">
                                        <input type="text" name="p" class = "form-control"  placeholder="Password">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label" >Branch:</label>
                                    <div class="controls">
                                        <input type="text"  name="br" class = "form-control" placeholder="Branch">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label" >Phone:</label>
                                    <div class="controls">
                                        <input type="text"  name="phone" class = "form-control" placeholder="Phone">
                                    </div>
                                </div>

                <div class = "modal-footer">
                       <button name = "go" class="btn btn-primary">Save</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

                </div>
              
                     </div>
                                     
                                          
                                      
                                    </div>
                  
                    </form>  

                            <?php
                            if (isset($_POST['go'])) {

                                $fn = $_POST['fn'];
                                $br = $_POST['br'];
                                $un = $_POST['un'];
                                $p = $_POST['p'];
                                $phone = $_POST['phone'];

                                $fn = stripslashes($fn);
                                $br = stripslashes($br);
                                $un = stripslashes($un);
                                $p = stripslashes($p);
                                $phone = stripslashes($phone);

                                $fn = mysql_real_escape_string($fn);
                                $br = mysql_real_escape_string($br);
                                $un = mysql_real_escape_string($un);
                                $p = mysql_real_escape_string($p);
                                $phone = mysql_real_escape_string($phone);
                          
                
                    $query = mysql_query("select * from staff where username= '$un'") or die (mysql_error());
                    $count = mysql_num_rows($query);

                  if ($count  > 0){ 
                  ?>
                    <script>
                      alert("Username Already Taken");
                    </script>
                  <?php
                    }
                    else{
                   mysql_query("insert into staff (name,branch,username,password,phone) values('$fn','$br','$un',MD5('$p'),'$phone')") or die(mysql_error());
                  ?>
                  <script>
                    alert('User Successfully Save');
                    header('location:user.php');
                  
                  </script>
                  <?php }} ?> 
                    
                    
                    
                    
                                </div>
                            </div>
                               
                                </div>
                            </div>
