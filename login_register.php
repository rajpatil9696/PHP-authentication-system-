<?php
session_start();

$errors = [
    'login'    => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];

$active_form = $_SESSION['active_form'] ?? 'login-form';

session_unset();

function showError($error) {
    return $error ? "<div class='error-message'>$error</div>" : '';
}

function isActive($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login & Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <!-- LOGIN FORM -->
    <div class="form-box <?php echo isActive('login-form', $active_form); ?>" id="login-form">
        <form action="login_register.php" method="post">
            <h2>Login</h2>
            <?php echo showError($errors['login']); ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
            <p>Don't have an account?
                <a href="#" onclick="showForm('register-form')">Register</a>
            </p>
        </form>
    </div>

    <!-- REGISTER FORM -->
    <div class="form-box <?php echo isActive('register-form', $active_form); ?>" id="register-form">
        <form action="login_register.php" method="post">
            <h2>Register</h2>
            <?php echo showError($errors['register']); ?>
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <select name="role" required>
                <option value="">-- Select Role --</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <button type="submit" name="register">Register</button>
            <p>Already have an account?
                <a href="#" onclick="showForm('login-form')">Login</a>
            </p>
        </form>
    </div>

</div>

<script src="script.js"></script>
</body>
</html>
