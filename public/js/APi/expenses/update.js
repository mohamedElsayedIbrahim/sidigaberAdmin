import { loader } from "../../components/loader.js";

let editBtns = document.querySelectorAll('.btnedit');

if (editBtns.length > 0) {
    editBtns.forEach(element => {
        element.addEventListener('click',async function(){
            let dialog = document.querySelector('#exampleModalEdit .modal-content');
            let el = loader(dialog);
            let expence = this.dataset.expence;
            //init the api
            let headers = {method:'get',headers:{'content_type':'application/json'}};
            let response = await fetch(`${location.origin}/${expence}/show`,headers);
            let {data} = await response.json();
            //display Data
            let body = document.querySelector('#exampleModalEdit .modal-body');
            body.innerHTML='';

            body.append(display(data,body.dataset.token));
            
            console.log(data);
            setTimeout(() => {
                el.classList.replace('d-flex','d-none')
            }, 1000);
        });
    });
}

function display(data, token)
{
    let form = document.createElement('form');
    form.method = 'POST';
    form.action = `${location.origin}/expenses/${data.id}/update`;

    let continer = document.createElement('div');
    continer.classList.add('mb-3');

    let label = document.createElement('label');
    label.classList.add('form-label');
    label.setAttribute('for','ReciptAmount');
    label.innerText = 'Fees';

    let input = document.createElement('input');
    input.classList.add('form-control');
    input.type='number'
    input.id = 'ReciptAmount';
    input.value = data.fees;
    input.name = 'ReciptAmount';

    let csrf = document.createElement('input');
    csrf.type='hidden';
    csrf.value = token;
    csrf.name = '_token';

    let btn = document.createElement('button');
    btn.type = 'submit';
    btn.classList.add('btn','btn-primary');
    btn.innerText = 'Update Fee';

    continer.append(label);
    continer.append(input);
    form.append(csrf);
    form.append(continer);
    form.append(btn);

    return form;
}