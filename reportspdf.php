<html>
<head>
<script type = "text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
</head>
<?php
require('fpdf/fpdf.php');
require('mailer/PHPMailerAutoload.php');
require_once('mailer/class.smtp.php');
//require('rotation.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true);
$pdf->SetFont('Arial','',10);
$pdf->Image('logo.png',10,10,-300);
$pdf->Image('autoxpress.jpg',40,12,-300);
            $pdf->Ln(20);
            $pdf->SetFont('Arial','BU',13);
            $pdf->cell(0,8,"VEHICLE VALUATION REPORT",0,1,C) ;
            $pdf->SetFont('Arial','',10);
//Variables Declaration
if (isset($_POST['go'])) {
    $policyNo = $_POST['policyNo'];
    $ownerName = $_POST['ownerName'];
    $invoice = $_POST['invoice'];
    $mobile = $_POST['mobile'];
    $odo = $_POST['odo'];
    $bodyType = $_POST['bodyType'];
    $make = $_POST['make'];
    $totalCritical = $_POST['totalCritical'];
    $totalSecondary = $_POST['totalSecondary'];
    $id = $_POST['id'];
    $regNo = $_POST['regNo'];
    $email = $_POST['email'];
    $imgMV = $_POST['imgMV'];
    $imgLog = $_POST['imgLog'];
    $imgcarvalue = $_POST['imgcarvalue'];
    $user = $_POST['user'];


           $name = ''; $type = ''; $size = ''; $error = '';
           function compress_image($source_url, $destination_url, $quality) {

           $info = getimagesize($source_url);

              if ($info['mime'] == 'image/jpeg')
              $image = imagecreatefromjpeg($source_url);

              elseif ($info['mime'] == 'image/gif')
              $image = imagecreatefromgif($source_url);

              elseif ($info['mime'] == 'image/png')
              $image = imagecreatefrompng($source_url);

              imagejpeg($image, $destination_url, $quality);
              return $destination_url;
            }



           $imgID = rand(1000,100000)."-".$_FILES['imgID']['name'];
           $file_loc = $_FILES['imgID']['tmp_name'];
           $folder="id_Img/";
           $filename = compress_image($file_loc, $folder.$imgID, 70);
/*

           $imgDL = rand(1000,100000)."-".$_FILES['imgDL']['name'];
           $file_loc = $_FILES['imgDL']['tmp_name'];
           $folder="dl_Upload/";
           $filename = compress_image($file_loc, $folder.$imgDL, 70);

*/
}







     include ('connect.php');

if (isset($_POST['go'])) {
        $invoice = stripslashes($invoice);
        $invoice = mysql_real_escape_string($invoice);

        $invoice = strtoupper($invoice);
        $invoice = preg_replace('/\s+/', '', $invoice);

  /*  mysql_query("update images set id_img = '$imgID', dl_img = '$imgDL' where vehicle = '$regNo' and mv_img = '$imgMV'") or die(mysql_error()); */
    mysql_query("update images set id_img = '$imgID' where vehicle = '$regNo'") or die(mysql_error()); 
    mysql_query("update inspection set invoice='$invoice', inspectionDate=now() where regNo='$regNo'") or die(mysql_query());
    mysql_query("update vehicle set invoice='$invoice' where regNo='$regNo'") or die(mysql_query());
    //header('location:complete.php');
}

     include ('connect.php');

            $queryMv = "SELECT mv_img FROM images WHERE vehicle='$regNo' ";
            $resultMv = mysql_query($queryMv);
            $rowMv = mysql_fetch_assoc($resultMv);
            $mvImage = $rowMv['mv_img'];

            $queryLog = "SELECT logbook_img FROM images WHERE vehicle='$regNo' ";
            $resultLog = mysql_query($queryLog);
            $rowLog = mysql_fetch_assoc($resultLog);
            $logImage = $rowLog['logbook_img'];

            $queryID = "SELECT id_img FROM images WHERE vehicle='$regNo' ";
            $resultID = mysql_query($queryID);
            $rowID = mysql_fetch_assoc($resultID);
            $IDImage = $rowID['id_img'];

            $querycarvalue = "SELECT imgcarvalue FROM images WHERE vehicle='$regNo' ";
            $resultcarvalue = mysql_query($querycarvalue);
            $rowcarvalue = mysql_fetch_assoc($resultcarvalue);
            $carvalueImage = $rowcarvalue['imgcarvalue'];
