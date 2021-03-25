const setFilter=(node, text, bool)=>{
    const allOpt=Array.from(node.querySelectorAll('option'));
    let counter=0;
    allOpt.forEach(element => {
            if(bool && element.getAttribute('active')=="1"){
                element.style.display="none";
                counter++;
                return;
            }else{
                element.style.display="block";
            }

            if(element.getAttribute('value').toLowerCase().includes(text.toLowerCase())){
                element.style.display="block";
            }else{
                element.style.display="none";
                counter++;
            }

        });

        counter=Math.min(Math.max(allOpt.length-counter+1,2),6);
        node.setAttribute('size', counter);
}

const adminMain=()=>{
    const findingNameNode=document.querySelector('#filtered-text'),
    isActiveNode=document.querySelector('#isActive'),
    select=document.querySelector('select'),
    btn=document.querySelectorAll('button')[1];
    let text='',isChecked=false;

    findingNameNode.addEventListener('keyup',()=>{
        text=findingNameNode.value;
        setFilter(select, text, isChecked);
    });
    isActiveNode.addEventListener('click',()=>{
        isChecked=isActiveNode.checked;
        setFilter(select, text, isChecked);
    });


    btn.addEventListener('click',()=>{
        document.querySelector('input[type=radio]').checked=true;
        document.querySelector("form").submit();
    })

    if(document.querySelector(".success--output b").innerText!=document.querySelector(".header__profile-name").innerText.trim()){
        location.reload();
    }
}


window.addEventListener('load', adminMain);