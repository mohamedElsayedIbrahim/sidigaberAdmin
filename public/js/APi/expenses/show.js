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
            //display Data
            document.querySelector('.modal-body').innerHTML = display(data);
            //set system api injection data
            document.getElementById('formUpdate').action = `${location.origin}/expenses/${expence}/update/status`;
            if (data.pay == "paied") {
              document.getElementById('formUpdate').parentNode.classList.add('d-none');
              document.getElementById('formUpdate').parentNode.classList.remove('d-block');
            }else
            {
              document.getElementById('formUpdate').parentNode.classList.add('d-block');
              document.getElementById('formUpdate').parentNode.classList.remove('d-none');
            }
            console.log(data);
            setTimeout(() => {
                el.classList.replace('d-flex','d-none')
            }, 1000);
        });
    });
}

function display(data)
{
    return `
    <div class="row">
            <div class="col-md-8">
    <div>
    <h2 class="text-danger">Student information</h2>
    <table class="table table-striped">
      <tbody>
        <tr>
          <th>Name</th>
          <td>${data.student.fullname}</td>
        </tr>

        <tr>
          <th>National ID</th>
          <td>${data.student.id}</td>
        </tr>

        <tr>
          <th>Gender</th>
          <td>${data.student.gender}</td>
        </tr>

      </tbody>
    </table>
  </div>

  <div>
    <h2 class="text-danger">School information</h2>
    <table class="table table-light table-striped">
      <tbody>
        <tr>
          <th>School</th>
          <td>${data.school.title}</td>
        </tr>

        <tr>
          <th>Stage</th>
          <td>${data.stage.title}</td>
        </tr>

        <tr>
          <th>Year</th>
          <td>${data.year.year}</td>
        </tr>

      </tbody>
    </table>
  </div>

  <div>
    <h2 class="text-danger">Fees information</h2>
    <table class="table table-light table-striped">
      <tbody>
        <tr>
          <th>Fees</th>
          <td>${data.fees} EGP</td>
        </tr>

        <tr>
          <th>Status</th>
          <td>${data.pay}</td>
        </tr>

        <tr>
          <th>Type</th>
          <td>${data.type}</td>
        </tr>

        <tr>
          <th>Date</th>
          <td>${data.created}</td>
        </tr>

      </tbody>
    </table>
  </div>


  </div>

  <div class="col-md-4">
              <h2 class="text-danger">Upload Reciept</h2>
              <small class="text-capitalize">front face</small>
              <div>${data.front !== null ? `<div id="my-zoomist" data-zoomist-src="https://app.sidigaber.org/bank/${data.front}"></div>`:'N/A'}</div>
              <small class="text-capitalize">back face</small>
              <div>${data.back !== null ? `<div id="my-zoomist" data-zoomist-src="https://app.sidigaber.org/bank/${data.back}"></div>`:'N/A'}</div>
  </div>
  </div>

    `;
}