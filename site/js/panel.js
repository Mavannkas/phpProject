const main=()=>{
    const menuExpandItems=document.querySelectorAll(".expand");
    const navBtn=document.querySelector(".nav-btn");
    const nav=document.querySelector('nav');
    const dropdownMenu=document.querySelector('.header__dropdown-menu');
    const profile=document.querySelector('.header__profile');

    menuExpandItems.forEach(mainItem=>{
        mainItem.querySelector("a").addEventListener('click',()=>{
            mainItem.querySelector(".list__secondary").classList.toggle("show");
            mainItem.querySelector("a").classList.toggle("gray");
            mainItem.querySelector(".fas").classList.toggle("rotate");
            })
        });

    if(navBtn){
        navBtn.addEventListener('click',()=>nav.classList.toggle("nav-expand"));
    }
    profile.addEventListener('click',()=>dropdownMenu.classList.toggle("header__profile__expand"));

}










window.addEventListener('load', main);