<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // PHPMailer'ı projenize eklediğiniz yer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $mail = new PHPMailer(true);

    try {
        // SMTP Sunucu Ayarları
        $mail->isSMTP();
        $mail->Host = 'smtp.yourhosting.com'; // Hosting sağlayıcınızın SMTP sunucu adresi
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@domain.com'; // Hosting e-posta adresiniz
        $mail->Password = 'your-email-password'; // Hosting e-posta şifreniz
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Güvenlik protokolü (TLS önerilir)
        $mail->Port = 587; // SMTP portu (587 genellikle TLS için)

        // E-posta Ayarları
        $mail->setFrom('your-email@domain.com', 'AküServ'); // Gönderen e-posta ve adı
        $mail->addAddress('caranletgo@gmail.com'); // Alıcı e-posta adresi
        $mail->Subject = 'Yeni Abone';
        $mail->Body = "Yeni bir kullanıcı abone oldu. E-posta: " . $email;

        $mail->send();
        echo 'success';
    } catch (Exception $e) {
        echo "E-posta gönderilemedi. Hata: {$mail->ErrorInfo}";
    }
}
?>
