
const main=()=>{
    const nav=document.querySelector("#navbar");
    const pricesBtns=document.querySelectorAll(".prices__btn")
    const prices=document.querySelector(".prices")
    const pricesBoxes=document.querySelectorAll(".prices__box");
    
    const cross=document.querySelector(".loginPop__close");
    const logPop=document.querySelector(".loginPop");
    const bodyShadow=document.querySelector(".body-shadow");
    const logBtn=document.querySelector("#log");

    const togglePop=a=>{
        bodyShadow.style.display=a;
        logPop.style.display=a;
    }

    const setBGC=()=>{
        if(window.scrollY>0){
            nav.style.backgroundColor="rgba(0,0,0,.8)";
        }else if(window.innerWidth>991){
            nav.style.backgroundColor="transparent";
        }
    }

    $(document).click(function (event) {
        var clickover = $(event.target);
        var _opened = $(".navbar-collapse").hasClass("show");
        if (_opened === true && !clickover.hasClass("navbar-toggler")) {
            $(".navbar-toggler").click();
        }
    });

    document.querySelector(".footer__year").innerText=new Date().getFullYear();



    window.addEventListener('scroll',setBGC);
    pricesBtns[0].addEventListener('click',()=>{
        pricesBoxes[0].style.display="block";
        pricesBoxes[1].style.display="none";
        pricesBoxes[2].style.display="none";
    })
    pricesBtns[1].addEventListener('click',()=>{
        pricesBoxes[0].style.display="none";
        pricesBoxes[1].style.display="block";
        pricesBoxes[2].style.display="none";
    })
    pricesBtns[2].addEventListener('click',()=>{
        pricesBoxes[0].style.display="none";
        pricesBoxes[1].style.display="none";
        pricesBoxes[2].style.display="block";
    })

    bodyShadow.addEventListener('click',()=>togglePop("none"));
    cross.addEventListener('click',()=>togglePop("none"));
    logBtn.addEventListener('click',()=>togglePop("block"));

}


window.addEventListener("load",main);
