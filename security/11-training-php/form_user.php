<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

// Mã hóa user_id
function encode_id($id) {
    return base64_encode($id);
}

// Giải mã user_id
function decode_id($encoded_id) {
    $decoded = base64_decode($encoded_id); 
    if (is_numeric($decoded)) {
        return $decoded;
    }
    return false;
}

// Validation functions
function validateName($name) {
    if (empty($name)) {
        return "Tên không được để trống";
    }
    if (!preg_match('/^[A-Za-z0-9]{5,15}$/', $name)) {
        return "Tên phải dài 5-15 ký tự và chỉ chứa A-Z, a-z, 0-9";
    }
    return null;
}

function validatePassword($password) {
    if (empty($password)) {
        return "Phải điền mật khẩu";
    }
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()])[A-Za-z\d~!@#$%^&*()]{5,10}$/', $password)) {
        return "Mật khẩu phải dài 5-10 ký tự và bao gồm chữ thường, chữ hoa, số và ký tự đặc biệt (~!@#$%^&*())";
    }
    return null;
}

$user = NULL;
$_id = NULL;
$version = 1;
$nameError = $passwordError = null;

if (!empty($_GET['id'])) {
    $_id = decode_id($_GET['id']);
    if ($_id !== false) {
        $user = $userModel->findUserById($_id);
        if (!empty($user)) {
            $version = $user[0]['version'];
        }
    } else {
        echo '<div class="alert alert-danger">Invalid user ID</div>';
        exit;
    }
}

if (!empty($_POST['submit'])) {
    $result = null; // Biến lưu kết quả
    if (!empty($_id)) {
        // Cập nhật người dùng
        $updateData = [
            'id' => $_id,
            'name' => $_POST['name'],
            'version' => $version
        ];
        // Chỉ cập nhật mật khẩu nếu nó được nhập
        if (!empty($_POST['password'])) {
            $updateData['password'] = $_POST['password'];
        }
        $result = $userModel->updateUser($updateData);
    } else {
        $result = $userModel->insertUser($_POST); // Thêm người dùng mới
    }

    // Kiểm tra xem có lỗi không
    if (isset($result['error'])) {
        $_SESSION['error'] = $result['error']; // Lưu thông báo lỗi vào session
        header('Location: form_user.php' . (!empty($_id) ? '?id=' . encode_id($_id) : '')); // Chuyển hướng về trang hiện tại
        exit();
    } else {
        $_SESSION['success'] = !empty($_id) ? 'User updated successfully' : 'User added successfully';
        header('location: list_users.php'); // Nếu thành công, chuyển hướng đến danh sách người dùng
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
    <style>
        .error-message {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <?php include 'views/header.php' ?>
    <div class="container">
        <?php if ($user || !isset($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <form method="POST" onsubmit="return validateForm()" name="userForm">
                <input type="hidden" name="id" value="<?php echo encode_id($_id); ?>">
                <input type="hidden" name="version" value="<?php echo $version ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" id="name" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo htmlspecialchars($user[0]['name']) ?>' oninput="validateName()">
                    <div id="nameError" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" oninput="validatePassword()">
                    <div id="passwordError" class="error-message"></div>
                </div>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                User not found!
            </div>
        <?php } ?>
    </div>
    
    <script>
    function validateName() {
        var name = document.getElementById('name').value;
        var nameError = document.getElementById('nameError');
        var nameRegex = /^[A-Za-z0-9]{5,15}$/;
        
        if (name === "") {
            nameError.textContent = "Tên phải được điền";
        } else if (!nameRegex.test(name)) {
            nameError.textContent = "Tên phải dài 5-15 ký tự và chỉ chứa A-Z, a-z, 0-9";
        } else {
            nameError.textContent = "";
        }
    }

    function validatePassword() {
        var password = document.getElementById('password').value;
        var passwordError = document.getElementById('passwordError');
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()])[A-Za-z\d~!@#$%^&*()]{5,10}$/;
        
        if (password === "") {
            passwordError.textContent = "Phải điền mật khẩu";
        } else if (!passwordRegex.test(password)) {
            passwordError.textContent = "Mật khẩu phải dài 5-10 ký tự và bao gồm chữ thường, chữ hoa, số và ký tự đặc biệt (~!@#$%^&*())";
        } else {
            passwordError.textContent = "";
        }
    }

    function validateForm() {
        validateName();
        validatePassword();
        return document.getElementById('nameError').textContent === "" && 
               document.getElementById('passwordError').textContent === "";
    }
    </script>
</body>
</html>