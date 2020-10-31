// ハンバーガーメニュー
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
    menuBg.style.display = 'none';
    menuIcon.className = 'fa fa-bars';
   }

    menuIcon.addEventListener('click', () =>{
        if(navList.style.display == 'block'){
            closeMenu();
        }else{
            navList.style.display = 'block';
            // menuBg.style.display = 'block';
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



// トップページ画像のスライド
const preArrow = document.getElementById('arrow_left');
const nextArrow = document.getElementById('arrow_right');
const imageArea = document.querySelector('.image_area');
const slideImage = document.querySelector('.slide_image');
// const images = [
//     "../img/basilica.jpg",
//     "../img/sunrise_191103.jpg",
//     "../img/teotihuacan01_191104.jpg",
//     "../img/teotihuacan02_191104.jpg",
// ];

// トップページ/画像エリアスライド切り替え
let area01 = document.getElementById('image_area01');
let area02 = document.getElementById('image_area02');
let area03 = document.getElementById('image_area03');
let imageAreas = [
    area01,
    area02,
    area03,
];
// デフォルト設定
let currentIndex = 0;
imageAreas[currentIndex].style.display = "block";
imageAreas[currentIndex].classList.remove("blur");

    // 次のページへ切り替え
    nextArrow.addEventListener('click', () =>{
        // imageAreas[currentIndex].classList.add("add_blur");
        imageAreas[currentIndex].style.display = "none";
        currentIndex++;
        imageAreas[currentIndex].style.display = "block";
        imageAreas[currentIndex].classList.add("remove_blur");
        if(currentIndex === imageAreas.length -1){
            nextArrow.style.visibility = "hidden";
        }else if(currentIndex > 0){
            preArrow.style.visibility = "visible";
        } 
    });
    // 前のページへ戻る
    preArrow.addEventListener('click', () =>{
        imageAreas[currentIndex].style.display = "none";
        currentIndex--;
        imageAreas[currentIndex].style.display = "block";
        imageAreas[currentIndex].classList.add("remove_blur");
        if(currentIndex === 0){
            preArrow.style.visibility = "hidden";
        }else if(currentIndex < imageAreas.length -1){
            nextArrow.style.visibility = "visible";
        } 
    });





    // // デフォルトイメージ
    // let currentIndex = 0;
    // slideImage.src = images[currentIndex];

    // // 次へボタン
    // nextArrow.addEventListener('click', () =>{
    //     currentIndex++;    
    //     slideImage.src = images[currentIndex];
    //     if(currentIndex === images.length -1){
    //         nextArrow.style.visibility = 'hidden';
    //         // currentIndex = 0;
    //     }else if(currentIndex > 0){
    //         preArrow.style.visibility = 'visible';
    //     }
    //     // console.log(currentIndex);
    // });
    // // 戻るボタン 
    // preArrow.addEventListener('click', () =>{
    //     currentIndex--;
    //     slideImage.src = images[currentIndex];
    //     if(currentIndex === 0){
    //         preArrow.style.visibility = 'hidden';
    //     }else if(currentIndex < images.length){
    //         nextArrow.style.visibility = 'visible';
    //     }
    //     // console.log(currentIndex);
    // });


// スクロールによる背景色変更
const default_bg = document.querySelector(".default_bg");
const topArea = document.getElementById("top_area");
const secArea = document.getElementById("sec_area");
const thrArea = document.getElementById("thr_area");
const page_h = document.getElementById('top_area').clientHeight;

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
