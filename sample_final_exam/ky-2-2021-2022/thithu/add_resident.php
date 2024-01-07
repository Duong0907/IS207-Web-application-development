<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm công dân</title>

    <style>
        label {
            display: inline-block;
            min-width: 128px;
            margin-top: 10px;
        }

        button {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h1>Thêm công dân</h1>
    <form action="/thithu/resident_controller.php" method="post">
        <input style="display:none;" type="text" name="action" id="action" value="create">

        <label for="resident-id">Mã công dân</label>
        <input type="text" name="resident-id" id="resident-id" placeholder="Mã công dân">
        <br>

        <label for="resident-name">Tên công dân</label>
        <input type="text" name="resident-name" id="resident-name" placeholder="Tên công dân">
        <br>

        <label for="gender">Giới tính</label>
        <input type="checkbox" name="gender[]" id="gender"> <span>(Chọn tương ứng giới tính là 'Nam')</span>
        <br>

        <label for="year-of-birth">Năm sinh</label>
        <input type="date" name="year-of-birth" id="year-of-birth">
        <br>

        <label for="country">Nước về</label>
        <input type="text" name="country" id="country" placeholder="Nước về">
        <br>

        <label for="isolation-point-name">Tên điểm cách ly</label>
        <select name="isolation-point-name" id="isolation-point-name">
            <?php
            include('./db.php');
            $sql = 'select * from diemcachly;';

            $result = query($sql);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value=" . $row['MaDiemCachLy'] . ">" . $row['TenDiemCachLy'] . "</option>";
                }
            }
            ?>
        </select>
        <br>

        <button type="submit">Thêm</button>
    </form>
</body>

</html>