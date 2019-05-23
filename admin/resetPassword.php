<?php include ('session.php');?>    
<?php
include('header.php');
$get_id = $_GET['member_id'];
?>
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
                <a class="navbar-brand" href="index.html"> <font color="gold"> JOB CARD</font></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown"> 
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                            
                       <font color="gold"> Welcome : Admin</font>
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
                    <div class="col-md-7 well">
                        <div class="hero-unit-table">   
                          <div class="hero-unit-table">   
                            <?php include ('connect.php');
                            $query = mysql_query("select * from staff where staff_id='$get_id'") or die(mysql_error());
                            $row = mysql_fetch_array($query);
                            ?>

                             <form class="form-horizontal" id="passForm" name="passForm"  method="post" enctype="multipart/form-data">
                                <div class="alert alert-info"><strong>Reset Password</strong> </div>              
                                  <div class="control-group">
                                  <label class="control-label" for="inputEmail">Enter Password</label>
                                   <div class="controls">
                                    <input id="myPassword" type="password" class="form-control" name="password" required >
                                   </div>
                                 </div>
                                  <div class="control-group">
                                    <label class="control-label" for="inputEmail">Confirm Password</label>
                                     <div class="controls">
                                       <input id="myConfirmPassword" type="password" class="form-control" name="rPassword" required>
                                        <div id="errors" class="well"></div>
                                      </div>
                                      <button type="submit" name="update" class="btn btn-success disableOnInvalid" disabled="disabled"><i class="icon-save icon-large"></i>Reset</button>
                                     <span><a href = "member.php" class = "btn btn-danger"> Back</a></span>
                                   </div>
                                 </div> 
                              

                              <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                              <script type="text/javascript" src="js/jquery.password-validation.js"></script>
                              <script>



                                $(document).ready(function() {
                                  $(".disableOnInvalid").prop('disabled',true);
                                  $("#myPassword").passwordValidation({"confirmField": "#myConfirmPassword"}, function(element, valid, match, failedCases) {

                                      $("#errors").html("<pre>" + failedCases.join("\n") + "</pre>");
                                       //var passTest = 0;
                                       if(valid) {
                                          $(element).css("border","2px solid green");
                                       } else {
                                          $(element).css("border","2px solid red");
                                       } //{ pass = 1;}
                                       //if(!valid) {$(element).css("border","2px solid red");}
                                       if(valid && match) {
                                          $("#myConfirmPassword").css("border","2px solid green");
                                          //$("#resetBtn").disable(false);
                                       }else {
                                          $("#myConfirmPassword").css("border","2px solid red");

                                       }
                                       // $(function() {
                                       //        $('.form-horizontal').on('submit',function(event){

                                       //            //console.log(this);

                                       //          if (valid&&match){
                                                  
                                       //          } else{
                                       //            event.preventDefault();
                                       //          }
                                       //        });
                                       // });
                                       $(function(){
                                          if (valid&&match){
                                              $(".disableOnInvalid").prop('disabled',false);        
                                          } 
                                       });
                                          // console.info("Valid status: " + valid);
                                          // console.info("Match value: " + match);
                                        


                                  });
                                });
                              </script>
                       </form>





                        
  <!--  validation
                            <form id="formValidation" class="form-horizontal"  method="post" enctype="multipart/form-data">
                                <div class="alert alert-info"><strong>Rest Password</strong> </div>

                                <hr>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Enter Password</label>
                                    <div class="controls">
                                        <input type="password" id="password" name="password" class = "form-control" placeholder="Enter Password" required="required" minlength="6">
                                    </div>
                                </div>
                                  <div class="control-group">
                                    <label class="control-label" for="inputEmail">Re-Enter Password</label>
                                    <div class="controls">
                                        <input type="password" id="rpassword" name="rpassword" class = "form-control" placeholder="Re-Enter Password" required="required" minlength="6">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Reset</button>
                                        <span><a href = "member.php" class = "btn btn-danger"> Back</a></span>
                                    </div>
                                </div> 
                            </form>
 -->


      <!--                      <script>
                                $( "#formValidation" ).validate({
                                 rules: {
                                  password: "required",
                                   rPassword: {
                                    equalTo: "#password"
                                  }
                                }
                              });


                                $.validator.addMethod("password", function(value) {
                                 return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                                     && /[a-z]/.test(value) // has a lowercase letter
                                     && /\d/.test(value) // has a digit
});
                              </script>

                            -->

                            <?php
                            if (isset($_POST['update'])) {

                                $Password = $_POST['password'];

                                $password = stripslashes($password);

                                $password = mysql_real_escape_string($password);
                                $password = mysql_real_escape_string($password);
                              

                                   if ($count  > 0){ 
                              ?>
                              <script>
                              alert("Password not reset");
                              </script>
                              <?php
                              }
                              else{

                                mysql_query("update staff set Password=MD5('$Password') where staff_id='$get_id'") or die(mysql_query());
                                header('location:member.php');
                          
                               ?>
                 

                              <script>
                             alert('Password Successfully Reset');
                             window.location.href = 'member.php';
                  
                             </script>
                            <?php }} ?> 


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
 
</body>
</html>
