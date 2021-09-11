<?php
// 默认关闭自动邮件提醒，如有需求请自己填入SMTP相关信息, 并使用vendor安装依赖项PHPMailer.

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require '../vendor/autoload.php';

include_once ('function.php');
session_start();
$_SESSION['text'] = $_POST['qusetion'];
if ($_SESSION['text'] != '') {
	// $mail = new PHPMailer(true);
	// $mail->CharSet ="UTF-8";
	// $mail->SMTPDebug = 0;
	// $mail->isSMTP();
	// $mail->Host = ''; //STMP host
	// $mail->SMTPAuth = true;
	// $mail->Username = ''; //STMP 账号
	// $mail->Password = ''; //STMP 密码
	// $mail->SMTPSecure = 'ssl';
	// $mail->Port = 465;

	// $mail->setFrom('', '匿名提问箱'); //邮件发送地址
	// $mail->addAddress(''); //邮件接收地址

	// $mail->isHTML(true);
	// $mail->Subject = "收到一份匿名提问";
	rewrite(2, $_SESSION['text']);
	// $mail->Body    = $_SESSION['text'];
	// $mail->AltBody = $_SESSION['text'];

	// $mail->send();
} else {
	die("您未填写信息哦");
}
?>
<script>
	window.location.replace('new.php');
</script>