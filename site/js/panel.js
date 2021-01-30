const main=()=>{
    const menuExpandItems=document.querySelectorAll(".expand");

        menuExpandItems.forEach(mainItem=>{
            mainItem.querySelector("a").addEventListener('click',()=>{
                mainItem.querySelector(".list__secondary").classList.toggle("show");
                mainItem.querySelector(".fas").classList.toggle("rotate");
            })
        });

}




window.addEventListener('load', main);