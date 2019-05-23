<?php include ('connect.php');
                           if (isset($_POST['go'])) {
                               $ownerId = $_POST['ownerId'];
                               $name = $_POST['name'];
                               $email = $_POST['email'];
                               $mobile = $_POST['mobile'];
                               $id_pin = $_POST['id_pin'];

                               mysql_query("insert into owner (ownerId,name,email,mobile,id_pin)
                            values ('$ownerId','$name','$email','$mobile','$id_pin')
                               ") or die(mysql_error());

                               header('location:id_pinimgupl.php');
                           }
                           ?>
<?php include ('header.php');?>
<html>
    <body>
  <br><br>
  <br><br>
                        <div class="col-md-12 well">
                            <div class="container">

<br><br><br><br>
                                <form method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                 <label for="pwd">ID / PIN:</label>
                                                                <input type="text" class="form-control" name="id_pin" required="required" placeholder="Owner's ID / PIN">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                              <label for="pwd">Owner's Names:</label>
                                                                <input type="text" class="form-control" name="name" required="required" placeholder="Owner's Names">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="pwd">Email Address:</label>
                                                                <input type="text" class="form-control" name="email" required="required" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="pwd">Mobile No:</label>
                                                                <input type="text" name="mobile" class="form-control" required="required" placeholder="Mobile No">
                                                            </div>
                                                        </div>
                                                    </div>
<br><br>

    <button type="submit" name="go" class="btn btn-success"><i class="icon-save icon-large">
    </i>&nbsp;Next</button>
                        <span><a href = "form1.php" class = "btn btn-danger"> Back</a></span>
                                        </div>
                                    </div>
                                </form>



                        </div>
                    </div>

    <script src="assets/js/jquery.js"></script>
    <!-- CORE BOOTSTRAP LIBRARY -->
    <script src="assets/js/bootstrap.min.js"></script>
   <?php include ('script.php');?>
</body>
</html>
