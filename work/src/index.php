<?php

require('../isolation/functions.php');

session_start();
$error = [];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $post = filter_input_array(INPUT_POST, $_POST);
    // フォーム送信時のエラーチェック
    if ($post['name'] === ''){
        $error['name'] = 'blank';
    }
    if ($post['email'] === ''){
        $error['email'] = 'blank';
    }else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
        $error['email'] = 'email';
    }
    if ($post['message'] === ''){
        $error['message'] = 'blank';
    }
    // エラーがなければ確認画面へ
    if(count($error) === 0){
        $_SESSION['form'] = $post;
        header('Location: http://localhost:8080/php/confirm.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>RenHattori PhotoGallery</title>
        <meta name="veiwport" content="width=device-width,initial-scale = 1"> 
        <link rel="stylesheet" href="http://localhost:8080/css/common.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">

    </head>
    <body>

        <div class="default_bg">
            <header>
                <div class="wrap_menu">
                    <h1>REN HATTORI <br>　PHOTO GALLARY</h1>
                    <h2>#刻のしおり</h2>
                    <i id="menu_icon" class="fas fa-bars"></i>
                    <nav id="nav_list">
                        <ul>
                            <li><a href="">新着情報<br>New</a></li>
                            <li><a href="">プロフィール<br>Profile</a></li>
                            <li><a href="">フォトギャラリー<br>PhotoGallery</a></li>
                            <li><a href="">ブログ<br>Blog</a></li>
                            <li><a href="">お問い合わせ<br>Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
            <main>
                <section id="top_area">
                        <img class="top_image" src="../img/basilica.jpg" width="100%" height="auto" alt="メトロポリタン大聖堂の画像">
                        <i id="arrow_left" class="fas fa-chevron-circle-left"></i>
                        <i id="arrow_right" class="fas fa-chevron-circle-right"></i>
                </section>
                <section id="sec_area">
                    <h1>新着情報 / New</h1>
    
                    <img class="new_img" src="../img/dragonfly.jpg">
                    <p class="new_text_right">テストテキストテストテキストテストテキストテストテキスト<br>abcdefghijklmnopqrstuvwxyz<br>123456789101112131415161718192021222324252627282930</p>
    
                    <img class="new_img_right" src="../img/dragonfly.jpg">
                    <p class="new_text_left">テストテキストテストテキストテストテキストテストテキスト<br>abcdefghijklmnopqrstuvwxyz<br>123456789101112131415161718192021222324252627282930</p>
    
                    <img class="new_img" src="../img/dragonfly.jpg">
                    <p class="new_text_right">テストテキストテストテキストテストテキストテストテキスト<br>abcdefghijklmnopqrstuvwxyz<br>123456789101112131415161718192021222324252627282930</p>
                </section>
                <section id="thr_area">
                    <h1>プロフィール / Profile</h1>
                    <h2 class="my_name">REN HATTORI</h2>
                    <div class="profile_text_wrapper">
                    <p class="profile_text">1986年生まれ<br>愛知県豊橋市出身、同県豊川市在住<br>21歳の頃１年間フィージとオーストラリアに語学留学＆ワーキングホリデーを使用して生活<br>その後30歳まで8年間テニスインストラクターとしてテニススクールへ勤務<br>趣味のカメラで撮影した写真を当サイトにて公開しております<br><br>Born in 1986<br>From Toyohashi,Aichi,Japan<br>Live in Toyokawa<br>Stayed Fiji and Australia for a year Since 21-years-old<br>Worked for Tennis Instructor for 8 years until 30-years-old<br>Release my photos that took as my hobby at this Website</p>
                    </div>
                </section>
                <section id="for_area">

                </section>
                <section id="fif_area">
                    <div class="contact-form">
                        <h1>お問い合わせ / Contact</h1>
                        <form class="contact-form-area" action="" method="POST" novalidate>
                            <div>
                                <label for="name">お名前 / Name :</label>
                                <input id="name" type="text" name="name" value="<?php echo h($post['name']); ?>" required>
                                <?php if ($error['name'] === 'blank'): ?>
                                    <p>*お名前を入力してください</p>
                                <?php endif; ?>
                            </div>
                            <div>
                                <label for="email">メールアドレス / Email :</label>
                                <input id="email" type="mail" name="email" value="<?php echo h($post['email']); ?>" required>
                                <?php if ($error['email'] === 'blank'): ?>
                                    <p>*Emailアドレスを入力してください</p>
                                <?php endif; ?>
                                <?php if ($error['email'] === 'email'): ?>
                                    <p>*Emailアドレスを正しく入力してください</p>
                                <?php endif; ?>
                            </div>
                            <div>
                                <label for="message">お問い合わせ内容 / Message :</label>
                                <textarea id="message" name="message" cols="20" rows="4" maxlength="20" required><?php echo h($post['message']); ?></textarea>
                                <?php if ($error['message'] === 'blank'): ?>
                                    <p>*お問い合わせ内容を入力してください</p>
                                <?php endif; ?>
                            </div>
                            <button type="submit">確認画面へ</button>
                        </form>
                    </div>
                </section>
            </main>
            <footer>
                <small>© REN HATTORI PHOTO GALLARY</small>
            </footer>
        </div>
                <script type="text/javascript" src="http://localhost:8080/js/common.js"></script>
     </body>
</html>