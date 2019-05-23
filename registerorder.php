<?php include ('session.php');?>
<?php include ('connect.php');
                           if (isset($_POST['go'])) {
                               $invoiceNo = $_POST['invoiceNo'];
                               $company = $_POST['company'];
                               $address = $_POST['address'];
                               $contact = $_POST['contact'];
                               $email = $_POST['email'];
                               $phone = $_POST['phone'];
                               $salesPerson = $_POST['salesPerson'];
                               $paymentMode = $_POST['paymentMode'];
                               $notes = $_POST['notes'];
                               $supply = $_POST['supply'];
                               $qty = $_POST['qty'];
                               $unitPrice = $_POST['unitPrice'];

                               $subTotal = $qty*$unitPrice;
                               $taxRate = 0.16;
                               $tax = $subTotal*$taxRate;
                               $total = $subTotal+$tax;
                               $deliveryStatus = "Pending";



  //                           $date = $_POST['date'];




                    $query = mysql_query("select * from sales where invoiceNo = '$invoiceNo'") or die (mysql_error());
                    $count = mysql_num_rows($query);

                  if ($count  > 0){
                  ?>
                    <script>
                      alert("Order with the same invoice No already already in the System");
                    </script>
                  <?php
                    }
                    else{
                              mysql_query("insert into sales (company,address,contact,email,phone,salesPerson,paymentMode,notes,supply,qty,unitPrice,subTotal,total,invoiceNo,date1,deliveryStatus)
                               values ('$company','$address','$contact','$email','$phone','$salesPerson','$paymentMode','$notes','$supply','$qty','$unitPrice','$subTotal','$total','$invoiceNo',now(),'$deliveryStatus')
                               ") or die(mysql_error());
                              unset($invoiceNo,$company,$address,$contact,$email,$phone,$salesPerson,$paymentMode,$notes,$supply,$qty,$unitPrice,$subTotal,$taxRate,$tax,$total);
                  ?>






                  <script>
                    alert('Order Successfully Saved. Click Ok to continue....');
                    header('location:registerorder.php');

                  </script>


<?php }} ?>
                           <?php include_once 'header.php'; ?>
                           <html>
                           <body>
                           <br>
                           <div class="col-md-12 well">
                           <div class="container">
                           <div class="alert alert-info">
                             <strong><i class="icon-user icon-large"></i>&nbsp;Register Sales </strong>
                           </div>
                                        
                                                <form method="post" enctype="multipart/form-data">
                                                       <div class="row">
                                                      <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Invoice No:</label>
                                                                <input type="text" minlength="2" maxlength="15" class="form-control" name="invoiceNo" value="<?php echo $invoiceNo; ?>" required="required" placeholder="Invoice">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Company / Individual:</label>
                                                                <input type="text" minlength="2" maxlength="50" class="form-control" name="company"  value="<?php echo $company; ?>" required="required" placeholder="Company or Individual">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                          <label>Address:</label>
                                                                <input type="text" name="address" class="form-control" required="required"  value="<?php echo $address; ?>" placeholder="Address">
                                                            </div>
                                                        </div>
                                                    </div>


                                                               <div class="row">
                                                      <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Contact Person:</label>
                                                                <input type="text" minlength="2" maxlength="15" class="form-control" name="contact"  value="<?php echo $contact; ?>" required="required" placeholder="Contact">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                          <label>Email:</label>
                                                                <input type="text"  max="100" name="email"  value="<?php echo $email; ?>" class="form-control" required="required" placeholder="Email">
                                                            </div>
                                                        </div>
                                                    </div>

                                                               <div class="row">
                                                      <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Phone:</label>
                                                                <input type="text" minlength="2" maxlength="15" class="form-control" name="phone"  value="<?php echo $phone; ?>" required="required" placeholder="Phone">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                          <label>Sales Person:</label>
                                                                <input type="text"  max="100" name="salesPerson"  value="<?php echo $salesPerson; ?>" class="form-control" required="required" placeholder="Sales Person">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                              <label >Payment Mode:</label>
                                                              <select name="paymentMode" class="form-control"  value="<?php echo $paymentMode; ?>" required="required">
                                                               <option value="">-Select-</option>
                                                               <option value="CASH">Cash</option>
                                                               <option value="CHEQUE">Cheque</option>
                                                              <option value="EFT">EFT</option>

                                                           </select>
                                                           </div>
                                                          </div>

                                                           <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                              <label >Notes:</label>
                                                                  <input type="text" minlength="1" maxlength="200" class="form-control" name="notes"  value="<?php echo $notes; ?>" required="required" placeholder="hours">
                                                                 </div>
                                                                </div>
                                                            </div>
                                                                  <div class="row">
                                                      <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Supply:</label>
                                                                <input type="text" minlength="2" maxlength="50" class="form-control" name="supply"  value="<?php echo $supply; ?>" required="required" placeholder="Supply">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                          <label>Quantity:</label>
                                                                <input type="text" name="qty"  value="<?php echo $qty; ?>" class="form-control" required="required" placeholder="Quantity">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                      <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">



                                                          <label>Price Per Unit:</label>
                                                                <input type="number" name="unitPrice"  value="<?php echo $unitPrice; ?>" class="form-control" required="required" placeholder="Price per Unit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--       <div class="row">
                                                                <div class="col-md-6 col-sm-6">
                                                                    <div class="form-group">
                                                                      <label>Total Charges:</label>
                                                                        <input onchange="checkFilledpolicyNo();"  id="id_application_method_policyNo" type="text" name="total_charges" minlength="10" maxlength="30" class="form-control" required="required" placeholder="Total Charges">
                                                                       </div>
                                                                    </div>
                                                                   </div>   -->

                                                   <br>
                                                    <div class="row">
                                                      <div class="form-group">
                                                         <div class="col-md-6 col-sm-6">
                                                      <button type="submit" name="go" class="btn btn-success"><i class="icon-save icon-large">
                                                      </i>&nbsp;Submit</button>
                                                     </div>
                                                    </div>
                                                   </div>

                                             </form>



            </div>
       </div>
  <script>
    function checkFilledcontact() {
  var inputVal = document.getElementById("id_application_method_contact");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledemai;();

    function checkFilledemail() {
  var inputVal = document.getElementById("id_application_method_email");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledphone();

    function checkFilledphone() {
  var inputVal = document.getElementById("id_application_method_phone");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledtechnician();

    function checkFilledtechnician() {
  var inputVal = document.getElementById("id_application_method_technician");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledregNo();

  function checkFilledregNo() {
  var inputVal = document.getElementById("id_application_method_regNo");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledregNo();

 function checkFilledodo() {
  var inputVal = document.getElementById("id_application_method_odo");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledodo();
</script>
<script>
 function checkFilledbodyType() {
  var inputVal = document.getElementById("id_application_method_bodyType");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledbodyType();
</script>
<script>
 function checkFilledmodel() {
  var inputVal = document.getElementById("id_application_method_model");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledmodel();
</script>
<script>
 function checkFilledpolicyNo() {
  var inputVal = document.getElementById("id_application_method_policyNo");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "#FFFF59";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
}

checkFilledpolicyNo();

</script>
    <script src="assets/js/jquery.js"></script>
    <!-- CORE BOOTSTRAP LIBRARY -->
    <script src="assets/js/bootstrap.min.js"></script>
   <?php include ('script.php');?>


</body>
</html>
