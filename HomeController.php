
<?php
namespace App\Controller;
use Cake\Core\Configure;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Mailer\Email;

class HomeController extends AppController
{
	public function beforeFilter(Event $event)
    {
   
    }

    public function index()
    {

	
    }

	public function sendMail()
	{
		$to = 'vinay@radicalreflex.com';			
		$message = '<h1 style="color:#bbb;">This is testing mail </h1>';
		$subject = 'Test By Vinay';		
		require_once(ROOT.'\vendor\mail\PHPMailerAutoload.php');
		$mail = new \ PHPMailer();		
		$mail->charSet ='Content-type: text/html; charset=iso-utf8' . "\r\n";
		$mail->IsSMTP();
		//$mail->MIME-Version ='1.0';
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Port = 25;
		$mail->SMTPSecure = 'tls';		
		$mail->Username = 'vinay.radicalreflex@gmail.com';
		$mail->Password = 'Radical@Reflex';		
		$mail->SetFrom('vinaykr.bca@gmail.com', 'vinay');
		$mail->AddReplyTo("vinaykr.bca@gmail.com", "Vinay");
		$mail->AddCc("vinaykr.bca@gmail.com", "Vinay");
		$mail->Subject = $subject;		
		$mail->msgHTML($message);
		$mail->addAddress($to);
		//$var=$mail->send();
		if (!$mail->send()) {
		$error = "Mailer Error: " . $mail->ErrorInfo;
		echo '<p id="para">'.$error.'</p>';
		}
		else {
		echo '<p id="para">Message sent!</p>';
		}		
		exit;
	}


}

?>
