<?php include ('session.php');?>
<?php  include_once 'header.php'; ?>
<?php include ('connect.php');

                           if (isset($_POST['go'] )) {

                             //Owner
                               $technician = $_POST['technician'];
                               $priority = $_POST['priority'];
                               $customer_instructions = $_POST['customer_instructions'];
                               $work_carried_out = $_POST['work_carried_out'];
                               $start_date = $_POST['start_date'];
                               $stop_date = $_POST['stop_date'];
                               $company = $_POST['company'];
                               $job_id = $_POST['job_id'];
                              


                    $query = mysql_query("select * from jobs where work_carried_out= '$work_carried_out'") or die (mysql_error());
                    $count = mysql_num_rows($query);

                  if ($count  > 0){ 
                  ?>
                    <script>
                      alert("Please make changes and update");
                    </script>
                  <?php
                    }
                    else{

                              mysql_query(
                             "update jobs set 
                              technician='$technician',
                              priority='$priority',
                              customer_instructions='$customer_instructions',
                              work_carried_out='$work_carried_out',
                              start_date='$start_date',
                              stop_date='$stop_date'
                              
                              where job_id='$job_id'") or die(mysql_error());
                  ?> 





                 
                  <script>
                    alert('Job Successfully Saved. Click Ok to continue....');
                    header('location:home.php');
                  
                  </script>


                          
                           
<?php }} ?> 

    <html>
           <span><a href = "home.php" class = "btn btn-success"> Back Home</a></span> 
                    
                  </html>
    <script src="assets/js/jquery.js"></script>
    <!-- CORE BOOTSTRAP LIBRARY -->
    <script src="assets/js/bootstrap.min.js"></script>
   <?php include ('script.php');?>                
