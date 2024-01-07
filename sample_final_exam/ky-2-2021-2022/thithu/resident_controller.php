<?php
include('./db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action == 'create') {

            $residentId = $_POST['resident-id'];
            $residentName = $_POST['resident-name'];

            if (isset($_POST['gender'])) {
                $gender = 'Nam';
            } else {
                $gender = "Nữ";
            }

            $yob = $_POST['year-of-birth'];
            $country = $_POST['country'];
            $isolationPointName = $_POST['isolation-point-name'];

            $sql = "insert into CONGDAN (MaCongDan, TenCongDan, GioiTinh, NamSinh, NuocVe, MaDiemCachLy)
                    values ($residentId,
                    '$residentName',
                    '$gender',
                    '$yob',
                    '$country',
                    '$isolationPointName')";

            $result = query($sql);
            header('Location: /thithu/index.php');
        } else if ($action == 'update') {
            $residentId = $_POST['resident-id'];
            $residentName = $_POST['resident-name'];

            if (isset($_POST['gender'])) {
                $gender = 'Nam';
            } else {
                $gender = "Nữ";
            }

            $yob = $_POST['year-of-birth'];
            $country = $_POST['country'];
            $isolationPointName = $_POST['isolation-point-name'];

            $sql = "update congdan 
                    set
                    TenCongDan='$residentName', 
                    GioiTinh='$gender', 
                    NamSinh='$yob', 
                    NuocVe='$country', 
                    MaDiemCachLy='$isolationPointName'
                    where MaCongDan=$residentId;";

            $result = query($sql);
            header('Location: /thithu/index.php');
        } else if ($action == 'delete') {
            $sql = 'delete from congdan where MaCongDan=' . $_POST['id'];

            $result = query($sql);
            header('Location: /thithu/index.php');
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];


        if ($action == 'get-by-ip') {
            $sql = "select * from congdan where MaDiemCachLy=" . $_GET['ip-id'];
            $result = query($sql);

            if ($result) {
                echo json_encode($result->fetch_all());
            } else {
                echo "Failed to get resident";
            }
        }
    }
} else {
    echo "Wrong method!";
}
