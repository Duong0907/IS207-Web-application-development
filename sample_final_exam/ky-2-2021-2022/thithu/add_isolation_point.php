<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm điểm cách ly</title>

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
    <h1>Thêm điểm cách ly</h1>
    <form action="/thithu/isolation_point_controller.php" method="post">
        <input style="display:none;" type="text" name="action" id="action" value="create">

        <label for="isolation-point-id">Mã điểm cách ly</label>
        <input type="text" name="isolation-point-id" id="isolation-point-id" placeholder="Mã điểm cách ly">
        <br>

        <label for="isolation-point-name">Tên điểm</label>
        <input type="text" name="isolation-point-name" id="isolation-point-name" placeholder="Tên điểm cách ly">
        <br>

        <label for="address">Địa chỉ</label>
        <input type="text" name="address" id="address" placeholder="Địa chỉ">
        <br>

        <label for="capacity">Sức chứa</label>
        <input type="text" name="capacity" id="capacity" placeholder="Sức chứa">
        <br>

        <button type="submit">Thêm</button>
    </form>
</body>

</html>