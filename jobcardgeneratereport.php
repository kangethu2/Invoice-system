<?php
require('fpdf/fpdf.php');
require('connect.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Ln(20);
$pdf->Image('jobcard2.png',10,10,-400);
//$pdf->Image('logo.jpg',40,12,-300);
//Variables Declaration
   if (isset($_POST['go'])) {
                               $technician = $_POST['technician'];
                               $priority = $_POST['priority'];
                               $customer_instructions = $_POST['customer_instructions'];
                               $work_carried_out = $_POST['work_carried_out'];
                               $start_date = $_POST['start_date'];
                               $stop_date = $_POST['stop_date'];
                               $company = $_POST['company'];
                               $job_id = $_POST['job_id'];
                               $job_status = $_POST['job_status'];
                 
                              mysql_query(
                             "update jobs set 
                              technician='$technician',
                              priority='$priority',
                              customer_instructions='$customer_instructions',
                              work_carried_out='$work_carried_out',
                              start_date='$start_date',
                              stop_date='$stop_date',
                              job_status='$job_status'
                              
                              where job_id='$job_id'") or die(mysql_error());
                            

}
    include ('connect.php');

          $sql = "SELECT job_id,company,service,date,start_date,priority,technician,phone,email,customer_instructions,work_carried_out,technician,
          start_date,stop_date,job_status
          FROM jobs where job_id='$job_id'";
        $result = mysql_query($sql);
        while($rows=mysql_fetch_array($result))


  {
            
            $job_id = $rows[0];
            $company = $rows[1];
            $service = $rows[2];
		      	$date = $rows[3];
            $start_date = $rows[4];
            $priority = $rows[5];
            $technician = $rows[6];
            $phone = $rows[7];
            $email = $rows[8];
            $customer_instructions = $rows[9];
            $work_carried_out = $rows[10];
            $technician = $rows[11];
            $start_date = $rows[12];
            $stop_date = $rows[13];
            $job_status = $rows[14];



            


           
//Displaying PDF

            $pdf->Ln(20);
			$pdf->SetTextColor(0, 1, 250);
            $pdf->cell(30,8,"Company  ",0,0) ;
            $pdf->cell(40,8,"{$company}",0,1) ;
            $pdf->SetTextColor(0, 0, 0);
            $pdf->cell(30,8,"Service: ",0,0) ;
            $pdf->cell(40,8,"{$service}",0,1) ;

		      	$pdf->cell(30,8,"Created on : ",0,0);
            $pdf->cell(40,8,"{$date}",0,1) ;

      			$pdf->cell(30,8,"Attended By: ",0,0) ;
            $pdf->cell(40,8,"{$technician}",0,1) ;


      			$pdf->cell(30,8,"Priority: ",0,0) ;
            $pdf->cell(40,8,"{$priority}",0,1) ;

            $pdf->cell(30,8,"Job Status: ",0,0) ;
            $pdf->cell(40,8,"{$job_status}",0,1) ;
            

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
            $pdf->cell(60,8,"{$stop_date}",1,1) ;                  

                           $pdf->Ln();
             
   }   
$fileName = "{$company} JobCard Report {$date}.pdf" ;
$pdf->Output( 'JobCardReports/'."{$fileName}", 'F');

?>



<html>
<head>
  <script>
         <!--
            function Redirect() {
               window.location="home.php";
            }
            
            document.write("<html><font size='+3'> Click to <a href='home.php'> Continue.. </font> </html>");
            setTimeout('Redirect()', 5);
         //-->
      </script>
  </head>
</html>