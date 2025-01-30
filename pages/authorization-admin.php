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

// Перевірка, чи існує користувач з таким логіном вже в базі
$query = mysqli_query($db, "SELECT * FROM `admin` WHERE `login` = '{$login}'");

// Якщо користувач з таким логіном вже існує
if (mysqli_num_rows($query) > 0) {
    // Отримання даних користувача з бази даних
    $user = mysqli_fetch_assoc($query);
    
    // Перевірка правильності пароля
    if ($password == $user['password']) {
        if (!isset($_SESSION['user'])) {
            // Якщо змінної 'user' у сесії не існує, створюємо її
            $_SESSION['user'] = ['nik' => $_POST['login']];
            // Виводимо повідомлення про створення сесії
            echo "Сесія успішно створена";
        };
        
        // Перенаправлення користувача на сторінку /pages/user.php
        header("Location: /pages/user.php");
    } else {
        // Якщо пароль невірний, виведення повідомлення про помилку
        echo "Неправильний пароль";
    }
} else {
    // Якщо користувач з таким логіном не існує, виведення повідомлення про помилку
    echo "Користувач з таким логіном не знайдений";
}

// Закриття з'єднання з базою даних
mysqli_close($db);
?>
