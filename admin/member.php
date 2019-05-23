<?php include ('session.php');?>
<?php include ('header.php');?>
<?php include('connect.php'); ?>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><font  color="gold">INVOICE SYS</font></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
<font  color="gold">Logged in as : </font><font color="#DAA520"> <?php echo "$user_username"; ?></font>
                    </a>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
       <?php include ('nav_sidebar.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">


						<div class="hero-unit-table">
                              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                            <font  color="gold">Add Staff</font>
                                             </button>
                                         </h1>
                 						<?php include ('modal_add_member.php');?>
                                <thead>
                                    <tr>
                                        <th>Name's</th>
                                        <th>Phone NO</th>
                                        <th>Username</th>
                                        <th>Branch</th>
                                         <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include ('connect.php');


                                    $query = mysql_query("select * from staff") or die(mysql_error());
                                    while ($row = mysql_fetch_array($query)) {
                                        $staff_id = $row['staff_id'];
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['branch']; ?></td>
                                            <td width="210">

                                            <a href="resetPassword.php<?php echo '?staff_id=' . $staff_id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;Reset Password</a>
                                           <!-- <a href="#delete_member<?php echo $staff_id; ?>" role="button"  data-target = "#delete_member<?php echo $member_id;?>"data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>  -->

                                            </td>
                                            <!-- user delete modal -->
											<?php include ('delete_member_modal.php');?>
                                    <!-- end delete modal -->
                                  </tr>
                                 <?php } ?>

                                </tbody>
                            </table>


                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>

     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
   <?php include ('script.php');?>
</body>
</html>
