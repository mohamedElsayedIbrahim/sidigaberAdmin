(function(){
    document.addEventListener('DOMContentLoaded',function(){
        if (document.querySelectorAll('.showBtn').length > 0) {
            document.querySelectorAll('.showBtn').forEach((element)=>{
                element.addEventListener('click',async function(){
                    let id = element.dataset.appId;
                    let headers = {method:'get',headers:{'content_type':'application/json'}};

                    let response = await fetch(`${location.origin}/student/${id}/show`,headers);
                    let {data} = await response.json()
                    if (data.length >0) {
                        console.log(data[0]);
                        let {student_name_arabic,student_name_english,student_nid,student_bod,student_day,student_month,student_year,student_gender,student_birth_city,student_address
                        } = data[0];
                        let cartonna = `
                        <tr>
                <th>student name in arabic</th>
                <td>${student_name_arabic}</td>
                <th>student name in english</th>
                <td>${student_name_english}</td>
            </tr>
            <tr>
                <th>student NID</th>
                <td>${student_nid}</td>
                <th>student name birthdate</th>
                <td>${student_bod}</td>
            </tr>
            <tr>
                <th>student age days/months/years</th>
                <td>${student_day} - ${student_month} - ${student_year}</td>
                <th>student name gender</th>
                <td>${student_gender}</td>
            </tr>
            <tr>
                <th>student name city</th>
                <td>${student_birth_city}</td>
                <th>student address</th>
                <td>${student_address}</td>
            </tr>
                        `
                        document.getElementById('student-table').innerHTML = cartonna;
                    }

                })
            })
        }
    });
})();