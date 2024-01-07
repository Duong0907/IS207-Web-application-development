<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết công dân</title>

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
    <?php
    include('./db.php');
    $sql = "select * from congdan where MaCongDan=" . $_GET['id'] . ";";

    $result = query($sql);
    $row = $result->fetch_assoc();
    ?>

    <h1>Chi tiết công dân</h1>
    <form action="/thithu/resident_controller.php" method="post">
        <input style="display:none;" type="text" name="action" id="action" value="update">

        <label for="resident-id"> Mã công dân </label>
        <input type="text" name="resident-id" id="resident-id" value="<?php echo $row['MaCongDan'] ?>">
        <br>

        <label for="resident-name">Tên công dân</label>
        <input type="text" name="resident-name" id="resident-name" value="<?php echo $row['TenCongDan'] ?>">
        <br>

        <label for="gender">Giới tính</label>
        <?php if ($row['GioiTinh'] == 'Nam') {
            echo '<input type="checkbox" name="gender" id="gender" checked>';
        } else {
            echo '<input type="checkbox" name="gender" id="gender">';
        }
        ?>
        <span>(Chọn tương ứng giới tính là 'Nam')</span>

        <br>

        <label for="year-of-birth">Năm sinh</label>
        <input type="date" name="year-of-birth" id="year-of-birth" value="<?php echo date($row['NamSinh']) ?>">
        <br>

        <label for="country">Nước về</label>
        <input type="text" name="country" id="country" value="<?php echo $row['NuocVe'] ?>">
        <br>

        <label for="isolation-point-name">Tên điểm cách ly</label>
        <select name="isolation-point-name" id="isolation-point-name">
            <?php
            $sql = 'select * from diemcachly';

            $result1 = query($sql);

            if ($result) {
                while ($row1 = $result1->fetch_assoc()) {
                    echo "<option value=" . $row1['MaDiemCachLy'] . ">" . $row1['TenDiemCachLy'] . "</option>";
                }
            }
            ?>
        </select>
        <br>

        <button type="submit">Thêm</button>
    </form>
</body>

</html>