<!-- <?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $userModel->deleteUserById($id);//Delete existing user
}
header('location: list_users.php');
?> -->

<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
// Kiểm tra CSRF token
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        die('Invalid CSRF token');
    }

    $id = $_POST['id'] ?? NULL;
    if ($id !== NULL) {
        $userModel->deleteUserById($id); // Xóa người dùng
    }
    header('location: list_users.php');
} else {
    header('location: list_users.php');
}
