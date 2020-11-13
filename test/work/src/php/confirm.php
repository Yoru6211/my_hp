<?php 
session_start();
require ('../../isolation/functions.php');

// 直接confirm.phpにアクセスされた場合index.phpへ戻す
if(!isset($_SESSION['form'])){
    header('Location: ../index.php');
    exit();
}else{
    $post = $_SESSION['form'];
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>入力フォーム確認画面</title>
<meta name="veiwport" content="width=device-width,initial-scale = 1"> 
<link rel="stylesheet" type="text/css" href="../css/confirm.css">
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
            <p>入力内容にお間違えがなければ送信ボタンを押してください。<br>入力し直す場合は戻るボタンで戻った後、再度入力してください。</p>
           
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