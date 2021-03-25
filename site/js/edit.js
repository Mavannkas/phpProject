const editMain=()=>{
    const btn = document.querySelector(".profile-edit__form--password button");
    const password = document.querySelector("#pass-1");
    const passTest = document.querySelector("#pass-2");
    const err=document.querySelector(".error");
    const imgAdd=document.querySelector("#img-add");
    const imgDel=document.querySelector("#img-del");
    const accDelBtn=document.querySelector("#acc-del-btn");
    const sendMail=document.querySelector("#send-btn");
    const changeMail=document.querySelector("#change-mail-btn");
    const changeLogin=document.querySelector("#change-login-btn");

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
            document.querySelector('#pass').submit();
        }else{
            err.innerText=message;
        }
    }

    const shortCustomListener=(element, message, selector)=>
                                element.addEventListener('click',()=>new Popup(2, message,()=>
                                document.querySelector(selector).submit()
                                ));



    shortCustomListener(imgAdd, "Czy na pewno chcesz zmienić zdjęcie?", '.profile-edit__form--img');

    imgDel.addEventListener('click',()=>new Popup(3,"Czy na pewno chcesz <span>usunąć<span> zdjęcie?",()=>{
        document.querySelector('#img-del-file').checked=true;
        document.querySelector('.profile-edit__form--img').submit();
    }));

    accDelBtn.addEventListener('click',()=>new Popup(3,"Czy na pewno chcesz <span>usunąć<span> konto?",()=>{
        document.querySelector("#acc-del-input").checked=true;
        document.querySelector('#del').submit();
    }));
    
    if(sendMail){
        sendMail.addEventListener('click',()=>new Popup(2,"Czy chcesz wysłać link aktywacyjny?",()=>{
            document.querySelector("#send-mail").checked=true;
            document.querySelector('#send').submit();
        }));
    }

    if(changeMail){
        shortCustomListener(changeMail, "Czy chcesz zmienić email", '#change-mail');
    }

    if(changeLogin){
        shortCustomListener(changeLogin, "Czy chcesz zmienić login", '#change-login');
    }

    if(btn){
        btn.addEventListener('click',()=>new Popup(2,"Czy na pewno chcesz zmienić hasło?", checkPass));
    }
   
}


window.addEventListener('load', editMain);