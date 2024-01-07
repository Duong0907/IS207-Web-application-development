<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liệt kê công dân</title>
    <style>
        table,
        th,
        td {
            border: 1px solid #000;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <select name="isolation-point-name" id="isolation-point-name"></select>
    <select name="resident-name" id="resident-name"></select>

    <h1>Danh sách các triệu chứng</h1>
    <table id="symptom-table">
        <!-- <tr>
            <th>STT</th>
            <th>Mã triệu chứng</th>
            <th>Tên triệu chứng</th>
        </tr>
        <tr>
            <td>1</td>
            <td>1</td>
            <td>Sốt</td>
        </tr> -->
    </table>

    <script>
        const residentSelect = document.getElementById('resident-name');
        const ipSelect = document.getElementById("isolation-point-name");
        const symptomTable = document.getElementById("symptom-table");

        renderIsolationPoint();
        ipSelect.onchange = renderAllResident;
        residentSelect.onchange = renderAllSymptom;

        function renderIsolationPoint() {
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let ipList = JSON.parse(this.responseText);
                    for (let i of ipList) {
                        let option = new Option(i[1], i[0]);
                        ipSelect.add(option);
                    }
                    renderAllResident();
                }
            };


            xhttp.open("GET", "/thithu/isolation_point_controller.php/?action=all");
            xhttp.send();

        }

        function renderAllResident() {
            let ipId = ipSelect.options[ipSelect.options.selectedIndex].value;

            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let residentList = JSON.parse(this.responseText);

                    residentSelect.innerHTML = "";
                    for (let i of residentList) {
                        let option = new Option(i[1], i[0]);
                        residentSelect.add(option);
                    }
                    renderAllSymptom();
                }
            };

            xhttp.open("GET", "/thithu/resident_controller.php/?action=get-by-ip&ip-id=" + ipId);
            xhttp.send();
        }

        function renderAllSymptom() {
            let residentId = residentSelect.options[residentSelect.options.selectedIndex].value;
            console.log(residentId)
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let residentList = JSON.parse(this.responseText);

                    let html = `<tr>
                                    <th>STT</th>
                                    <th>Mã triệu chứng</th>
                                    <th>Tên triệu chứng</th>
                                </tr>`;
                    for (let i in residentList) {
                        html += `<tr>
                                    <td>${i}</td>
                                    <td>${residentList[i][0]}</td>
                                    <td>${residentList[i][1]}</td>
                                </tr>`;
                    }

                    symptomTable.innerHTML = html;
                } else {
                    console.log("Failed")
                }

            };

            xhttp.open("GET", "/thithu/symptom_controller.php/?resident-id=" + residentId);
            xhttp.send();
        }
    </script>
</body>

</html>