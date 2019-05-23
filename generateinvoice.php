<?php
require('fpdf/fpdf.php');
require('connect.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Ln(30);
$pdf->Image('logo/logo.png',10,10,-400);
//$pdf->Image('logo.jpg',40,12,-300);
//Variables Declaration
   if (isset($_POST['go'])) {
                               $invoiceNo = $_POST['invoiceNo'];
                               $deliveryStatus = $_POST['deliveryStatus'];
                            //   $company = $_POST['company'];
                               $contact = $_POST['contact'];
                               $email = $_POST['email'];
                               $phone = $_POST['phone'];
                               $company = $_POST['company'];
                               $date1 = $_POST['date1'];
                               $salesPerson = $_POST['salesPerson'];
                               $paymentMode = $_POST['paymentMode'];
                               $supply = $_POST['supply'];
                               $qty = $_POST['qty'];
                              $unitPrice = $_POST['unitPrice'];
                              $subTotal = $_POST['subTotal'];
                              $tax = $_POST['tax'];
                              $total = $_POST['total'];
                              $notes = $_POST['notes'];
                              $completedDate = $_POST['completedDate'];

                              mysql_query(
                             "update sales set
                              deliveryStatus='$deliveryStatus',
                              completedDate=now()

                              where invoiceNo='$invoiceNo'") or die(mysql_error());


}
    include ('connect.php');

          $sql = "SELECT salesId,company,address,contact,email,phone,salesPerson,paymentMode,notes,supply,qty,unitPrice,subTotal,total,invoiceNo,date1,deliveryStatus,completedDate
          FROM sales where invoiceNo='$invoiceNo'";
        $result = mysql_query($sql);
        while($rows=mysql_fetch_array($result))
{
            $salesId = $rows[0];
      //    $company = $rows[1];
            $company = $rows[1];
		      	$address = $rows[2];
            $contact = $rows[3];
            $email = $rows[4];
            $phone = $rows[5];
            $salesPerson = $rows[6];
            $paymentMode = $rows[7];
            $notes = $rows[8];
            $supply = $rows[9];
            $qty = $rows[10];
            $unitPrice = $rows[11];
            $subTotal = $rows[12];
            $total = $rows[13];
            $invoiceNo = $rows[14];
            $date1 = $rows[15];
            $deliveryStatus = $rows[15];
            $completedDate = $rows[15];
//Displaying PDF

            $pdf->Ln(20);
			$pdf->SetTextColor(0, 1, 250);
            $pdf->cell(30,8,"Invoice  ",0,0) ;
            $pdf->cell(40,8,"{$invoiceNo}",0,1) ;
        $pdf->SetTextColor(0, 0, 0);
            $pdf->cell(30,8,"Company: ",0,0) ;
            $pdf->cell(40,8,"{$company}",0,1) ;

		     	$pdf->cell(30,8,"contact Person : ",0,0);
            $pdf->cell(40,8,"{$contact}",0,1) ;

      			$pdf->cell(30,8,"Email: ",0,0) ;
            $pdf->cell(40,8,"{$email}",0,1) ;

            $pdf->cell(30,8,"Delivery Date: ",0,0) ;
            $pdf->cell(40,8,"{$completedDate}",0,1) ;


      		/*	$pdf->cell(30,8,"Priority: ",0,0) ;
            $pdf->cell(40,8,"{$priority}",0,1) ;

            $pdf->cell(30,8,"Job Status: ",0,0) ;
            $pdf->cell(40,8,"{$job_status}",0,0) ;
            $pdf->cell(40,8,"{$completed_date}",0,1) ;


      			$pdf->cell(30,8,"Contact Person: ",0,0) ;
            $pdf->cell(40,8,"{$technician}",0,1) ;



      			$pdf->cell(30,8,"Phone: ",0,0) ;
            $pdf->cell(40,8,"{$phone}",0,0) ;

      			$pdf->cell(30,8,"Email: ",0,0) ;
            $pdf->cell(40,8,"{$email}",0,1) ;

            $pdf->cell(25,8,"Customer Instructions: ",0,1) ;
            $pdf->cell(180,8,"{$customer_instructions}",1,1) ;

            $pdf->cell(25,8,"Work Carried Out: ",0,1) ;
            $pdf->cell(180,8,"{$work_carried_out}",1,1) ;

            $pdf->cell(25,8,"Assigned Staff: ",0,1) ;

            $pdf->cell(60,8,"Name: ",1,0) ;
            $pdf->cell(60,8,"Start Date: ",1,0) ;
            $pdf->cell(60,8,"Stop Date: ",1,1) ;

            $pdf->cell(60,8,"{$technician}",1,0) ;
            $pdf->cell(60,8,"{$start_date}",1,0) ;
            $pdf->cell(60,8,"{$stop_date}",1,1) ;   */

                           $pdf->Ln();

   }
$fileName = "{$invoiceNo} Invoice Report {$completedDate}.pdf" ;
$pdf->Output( 'Reports/'."{$fileName}", 'F');

?>



<html>
<head>
  <script>
         <!--
            function Redirect() {
               window.location="pendingdeliveries.php";
            }

            document.write("<html><font size='+3'> Click to <a href='pendingdeliveries.php'> Continue.. </font> </html>");
            setTimeout('Redirect()', 5);
         //-->
      </script>
  </head>
</html>
