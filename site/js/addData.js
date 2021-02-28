class RowData{
    constructor(){
        this.tbody=document.querySelector('tbody');
        this.theadTuples=document.querySelectorAll('th');
        this.btns=document.querySelectorAll(".tabBtn");
        this.tupleTemplates=[];
        for (const node of this.theadTuples) {
            this.tupleTemplates.push({
                type:node.getAttribute('data-type'),
                start:node.getAttribute('data-start'),
                null:node.getAttribute('data-null')
            });
        }
        this.tupleTemplates=this.tupleTemplates.map(this.genTemplate.bind(this));
        this.allRowsArr=[];
        this.btns[0].addEventListener('click',this.expand.bind(this));
        this.btns[1].addEventListener('click', this.collapse.bind(this));
    }

    checkBtnStatus(){
        if(!this.allRowsArr.length){
            this.btns[1].style.display="none";
            this.btns[0].style.width="120px";
            this.btns[0].style.borderBottomRightRadius="90%";
        }else{
            this.btns[1].style="";
            this.btns[0].style="";
        }
    }

    expand(){
        const newRow=document.createElement('tr');
        for (const i in this.tupleTemplates) {
            const td=document.createElement('td');
            td.appendChild(this.tupleTemplates[i].cloneNode())
            newRow.appendChild(td);
        }
        this.allRowsArr.push(newRow);
        this.tbody.appendChild(newRow);
        newRow.querySelector("td").firstChild.focus();
        this.checkBtnStatus();
    }

    collapse(){
        if(this.allRowsArr.length){
            this.tbody.removeChild(this.allRowsArr.pop());
        }
        this.checkBtnStatus();
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
        return myType;
    }

    addAttributes(node, attributes, bool){
        if(!bool){
            for (const attr in attributes) {
                node.setAttribute(attr, attributes[attr]);
            }
        }else{
            for (const attr in attributes) {
                if(attr=="value"){
                    node.innerText=attributes[attr];
                }else{
                    node.setAttribute(attr, attributes[attr]);
                }
            }
        }
        return node;
    }

    genTemplate(params){
        let infoAboutType=Object.assign(this.getHTMLInputType(params.type),
        {'value': params.start});

        if(params.null==="false")
            infoAboutType=Object.assign(infoAboutType,{'required':null});

        let node=document.createElement(
                                        infoAboutType.type==="textarea"?
                                            'textarea':
                                            'input'
                                        );
        if(node.nodeName!=="INPUT"){
            delete infoAboutType.type;
            node=this.addAttributes(node, infoAboutType, true);
        }else{
            node=this.addAttributes(node, infoAboutType);
        }

        return node;
    }

    genObjectTemplate(){
        const obj={};
        for (const node of this.theadTuples) {
            obj[node.innerText]='';
        }
        return obj;
    }

    getJSON(){
        const dataArr=[];
        const objectTemplate=this.genObjectTemplate();
        const objKeys=Object.keys(objectTemplate);

        for (const i of this.allRowsArr) {
            const tdArr=i.querySelectorAll('td');
            const dstObj=Object.assign({},objectTemplate);
            for(let k = 0 ; k<tdArr.length ; k++){
                const dataNode=tdArr[k].firstChild;
                if(dataNode.getAttribute('required') && !dataNode.value){
                    return false;
                }

                dstObj[objKeys[k]]=dataNode.value;
            }
            dataArr.push(dstObj);
        }
        return JSON.stringify(dataArr);
    }
};

const sendData=data=>alert(data);

const dataMain=()=>{
    const myObj=new RowData();
    const btns=document.querySelectorAll('.secondary-btn');


    btns[0].addEventListener('click',()=>new Popup(2, "Czy chcesz zapisać zmiany?",()=>{
        const json=myObj.getJSON();
        if(json==="[]"){
            new Popup(1,"Nic nie zrobiłeś :(");
        }else if(json===false){
            document.querySelector('form').requestSubmit();
        }else{
            sendData(json);
        }
    }));

    btns[1].addEventListener('click',()=> new Popup(3, "Czy <span>na pewno</span> chcesz anulować postęp?", ()=>location.reload()));
};

window.addEventListener('load',dataMain);



