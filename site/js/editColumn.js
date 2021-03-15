const editColumnmain=()=>{
    const radio=document.querySelector('input[name=delete]')
    document.querySelector('.secondary-btn.secondary-btn--danger').addEventListener('click',()=>{
        new Popup(3,'Na pewno chcesz <span>nieodwracalnie usunąć</span> wybraną kolumnę?',()=>{
            radio.checked=true;
            document.querySelector('.form__body--small').submit();
        })
    });
}










window.addEventListener('load', editColumnmain);