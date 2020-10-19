// ハンバーガーメニュー
const menuIcon = document.getElementById('menu_icon');
const navList = document.getElementById('nav_list');
const menuBg = document.querySelector('.wrap_menu');

function clickMenu(){
    menuIcon.addEventListener('click', () =>{
       if(navList.style.display == 'block'){
            navList.style.display = 'none';
            menuBg.style.backgroundColor = 'transparent';
            menuIcon.className = 'fa fa-bars';
        }else{
            navList.style.display = 'block';
            menuBg.style.backgroundColor = '#6b778d';
            menuIcon.className = 'fa fa-times';
        } 
    });
}

clickMenu();

// 背景色変更
let default_bg = document.querySelector(".default_bg");
let topArea = document.getElementById("top_area");
let secArea = document.getElementById("sec_area");
let thrArea = document.getElementById("thr_area");
// let forArea = document.getElementById("for_area");
let fifArea = document.getElementById("fif_area");
    // セクション要素座標取得
// let topAreaC = document.getElementById("top_area").getBoundingClientRect();
// let secAreaC = document.getElementById("sec_area").getBoundingClientRect();
// let thrAreaC = document.getElementById("thr_area").getBoundingClientRect();
// console.log(topAreaC.top);
// console.log(secAreaC.top);
// console.log(thrAreaC.top);

// スクロールによる背景色変更
window.addEventListener('scroll', () => {
    let scroll = window.pageYOffset;
    let h = 2151.875

    if(scroll >= 0 && scroll < h){
        default_bg.className = 'top_area_bg';
    }else if(scroll >= h && scroll < h * 2){
        default_bg.className = 'sec_area_bg';
    }else if(scroll >= h * 2 && scroll < h * 3){
        default_bg.className = 'thr_area_bg';
    }else if(scroll >= h * 3 && scroll < h * 4){
        default_bg.className = 'fif_area_bg';
    }
});
