class Row{
    constructor(){
        this.table=document.querySelector('tbody');
        const rowArr=this.table.querySelectorAll("tbody tr");

        this.rowAmount=rowArr.length;
        this.rowNodesArr=Array.from(rowArr);
        this.lastNode=this.rowNodesArr.slice(-1)[0];
        this.btns=document.querySelectorAll(".tabBtn");

        this.addActionToBtns();

        console.log(this.btns);
        if(!this.rowAmount){
            this.setOneBtn();
        }
    }

    addActionToBtns(){
        this.btns[0].addEventListener('click',()=>this.expandTable());
        this.btns[1].addEventListener('click',()=>this.reduceTable());
    }

    setOneBtn(){
        this.btns[1].style.display="none";
        this.btns[0].style.width="120px";
        this.btns[0].style.borderBottomRightRadius="90%";
    }

    setTwiceBtns(){
        this.btns[1].style="";
        this.btns[0].style="";
    }

    genNewRow(){
        const actualID=this.rowAmount++;
        const myTxtHTML=`
        <td>
            <input type="text" name="columnName" id="columnName-${actualID}" required>
        </td>
        <td>
            <select name="type" id="type-${actualID}">
                <option value="INT">INT</option>
                <option value="FLOAT">FLOAT</option>
                <option value="VARCHAR">VARCHAR</option>
                <option value="TEXT">TEXT</option>
                <option value="DATE">DATE</option>
                <option value="TIME">TIME</option>
                <option value="TIMESTAMP">TIMESTAMP</option>
            </select>
        </td>
        <td>
            <input type="text" name="startValue" id="startValue-${actualID}" required>
        </td>
        <td class="checkboxContainer">
            <input type="checkbox" name="isNull" id="isNull-${actualID}">
            <label for="isNull-${actualID}"></label>
        </td>
        <td class="checkboxContainer">
            <input type="checkbox" name="isPrimary" id="isPrimary-${actualID}">
            <label for="isPrimary-${actualID}"></label>
        </td>`;
        const newRow=document.createElement('tr');
        newRow.innerHTML=myTxtHTML;
        return newRow;
    }

    updateLastNode(){
        this.lastNode=this.table.querySelector("tr:last-child");
    }

    expandTable(){
        const newRow=this.genNewRow();
        this.rowNodesArr.push(newRow);
        this.table.appendChild(newRow);
        this.updateLastNode();
        this.setTwiceBtns();
    }

    reduceTable(){
        if(this.rowAmount){
            this.lastNode.remove();
            this.rowAmount--;
            this.updateLastNode();
            this.rowNodesArr.pop();
            if(!this.rowAmount){
                this.setOneBtn();
            }
        }
    }

    trToObj(i){
        const objToPrep=this.rowNodesArr[i];
        if(objToPrep.querySelector('input[name="columnName"]').value==="") return false;
        return{
            id:+i+1,
            name:objToPrep.querySelector('input[name="columnName"]').value,
            type:objToPrep.querySelector('select').value,
            value:objToPrep.querySelector('input[name="startValue"]').value,
            null:objToPrep.querySelector('input[name="isNull"]').checked,
            primary:objToPrep.querySelector('input[name="isPrimary"]').checked
        };
    }

    genJSON(){
        const structArr=[];
        for(const i in this.rowNodesArr){
            structArr.push(this.trToObj(i));
        }
        return structArr.includes(false)||structArr.length===0?false:JSON.stringify(structArr);
    }
};

const sendToPHP=async json=>{
    let response = await fetch('php/add_cols.php',{
        method:"POST",
        mode:"same-origin",
        credentials:"same-origin",
        body: json
    });
    response=await response.json();
    if(response.message){
        new Popup(1, response.message);
    }
};

const columnMain=()=>{
    const myObj=new Row()
    document.querySelector("#submit").addEventListener('click',()=>{
        new Popup(2,"Jesteś pewien, że chcesz zatwierdzić?",()=>{
            const json=myObj.genJSON();
            if(json){
                sendToPHP(json);
            }else{
                new Popup(1,"Błędnie wypełniłeś");
            }
        })
    });
};

window.addEventListener('load',columnMain);



