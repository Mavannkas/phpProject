class editTuple{
    constructor(node){
        this.id=node.getAttribute("id").split("-")[1];
        this.allCells=this.genCellObj(Array.from(node.querySelectorAll("td")));
        this.colNames=Array.from(document.querySelectorAll("th")).map(a=>a.innerText);
        this.prepareData();

        this.theaderNode=this.genTHeader(this.colNames);
        this.popupBody=this.genPopupBody();
        this.insertData();
        this.addListeners();
    }

    close(){
        this.popupBody.querySelector("#send").removeEventListener('click',this.sendToDB.bind(this));
        this.popupBody.querySelector("#close").removeEventListener('click',this.close.bind(this));
        document.body.removeEventListener('keypress', this.eventHandler, true);
        this.popupBody.remove();
        delete this;
    }
    
    insertData(){
        const dst=this.popupBody.querySelector("tr");
        this.allCells.forEach(element => {
            let tdNode=document.createElement("td");
            tdNode.appendChild(element.inputNode);
            dst.appendChild(tdNode);
        });
        this.popupBody.querySelector('thead').appendChild(this.theaderNode);
        document.body.appendChild(this.popupBody)
    }

    genPopupBody(){
        const myDiv=document.createElement('div');
        myDiv.classList.add("shadow","shadow-edit");
        myDiv.innerHTML=`
        <div class="shadow shadow-edit">
        <div class="popup">
            <h4>Edycja zawartości</h4>
            <form>
                <div class="table-scroll">
                    <table>
                        <thead>
                        </thead>
                        <tbody>
                        <tr></tr>
                        </tbody>
                    </table>
                </div>
                    <div class="secondary-btn-box">
                    <button type="button" class="secondary-btn" id="send">Zapisz</button>
                    <button type="button" class="secondary-btn secondary-btn--danger" id="close">Anuluj</button>
                </div>
            </form>
        </div>
    </div>`;
    return myDiv;
    }
    genTHeader(texts){
        const tr=document.createElement('tr');
        for (const i of texts) {
            let th=document.createElement('th');
            th.innerText=i;
            tr.appendChild(th);
        }
        return tr;
    }

    genCellObj(nodeArr){
       return nodeArr.map(a=>Object.assign({},{
           type:a.getAttribute("data-type"),
           value:a.innerText
       }));
    }

    prepareData(){
        this.allCells.map(a=>Object.assign(a,this.getHTMLInputType(a.type)))
                    .map((a,i)=>Object.assign(a,this.genInputNode(a.HTMLInput,a.value,i)));
        
    }

    getHTMLInputType(type){
        let myType;
        switch(type){
            case "int":
                myType={
                    type:"number",
                    step:"1",
                    min:"-2147483648",
                    max:"2147483647"
                }
                break;
                case "float":
                    myType={
                        type:"number",
                        step:"0.000000000000001",
                        min:"-2147483648",
                        max:"2147483647"
                }
                break;
            case "varchar":
                myType={
                    type:"textarea",
                    maxlength:"536870912"
                }
                break;
            case "text":
                myType={
                    type:"textarea",
                    maxlength:"30000000"
                }
                break;
            case "date":
                myType={
                    type:"date",
                    min:"1000-01-01",
                    max:"9999-12-31"
                }
                break;
            case "time":
                myType={
                    type:"time",
                }
                break;
            case "timestamp":
                myType={
                    type:"datetime-local",
                    step:"1",
                    min:"1970-01-01T00:00:01",
                    max:"2038-01-09T00:00:01"
                }
                break;
        }
        return {
            HTMLInput:myType
        };
    }

    genInputNode(data, value, index){
        const input=data.type=="textarea"?document.createElement("textarea"):document.createElement("input");
        input.value=data.type=="datetime-local"?value.replace(" ","T"):value;
        input.setAttribute("name",this.colNames[index]);

        for (const i in data) {
            input.setAttribute(i,data[i]);
        }
        return{
            inputNode:input
        };
    }

    popupEvent(type, txt, callback){
        if(!this.popupHandler || !this.popupHandler.exists){
            if(this.popupHandler){
                delete this.popupHandler;
            }
            this.popupHandler=new Popup(type, txt, callback);
        }
    }

    addListeners(){
        this.popupBody.querySelector("#send").addEventListener('click',()=>this.popupEvent(2, "Czy jesteś pewny, że chcesz zapisać zmiany?",this.sendToDB.bind(this)));

        this.popupBody.querySelector("#close").addEventListener('click',()=>this.popupEvent(3, "Czy na pewno chcesz anulować zmiany?",this.close.bind(this)));

        this.eventHandler=this.bodyEvent.bind(this);
        document.body.addEventListener('keypress', this.eventHandler, true);
    }

    bodyEvent(key){
        if(key.key==="Enter" && !(this.popupHandler && this.popupHandler.exists) && !"INPUT,TEXTAREA".includes(key.target.nodeName)){
            this.popupEvent(2, "Czy jesteś pewny, że chcesz zapisać zmiany?",this.close.bind(this))
        }
    }

    async sendToDB(){
        try{

            let response = await fetch('php/edit_tuple.php',{
                method:"POST",
                mode:"same-origin",
                credentials:"same-origin",
                body: this.genJSON()
            });
            response=await response.json();
            if(response.message){
                new Popup(1, `<b>DB INFO</b><br><span>${response.message}</span>`);
            }else{
                location.reload();
            }
        }catch(a){
            new Popup(1, `<b>DB INFO</b><br><span>brak połączenia z bazą danych</span>`);
        }
    }
    genJSON(){
        const input=Array.from(this.popupBody.querySelectorAll("input,textarea")).map(a=>a.value);
        const result={
            id:this.id
        };
        for(const i in this.colNames){
            result[this.colNames[i]]=input[i];
        }
        return JSON.stringify(result);
    }
}

document.querySelector(".show-data").addEventListener('click',a=>new editTuple(a.target.parentNode))





const queryArea=document.querySelector('.advanced-query__input-area');
const inputArea=document.querySelector('#query');
document.querySelector('#isAdv').addEventListener('click',()=>queryArea.classList.toggle('hidden'));
inputArea.addEventListener('keydown',() => inputArea.style.height=`${inputArea.scrollHeight}px`);

document.querySelector('#reset-area').addEventListener('click',()=>{
    queryArea.classList.add('hidden');
    inputArea.style='';
});

document.querySelector('#reset').addEventListener('click',()=>{
    new Popup(2,"Na pewno chcesz zresetować?",()=>location.href=location.href.slice(0,location.href.match(/\?/).index))
});