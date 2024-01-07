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
    <h1>Liệt kê công dân</h1>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên công dân</th>
            <th>Giới tính</th>
            <th>Năm sinh</th>
            <th>Nước về</th>
            <th>Chức năng</th>
        </tr>
        <?php
        include('./db.php');
        $sql = 'select * from congdan;';

        $result = query($sql);

        if ($result) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                echo " <tr><td>" . $i . "</td>
                    <td>" . $row['TenCongDan'] . "</td>
                    <td>" . $row['GioiTinh'] . "</td>
                    <td>" . $row['NamSinh'] . "</td>
                    <td>" . $row['NuocVe'] . "</td>
                    <td>
                        <a href='/thithu/resident_detail.php/?id=" . $row['MaCongDan'] . "'>View</a>
                        <button class='delete' onclick='deleteResident(" . $row['MaCongDan'] . ")'>Delete</button>
                    </td> </tr>";

                $i++;
            }
        }
        ?>
    </table>

    <script>
        function deleteResident(id) {
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    location.reload();
                }
            };

            xhttp.open("POST", "/thithu/resident_controller.php/");
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhttp.send("id=" + id + "&action=delete");
        }
    </script>
</body>

</html>