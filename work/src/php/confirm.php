<?php 


require ('../../isolation/functions.php');

session_start();
$post = $_SESSION['form'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
require '../../../app/vendor/autoload.php';

$mail = new PHPMailer(true);
 
try{
    $host = 'smtp.gmail.com';
    $username = '';
    $password = '';
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $from = $post['email'];
        $fromname = 'お問い合わせフォーム';
        
        $to = '';
        $toname = 'yoru';
        
        $subject = 'お問い合わせが届きました';
        $body = <<<EOT
        名前: {$post['name']}
        メールアドレス: {$post['email']}
        お問い合わせ内容:
         {$post['message']}
        EOT;
    }
    
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = $host;
    $mail->Username = $username;
    $mail->Password = $password;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->CharSet = "utf-8";
    $mail->Encoding = "base64";
    $mail->setFrom($from,$fromname);
    $mail->addAddress($to,$toname);
    $mail->Subject = $subject;
    $mail->Body = $body;

    $mail->send();
    echo '送信完了しました';
}catch(Exception $e){
    echo 'メールの送信に失敗しました:',$mail->Erroinfo;
} 



// 直接confirm.phpにアクセスされた場合index.phpへ戻す
// if(!isset($_SESSION['form'])){
//     header('Location: ../index.php');
//     exit();
// }else{
//     $post = $_SESSION['form'];
// }

// メールの送信（メールサーバーの設定が必要）
// if($_SERVER['REQUEST_METHOD'] === 'POST'){
//     // $to = '宛先'
//     $from = $post['email'];
//     $subject = 'お問い合わせが届いています';
//     $body = <<<EOT
//         名前: {$post['name']}
//         メールアドレス: {$post['email']}
//         お問い合わせ内容: {$post['message']}
//         EOT;

//         // セッションを削除して送信完了画面へ
//         unset($_SESSON['form']);
//         header('Location: send.html');
//         exit();
// }

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>お問い合わせフォーム</title>
        <meta name="veiwport" content="width=device-width,initial-scale = 1"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">

    </head>
    
    <body>

<div class="contact-form">
                        <h1>お問い合わせ内容確認 / Confirm your Name/Email/Message</h1>
                        <form class="contact-form-area" action="" method="POST">
                            <div>
                                <label for="name">お名前 / Name :</label>
                                <p><?php echo h($post['name']); ?></p>
                            </div>
                            <div>
                                <label for="email">メールアドレス / Email :</label>
                                <p><?php echo h($post['email']); ?></p>
                            </div>
                            <div>
                            <label for="message">お問い合わせ内容 / Message :</label>
                                <p><?php echo nl2br(h($post['message'])); ?></p>
                            </div>
                            <button type="submit">戻る</button>
                            <button type="submit">送信する</button>
                        </form>
                    </div>
                    <footer>
                <small>© REN HATTORI PHOTO GALLARY</small>
            </footer>
        </div>
     </body>
</html>