const editMain=()=>{
    const btn = document.querySelector(".profile-edit__form--password button");
    const password = document.querySelector("#pass-1");
    const passTest = document.querySelector("#pass-2");
    const err=document.querySelector(".error");
    const imgAdd=document.querySelector("#img-add");
    const imgDel=document.querySelector("#img-del");
    const accDelBtn=document.querySelector("#acc-del-btn");

    const colorReset=()=>{
        password.style.backgroundColor="";
        passTest.style.backgroundColor="";
    }

    const checkPass=()=>{
        const red='#ff9797',
            green='#7efb7e';
        colorReset();
        let message='';

        if(!passTest.value || !password.value || password.value != passTest.value){
            message+="hasła się różnią lub są puste\n";
            passTest.style.backgroundColor=red;
            password.style.backgroundColor=red;
        }else{
            if(!/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/.test(password.value)){
                message+="hasło nie spełnia wymagań dotyczących złożoności\n";
                password.style.backgroundColor=red;
            }else{
                password.style.backgroundColor=green;
            }
        }
        if(!message){
            console.log(message)
            document.querySelector('.profile-edit__form--password').submit();
        }else{
            err.innerText=message;
        }
    }

    btn.addEventListener('click',()=>new Popup(2,"Czy na pewno chcesz zmienić hasło?", checkPass));
    imgAdd.addEventListener('click',()=>new Popup(2,"Czy na pewno chcesz zmienić zdjęcie?",()=>
        document.querySelector('.profile-edit__form--img').submit()
        ));
        
    imgDel.addEventListener('click',()=>new Popup(3,"Czy na pewno chcesz <span>usunąć<span> zdjęcie?",()=>{
        document.querySelector('#img-del-file').checked=true;
        document.querySelector('.profile-edit__form--img').submit();
    }));

    accDelBtn.addEventListener('click',()=>new Popup(3,"Czy na pewno chcesz <span>usunąć<span> konto?",()=>{
        document.querySelector("#acc-del-input").checked=true;
        document.querySelector('.profile-edit__form--delete').submit();
    }));
}


window.addEventListener('load', editMain);