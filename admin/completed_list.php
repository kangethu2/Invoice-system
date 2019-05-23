<?php include ('session.php');?>
<?php include ('header.php');?>
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
                <a class="navbar-brand" href="# "><font  color="gold">invoice</font></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                      <font  color="gold">Welcome : </font><font color="#DAA520"> <?php echo "$user_username"; ?></font></font>
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

                               <table cellpadding="0" cellspacing="0" border="0" class="table table-condensed table-striped table-bordered" id="dataTables-example">
                                <div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Completed Inspections</strong>
                                </div>
                                <thead>
                                    <tr>
                                        <th>Policy No</th>
                                        <th>Reg No</th>
                                        <th>Inspection Date</th>
                                        <th>User</th>
                                        <th>Invoice No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include ('connect.php');
                            $query = mysql_query("select * from inspection where invoice IS NOT NULL") or die(mysql_error());
                            while ($row = mysql_fetch_array($query)) {
                                $regNo = $row['regNo'];
                                $inspectionDate = $row['inspectionDate'];
                                $fileName = "{$regNo} Inspection Report {$inspectionDate}.pdf" ;


                                ?>
                                <tr class="warning">
                                    <td><?php echo $row['policyNo']; ?></td>
                                    <td><?php echo $row['regNo']; ?></td>
                                    <td><?php echo $row['inspectionDate']; ?></td>
                                    <td><?php echo $row['user']; ?></td>
                                    <td><?php echo $row['invoice']; ?></td>
                                    <td width="160">
                                        <a href="../reports/<?php echo $fileName?>" target="_blank" class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;Download Report</a>
                                    </td>

                            <!-- end delete modal -->

                            </tr>

                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php include ('delete_user_modal.php');?>

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
