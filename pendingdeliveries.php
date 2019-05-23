<?php include ('session.php');?>
<?php include ('header.php');?>
    <div class="hero-unit-table">

              <div class="container">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <div class="alert alert-info">
                            <strong><i class="icon-user icon-large"></i>&nbsp;Pending Deliveries</strong>
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
                            $query = mysql_query("select * from sales where deliveryStatus='pending'  ") or die(mysql_error());
                            while ($row = mysql_fetch_array($query)) {
                                $date1 = $row['date1'];
                                $invoiceNo = $row['invoiceNo'];
                                $company = $row['company'];
                                $suppl = $row['supply'];
                                $quantity = $row['qty'];
                                $fileName = "{$company} Invoice Report {$date}.pdf" ;


            $query1 = mysql_query("SELECT * FROM sales");
            $row1 = mysql_fetch_array($query1);


                                ?>
                                <tr class="warning">
                                    <td><?php echo $row['date1']; ?></td>
                                    <td><?php echo $row['invoiceNo']; ?></td>
                                    <td><?php echo $row['company']; ?></td>
                                    <td><?php echo $row['supply']; ?></td>
                                    <td><?php echo $row['qty']; ?></td>
                                    <td width="5">
                                        <a href="updateCompleteSales.php<?php echo '?invoiceNo=' . $invoiceNo; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;Update</a>
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
