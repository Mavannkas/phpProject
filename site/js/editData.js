class editTuple{
    constructor(node){
        this.id=node.getAttribute("id").split("-")[1];
        this.allCells=this.genCellObj(Array.from(node.querySelectorAll("td")));
        this.colNames=Array.from(document.querySelectorAll("th")).map(a=>a.innerText);
        this.prepareData();

        this.theaderNode=this.genTHeader(this.colNames);
        this.popupBody=this.genPopupBody();

    }

    close(){
        this.popupBody.remove();
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
                    type:"text",
                    maxlength:"536870912"
                }
                break;
            case "text":
                myType={
                    type:"text",
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
        const input=document.createElement("input");
        input.value=value;
        input.setAttribute("name",this.colNames[index]);

        for (const i in data) {
            input.setAttribute(i,data[i]);
        }
        console.log(input)
        return{
            inputNode:input
        };
    }
}

document.querySelector(".show-data").addEventListener('click',a=>console.log(new editTuple(a.target.parentNode)))

