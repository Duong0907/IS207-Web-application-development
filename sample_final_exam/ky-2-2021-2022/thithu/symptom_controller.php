<?php
include('./db.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['resident-id'])) {
        $residentId = $_GET['resident-id'];

        $sql = "select trieuchung.MaTrieuChung, TenTrieuChung from cn_tc join trieuchung
            where cn_tc.MaCongDan=" . $residentId;
        $result = query($sql);


        if ($result) {
            echo json_encode($result->fetch_all());
        }
    }
} else {
    echo 'Wrong method';
}
