<?php
// Start the session
session_start();

require_once 'models/UserModel.php';
$userModel = new UserModel();



$params = [];
if (!empty($_GET['keyword'])) {
    // Sử dụng hàm htmlspecialchars để ngăn chặn XSS
    $params['keyword'] = htmlspecialchars($_GET['keyword'], ENT_QUOTES, 'UTF-8');
}

// Giả sử hàm getUsers đã được cải tiến để sử dụng Prepared Statements
$users = $userModel->getUsers($params);

// Tạo CSRF token nếu chưa có
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <?php include 'views/meta.php' ?>
    <script type="text/javascript">
        function confirmDelete() {
            return confirm('Bạn có chắc chắn muốn xóa người dùng này không?');
        }
    </script>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION['success']; 
                unset($_SESSION['success']); // Xóa thông báo sau khi hiển thị
                ?>
            </div>
        <?php } ?>

        <?php if (!empty($users)) {?>
            <div class="alert alert-warning" role="alert">
                List of users!
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Type</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) {?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?></th>
                            <td>
                                <?php echo htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($user['fullname'], ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($user['type'], ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                            <td>
                                <a href="form_user.php?id=<?php echo urlencode(base64_encode($user['id'])) ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                </a>
                                <a href="view_user.php?id=<?php echo urlencode(base64_encode($user['id'])) ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>

                                <form method="POST" action="delete_user.php" onsubmit="return confirmDelete();">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>" />
                                    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_SESSION['token'], ENT_QUOTES, 'UTF-8'); ?>" />
                                    <button type="submit">
                                        <i class="fa fa-eraser" aria-hidden="true" title="Delete"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-dark" role="alert">
                This is a dark alert—check it out!
            </div>
        <?php } ?>
    </div>
</body>
</html>