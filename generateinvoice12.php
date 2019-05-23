<script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
</script>
<?php include ('session.php');?>
<?php include ('header.php');?>
    <div class="hero-unit-table">

              <div class="container">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <div class="alert alert-info">
                            <strong><i class="icon-user icon-large"></i>&nbsp;JOBS</strong>
                        </div>
                        <thead>
                            <tr>
                                <th>Company</th>
                                <th>Service</th>
                                <th>Charges(KSH)</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                          <tbody>
                            <?php include ('connect.php');
                            $query = mysql_query("select * from jobs") or die(mysql_error());
                            while ($row = mysql_fetch_array($query)) {
                                $job_id = $row['job_id'];


            $query1 = mysql_query("SELECT * FROM jobs");
            $row1 = mysql_fetch_array($query1);


                                ?>
                                <tr class="warning">
                                    <td><?php echo $row['company']; ?></td>
                                    <td><?php echo $row['service']; ?></td>
                                    <td><?php echo $row['total_charges']; ?></td>
                                    <td width="5">
                                        <a href="reg_inspection.php<?php echo '?job_id=' . $job_id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;Genarate</a>
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