/*
            $queryDL = "SELECT dl_img FROM images WHERE vehicle='$regNo' ";
            $resultDL = mysql_query($queryDL);
            $rowDL = mysql_fetch_assoc($resultDL);
            $DLImage = $rowDL['dl_img'];
*/
            $queryAPAuser = "SELECT APAuser FROM inspection where regNo='$regNo' ";
            $resultAPAuser = mysql_query($queryAPAuser);
            $rowAPAuser = mysql_fetch_assoc($resultAPAuser);
            $APAuser = $rowAPAuser['APAuser'];


        $sql = "SELECT policyNo,regNo,fitting,fittingDetails,physical,physicalDetails,play,playDetails,gearShifting,gearShiftingDetails,footBrake,footBrakeDetails,
        handBrake,handBrakeDetails,engineLeak,engineLeakDetails,tyreFL,tyreFLmm,tyreFLDetails,tyreFR,tyreFRmm,tyreFRDetails,tyreRR,tyreRRmm,tyreRRDetails,tyreRL,
        tyreRLmm,tyreRLDetails,tyreSpare,tyreSparemm,tyreSpareDetails,headLight,headLightDetails,brakeLight,brakeLightDetails,indicatorLight,indicatorLightDetails,
        tailLight,tailLightDetails,reverseLight,reverseLightDetails,wiring,wiringComment,
        wiper,wiperDetails,screen,screenDetails,door,doorsDetails,mirror,mirrorDetails,fenderBumper,fenderBumperDetails,atd,value,overalComment,inspectionDate
        FROM inspection where regNo='$regNo'";
        $result = mysql_query($sql);
        while($rows=mysql_fetch_array($result))

          
        {
            $policyN = $rows[0];
            $regNO = $rows[1];
            $fitting = $rows[2];
            $fittingDetails = $rows[3];
            $physical = $rows[4];
            $physicalDetails = $rows[5];
            $play = $rows[6];
            $playDetails = $rows[7];
            $gear = $rows[8];
            $gearDetails = $rows[9];
            $footBrake = $rows[10];
            $footBrakeDetails = $rows[11];
            $handBrake = $rows[12];
            $handBrakeDetails = $rows[13];
            $engine = $rows[14];
            $engineDetails = $rows[15];
            $tyreFL = $rows[16];
            $tyreFLmm = $rows[17];
            $tyreFLDetails = $rows[18];
            $tyreFR = $rows[19];
            $tyreFRmm = $rows[20];
            $tyreFRDetails = $rows[21];
            $tyreRR = $rows[22];
            $tyreRRmm = $rows[23];
            $tyreRRDetails = $rows[24];
            $tyreRL = $rows[25];
            $tyreRLmm = $rows[26];
            $tyreRLDetails = $rows[27];
            $spare = $rows[28];
            $sparemm = $rows[29];
            $spareDetails = $rows[30];
            $headLight = $rows[31];
            $headLightDetails = $rows[32];
            $brakeLight = $rows[33];
            $brakeLightDetails = $rows[34];
            $indicator = $rows[35];
            $indicatorLightDetails = $rows[36];
            $tailLight = $rows[37];
            $tailLightDetails = $rows[38];
            $reverseLight = $rows[39];
            $reverseLightDetails = $rows[40];
            $concern = $rows[41];
            $concernDetails = $rows[42];
            $wiper = $rows[43];
            $wiperDetails = $rows[44];
            $windScreen = $rows[45];
            $windScreenDetails = $rows[46];
            $door = $rows[47];
            $doorDetails = $rows[48];
            $mirror = $rows[49];
            $mirrorDetails = $rows[50];
            $body = $rows[51];
            $bodyDetails = $rows[52];
            $atd = $rows[53];
            $value = $rows[54];
            $overalComment = $rows[55];
            $inspectionDate = $rows[56];

            



           
//Displaying PDF

            $pdf->Ln(5);

            $pdf->SetFont('Arial','B',10);
            $pdf->cell(25,8,"Date:",0,0) ;
                        $pdf->SetFont('Arial','',10);
            $pdf->cell(75,8,"{$inspectionDate}",0,1) ;

            $pdf->SetFont('Arial','B',10);            
            $pdf->cell(25,8,"Policy No:",0,0) ;
                        $pdf->SetFont('Arial','',10);
            $pdf->cell(75,8,"{$policyNo}",0,0) ;

            $pdf->SetFont('Arial','B',10);
            $pdf->cell(25,8,"Invoice:",0,0) ;
                        $pdf->SetFont('Arial','',10);
            $pdf->cell(75,8,"{$invoice}",0,1) ;

            $pdf->SetFont('Arial','B',10);
            $pdf->cell(25,8,"Name:",0,0) ;
                        $pdf->SetFont('Arial','',10);
            $pdf->cell(75,8,"{$ownerName}",0,0) ;

            $pdf->SetFont('Arial','B',10);
            $pdf->cell(25,10,"ID/ PIN No:",0,0) ;
                        $pdf->SetFont('Arial','',10);
            $pdf->cell(75,10,"{$id}",0,1) ;

            $pdf->SetFont('Arial','B',10);
            $pdf->cell(25,8,"Email:",0,0) ;
                        $pdf->SetFont('Arial','',10);
            $pdf->cell(75,8,"{$email}",0,0) ;

            $pdf->SetFont('Arial','B',10);
            $pdf->cell(25,8,"Mobile:",0,0) ;
                        $pdf->SetFont('Arial','',10);
            $pdf->cell(75,8,"{$mobile}",0,1) ;
            
            $pdf->SetFont('Arial','B',10);
            $pdf->cell(25,8,"Reg No:",0,0) ;
                        $pdf->SetFont('Arial','',10);
            $pdf->cell(75,8,"{$regNo}",0,0) ;

            $pdf->SetFont('Arial','B',10);
            $pdf->cell(25,8,"Make & Model:",0,0) ;
                        $pdf->SetFont('Arial','',10);
            $pdf->cell(75,8,"{$make}",0,1) ;
            
            $pdf->SetFont('Arial','B',10);
            $pdf->cell(25,8,"ODO Reading:",0,0) ;
                        $pdf->SetFont('Arial','',10);
            $pdf->cell(75,8,"{$odo}",0,0) ;

            $pdf->SetFont('Arial','B',10);
            $pdf->cell(25,8,"Body Type:",0,0) ;
                        $pdf->SetFont('Arial','',10);
            $pdf->cell(75,8,"{$bodyType}",0,1) ;
            
            $pdf->Ln(5);
            $pdf->SetFont('Arial','BI',10);
            $pdf->SetTextColor(255, 195, 0);
            $pdf->cell(83,8,"At the time of claim, market forces with regard to depreciation will apply",0,1) ;
            $pdf->SetFont('Arial','',10);
            $pdf->SetTextColor(0, 0, 0);

            $pdf->cell(83,8,"Total number of critical/ primary systems that failed:",0,0) ;
            $pdf->cell(20,8,"{$totalCritical}",0,1) ;

            $pdf->cell(75,8,"Total number of secondary systems that failed:",0,0) ;
            $pdf->cell(20,8,"{$totalSecondary}",0,1) ;

            $pdf->cell(197,8,"Please note that your insurance cover may be affected by failed systems",0,1) ;

            $pdf->Ln(5);
            $pdf->SetFont('Arial','BU',12);
            $pdf->cell(70,15,"Inspection Summary",0,0) ;

            $pdf->Ln(15);
            $pdf->SetFont('Arial','B',11);
            $pdf->cell(70,12,"Shocks",0,0) ;
			$pdf->SetFont('Arial','',10);

            $pdf->Ln(8);
            $pdf->cell(25,10,"Fitting: ",0,1) ;
            $pdf->cell(25,8," {$fitting}",1,0) ;
            $pdf->Multicell(172,8,"{$fittingDetails}",1) ;

            $pdf->cell(25,10,"Physical: ",0,1) ;
            $pdf->cell(25,8,"{$physical}",1,0) ;
            $pdf->Multicell(172,8,"{$physicalDetails}",1) ;

            $pdf->Ln(8);
            $pdf->SetFont('Arial','B',11);            
            $pdf->cell(25,12,"Steering",0,0) ;
        	$pdf->SetFont('Arial','',10);

            $pdf->Ln(8);
            $pdf->cell(25,10,"Play: ",0,1) ;
            $pdf->cell(25,8,"{$play}",1,0) ;
            $pdf->Multicell(172,8,"{$playDetails}",1) ;

            $pdf->Ln(8);
            $pdf->SetFont('Arial','B',11);
            $pdf->cell(25,12,"Gearbox",0,0) ;
            			$pdf->SetFont('Arial','',10);
                       
            $pdf->Ln(8);
            $pdf->cell(25,10,"Gear Shifting: ",0,1) ;
            $pdf->cell(25,8,"{$gear}",1,0) ;
            $pdf->Multicell(172,8,"{$gearDetails}",1) ;
            
            $pdf->AddPage();
            //$pdf->Ln(8);
            $pdf->SetFont('Arial','B',11);
            $pdf->cell(25,12,"Brakes",0,0) ;
            			$pdf->SetFont('Arial','',10);

            $pdf->Ln(8);              
            $pdf->cell(25,10,"Foot Brake: ",0,1) ;
            $pdf->cell(25,8,"{$footBrake}",1,0) ;
            $pdf->Multicell(172,8,"{$footBrakeDetails}",1) ;

            $pdf->cell(25,10,"Handbrake: ",0,1) ;
            $pdf->cell(25,8,"{$handBrake}",1,0) ;
            $pdf->Multicell(172,8,"{$handBrakeDetails}",1) ;

            $pdf->Ln(8);
            $pdf->SetFont('Arial','B',11);
            $pdf->cell(25,12,"Engine",0,0) ;
            			$pdf->SetFont('Arial','',10);

            $pdf->Ln(8);
            $pdf->cell(25,10,"Oil Leaks: ",0,1) ;
            $pdf->cell(25,8,"{$engine}",1,0) ;
            $pdf->Multicell(172,8,"{$engineDetails}",1) ;

            $pdf->Ln(8);
            $pdf->SetFont('Arial','B',11);
            $pdf->cell(25,12,"Tyres",0,0) ;
            			$pdf->SetFont('Arial','',10);

            $pdf->Ln(8);
            $pdf->cell(25,10,"Front Left: ",0,1) ;
            $pdf->cell(25,8,"{$tyreFL}",1,0) ;
            $pdf->cell(31,8,"{$tyreFLmm} MM",1,0) ;
            $pdf->Multicell(118,8,"{$tyreFLDetails}",1) ;

            $pdf->cell(25,10,"Front Right: ",0,1) ;
            $pdf->cell(25,8,"{$tyreFR}",1,0) ;
            $pdf->cell(31,8,"{$tyreFRmm} MM",1,0) ;
            $pdf->Multicell(118,8,"{$tyreFRDetails}",1) ;

            $pdf->cell(25,10,"Rear Right: ",0,1) ;
            $pdf->cell(25,8,"{$tyreRR}",1,0) ;
            $pdf->cell(31,8,"{$tyreRRmm} MM",1,0) ;
            $pdf->Multicell(118,8,"{$tyreRRDetails}",1) ;

            $pdf->cell(25,10,"Rear Left: ",0,1) ;
            $pdf->cell(25,8,"{$tyreRL}",1,0) ;
            $pdf->cell(31,8,"{$tyreRLmm} MM",1,0) ;
            $pdf->Multicell(118,8,"{$tyreRLDetails}",1) ;

            $pdf->cell(25,10,"Spare: ",0,1) ;
            $pdf->cell(25,8,"{$spare}",1,0) ;
            $pdf->cell(31,8,"{$sparemm} MM",1,0) ;
            $pdf->Multicell(118,8,"{$spareDetails}",1) ;

            $pdf->AddPage();
            
            //$pdf->Ln(8);
            $pdf->SetFont('Arial','B',11);
            $pdf->cell(25,12,"Lighting",0,0) ;
            			$pdf->SetFont('Arial','',10);

            $pdf->Ln(8);
            $pdf->cell(25,10,"Headlight: ",0,1) ;
            $pdf->cell(25,8,"{$headLight}",1,0) ;
            $pdf->Multicell(172,8,"{$headLightDetails}",1) ;

            $pdf->cell(25,10,"Brake Light: ",0,1) ;
            $pdf->cell(25,8,"{$brakeLight}",1,0) ;
            $pdf->Multicell(172,8,"{$brakeLightDetails}",1) ;

            $pdf->cell(25,10,"Indicator: ",0,1) ;
            $pdf->cell(25,8,"{$indicator}",1,0) ;
            $pdf->Multicell(172,8,"{$indicatorLightDetails}",1) ;

            $pdf->cell(25,10,"Taillight: ",0,1) ;
            $pdf->cell(25,8,"{$tailLight}",1,0) ;
            $pdf->Multicell(172,8,"{$tailLightDetails}",1) ;

            $pdf->cell(25,10,"Reverse Light: ",0,1) ;
            $pdf->cell(25,8,"{$reverseLight}",1,0) ;
            $pdf->Multicell(172,8,"{$reverseLightDetails}",1) ;
            
           //$pdf->AddPage();

            $pdf->Ln(8);
            $pdf->SetFont('Arial','B',11);
            $pdf->cell(35,10,"Any obvious wiring concerns ",0,1) ;
            			$pdf->SetFont('Arial','',10);
            $pdf->cell(25,8,"{$concern}",1,0) ;
            $pdf->Multicell(172,8,"{$concernDetails}",1) ;

            $pdf->Ln(8);
            $pdf->SetFont('Arial','B',11);
            $pdf->cell(35,12,"General body condition: ",0,0) ;
            			$pdf->SetFont('Arial','',10);

            $pdf->Ln(8);
            $pdf->cell(35,10,"Are the windscreen wipers in good order ",0,1) ;
            $pdf->cell(25,8,"{$wiper}",1,0) ;
            $pdf->Multicell(172,8,"{$wiperDetails}",1) ;

            $pdf->cell(35,10,"Is the windscreen free from cracks/ chips ",0,1) ;
            $pdf->cell(25,8,"{$windScreen}",1,0) ;
            $pdf->Multicell(172,8,"{$windScreenDetails}",1) ;

            $pdf->cell(35,10,"Do all the doors lock ",0,1) ;
            $pdf->cell(25,8,"{$door}",1,0) ;
            $pdf->Multicell(172,8,"{$doorDetails}",1) ;

            $pdf->cell(35,10,"Are the side mirrors in good order ",0,1) ;
            $pdf->cell(25,8,"{$body}",1,0) ;
            $pdf->Multicell(172,8,"{$bodyDetails}",1) ;

            $pdf->cell(35,10,"Is the body free from dents/ damages ",0,1) ;
            $pdf->cell(25,8,"{$body}",1,0) ;
            $pdf->Multicell(172,8,"{$bodyDetails}",1) ;

            $pdf->cell(197,8, " ",0,1) ;

            $pdf->cell(197,8,"Anti-Theft Device: {$atd}",1,1) ;

            $pdf->cell(197,8,"Estimated value: {$value}",1,1) ;

            $pdf->cell(197,8,"Overall Comments: {$overalComment}",1,1) ;


            $pdf->AddPage();
            
            $pdf->Ln();


           // $pdf->Rotate(180);

            $pdf->Multicell(172,8,$pdf->Image("mvimg/{$mvImage}",10,20,120),0) ;
           
            

           // $pdf->Image('autoxpress.jpg',40,12,-300);
           // $pdf->cell(197,8,"IMAGE OF MV",0,1) ;
        
          //  $pdf->Image("mvimg/{$mvImage}",10,160,100) ;
           // $pdf->cell(197,8,"IMAGE OF LOG BOOK",0,1) ;
            $pdf->Multicell(172,8,$pdf->Image("img/{$logImage}",10,120,120),0) ;
           // $pdf->Image("img/{$logImage}",100,360,100) ;
           // $pdf->cell(197,8,"IMAGE OF ID",0,1) ;
           // $pdf->AcceptPageBreak(true);
            $pdf->AddPage();
            
            
           // $pdf->Image("id_Img/{$IDImage}",150,160,100) ;
           // $pdf->cell(197,8,"IMAGE OF DL",0,1) ;
           // $pdf->Multicell(172,8,$pdf->Image("dl_Upload/{$DLImage}",10,100,120),0,1) ;
           // $pdf->Image("dl_Upload/{$DLImage}",190,160,100) ;

            $pdf->Multicell(172,8,$pdf->Image("imgcarvalue/{$carvalueImage}",10,20,120),0,1) ;

            $pdf->Multicell(172,8,$pdf->Image("id_Img/{$IDImage}",10,120,120),0,1) ;
            

}

