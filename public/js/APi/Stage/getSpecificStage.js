document.getElementById('school').addEventListener('change',async function(){
    let value = this.value;
    let stage = document.getElementById('stage');
    stage.setAttribute('disabled','true');

    let response = await fetch(`${location.origin}/get/${value}/stage`,{method:'get',headers:{'content_type':'application/json'}});
    let result = await response.json();
    if (result.type == 'success') {
        let htmlCollection = `<option>select student stage</option>`;
        for (const iterator of result.data) {
            htmlCollection += `<option value="${iterator.id}">${iterator.title}</option>`
        }
        stage.innerHTML = htmlCollection;
        stage.removeAttribute('disabled');
    }
})