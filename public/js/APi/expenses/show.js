import { loader } from "../../components/loader.js";

let btns = document.querySelectorAll('.btnshow');

if (btns.length > 0) {
    btns.forEach(element => {
        element.addEventListener('click',async function(){
            let dialog = document.querySelector('.modal-content');
            let el = loader(dialog);
            let expence = this.dataset.expence;
            //init the api
            let headers = {method:'get',headers:{'content_type':'application/json'}};
            let response = await fetch(`${location.origin}/${expence}/show`,headers);
            let {data} = await response.json();
            //set system api injection data
            
            setTimeout(() => {
                el.classList.replace('d-flex','d-none')
            }, 1000);
        });
    });
}