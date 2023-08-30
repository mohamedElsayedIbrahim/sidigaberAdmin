let content = document.getElementById('content');

async function loadBranches(){
    let headers = {method:'get',headers:{'content_type':'application/json'}};
    let response = await fetch(`${location.origin}/get/branches`,headers);
    let {data} = await response.json();

    content.insertAdjacentHTML('afterbegin',loadHtmlCollection(data));
    Remove();
}


function Remove()
{
    let btns = document.querySelectorAll('.remove');

    btns.forEach(element => {
        element.addEventListener('click',function(){
            this.parentElement.parentElement.remove();
        });
    });
}

function loadHtmlCollection(object)
{
    let collection = `<tr><td><div class="row mb-3">
    <div class="col-md-4">
            <select class="form-control" name="schools[]" id="school"  required>
            <option value="">select student school</option>`;
    for (const iterator of object) {
        collection += `
                    <option value="${iterator.id}">${iterator.title}</option>
                `;
    }

    collection +=`</select>
    </div>
    <td><button type="button" class="btn btn-danger remove"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
    </div></td></tr>`;
    return collection;
}

document.getElementById('addBranch').addEventListener('click',loadBranches);

(function(){
    loadBranches();
})();