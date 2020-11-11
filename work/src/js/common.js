// ハンバーガーメニュー
const menuIcon = document.getElementById('menu_icon');
const navList = document.getElementById('nav_list');
const topLink = document.getElementById('top_link');
const secLink = document.getElementById('sec_link');
const thiLink = document.getElementById('thi_link');

    // クリックしたら開いて「×」ボタンを押したら閉じる
    //クローズメニューの関数
    function closeMenu(){
    navList.style.display = 'none';
    menuIcon.className = 'fa fa-bars';
   }

    menuIcon.addEventListener('click', () =>{
        if(navList.style.display == 'none'){
            navList.style.display = 'block';
            menuIcon.className = 'fa fa-times';
        }else{
            closeMenu();
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
const imageNum = document.querySelector('.image_area_number');

// トップページ/画像エリアスライド切り替え
let area01 = document.getElementById('image_area01');
let area02 = document.getElementById('image_area02');
let area03 = document.getElementById('image_area03');
// let area04 = document.getElementById('image_area04');
// let area05 = document.getElementById('image_area05');
// let area06 = document.getElementById('image_area06');
// let area07 = document.getElementById('image_area07');
// let area08 = document.getElementById('image_area08');
// let area09 = document.getElementById('image_area09');
// let area10 = document.getElementById('image_area10');
let imageAreas = [
    area01,
    area02,
    area03,
    // area04,
    // area05,
    // area06,
    // area07,
    // area08,
    // area09,
    // area10,
];
// デフォルト設定
let currentIndex = 0;
// imageAreas[currentIndex].style.display = "block";
let lastNum = imageAreas.length;
imageNum.innerHTML = (currentIndex + 1) + "/" + lastNum;



    // 次のページへ切り替え
    nextArrow.addEventListener('click', () =>{
            imageAreas[currentIndex].style.display = "none";
            currentIndex++;
            imageAreas[currentIndex].style.display = "block";
            imageNum.innerHTML = (currentIndex + 1) + "/" + lastNum;
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
            imageNum.innerHTML = (currentIndex + 1) + "/" + lastNum;
            if(currentIndex === 0){
                preArrow.style.visibility = "hidden";
            }else if(currentIndex < imageAreas.length -1){
                nextArrow.style.visibility = "visible";
        }
    });



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
