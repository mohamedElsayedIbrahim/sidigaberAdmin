let addNewRowBtn = document.getElementById('addNewRow');
let tblBody = document.getElementById('table-body');
let headers = {method:'get',headers:{'content_type':'application/json'}};

addNewRowBtn.addEventListener('click',async function(){
    tblBody.insertAdjacentHTML('afterbegin',`<tr>
    <td>
        <select class="form-select" name="students[]" id="validationCustom04" required>
            <option selected disabled value="">choose.......</option>
            ${await getStudent()}
        </select>
    </td>
    <td>
        <button class="btn btn-danger deleteRowBtn" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
    </td>
</tr>`);
deleteButton();
});

function deleteButton(){
    let delBtns = document.querySelectorAll('.deleteRowBtn');
    if (delBtns.length > 0) {
        delBtns.forEach(element => {
            element.addEventListener('click',function(){
                this.parentNode.parentNode.remove();
            })
        });
    }
}

async function getAcademic()
{
    let response = await fetch(`${location.origin}/get/years`,headers);
    let {data,type} = await response.json();

    if (type == 'success') {
        let cartonna = ``;
        for (const iterator of data) {
            cartonna += `<option value='${iterator.id}'>${iterator.year}</option>`;
        }
        document.getElementById('academicYearList').insertAdjacentHTML('beforeend',cartonna);
        document.getElementById('academicYearListSchool').insertAdjacentHTML('beforeend',cartonna);
        document.getElementById('academicYearListSchool2').insertAdjacentHTML('beforeend',cartonna);
    }

}

async function getStudent()
{
    let response = await fetch(`${location.origin}/get/students?branches=${tblBody.dataset.filter}`,headers);
    let {data,type} = await response.json();
    if (type == 'success') {
        let cartonna = ``;
        for (const iterator of data) {
            cartonna += `<option value='${iterator.id}'>${iterator.id} - ${iterator.fullname}</option>`;
        }
        return cartonna;
    }

}

async function initRow() {
    tblBody.insertAdjacentHTML('afterbegin',`<tr>
    <td>
        <select class="form-select" name="students[]" id="validationCustom04" required>
            <option selected disabled value="">choose.......</option>
            ${await getStudent()}
        </select>
    </td>
</tr>`);
}

(function(){
    deleteButton();
    getAcademic();
    initRow();
})();