<!DOCTYPE html>
<html>
    <head>
        <title>Registrer medlem</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/white.css">
    </head>
    <body>
        <?php include 'navbar.php';?>
    <h1>Send epost til medlem</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<label for="id">Medlem ID</label>
<input type="number" placeholder="Fyll inn medlemsID..." name="id" required><br><br>
<label for="melding">Melding</label>
<input type="text" placeholder="Fyll inn melding til medlem..." name="msg" required><br><br>
<label for="id">Epost du vil sende fra</label>
<input type="text" placeholder="Fyll inn epost..." name="epostsend" required><br><br>
<label for="melding">Melding</label>
<input type="password" placeholder="Fyll inn passord..." name="passordsend" required><br><br>
<input type="submit" value="Send inn" name="submit">
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



/* Exception class. */
require_once 'C:\xampp\htdocs\115-prosjekt\PHPMailer\src\PHPMailer.php';

/* The main PHPMailer class. */
require_once 'C:\xampp\htdocs\115-prosjekt\PHPMailer\src\Exception.php';

/* SMTP class, needed if you want to use SMTP. */
require 'C:\xampp\htdocs\115-prosjekt\PHPMailer\src\SMTP.php';
$conn = new mysqli("localhost", "root", "Passord123", "medlemdatabase");
$sql = "SELECT * from medlem";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    if($row['id'] == @$_POST['id']){
        $fnavn = $row['fornavn'];
        $enavn = $row['etternavn'];
        $epost = $row['epost'];
    }
}
if(isset($_POST['msg'])){
    $msg = $_POST['msg'] .  " Melding sendt til " .  $fnavn . "s konto fra Neo Ungdomsklubb";
$mail = new PHPMailer(true);


try {
  $mail->IsSMTP();
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->SMTPDebug = 1; // debugging: 1 = feil og melding, 2 = kun meldinger
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = "tls"; // påkrevd for Gmail
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 587;
  $mail->Username = @$_POST['epostsend'];
  $mail->Password = @$_POST['passordsend'];


  $mld ="OI";
  $mail->AddAddress($epost, 'Information'); 
  $mail->Subject = "$epost";
  $mail->Body = $msg;
  $mail->send();
  echo "E-post er sendt";
} catch(Exception $e) {
  echo "Noe gikk galt: " . $e->getMessage();
}
}
?> 
 </body>
</html>