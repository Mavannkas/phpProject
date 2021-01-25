const main=()=>{
    const nav=document.querySelector("#navbar");
    const pricesBtns=document.querySelectorAll(".prices__btn")
    const prices=document.querySelector(".prices")
    const pricesBoxes=document.querySelectorAll(".prices__box");


    const setBGC=()=>{
        console.log()
        if(window.scrollY>0){
            nav.style.backgroundColor="rgba(0,0,0,.6)";
        }else{
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
    pricesBtns.forEach(a=>{
        a.addEventListener('click',()=>prices.classList.add("stonks"));
    })
    prices.addEventListener('dblclick',()=>{
        prices.classList.remove("stonks");
        pricesBoxes[0].style.display="none";
        pricesBoxes[1].style.display="none";
        pricesBoxes[2].style.display="none";
    })
}


window.addEventListener("load",main);





//TODO
//Formularz - po wyślij komunikat
//Popup logowania
//popup rejestracji
    //Podpiąć ją pod biorę w cenniku i jako link w logowaniu
    