// ハンバーガーメニューのための定数設定
const menuIcon = document.getElementById('menu_icon');
const navList = document.getElementById('nav_list');
const menuBg = document.querySelector('.wrap_menu');
const topLink = document.getElementById('top_link');
const secLink = document.getElementById('sec_link');
const thiLink = document.getElementById('thi_link');

    // クリックしたら開いて「×」ボタンを押したら閉じる
    //クローズメニューの関数
    function closeMenu(){
    navList.style.display = 'none';
    menuBg.style.backgroundColor = 'transparent';
    menuIcon.className = 'fa fa-bars';
   }

    menuIcon.addEventListener('click', () =>{
        if(navList.style.display == 'block'){
            closeMenu();
        }else{
            navList.style.display = 'block';
            menuBg.style.backgroundColor = '#6b778d';
            menuIcon.className = 'fa fa-times';
        }
    });
    
        // ハンバーガーメニューのリンクをクリックしたらメニューを閉じる
        topLink.addEventListener('click', () =>{
            closeMenu();
        });

        secLink.addEventListener('click', () =>{
            closeMenu();
        });

        thiLink.addEventListener('click', () =>{
            closeMenu();
        });


// 背景色変更のための定数設定
const default_bg = document.querySelector(".default_bg");
const topArea = document.getElementById("top_area");
const secArea = document.getElementById("sec_area");
const thrArea = document.getElementById("thr_area");
const page_h = document.getElementById('top_area').clientHeight;

    // スクロールによる背景色変更
    window.addEventListener('scroll', () => {
        let scroll = window.pageYOffset;
        let h = page_h;

        if(scroll >= 0 && scroll < h){
            default_bg.className = 'top_area_bg';
        }else if(scroll >= h && scroll < h * 2){
            default_bg.className = 'sec_area_bg';
        }else if(scroll >= h * 2 && scroll < h * 3){
            default_bg.className = 'thi_area_bg';
        }
    });
