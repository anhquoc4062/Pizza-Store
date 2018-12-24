 <?php 
      include('config.php');
      $id_lienhe= $_GET['id'];
      $qry_lienhe=mysqli_query($conn,"select * from lienhe where ID_lienhe='$id_lienhe'");
      $row=mysqli_fetch_array($qry_lienhe);
    if(isset($_POST['phanhoi'])){
      $tinphanhoi=$_POST['tinphanhoi'];
      $email=$row['Email_lienhe'];
      require '../../PHPMailer/PHPMailer/PHPMailerAutoload.php';
      //Create a new PHPMailer instance
      $mail = new PHPMailer;
      $mail -> charSet = "UTF-8";
      $mail->IsHTML(true);
      //Tell PHPMailer to use SMTP
      $mail->isSMTP();
      //Enable SMTP debugging
      // 0 = off (for production use)
      // 1 = client messages
      // 2 = client and server messages
      $mail->SMTPDebug = 0;
      //Set the hostname of the mail server
      $mail->Host = 'smtp.gmail.com';
      // use
      // $mail->Host = gethostbyname('smtp.gmail.com');
      // if your network does not support SMTP over IPv6
      //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
      $mail->Port = 587;
      //Set the encryption system to use - ssl (deprecated) or tls
      $mail->SMTPSecure = 'tls';
      //Whether to use SMTP authentication
      $mail->SMTPAuth = true;
      //Username to use for SMTP authentication - use full email address for gmail
      $mail->Username = "tlepizzastore@gmail.com";
      //Password to use for SMTP authentication
      $mail->Password = "tlepizza1998";
      //Set who the message is to be sent from
      $mail->setFrom('tlepizzastore@gmail.com');
      //Set an alternative reply-to address
      $mail->addReplyTo('tlepizzastore@gmail.com');
      //Set who the message is to be sent to
      $mail->addAddress($email);
      //Set the subject line
      $mail->Subject = 'Replied from TLE Pizza';
      //Read an HTML message body from an external file, convert referenced images to embedded,
      //convert HTML into a basic plain-text alternative body
      $mail->msgHTML($tinphanhoi, __DIR__);
      //Replace the plain text body with one created manually
      $mail->AltBody = 'Gửi mail rồi nha';
      //Attach an image file
      /*$mail->addAttachment('images/phpmailer_mini.png');*/
      //send the message, check for errors
      if ($mail->send()) {
           echo "<script type='text/javascript'>alert('Gửi phản hồi thành công')</script>";
      }
      else{
         echo "<script type='text/javascript'>alert('Gửi phản hồi không thành công')</script>";
      }
      echo '<script type="text/javascript">window.location.href="../detail-contact.php?id='.$id_lienhe.'"</script>';
    }
   ?>