<?php 
session_start();
require ('../../isolation/functions.php');
require ('personal.php');


// 直接send.phpにアクセスされた場合index.phpへ戻す
if(!isset($_SESSION['form'])){
    header('Location: ../index.php');
    exit();
}else{
    $post = $_SESSION['form'];
}



// PHPMailer読み込み
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



 // データベースへお問い合わせ情報を保存
 try{
    $db = new PDO('mysql:dbname=my_hp_db;host=192.168.0.3;charset=utf8', 'root', '98765');
}catch(PDOException $e){
    echo 'データベースに接続できませんでした' . $e->getMessage();
}

$sql = "INSERT INTO contact (name, email, message, created) VALUES(:name, :email, :message, now())";

$stmt = $db->prepare($sql);

$params = array(':name' => $post['name'], ':email' => $post['email'], ':message' => $post['message']);

$stmt->execute($params);


// PHPMailer
require '../../../app/vendor/autoload.php';

$mail = new PHPMailer(true);

// 例外処理
try{
// Gmailの認証
$host = 'smtp.gmail.com';
$username = $my_account;
$password = $my_password;

// 差し出し
$sender = $post['email'];
$fromname = 'お問い合わせフォーム';

// 宛先
$to = $receive;
$toname = 'yoru';

// 件名・内容
$subject = 'お問い合わせが届きました';
$body = <<<EOT
名前: {$post['name']}
メールアドレス: {$post['email']}
お問い合わせ内容:
    {$post['message']}
EOT;

// $mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = $host;
$mail->Username = $username;
$mail->Password = $password;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->CharSet = "utf-8";
$mail->Encoding = "base64";
$mail->setFrom($sender,$fromname);
$mail->addAddress($to,$toname);
$mail->Subject = $subject;
$mail->Body = $body;

$mail->send();
unset($_SESSION['form']);


}catch(Exception $e){
echo 'メールの送信に失敗しました。';
echo 'もう一度送信いただくか少しお時間をおいてから再度送信してください。';
exit();
} 

?> 

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>送信完了</title>
<meta name="veiwport" content="width=device-width,initial-scale = 1"> 
<link rel="stylesheet" type="text/css" href="../css/send.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">

</head>

<body>
    <main>
        <div class="send">
            <h1>お問い合わせありがとうございます。送信が完了いたしました。</h1>
            <p>*返信させていただくまでに数日お待ちいただく場合もございます。
            <br>*お問い合わせ内容によっては返信できない場合もございますので、ご了承ください。
            </p>
            <a href="../index.php">トップページへ戻る</a>       
        </div>
    <main>
    <footer>
        <small>© REN HATTORI PHOTO GALLARY</small>
    </footer>
</body>
</html>