const regMain=()=>{
    const btn = document.querySelector(".form button");
    const login = document.querySelector("#login");
    const mail = document.querySelector("#mail");
    const password = document.querySelector("#password");
    const passTest = document.querySelector("#pass-test");
    const err=document.querySelector(".error");

    const colorReset=()=>{
        login.style.backgroundColor="";
        mail.style.backgroundColor="";
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

        if(!mail.value || !(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(mail.value))){
            mail.style.backgroundColor=red;
            message+="błędny mail\n";
        }else{
            mail.style.backgroundColor=green;
        }

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
            document.querySelector('.form__body').submit();
        }else{
            err.innerText=message;
        }
    })

}




window.addEventListener('load', regMain);