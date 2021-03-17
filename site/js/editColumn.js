const setOption=(select, optName)=>{
    select.querySelectorAll('option').forEach(el => {
        if(el.getAttribute("value")===optName){
            el.setAttribute("selected",null);
        }
    });
}

const editColumnmain=()=>{
    const radio=document.querySelector('input[name=delete]')
    document.querySelector('.secondary-btn.secondary-btn--danger').addEventListener('click',()=>{
        new Popup(3,'Na pewno chcesz <span>nieodwracalnie usunąć</span> wybraną kolumnę?',()=>{
            radio.checked=true;
            document.querySelector('.form__body--small').submit();
        })
    });

    const tr=document.querySelector('tbody tr');

    if(tr){
        const select=tr.querySelector('select');
        setOption(select, select.getAttribute("value-type"));
        setOption(document.querySelector("#col"), document.querySelector("#columnName").value);
        tr.querySelectorAll('input[type=checkbox]').forEach(el=>{
            if(el.value=="1"){
                el.checked=true;
            }
        })
    }

    const btns=document.querySelectorAll('.form__body .secondary-btn-box button');

    btns[0].addEventListener('click',()=>new Popup(2, "Czy chcesz zapisać zmiany?", ()=>document.querySelector('.form__body').submit()));
    
}










window.addEventListener('load', editColumnmain);