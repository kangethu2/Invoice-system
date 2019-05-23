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
                <a class="navbar-brand" href="# "><font  color="gold">E-NIVOICE</font></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                      <font  color="gold">Logged in as : </font><font color="#DAA520"> <?php echo "$user_username"; ?></font></font>
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
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Completed Jobs</strong>
                                </div>
                                <thead>
                                  <tr>
                                    <th>Date</th>
                                    <th>Invoice</th>
                                    <th>Company</th>
                                    <th>Supply</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                    </tr>
                                  </thead>
                                <tbody>
                                  <?php include ('connect.php');
                                  $query = mysql_query("select * from sales where  deliveryStatus='Delivered'") or die(mysql_error());
                                  while ($row = mysql_fetch_array($query)) {
                                    $date1 = $row['date1'];
                                    $completedDate = $row['completedDate'];
                                    $invoiceNo = $row['invoiceNo'];
                                    $company = $row['company'];
                                    $suppl = $row['supply'];
                                    $quantity = $row['qty'];
                                    $fileName = "{$invoiceNo} Invoice Report {$completedDate}.pdf" ;


                  $query1 = mysql_query("SELECT * FROM sales");
                  $row1 = mysql_fetch_array($query1);


                                      ?>
                                      <tr class="warning">
                                        <td><?php echo $row['date1']; ?></td>
                                        <td><?php echo $row['invoiceNo']; ?></td>
                                        <td><?php echo $row['company']; ?></td>
                                        <td><?php echo $row['supply']; ?></td>
                                        <td><?php echo $row['qty']; ?></td>
                                            <td width="160">
                                              <a href="http://localhost:81/invoiceSys/Reports/<?php echo $fileName?>" target="_blank" class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;Download Invoice</a>
                                          </td>



                                  </tr>
                                <?php } ?>
                                </tbody>
                            </table>
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
