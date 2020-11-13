<?php
session_start();  
require ('../isolation/functions.php');

//   CSRF攻撃対策
createToken();
  
  // エラー初期化
  $error = [];
  
  // 送信ボタンが押された時の処理
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    validateToken();
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
        header('Location: php/confirm.php');
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
        <link rel="stylesheet" type="text/css" href="./css/common.css">
        <link rel="stylesheet" type="text/css" href="./css/pc.css">
        <link rel="stylesheet" type="text/css" href="./css/tablet.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">

    </head>
    <body>
        <div class="default_bg">      
            <header>
                <i id="menu_icon" class="fas fa-bars"></i>
                    <nav id="nav_list">
                        <ul>
                            <li><a id="top_link" href="#top_area">トップページ/Top</a></li>
                            <li><a id="sec_link" href="#sec_area">プロフィール/Profile</a></li>
                            <li><a id="thi_link" href="#thi_area">お問い合わせ/Contact</a></li>
                        </ul>
                    </nav>
                    <div class="site_name">
                        <h1>REN HATTORI <br>&emsp;PHOTO GALLARY</h1>
                        <h2>#刻のしおり</h2>
                    </div>
            </header>

            <div class="whole_area">

                <main>
                    <!-- トップページ/1ページ目 -->
                    <div id="top_area">
                        <!-- 画像スライド -->
                        <div class="slider">
                            <!-- アローボタン -->
                            <div class="arrow">
                                <i id="arrow_left" class="fas fa-angle-double-left"></i>
                                <i id="arrow_right" class="fas fa-angle-double-right"></i>
                                <p class="image_area_number"></p>
                            </div>
                            <!-- １枚目 -->
                            <div id="image_area01">
                                <img  class="slide_image" src="../img/basilica_191104.jpg" width="auto" height="100%" alt="メトロポリタン大聖堂">
                                <h2>メトロポリタン大聖堂 / メキシコシティ / メキシコ </h2>
                                <ul>
                                    <li>機種： <span>NIKON/D7500</span></li>
                                    <li>焦点距離：<span>36mm</span></li>
                                    <li>撮影モード：<span>マニュアルモード</span></li>
                                    <li>絞り：<span>F8.0</span></li>
                                    <li>シャッタースピード：<span>1/400秒</span></li>
                                    <li>ISO感度：<span>400</span></li>
                                    <li>露出補正：<span>0</span></li>
                                    <li>ホワイトバランス：<span>太陽光</span></li>
                                </ul>
                            </div>
                            <!-- ２枚目 -->
                            <div id="image_area02">
                                <img  class="slide_image" src="img/mexico_city_191104.jpg" width="100%" height="auto" alt="死者の日のメキシコシティの人々">
                                <h2>死者の日 / メキシコシティ / メキシコ</h2>
                                <ul>
                                    <li>機種： <span>NIKON/D7500</span></li>
                                    <li>焦点距離：<span>150mm</span></li>
                                    <li>撮影モード：<span>マニュアルモード</span></li>
                                    <li>絞り：<span>F8.0</span></li>
                                    <li>シャッタースピード：<span>1/400秒</span></li>
                                    <li>ISO感度：<span>640</span></li>
                                    <li>露出補正：<span>0</span></li>
                                    <li>ホワイトバランス：<span>太陽光</span></li>
                                </ul>
                            </div>
                            <!-- ３枚目 -->
                            <div id="image_area03">
                                <img  class="slide_image" src="../img/teotihuacan01_191104.jpg" width="100%" height="auto" alt="月のピラミッドからの景色">
                                <h2>月のピラミッドから / テオティワカン / メキシコ / １枚目</h2>
                                <ul>
                                    <li>機種： <span>NIKON/D7500</span></li>
                                    <li>焦点距離：<span>18mm</span></li>
                                    <li>撮影モード：<span>マニュアルモード</span></li>
                                    <li>絞り：<span>F8.0</span></li>
                                    <li>シャッタースピード：<span>1/160秒</span></li>
                                    <li>ISO感度：<span>125</span></li>
                                    <li>露出補正：<span>0</span></li>
                                    <li>ホワイトバランス：<span>太陽光</span></li>
                                </ul>
                            </div>
                            <!-- ４枚目 -->
                            <div id="image_area04">
                                <img  class="slide_image" src="../img/teotihuacan02_191104.jpg" width="100%" height="auto" alt="月のピラミッドからの景色２枚目">
                                <h2>月のピラミッドから / テオティワカン / メキシコ / ２枚目</h2>
                                <ul>
                                    <li>機種： <span>NIKON/D7500</span></li>
                                    <li>焦点距離：<span>35mm</span></li>
                                    <li>撮影モード：<span>マニュアルモード</span></li>
                                    <li>絞り：<span>F1.8</span></li>
                                    <li>シャッタースピード：<span>1/1000秒</span></li>
                                    <li>ISO感度：<span>100</span></li>
                                    <li>露出補正：<span>-0.3EV</span></li>
                                    <li>ホワイトバランス：<span>太陽光</span></li>
                                </ul>
                            </div>
                            <!-- ５枚目 -->
                            <div id="image_area05">
                                <img  class="slide_image" src="img/museum_mexico_city_191102.jpg" width="100%" height="auto" alt="国立人類学物博物館">
                                <h2>国立人類学物博物館 / メキシコシティ / メキシコ</h2>
                                <ul>
                                    <li>機種： <span>NIKON/D7500</span></li>
                                    <li>焦点距離：<span>24mm</span></li>
                                    <li>撮影モード：<span>マニュアルモード</span></li>
                                    <li>絞り：<span>F9.0</span></li>
                                    <li>シャッタースピード：<span>1/100秒</span></li>
                                    <li>ISO感度：<span>400</span></li>
                                    <li>露出補正：<span>0</span></li>
                                    <li>ホワイトバランス：<span>太陽光</span></li>
                                </ul>
                            </div>
                            <!-- ６枚目 --> 
                            <div id="image_area06">
                                <img  class="slide_image" src="img/sunrise_191103.jpg" width="100%" height="auto" alt="気球から眺める夜明け">
                                <h2>気球から眺める夜明け / テオティワカン上空 / メキシコ</h2>
                                <ul>
                                    <li>機種： <span>NIKON/D7500</span></li>
                                    <li>焦点距離：<span>27mm</span></li>
                                    <li>撮影モード：<span>マニュアルモード</span></li>
                                    <li>絞り：<span>F7.1</span></li>
                                    <li>シャッタースピード：<span>1/125秒</span></li>
                                    <li>ISO感度：<span>800</span></li>
                                    <li>露出補正：<span>0</span></li>
                                    <li>ホワイトバランス：<span>太陽光</span></li>
                                </ul>
                            </div>
                            <!-- ７枚目 -->
                            <div id="image_area07">
                                <img  class="slide_image" src="img/sunset_191124.jpg" width="100%" height="auto" alt="夕日と木々のシルエット">
                                <h2>夕日と木々のシルエット / 万博公園 / 大阪</h2>
                                <ul>
                                    <li>機種： <span>NIKON/D7500</span></li>
                                    <li>焦点距離：<span>35mm</span></li>
                                    <li>撮影モード：<span>マニュアルモード</span></li>
                                    <li>絞り：<span>F1.8</span></li>
                                    <li>シャッタースピード：<span>1/1600秒</span></li>
                                    <li>ISO感度：<span>1000</span></li>
                                    <li>露出補正：<span>+1.0</span></li>
                                    <li>ホワイトバランス：<span>太陽光</span></li>
                                </ul>
                            </div>
                            <!-- ８枚目 -->
                                <div id="image_area08">
                                <img  class="slide_image" src="img/mountain_view_200815.jpg" width="100%" height="auto" alt="山の景色">
                                <h2>茶臼山からの景色 / 茶臼山 / 愛知県</h2>
                                <ul>
                                    <li>機種： <span>NIKON/D7500</span></li>
                                    <li>焦点距離：<span>170mm</span></li>
                                    <li>撮影モード：<span>マニュアルモード</span></li>
                                    <li>絞り：<span>F11.0</span></li>
                                    <li>シャッタースピード：<span>1/250秒</span></li>
                                    <li>ISO感度：<span>200</span></li>
                                    <li>露出補正：<span>0</span></li>
                                    <li>ホワイトバランス：<span>太陽光</span></li>
                                </ul>
                            </div> 
                            <!-- ９枚目 -->
                            <div id="image_area09">
                                <img  class="slide_image" src="img/water_side_200815.jpg" width="100%" height="auto" alt="水辺の写真">
                                <h2>水辺 / 新城市 / 愛知県</h2>
                                <ul>
                                    <li>機種： <span>NIKON/D7500</span></li>
                                    <li>焦点距離：<span>200mm</span></li>
                                    <li>撮影モード：<span>マニュアルモード</span></li>
                                    <li>絞り：<span>F5.6</span></li>
                                    <li>シャッタースピード：<span>1/400秒</span></li>
                                    <li>ISO感度：<span>1000</span></li>
                                    <li>露出補正：<span>0</span></li>
                                    <li>ホワイトバランス：<span>太陽光</span></li>
                                </ul>
                            </div>
                            <!-- １０枚目 -->
                            <div id="image_area10">
                                <img  class="slide_image" src="img/water_fall_shinshiro200815.jpg" width="100%" height="auto" alt="滝の写真">
                                <h2>滝 / 新城市 / 愛知県</h2>
                                <ul>
                                    <li>機種： <span>NIKON/D7500</span></li>
                                    <li>焦点距離：<span>26mm</span></li>
                                    <li>撮影モード：<span>マニュアルモード</span></li>
                                    <li>絞り：<span>F20</span></li>
                                    <li>シャッタースピード：<span>1/4秒</span></li>
                                    <li>ISO感度：<span>Lo1.0</span></li>
                                    <li>露出補正：<span>0</span></li>
                                    <li>ホワイトバランス：<span>太陽光</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 月アイコン -->
                    <i id="moon" class="fas fa-moon"></i>

                    <!-- プロフィールページ/2ページ目 -->
                    <div id="sec_area">
                        <div class="profile">
                            <h1>プロフィール / Profile</h1>
                            <h2>REN HATTORI</h2>
                            <div class="profile_text_wrapper">
                                <p>1986年生まれ<br>愛知県豊橋市出身、同県豊川市在住<br>21歳の頃１年間フィージとオーストラリアに語学留学＆ワーキングホリデーを使用して生活<br>その後30歳まで8年間テニスインストラクターとしてテニススクールへ勤務<br>趣味のカメラで撮影した写真を当サイトにて公開しております<br><br>Born in 1986<br>From Toyohashi,Aichi,Japan<br>Live in Toyokawa<br>Stayed Fiji and Australia for a year Since 21-years-old<br>Worked for Tennis Instructor for 8 years until 30-years-old<br>Release my photos that took as my hobby at this Website</p>
                            </div>
                        </div>
                    </div>

                    <!-- 月アイコン-->
                    <i id="moon_y"class="fas fa-moon"></i>

                    <!-- お問い合わせページ/3ページ目 -->
                    <div id="thi_area">
                        <div class="contact_form">
                            <h1>お問い合わせ / Contact</h1>
                            <form class="contact_form_area" action="#thi_area" method="POST">
                                <div class="input_area">
                                    <label for="name">お名前 / Name :</label>
                                    <input id="name" type="text" name="name" maxlength="100" value="<?php echo h($post['name']); ?>">
                                    <?php if ($error['name'] === 'blank'): ?>
                                        <p class="warning">*お名前を入力してください</p>
                                    <?php endif; ?>
                                </div>
                                <div class="input_area">
                                    <label for="email">メールアドレス / Email :</label>
                                    <input id="email" type="mail" name="email" maxlength="255" value="<?php echo h($post['email']); ?>">
                                    <?php if ($error['email'] === 'blank'): ?>
                                        <p class="warning">*Emailアドレスを入力してください</p>
                                    <?php endif; ?>
                                    <?php if ($error['email'] === 'email'): ?>
                                        <p class="warning">*Emailアドレスを正しく入力してください</p>
                                    <?php endif; ?>
                                </div>
                                <div class="input_area">
                                    <label for="message">お問い合わせ内容 / Message :</label>
                                    <textarea id="message" name="message" maxlength="1000"><?php echo h($post['message']); ?></textarea>
                                    <?php if ($error['message'] === 'blank'): ?>
                                        <p class="warning">*お問い合わせ内容を入力してください</p>
                                    <?php endif; ?>
                                </div>
                                <p class="notice">*返信させていただくまでに数日お待ちいただく場合もございます。
                                <br>*お問い合わせ内容によっては返信できない場合もございますので、ご了承ください。
                                </p>
                                <button type="submit">確認画面へ</button>
                                <input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
                            </form>
                        </div>
                    </div>
                </main>
            </div>
            <footer>
                <small>© REN HATTORI PHOTO GALLARY</small>
            </footer>
        </div>
                <script type="text/javascript" src="/js/common.js"></script>
     </body>
</html>