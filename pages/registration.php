<?php
session_start();

// Підключення до бази даних
$db = mysqli_connect("mariadb105.r1.websupport.sk", "inakdb", "Inak2024", "inakdb");

// Перевірка підключення до бази даних
if (!$db) {
    die("Помилка підключення до бази даних: " . mysqli_connect_error());
}

// Отримання даних з POST
$login = mysqli_real_escape_string($db, $_POST['login']);
$password = mysqli_real_escape_string($db, $_POST['password']);

// Хешування паролю
$md5_password = md5($password);

// Перевірка, чи існує користувач з таким логіном вже в базі
$query = mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '{$login}'");

// Якщо користувач з таким логіном вже існує
if (mysqli_num_rows($query) > 0) {
    echo "Користувач з таким логіном вже існує";
} else {
    // Додавання нового користувача до бази даних
    $insert_query = "INSERT INTO `users` (`login`, `password`) VALUES ('$login', '$md5_password')";
    if (mysqli_query($db, $insert_query)) {
        $_SESSION['user'] = ['nik' => $login];
        echo "Користувача успішно додано";
        header("Location: /pages/user.php");
    } else {
        echo "Помилка: " . mysqli_error($db);
    }
}

// Закриття з'єднання з базою даних
mysqli_close($db);
?>
