<?php
            include('connect.php');

            if(isset($_POST['go']))
            {

              $username=$_POST['username'];
              $password=$_POST['password'];

              //prevent againist sql injection

              $username = stripslashes($username);
              $$password = stripslashes($password);
              $username = mysql_real_escape_string($username);
              $password = mysql_real_escape_string($password);

              $result = mysql_query("SELECT * FROM admin WHERE username =   '$username' and password=MD5('$password')") or die(mysql_error());

              $row = mysql_fetch_array($result);
              $numberOfRows = mysql_num_rows($result);


                              if ($numberOfRows == 0)
                                {
                                  echo " <br><center><font color= 'red' size='3'>Please fill up the fields correctly</center></font>";
                                }
                              else if ($numberOfRows > 0)
                                {
                                session_start();
                                $_SESSION['id'] = $row['username'];
                              header("location:home.php");

                            }

            }
            ?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8" />
    <title>
      eInvoice
    </title>
  <!-- Font Awesome Icons -->
  <link href="../bt4/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https:"
  <!-- Plugin CSS -->
  <link href="../bt4/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="../bt4/css/creative.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet'
  type='text/css'>

</head>
<body>
<div class="container-fluid" style="margin-top: 10px">
  <div class="row justify-content-center">
    <div class="col-md-6 col-offset-3" align="center">
      <img height="150" width="350" src="../logo/logo3.gif"><br><br>


<form method = "post" >
  <h1>ADMIN LOGIN</h1>

        <input type="text" placeholder="User Name" name="username" id="email"class="form-control"><br>
        <input type="password" placeholder="Password" name="password" id="password" class="form-control"><br>
        <input type="submit" name="go" id="go" value="Log In" class="btn btn-primary">
       <!-- <input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log In With Gmail" class="btn btn-danger"> -->
 <!-- <div class="inset">
  <p>
    <label for="email">EMAIL</label>
    <input style = "color:white;"type="text" name="username" id="email">
  </p>
  <p>
    <label for="password">PASSWORD</label>
    <input style = "color:white;" type="password" name="password" id="password">
  </p>

  </div>
   <center><p class="p-container" >

    <input type="submit" name="go" id="go" value="Log in">

  </p>
  </center>
</form> -->
</div>
</div>
</div>

  <!-- Bootstrap core JavaScript -->
  <script src="bt4/vendor/jquery/jquery.min.js"></script>
  <script src="bt4/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="bt4/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="bt4/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="bt4/js/creative.min.js"></script>
</body>
</html>