$fileName = "{$regNo} Inspection Report {$inspectionDate}.pdf" ;
$pdf->Output( './reports/'."{$fileName}", 'F');

$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.apainsurance.org';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'apa.autoxpress@apainsurance.org';                 // SMTP username
$mail->Password = 'Autoxpress12!';                           // SMTP password
//$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

$mail->setFrom('apa.autoxpress@apainsurance.org', 'APA AutoXpress');
$mail->addAddress("{$email}", "{$name}");     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('contactcentre@apollo.co.ke', 'APA AutoXpress');
$mail->addBCC('gilbert.njoroge@apollo.co.ke');
//$mail->addBCC('saagar.khimasia@apollo.co.ke');
$mail->addBCC("{$user}");
$mail->addBCC("{$APAuser}");
$mail->Subject = 'Inspection Report';
$mail->Body    = 'Please find your inspection report attached.</b>';
$mail->AltBody = 'This is your inspection report';




$pdfdoc = $pdf->Output("{$filename}", 'S');

$mail->addStringAttachment($pdfdoc, $fileName);

$mail->send();
?> 

<body>
   
      <script type="text/javascript">

         <!--
            function Redirect() {
               window.location="noback.php";
            }
            
            document.write("Inspection report has been submited successfuly...");
            setTimeout('Redirect()', 10);
         //-->
      </script>
      

   
   <body>
   </body>
</html>      