<?php

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MailerController
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        // Server settings
        $this->mail->isSMTP();                                              // Send using SMTP
        $this->mail->Host = $_ENV['SMTP_HOST'] ?? '';             // Set the SMTP server to send through
        $this->mail->SMTPAuth = true;                                     // Enable SMTP authentication
        $this->mail->Username = $_ENV['SMTP_USER'] ?? '';                 // SMTP username
        $this->mail->Password = $_ENV['SMTP_PASS'] ?? '';                               // SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            // Enable TLS encryption
        $this->mail->Port = 25;                                      // TCP port to connect to, use 587 for 'PHPMailer::ENCRYPTION_STARTTLS'.
        $this->mail->CharSet = 'UTF-8';
    }


    public function generateWelcomeEmailBody($username)
    {
        $body = "<h1>Benvenuto, " . htmlspecialchars($username) . "!</h1>";
        $body .= "<p>Grazie per esserti registrato su Lega Padel. Speriamo che il nostro servizio sia di tuo gradimento.</p> ";

        $body .= "<p>Su Lega Padel, puoi creare o unirti ad altre leghe di Padel, comunicare con altri utenti, prenotare partite, monitorare i tuoi progressi e molto altro. È la piattaforma ideale per gli amanti del Padel che cercano un modo semplice e divertente per organizzare e partecipare a leghe.</p>";

        $body .= "<p>Se hai domande su come funziona Lega Padel, visita la nostra <a href='https://liga-padel.pt/faq'>FAQ</a>.</p>";

        $body .= "<p>Non vediamo l'ora di vederti in campo!</p>";

        return $body;
    }



    public function sendWelcomeEmail($to, $username)
    {
        $subject = "Benvenuto su Lega Padel!";
        $body = $this->generateWelcomeEmailBody($username);
        $this->sendEmail($to, $subject, $body);
    }

    public function sendEmail($to, $subject, $body)
    {
        $mail = $this->mail;

        try {
            //Server settings
            $mail->SMTPDebug = 2; // Enable verbose debug output
            $mail->isSMTP(); // Send using SMTP
            $mail->Host = $this->mail->Host; // Set the SMTP server to send through
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = $this->mail->Username; // SMTP username
            $mail->Password = $this->mail->Password; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption;
            $mail->Port = $this->mail->Port; // TCP port to connect to

            //Recipients
            $mail->setFrom('admin@liga-padel.pt', 'Liga de Padel');
            $mail->addAddress($to); // Add a recipient

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->Timeout = 10; // Timeout in seconds

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }

    public function sendPasswordResetEmail($to, $resetLink)
    {
        $subject = "Reimpostazione Password - Lega Padel";
        $body = $this->generateResetEmailBody($resetLink);
        $this->sendEmail($to, $subject, $body);
    }

    private function generateResetEmailBody($resetLink)
    {
        $body = "<h1>Reimpostazione Password</h1>";
        $body .= "<p>Abbiamo ricevuto una richiesta per reimpostare la tua password su Lega Padel.</p>";
        $body .= "<p>Clicca sul link qui sotto per reimpostare la tua password:</p>";
        $body .= "<a href='" . htmlspecialchars($resetLink) . "'>Reimposta Password</a>";
        $body .= "<p>Se non hai richiesto la reimpostazione della password, ignora questa e-mail.</p>";
        return $body;
    }
    public function sendLeagueInvitationEmail($to, $leagueName, $invitationLink)
    {
        $subject = "Invito per {$leagueName} - Lega Padel";
        $body = $this->generateLeagueInvitationEmailBody($leagueName, $invitationLink);
        return $this->sendEmail($to, $subject, $body);
    }

    private function generateLeagueInvitationEmailBody($leagueName, $invitationLink)
    {
        $body = "<h1>Invito</h1>";
        $body .= "<p>Sei stato invitato a unirti alla lega " . htmlspecialchars($leagueName) . " su Lega Padel.</p>";
        $body .= "<p>Clicca sul link sottostante per accettare l'invito:</p>";
        $body .= "<a href='" . htmlspecialchars($invitationLink) . "'>Accetta Invito</a>";
        $body .= "<p>Se non ti aspettavi questo invito, ignora questa e-mail.</p>";
        return $body;
    }

}
