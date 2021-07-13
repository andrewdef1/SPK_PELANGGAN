 <!-- Page Content -->
 <?php 
	//Load Composer's autoloader
include('../../koneksi.php');
require '../../../vendor/autoload.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

	$id = $_GET['id'];
	$qe = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE no_pel='$id'") or die (mysqli_error());
    
    $no=1; 
    while ($qpeser = mysqli_fetch_array($qe)) { //fetch the result from query into an array
    ?>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="panel-group">
                    <div class="panel panel-default" >
                        <div class="panel-heading" style="">
                            <div class="row">
                                <div class="col-md-12 p-5 pt-2">
                                    <h3><i class="fas fa-home mr-3"></i>SEND MAIL - PELANGGAN PEMENANG</h3><hr>
                                    
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a href="obat.php" class="btn btn-primary mb-3" style="color: white; margin-bottom: 5px;"><i class="fas fa-backward mr-2"></i>BACK</a>
                                        </h4>
                                    </div>
                                    
                                        <form method="post">
                                        <thead>
                                        
                                        <tr>
                                            <div class="form-group">
                                                <td>No Pelanggan</td>
                                                <td><input class="form-control" type="text" name="no_pel" id="no_pel" size="50" readonly="" value="<?php echo $qpeser ['no_pel'] ?>"></td>
                                            </div>
				                        </tr>
            
                                        <tr>
                                            <div class="form-group">
                                                <td>Nama </td>
                                                <td><input class="form-control" type="text" name="nama" id="nama" size="50" placeholder="Nama" required="required" readonly value="<?php echo $qpeser ['nama'] ?>"></td>
                                            </div>
                                        </tr>

                                        <tr>
                                            <div class="form-group">
                                                <td>Email</td>
                                                <td><input class="form-control" type="email" name="email" id="email" size="50" placeholder="Email" required="required" readonly value="<?php echo $qpeser ['email'] ?>"></td>
                                            </div>
                                        </tr>

                                        <tr>
                                            <div class="form-group">
                                                <td>No Telepon</td>
                                                <td><input class="form-control" type="text" name="telp" id="telp" size="50" placeholder="No Telepon" required="required" readonly value="<?php echo $qpeser ['telp'] ?>"></td>
                                            </div>
                                        </tr>

                                        <tr>
                                            <div class="form-group">
                                                <td>Tanggal</td>
                                                <td><input class="form-control" type="date" name="haritt" id="haritt" size="50" placeholder="Hari, Tanggal" required="required" ></td>
                                            </div>
                                        </tr>

                                        <tr>
                                            <div class="form-group">
                                                <td>Tempat Selenggara</td>
                                                <td><input class="form-control" type="text" name="tempat" id="tempat" size="50" placeholder="Tempat Selenggara" required="required" ></td>
                                            </div>
                                        </tr>

                                       <tr>
                                            <div class="form-group">
                                                <button type="submit" name="mailsend" value="Simpan" class="btn btn-primary">Send Mail</button>
                                            </div>   
                                        </tr>

                                        <?php
    }
                                            if (isset($_POST['mailsend'])) {
                                                $no_pel = $_POST['no_pel'];
                                                $nama = $_POST['nama'];
                                                $email = $_POST['email'];
                                                $telp = $_POST['telp'];
                                                $haritt = $_POST['haritt'];
                                                $tempat = $_POST['tempat'];
                                                

try {

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.googlemail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'drewdefretes@gmail.com';                     //SMTP username
    $mail->Password   = 'Maret1999$';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('drewdefretes@gmail.com', 'Telkomsel');
    $mail->addAddress($email, $nama);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('drewdefretes@gmail.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
  //  $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                //Set email format to HTML
    $mail->Subject = 'UNDANGAN PEMENANG PELANGGAN TERBAIK';
    $mail->Body    = "
    <head>
      <style>
        table, td, div, h1, p {font-family: Arial, sans-serif;}
      </style>
    </head>
    <body style='margin:0;padding:0;'>
      <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;'>
        <tr>
          <td align='center' style='padding:0;'>
            <table role='presentation' style='width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;'>
              <tr>
                <td align='center' style='padding:40px 20px 30px 20px;background:whitesmoke'>
                  <table>
                      <tr>
                  <td><img src='' alt='telkom' width='300' style='height:auto;display:block;' />
                  </td>
                  <td><img src='' alt='bumn' width='300' style='height:auto;display:block;' />
                  </td>
                </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td style='padding:36px 30px 42px 30px;'>
                  <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;'>
                    <tr>
                      <td style='padding:0 0 36px 0;color:#153643;'>
                        <hr style='color:#153643;'>
                        <h1 style='font-size:24px;margin:20px 0 20px 0;font-family:Arial,sans-serif;color: #4472C4;' align='center'>INDIHOME CUSTOMER GATHERING</h1>
                        <hr style='color:#153643;'>
                        
                        <h2 style='font-size:22px;margin:25px 0 20px 0;font-family:Arial,sans-serif;color: black;' align='center'>SELAMAT</h2>
                        <h3 style='margin:15px 0 20px 0;color: black;' align='center'>Kepada :</h3>
                        <h2 style='font-size:25px;margin:20px 0 10px 0;font-family:Arial,sans-serif;color: black;' align='center'>$nama</h2>
                        <p style='font-size:20px;margin:0 0 5px 0;font-family:Arial,sans-serif;color: black;' align='center'>$no_pel</p>
                        <p style='font-size:20px;margin:0 0 5px 0;font-family:Arial,sans-serif;color: black;' align='center'>$email</p>
                        <p style='font-size:20px;margin:0 0 25px 0;font-family:Arial,sans-serif;color: black;' align='center'>$telp</p>
                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;' align='center'>Terimakasih telah menjadi pelanggan setia kami,</p>
                        <p style='margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'>Mohon kesediaaanya hadir dalam <strong>INDIHOME CUSTOMER GATHERING</strong>, yang akan diselenggarakan pada:</p>
                        <table style='border: 0; padding-top: 10px;'>
                            <tr>
                                <td>Hari</td>
                                <td>: </td>
                                <td> $haritt</td>
                            </tr>
                            <tr>
                                <td>Tempat</td>
                                <td>: </td>
                                <td> $tempat</td>
                            </tr>
                            <tr>
                                <td style='padding-top: 15px;'><p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'>Kehadiran anda sangat kami nantikan. </p></td>
                            </tr>
                        </table>
                      
                      </td>
                    </tr>
                    
                  </table>
                </td>
              </tr>
              <tr>
                <td style='padding:5px;background:#ee4c50;'>
                  <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;'>
                    <tr>
                      <td style='padding:0;width:50%;' align='left'>
                        <p style='margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;'>
                            Untuk info lebih lanjut, hubungi admin kami di <br/><p style='font-size:15px;color:#ffffff;text-decoration:underline;'>0967-343433</p>
                        </p>
                      </td>
                      <td style='padding:0;width:50%;' align='right'>
                        <table role='presentation' style='border-collapse:collapse;border:0;border-spacing:0;'>
                          <tr>
                            <td style='padding:0 0 0 10px;width:38px;'>
                             <img src='https://www.telkom.co.id/data/image_upload/page/1594108255409_compress_logo%20telkom%20indonesia.png' alt='telkom' width='100' style='height:auto;display:block;border:0;' />
                            </td>
                            <td style='padding:0 0 0 10px;width:38px;'>
                              <img src='https://1.bp.blogspot.com/-_Mg-3HifAas/X0JjnJRTgII/AAAAAAAAHD0/CwkFvAh9KGUYhpQMr71v0idEYMRilR6ywCLcBGAsYHQ/s1000/logo-bumn-terbaru.png' alt='bumn' width='100' style='height:auto;display:block;border:0;' />
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </body>
    </html>";
   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

                                            }
                                        
                                        ?>                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->