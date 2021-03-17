const truncateMain=()=>{
    const btn=document.querySelector('button');
    btn.addEventListener('click',()=>new Popup(3,"Czy jesteś <span>pewien?</span>",()=>document.querySelector('form').submit()))
}

window.addEventListener('load', truncateMain);
