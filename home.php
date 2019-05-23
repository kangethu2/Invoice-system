<?php include ('session.php');?>
<?php include ('header.php');?>
    <div class="hero-unit-table">

              <div class="container">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <div class="alert alert-info">
<!--
        <?php
          $session_id = $_GET['session_id'];
          ?>
          <?php include ('connect.php');
                               $query = mysql_query("select * from sales where invoiceNo='$invoiceNo'") or die(mysql_error());
                               $row = mysql_fetch_array($query);
        ?>
-->

                            <strong><i class="icon-user icon-large"></i>&nbsp;Sales </strong>
                        </div>
                        <thead>
                            <tr>
                              <th>Invoice NO</th>
                                <th>Company</th>
                                <th>Service</th>
                                <th>Charges(KSH)</th>
                                <th>Delivery Status</th>
                               <th>Action</th> 
                              </tr>
                            </thead>
                          <tbody>
                            <?php include ('connect.php');
                            $query = mysql_query("select * from sales") or die(mysql_error());
                            while ($row = mysql_fetch_array($query)) {
                                $invoiceNo = $row['invoiceNo'];


            $query1 = mysql_query("SELECT * FROM sales");
            $row1 = mysql_fetch_array($query1);


                                ?>
                                <tr class="warning">
                                  <td><?php echo $row['invoiceNo']; ?></td>
                                    <td><?php echo $row['company']; ?></td>
                                    <td><?php echo $row['supply']; ?></td>
                                    <td><?php echo $row['total']; ?></td>
                                    <td><?php echo $row['deliveryStatus']; ?></td>

                                   <td width="5">
                                        <a href="updatejob.php<?php echo '?invoiceNo=' . $invoiceNo; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;Update</a>
                                    </td>


                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
     </div>
</div>
     <!-- /. PAGE INNER  -->
    </div>
 <!-- /. PAGE WRAPPER  -->
</div>

    <div class="container-fluid">
      <div class="row main-low-margin ">



          <div class="col-md-3 col-sm-3 text-center">

            </div>

            <div class="col-md-7 col-sm-7">

    <script src="assets/js/jquery.js"></script>
    <!-- CORE BOOTSTRAP LIBRARY -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- jQuery Js -->
   <?php include ('script.php');?>
</body>
</html>
