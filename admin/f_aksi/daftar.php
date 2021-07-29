<?php 
include 'koneksi.php';
use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    require 'asset/PHPMailer/src/Exception.php';
    require 'asset/PHPMailer/src/OAuth.php';
    require 'asset/PHPMailer/src/PHPMailer.php';
    require 'asset/PHPMailer/src/POP3.php';
    require 'asset/PHPMailer/src/SMTP.php';

$nim = htmlspecialchars($_POST['nim']);
$nama = htmlspecialchars($_POST['nama']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$e_password = password_hash($password, PASSWORD_DEFAULT);
$code = md5($email.date('Y-m-d'));
$id_jurusan = htmlspecialchars($_POST['id_jurusan']);
$role = htmlspecialchars($_POST['role']);
$no_tlp = htmlspecialchars($_POST['no_tlp']);
$level = 'peminjam';
$foto_u = 'pp.png';
$sql = mysqli_query($koneksi,"SELECT * FROM peminjam");
$data = mysqli_fetch_array($sql);
// cek nim
$sql = "SELECT * FROM peminjam where nim='$nim'";
    $query = mysqli_query($koneksi,$sql);
    if(mysqli_num_rows($query) > 0){
        echo "<script>alert('Anda Sudah Terdaftar Sebelumnya. Silahkan Login Menggunakan NIM / NIDN /NIP Yang Terdaftar');window.location='login.php';</script>";
    }else {
        $input = mysqli_query($koneksi,"INSERT INTO peminjam VALUES ('','$nim','$nama','$id_jurusan','$email','$no_tlp','$role','$nim','$e_password','$foto_u','$level',0,'$code')");

        //Create a new PHPMailer instance
        $mail = new PHPMailer;

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // SMTP::DEBUG_OFF = off (for production use)
        // SMTP::DEBUG_CLIENT = client messages
        // SMTP::DEBUG_SERVER = client and server messages
        $mail->SMTPDebug = SMTP::DEBUG_OFF;

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

        //Set the encryption mechanism to use - STARTTLS or SMTPS
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'rangpolpolibatam@gmail.com';

        //Password to use for SMTP authentication
        $mail->Password = 'yuqdubxtvannulte';

        //Set who the message is to be sent from
        $mail->setFrom('no-reply@yourwebsite.com', 'PR-MB Service');

        //Set an alternative reply-to address
        //$mail->addReplyTo('replyto@example.com', 'First Last');

        //Set who the message is to be sent to
        $mail->addAddress($email, $nama);

        //Set the subject line
        $mail->Subject = 'Verification Account | PR-MB';

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $body = "Hi, ".$nama."<br>please verify your email before access our website : <br> http://localhost/Rangpol1/admin/verifikasi.php?code=".$code;
        $mail->Body = $body;
        //Replace the plain text body with one created manually
        $mail->AltBody = 'Verification Account';

        //send the message, check for errors
        if (!$mail->send()) {
            echo 'Mailer Error: '. $mail->ErrorInfo;
        } else {
            echo "<script>alert('Silahkan CEK EMAIL ANDA , UNTUK MELAKUKAN VERIFIKASI');window.location='login.php';</script>";
            //Section 2: IMAP
            //Uncomment these to save your message in the 'Sent Mail' folder.
            #if (save_mail($mail)) {
            #    echo "Message saved!";
            #}
        }

    }
?>