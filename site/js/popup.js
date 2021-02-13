class Popup{
    constructor(type, text, callback){
        this.type=type;
        this.text=text;
        this.callback=callback;
        this.popupLayer=this.genLayer();
        this.init();
    }
    
    genLayer(){
        const popupLayer=document.createElement('div');
        popupLayer.innerHTML=`
        <div class="popup">
            <div class="popup__body">
                <h4 class="popup__header"></h4>
                <div class="popup__elements">
                    <p class="popup__text"></p>
                    <div class="popup__button-box"></div>
                </div>
            </div>
        </div>`;
        popupLayer.classList.add("shadow");
        return popupLayer;
    }

    init(){
        switch (this.type) {
            case 1:
                this.firstType("ok");
                break;
            case 2:
                this.secondType("Tak", "Anuluj");
                break;
            case 3:
                this.thirdType("Tak", "Anuluj");
                break;
        }
        this.execute();
    }

    normalBtn(txt){
        const btn=document.createElement('button');
        btn.innerText=txt;
        btn.classList.add("secondary-btn");
        return btn;
    }

    redBtn(txt){
        const btn=this.normalBtn(txt);
        btn.classList.add("secondary-btn--danger")
        return btn;
    }

    destroy(){
        if(this.type==1){
            this.popupLayer.querySelector('button').removeEventListener('click',this.destroy);
        }else{
            const btns=this.popupLayer.querySelectorAll('button');
            btns[0].removeEventListener('click', this.callback);
            btns[1].removeEventListener('click', this.destroy);
        }

        document.body.style.overflow="scroll";
        this.popupLayer.remove();
    }

    firstType(txt, callback){
        this.popupLayer.querySelector("p").innerHTML=this.text;

        const btn=this.normalBtn(txt);
        btn.addEventListener('click', ()=>this.destroy.apply(this));

        this.popupLayer.querySelector(".popup__button-box").appendChild(btn);
    }

    secondType(fBtn, sBtn){

        const btn=this.normalBtn(fBtn);
        btn.addEventListener('click', this.callback);
        btn.addEventListener('click', ()=>this.destroy.apply(this));

        this.popupLayer.querySelector(".popup__button-box").appendChild(btn);
        this.firstType(sBtn);
    }

    thirdType(fBtn, sBtn){
        this.popupLayer.querySelector("h4").innerText="uwaga";

        const btn=this.redBtn(fBtn);
        btn.addEventListener('click', this.callback);
        btn.addEventListener('click', ()=>this.destroy.apply(this));

        this.popupLayer.querySelector(".popup__button-box").appendChild(btn);
        this.firstType(sBtn);
    }

    execute(){
        document.body.style.overflow="hidden";
        document.body.appendChild(this.popupLayer);
    }

}