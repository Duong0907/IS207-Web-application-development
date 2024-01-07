<?php
include('./db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action == 'create') {
            $isolationPointId = $_POST['isolation-point-id'];
            $isolationPointName = $_POST['isolation-point-name'];
            $address = $_POST['address'];
            $capacity = $_POST['capacity'];



            $sql = "insert into DIEMCACHLY (MaDiemCachLy, TenDiemCachLy, DiaChi, SucChua)
                    values ($isolationPointId,
                    '$isolationPointName',
                    '$address',
                    $capacity)";

            $result = query($sql);
            header('Location: /thithu/index.php');
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        if ($action == 'all') {
            $sql = 'select * from diemcachly;';

            $result = query($sql);

            if ($result) {
                echo json_encode($result->fetch_all());
            }
        }
    }
} else {
    echo 'Wrong method';
}
