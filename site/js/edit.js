const editMain=()=>{
    const btn = document.querySelector(".profile-edit__form--password button");
    const password = document.querySelector("#pass-1");
    const passTest = document.querySelector("#pass-2");
    const err=document.querySelector(".error");

    const colorReset=()=>{
        password.style.backgroundColor="";
        passTest.style.backgroundColor="";
    }
    //#ff9797
    //#3be03b
    btn.addEventListener('click',()=>{
        const red='#ff9797',
            green='#7efb7e';
        colorReset();
        let message='';
        // if(login.value && checkLogin(login.value)){
        //     login.style.backgroundColor=red;
        //     message+="Login zajęty lub pusty\n";
        // }else{
        //     login.style.backgroundColor=green;
        // }

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
    })

}


window.addEventListener('load', editMain);