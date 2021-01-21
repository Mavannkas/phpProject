const main=()=>{
    const nav=document.querySelector("#navbar");


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

    window.addEventListener('scroll',setBGC);
}


window.addEventListener("load",main);