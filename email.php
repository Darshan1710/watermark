<?php

 $name=$_POST['name'];
 $cperson=$_POST['cperson'];
 $mobile=$_POST['mobile'];
 $tel=$_POST['tel'];
 $email=$_POST['email'];
 $webaddress=$_POST['webaddress'];
 $stall=$_POST['stall'];
 $exibition=$_POST['exibition'];
 $edate=$_POST['edate'];
 $ssize=$_POST['ssize'];
 $sideopen=$_POST['sideopen'];
 $hallno=$_POST['hallno'];
 $stallno=$_POST['stallno'];
 

//$to = "mcohen@meridianrecycling.com , info@meridianrecycling.com";
$to="careers@water-mark.in";
$subject = "Enquiry From Watermark Website";
$from = $email;

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
Name:$name<br />
Contact Person:$cperson<br />
Mobile No.:$mobile<br />
Telephone No.:$tel<br />
Email: $email<br/>
Web Address: $webaddress<br />
Stall: $stall<br />
Exibition: $exibition<br />
Exibition date: $edate<br />
Stall Size: $ssize<br />
No of sides open: $sideopen<br />
Hall No : $hallno<br />
Stall No: $stallno<br />

</body>
</html>
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
// More headers
$headers .= "From:$name<$from>" . "\r\n";
if(mail($to,$subject,$message,$headers))
{
	echo "<script>alert('Thank You! Your Enquiry has been submited!'); </script>";
	echo "<script type='text/javascript'>window.location='contact.html';</script>";
	
}



?>
		
	

