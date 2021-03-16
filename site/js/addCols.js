class Row{
    constructor(){
        this.table=document.querySelector('tbody');

        this.rowAmount=0;
        this.rowNodesArr=[];
        this.lastNode=null;


        this.addOpacityRow();
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
        this.lastNode=this.table.querySelector("tr:nth-last-child(2)");
    }
    
    expandTable(){
        const newRow=this.genNewRow();
        this.rowNodesArr.push(newRow);
        this.table.insertBefore(newRow, this.opacity);
        this.updateLastNode();
        this.lastNode.querySelector('input').focus();
        this.addFocus(newRow);
    }
    
    addFocus(row){
        row.querySelectorAll('input').forEach(el=>{
            el.addEventListener('blur',(a)=>this.focusOutAction(row));
        });
    }

    focusOutAction(row){
        if(row && this.isEmpty(row)){
            this.reduceTable(row);
        }
    }

    isEmpty(row){
        let isEmpty=true;
        console.log()
        row.querySelectorAll('input').forEach(el=>{
            if(el.type=='checkbox'){
                console.log(el.checked)
                if(el.checked){
                    isEmpty=false;
                }
            }else if(el.type=='text'){
                console.log(el.value)
                if(el.value!=""){
                    isEmpty=false;
                }
            }
        })
        return isEmpty;
    }

    addOpacityRow(){
        const newRow=this.genNewRow();
        this.table.appendChild(newRow);
        this.opacity=newRow;
        this.opacity.style.opacity=.15;
        this.opacity.addEventListener('click',(a)=>{
            a.preventDefault();
            this.expandTable();
        });
        this.opacity.querySelector("input").addEventListener('focus',()=>this.expandTable())
        this.opacity.querySelector("input[name=isPrimary]").addEventListener('focus',()=>this.expandTable())
    }
    
    reduceTable(row){
        if(this.rowAmount){
            row.remove();
            this.updateLastNode();
            this.rowNodesArr.splice(this.rowNodesArr.indexOf(row),1);
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
        new Popup(1, `<b>DB INFO</b><br><span>${response.message}</span>`);
    }else{
        location.reload();
    }
};

const columnMain=()=>{
    const myObj=new Row()
    document.querySelector("#submit").addEventListener('click',()=>
        new Popup(2,"Jesteś pewien, że chcesz zatwierdzić?",()=>{
            const json=myObj.genJSON();
            if(json){
                sendToPHP(json);
            }else{
                new Popup(1,"Błędnie wypełniłeś");
            }
        })
    );

    document.querySelector('.secondary-btn.secondary-btn--danger').addEventListener('click',()=>
        new Popup(3, "Jesteś pewien, że chcesz usunąć wszystkie postępy?",()=>location.reload())
    );

    document.querySelectorAll('input[type=checkbox]').forEach(a=>{
        if(a.value=="YES" || a.value=="PRI" || a.value=="UNI"){
            a.checked=true;
        }
    });
}

window.addEventListener('load',columnMain);



