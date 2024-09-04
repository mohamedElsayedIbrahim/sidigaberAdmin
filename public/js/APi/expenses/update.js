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
    input.classList.add('form-control','mb-3');
    input.type='number'
    input.id = 'ReciptAmount';
    input.value = data.fees;
    input.name = 'ReciptAmount';

    let csrf = document.createElement('input');
    csrf.type='hidden';
    csrf.value = token;
    csrf.name = '_token';

    let labelDate = document.createElement('label');
    labelDate.classList.add('form-label');
    labelDate.setAttribute('for','enddate');
    labelDate.innerText = 'Due Date';

    let enddate = document.createElement('input');
    enddate.type = 'date';
    enddate.value = data.dateEnd;
    enddate.id = 'enddate';
    enddate.classList.add('form-control','mb-3');
    enddate.name = 'enddate';

    let labelType = document.createElement('label');
    labelType.classList.add('form-label');
    labelType.setAttribute('for','enddate');
    labelType.innerText = 'Type';

    let type = document.createElement('select');
    type.id = 'enddate';
    type.classList.add('form-select','mb-3');
    type.name = 'type';

    let option = document.createElement('option');
    option.value = 'تأمين';
    option.innerText = 'share';
    type.append(option);

    option = document.createElement('option');
    option.value = 'مصروفات دراسية';
    option.innerText = 'All expenses';
    type.append(option);

    option = document.createElement('option');
    option.value = 'قسط الاول';
    option.innerText = '1st expense';
    type.append(option);

    option = document.createElement('option');
    option.value = 'قسط ثانى';
    option.innerText = '2nd expense';
    type.append(option);

    let btn = document.createElement('button');
    btn.type = 'submit';
    btn.classList.add('btn','btn-primary');
    btn.innerText = 'Update Fee';

    continer.append(label);
    continer.append(input);
    continer.append(labelDate);
    continer.append(enddate);
    continer.append(labelType);
    continer.append(type);

    form.append(csrf);
    form.append(continer);
    form.append(btn);

    return form;
}