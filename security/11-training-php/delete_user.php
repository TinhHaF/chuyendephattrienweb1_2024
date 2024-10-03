<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

// Chỉ cho phép xóa thông qua phương thức POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra CSRF token
    if (!isset($_POST['token']) || !hash_equals($_SESSION['token'], $_POST['token'])) {
        die('Invalid CSRF token');
    }

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    if ($id !== false && $id !== null) {
        // Thực hiện xóa người dùng
        $userModel->deleteUserById($id);
        $_SESSION['message'] = 'Xóa người dùng thành công';
    } else {
        $_SESSION['error'] = 'Invalid user ID.';
    }

    // Xóa token sau khi sử dụng
    unset($_SESSION['token']);

    // Chuyển hướng về trang danh sách người dùng
    header('Location: list_users.php');
    exit;
} else {
    // Nếu không phải POST request, chuyển hướng về trang danh sách
    $_SESSION['error'] = 'Invalid request method.';
    header('Location: list_users.php');
    exit;
}