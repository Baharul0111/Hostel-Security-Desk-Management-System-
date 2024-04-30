<?php
session_start();

$host = 'localhost';
$db = 'Hostel_Security_Desk_Management_System';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $userType = $_POST['userType'] ?? '';

    $hashed_password_from_db = '';

    $retrieved_user_type = 'guard';

    if (password_verify($password, $hashed_password_from_db)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        if ($userType === 'student') {
            header('Location: student_page.html');
            exit;
        } else if ($userType === 'guard') {
            header('Location: dashboard.html');
            exit;
        }
    } else {
        $_SESSION['error'] = 'Invalid username or password.';
        header('Location: index.html');
        exit;
    }
} else {
    header('Location: index.html');
    exit;
}


?>