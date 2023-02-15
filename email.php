<?phpsession_start();use PHPMailer\PHPMailer\PHPMailer;use PHPMailer\PHPMailer\Exception;require 'PHPMailer-master/src/Exception.php';require 'PHPMailer-master/src/PHPMailer.php';require 'PHPMailer-master/src/SMTP.php'; unset($_SESSION['errors']); $name=$_POST['name']; $error = false; if(!isset($name) || empty($name)){  $_SESSION['errors']['name'] = 'Name is required';  $error = true; } $cperson=$_POST['cperson'];if(!isset($cperson) || empty($cperson)){ $_SESSION['errors']['cperson'] = 'Contact Person is required'; $error = true;} $mobile=$_POST['mobile'];if(!isset($cperson) || empty($cperson)){ $_SESSION['errors']['mobile'] = 'Mobile is required'; $error = true;}else if(!preg_match('/^[0-9]{10}$/', $mobile)){ $_SESSION['errors']['mobile'] = 'Mobile Number is invalid'; $error = true;} $tel=$_POST['tel'];if(!isset($tel) || empty($tel)){ $_SESSION['errors']['tel'] = 'Telephone is required';}elseif(is_numeric($tel)){ $_SESSION['errors']['tel'] = 'Telephone Number is invalid';} $email=$_POST['email'];if(!isset($email) || empty($email)){ $_SESSION['errors']['email'] = 'Email is required'; $error = true;}elseif(filter_var(filter_var($email, FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL)){ $_SESSION['errors']['email'] = 'Email is invalid'; $error = true;} $webaddress=$_POST['webaddress'];if(!isset($webaddress) || empty($webaddress)){ $_SESSION['errors']['webaddress'] = 'Webaddress is required'; $error = true;}else if(!is_valid_domain_name($webaddress)){ $_SESSION['errors']['webaddress'] = 'Invalid Website'; $error = true;}function is_valid_domain_name($domain_name){ return (preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain_name) //valid chars check     && preg_match("/^.{1,253}$/", $domain_name) //overall length check     && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain_name)   ); //length of each label} $stall=$_POST['stall'];if(!isset($stall) || empty($stall)){ $_SESSION['errors']['stall'] = 'Stall is required'; $error = true;} $exibition=$_POST['exibition'];if(!isset($exibition) || empty($exibition)){ $_SESSION['errors']['exibition'] = 'Exibhition is required'; $error = true;} $edate=$_POST['edate'];if(!isset($edate) || empty($edate)){ $_SESSION['errors']['edate'] = 'Date is required'; $error = true;} $ssize=$_POST['ssize'];if(!isset($ssize) || empty($ssize)){ $_SESSION['errors']['ssize'] = 'Stall Size is required'; $error = true; $error = true;} $sideopen=$_POST['sideopen'];if(!isset($sideopen) || empty($sideopen)){ $_SESSION['errors']['sideopen'] = 'Side Open is required'; $error = true;} $hallno=$_POST['hallno'];if(!isset($hallno) || empty($hallno)){ $_SESSION['errors']['hallno'] = 'Hall No is required';} $stallno=$_POST['stallno'];if(!isset($hallno) || empty($hallno)){ $_SESSION['errors']['stallno'] = 'Stall No is required'; $error = true;}//$to = "mcohen@meridianrecycling.com , info@meridianrecycling.com";if(!$error) { $to = "careers@water-mark.in"; $subject = "Enquiry From Watermark Website"; $mail = new PHPMailer(); $mail->IsSMTP(); $mail->Mailer = "smtp"; $mail->SMTPDebug = 1; $mail->SMTPAuth = TRUE; $mail->SMTPSecure = "tls"; $mail->Port = 587; $mail->Host = "smtp.gmail.com"; $mail->Username = "smartads.darshan@gmail.com"; $mail->Password = "rvzgzalbtnjuhxcc"; $mail->IsHTML(true); $mail->AddAddress("kinidarshan07@gmail.com", "Customer"); $mail->SetFrom("darshankini1994@gmail.com", "Watermark"); $mail->AddReplyTo("darshankini1994@gmail.com", "Watermark"); $mail->AddCC("darshankini1994@gmail.com", "Watermark"); $mail->Subject = "Enquiry"; $message = "<html><head><title>HTML email</title></head><body>Name:$name<br />Contact Person:$cperson<br />Mobile No.:$mobile<br />Telephone No.:$tel<br />Email: $email<br/>Web Address: $webaddress<br />Stall: $stall<br />Exibition: $exibition<br />Exibition date: $edate<br />Stall Size: $ssize<br />No of sides open: $sideopen<br />Hall No : $hallno<br />Stall No: $stallno<br /></body></html>"; $mail->MsgHTML($message); if (!$mail->Send()) {  echo "<pre>";  print_r($mail);  exit;  header('contact.php'); } else {  echo "<script>alert('Thank You! Your Enquiry has been submited!'); </script>";  echo "<script type='text/javascript'>window.location='contact.html';</script>"; }}else{ header("Location: contact.php");}?>			