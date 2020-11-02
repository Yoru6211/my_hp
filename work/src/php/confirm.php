<?php 
session_start();
require ('../../isolation/functions.php');

// 直接confirm.phpにアクセスされた場合index.phpへ戻す
// if(!isset($_SESSION['form'])){
//     header('Location: ../index.php');
//     exit();
// }else{
//     $post = $_SESSION['form'];
// }

// // PHPMailer読み込み
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// if($_SERVER['REQUEST_METHOD'] === 'POST'){

//     // データベースへお問い合わせ情報を保存
//     try{
//         $db = new PDO('mysql:dbname=my_hp_db;host=192.168.0.4;charset=utf8', 'root', '98765');
//     }catch(PDOException $e){
//         echo 'データベースに接続できませんでした' . $e->getMessage();
//     }

//     $sql = "INSERT INTO contact (name, email, message, created) VALUES(:name, :email, :message, now())";

//     $stmt = $db->prepare($sql);

//     $params = array(':name' => $post['name'], ':email' => $post['email'], ':message' => $post['message']);

//     $stmt->execute($params);


//     // PHPMailer
//     require '../../../app/vendor/autoload.php';

//     $mail = new PHPMailer(true);

//     // 例外処理
//     try{
//     // Gmailの認証
//     $host = 'smtp.gmail.com';
//     $username = $my_account;
//     $password = $my_password;

//     // 差し出し
//     $sender = $post['email'];
//     $fromname = 'お問い合わせフォーム';

//     // 宛先
//     $to = $receive;
//     $toname = 'yoru';

//     // 件名・内容
//     $subject = 'お問い合わせが届きました';
//     $body = <<<EOT
//     名前: {$post['name']}
//     メールアドレス: {$post['email']}
//     お問い合わせ内容:
//         {$post['message']}
//     EOT;

//     $mail->SMTPDebug = 2;
//     $mail->isSMTP();
//     $mail->SMTPAuth = true;
//     $mail->Host = $host;
//     $mail->Username = $username;
//     $mail->Password = $password;
//     $mail->SMTPSecure = 'tls';
//     $mail->Port = 587;
//     $mail->CharSet = "utf-8";
//     $mail->Encoding = "base64";
//     $mail->setFrom($sender,$fromname);
//     $mail->addAddress($to,$toname);
//     $mail->Subject = $subject;
//     $mail->Body = $body;

//     $mail->send();
//     unset($_SESSION['form']);
//     exit();

//     }catch(Exception $e){
//     echo 'メールの送信に失敗しました: ' . $mail->Errorinfo;
//     } 
// }
// ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>お問い合わせフォーム</title>
<meta name="veiwport" content="width=device-width,initial-scale = 1"> 
<link rel="stylesheet" type="text/css" href="../css/common.css">
<link rel="stylesheet" type="text/css" href="../css/confirm.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">

</head>

<body>
    <div class="confirm_area">
        <h1>お問い合わせ内容確認</h1>
        <form action="send.php" method="POST">
            <div class="user">
                <table>
                    <tr>
                        <th>お名前 / Name</th><td><?php echo h($post['name']); ?></td>
                    </tr>
                    <tr>
                        <th>メールアドレス / Email</th><td><?php echo h($post['email']); ?></td>
                    </tr>
                    <tr>
                        <th>お問い合わせ内容 / Message</th><td><?php echo nl2br(h($post['message'])); ?></td>
                    </tr>
                    

                </table>
            </div>
            <p></p>
            <div class="buttons">
                <a href="../index.php">戻る</a>
                <button type="submit">送信する</button>
            </div>
        </form>
    </div>
    <footer>
        <small>© REN HATTORI PHOTO GALLARY</small>
    </footer>
</body>
</html>